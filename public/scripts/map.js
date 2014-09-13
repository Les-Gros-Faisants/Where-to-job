var g_pois = [];

function addLocation( event ) {
  var lat = event.ll.getLatitude();
  var lon = event.ll.getLongitude();
  console.log( lat + ' ' + lon );
  var url = 'http://open.mapquestapi.com/nominatim/v1/reverse.php?format=json&json_callback=addLocated&lat=' + lat + '&lon=' + lon;
  var script = document.createElement( 'script' );
  script.type = 'text/javascript';
  script.src = url;
  document.body.appendChild( script );
}

function addLocated( response ) {
  console.log(response);
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

    console.log( response );
    for ( var i = 0; i < response.results.length; i++ ) {
	var html_infocontent = 
	    "<div id='info_window_pois" + i + " style=\"width='20em';\">"
	    + "<h3 id='zone_name'>nom de l'endroit</h3>"
	    + "<button id='zone_find_path' onclick='get_path()'>Tracer la route</button>"
	    + "</div>";

	console.log( response.results[i].locations[0].displayLatLng.lat );

	g_pois[i] = new MQA.Poi({
	    lat: response.results[i].locations[0].displayLatLng.lat,
	    lng: response.results[i].locations[0].displayLatLng.lng
	});
	g_pois[i].key = i;
	g_pois[i].setInfoContentHTML( html_infocontent );
	map.addShape( g_pois[i] );
    }
}

function handle_search( json_array ) {
    //call to geocode webservice

    var url = 'http://www.mapquestapi.com/geocoding/v1/batch?key=Fmjtd%7Cluur2h612h%2Cra%3Do5-9wan50&callback=add_poisLOCATION_HERE&maxResults=1';
    // location format = &location=addr&location=addr etc...
    // ie: &location=9 rue adoplhe seyboth strasbourg france&location=4 rue du dome strasbourg france...
    var locations = '';

    for ( var i = 0; i < json_array.length; i++ ) {
	locations = locations + '&location=' + json_array[i].location + ' ' + json_array[i].city + ' france';
    }

    var new_url = url.replace( 'LOCATION_HERE', locations );
    var script = document.createElement( 'script' );
    script.type = 'text/javascript';
    script.src = new_url;
    document.body.appendChild( script );
}

function load_map( string_or_array ) {

    if ( string_or_array instanceof Array ) {
	handle_search( string_or_array );
    }

    MQA.EventUtil.observe( window, 'load', function() {

	$( '#map' ).css( 'width', $( '#map_div' ).width() - 2 );
	window.onresize = function( event ) {
    	    var resize_map = new MQA.Size (
    		$( '#map_div' ).width(),
		$( '#map_div' ).height()
    	    );
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
	    document.getElementById( 'map_loader' ).style.visibility = 'hidden';
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
