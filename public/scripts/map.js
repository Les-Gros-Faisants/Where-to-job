function addLocation( event ) {
    var lat = event.ll.getLatitude();
    var lng = event.ll.getLongitude();
    console.log( lat+' '+lng );
}

function custom_find_me( map ) {
    var custom_fm = document.createElement( 'div' );

    custom_fm.id = 'fm_control';
    custom_fm.style.position = 'absolute';
    custom_fm.style.zIndex = '50px';
    custom_fm.style.width = '25px';
    custom_fm.style.height = '25px';
    custom_fm.style.top = '5px';
    custom_fm.style.right = '2px';
    custom_fm.style.backgroundImage = "url('../assets/images/waving_man_sat.png')";
    custom_fm.style.backgroundRepeat = 'no-repeat';
    document.getElementById( 'map' ).appendChild( custom_fm );

    custom_fm.onclick = function() {
	navigator.geolocation.getCurrentPosition( function( position ) {
	    map.setCenter ({
		lat: position.coords.latitude,
		lng: position.coords.longitude
	    });
	});
    }
}

function add_pois( response ) {
    // generate poi's and associate an id
    // var machin = new MQA.Poi();
    // machin.Key = 'key';
    // this way we can delete the shit when we're done
    // map.removeShape( map.getByKey( 'key' ) );

    for ( var i = 0; i < response.lenght; i++ ) {
	var coords = response[i].locations[0];

	var poi = new MQA.Poi({
	    lat: coords.latLng.lat,
	    lng: coords.latLng.lng
	});
	poi.key = i;
    }
}

function add_pois( json_array ) {
    //call to geocode webservice

    var url = 'http://www.mapquestapi.com/geocoding/v1/batch?key=Fmjtd%7Cluur2h612h%2Cra%3Do5-9wan50&callback=add_pois&location=LOCATION_HERE&maxResults=1';
    // location format = &location=addr&location=addr etc...
    // ie: &location=9 rue adoplhe seyboth strasbourg france&location=4 rue du dome strasbourg france...
    var locations = '';

    for ( var i = 0; i < json_array.length; i++ ) {
	console.log( json_array[i].location );

	locations = locations + '&location=' + json_array[i].location;
    }

    console.log( locations );
    var new_url = url.replace( 'LOCATION_HERE', locations );
    var script = document.createElement( 'script' );
    script.type = 'text/javascript';
    script.src = new_url;
    document.body.appendChild( script );
}

function load_map( string_or_array ) {

    MQA.EventUtil.observe( window, 'load', function() {

	$( '#map' ).css( 'width', $( '#map_div' ).width() - 22 );
	window.onresize = function( event ) {
    	    var resize_map = new MQA.Size (
    		$( '#map_div' ).width(),
		$( '#map_div' ).height()
    	    );
	    console.log( $("#map_div").width() + ' ' + $( '#map' ).width() );
    	    window.map.setSize( resize_map );
	}

	var option = {
	    elt: document.getElementById( 'map' ),
	    zoom: 15,
	    latLng: { lat: 48.503121, lng: 6.058019 },
	    mtype: 'map'
	};
	window.map = new MQA.TileMap( option );

	navigator.geolocation.getCurrentPosition( function( position ) {
	    var user = new MQA.Poi({
		lat: position.coords.latitude,
		lng: position.coords.longitude
	    });
	    var custom_icon = new MQA.Icon( '../assets/images/MiniMenMap.png', 32, 52 );
	    user.setIcon( custom_icon );
	    user.setShadowOffset({
		x: 10,
		y: -25
	    });
	    map.setCenter ({
		lat: position.coords.latitude,
		lng: position.coords.longitude
	    });
	    map.addShape(user);
	});

	MQA.withModule( 'smallzoom', 'mousewheel', function() {

	    map.addControl(
		new MQA.SmallZoom(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_LEFT, new MQA.Size( 5,5 ) )
	    );

	    custom_find_me( map );

	    map.enableMouseWheelZoom();
	});
	if ( string_or_array === 'nothing' ) {
	    MQA.EventManager.addListener(window.map, 'click', addLocation);
	}
    });
}
