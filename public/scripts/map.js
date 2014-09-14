var g_pois = [];
var g_name = [];
var user_poi;

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
//  console.log(response);
  splitAddress = response.display_name.split(",");
  if (locationInfo = document.getElementById("locationInfo")) {
    locationInfo.innerHTML = "";
  }
  else {
    locationInfo = document.createElement("div");
    locationInfo.id = "locationInfo";
    locationInfo.style.marginTop = "10px";
    $(locationInfo).appendTo("#map_div");
  }
  locationInfo.innerHTML = response.display_name + "<br />Is this the location you want to add ?"
  //  console.log(splitAddress);
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

function get_path( user_lat, user_lng, dest_lat, dest_lng ) {
    console.log( 'coords: user =' + user_lat + '/' + user_lng + 'dest= ' + dest_lat + '/' + dest_lng );

    document.getElementById( 'map_loader' ).style.visibility = 'visible';
    map.addRoute({
	request: {
	    locations: [
		{ latLng: { lat: user_lat, lng: user_lng }},
		{ latLng: { lat: dest_lat, lng: dest_lng }}
	    ],
	    options: {
		routeType: 'pedestrian',
	    },
	},
	success: function() {
	    document.getElementById( 'map_loader' ).style.visibility = 'hidden';
	}
    });
}

function add_pois( response ) {
    // generate poi's and associate an id
    // var machin = new MQA.Poi();
    // machin.Key = 'key';
    // this way we can delete the shit when we're done
    // map.removeShape( map.getByKey( 'key' ) );

    for ( var i = 0; i < response.results.length; i++ ) {

	g_pois[i] = new MQA.Poi({
	    lat: response.results[i].locations[0].displayLatLng.lat,
	    lng: response.results[i].locations[0].displayLatLng.lng
	});

	var html_infocontent =
	    "<div id='info_window_pois" + i + "' style=\"width='20em';\">"
	    + "<h3 id='zone_name'>"
	    + ( g_name[i] === "" ? response.results[i].locations[0].street : g_name[i] )
	    + "</h3>"
	    + "<button id='zone_find_path" + i + "' onclick=\"get_path( "
	    + user_poi.latLng.lat + ','
	    + user_poi.latLng.lng + ','
	    + g_pois[i].latLng.lat + ','
	    + g_pois[i].latLng.lng
	    + ")\">Tracer la route</button>"
	    + "</div>";

	g_pois[i].key = i + 1;
	console.log( 'g_pois[i].key = ' + g_pois[i].key );
	g_pois[i].setRolloverContent( g_name[i] === "" ? response.results[i].locations[0].street : g_name[i] );
	g_pois[i].setInfoContentHTML( html_infocontent );
	map.addShape( g_pois[i] );
    }
    map.setCenter ({
	lat: g_pois[0].latLng.lat,
	lng: g_pois[0].latLng.lng
    });
}

function handle_search( json_array ) {
    //call to geocode webservice

    for ( var i = 0; i < g_pois.length; i++ ) {
	console.log( 'i = ' + i ); 
	map.removeShape( map.getByKey( i + 1 ) );
    }
    
    var url = 'http://www.mapquestapi.com/geocoding/v1/batch?key=Fmjtd%7Cluur2h612h%2Cra%3Do5-9wan50&callback=add_poisLOCATION_HERE&maxResults=1';
    // location format = &location=addr&location=addr etc...
    // ie: &location=9 rue adoplhe seyboth strasbourg france&location=4 rue du dome strasbourg france...
    var locations = '';

    for ( var i = 0; i < json_array.length; i++ ) {
	locations = locations + '&location=' + json_array[i].location + ' ' + json_array[i].city + ' france';
	g_name[i] = json_array[i].name;
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
	    user_poi = new MQA.Poi({
		lat: position.coords.latitude,
		lng: position.coords.longitude
	    });
	    var custom_icon = new MQA.Icon( '../assets/images/MiniMenMap.png', 32, 52 );
	    user_poi.setIcon( custom_icon );
	    user_poi.setShadowOffset({
		x: 10,
		y: -25
	    });
	    map.setCenter ({
		lat: position.coords.latitude,
		lng: position.coords.longitude
	    });
	    map.addShape(user_poi);
	    document.getElementById( 'map_loader' ).style.visibility = 'hidden';
	});

	MQA.withModule( 'smallzoom', 'mousewheel', 'new-route', function() {

	    map.addControl(
		new MQA.SmallZoom(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_LEFT, new MQA.Size( 5,5 ) )
	    );

	    map.enableMouseWheelZoom();
	});

	if ( string_or_array === 'nothing' ) {
	    MQA.EventManager.addListener(window.map, 'click', addLocation);
	}
	custom_find_me( map );
    });
}
