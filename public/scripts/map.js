function addLocation( event ) {
    var lat = event.ll.getLatitude();
    var lng = event.ll.getLongitude();
    alert( lat+' '+lng );
}

function custom_find_me( map ) {
    var custom_fm = document.createElement( 'div' );

    custom_fm.id = 'fm_control';
    custom_fm.style.position = 'absolute';
    custom_fm.style.zIndex = '50';
    custom_fm.style.width = '42px';
    custom_fm.style.height = '42px';
    custom_fm.style.top = '5px';
    custom_fm.style.right = '5px';
    custom_fm.style.backgroundImage = '../assets/images/waving_man_sat.png';
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

function load_map( string ) {
    
    MQA.EventUtil.observe( window, 'load', function() {
	
	$( '#map' ).css( 'width', $( '#map_div' ).width() - 30);
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
	
	MQA.withModule( 'smallzoom', 'geolocationcontrol', 'mousewheel', function() {
	    
	    map.addControl(
		new MQA.SmallZoom(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_LEFT, new MQA.Size( 5,5 ) )
	    );
	    
	    // map.addControl(
	    // 	new MQA.GeolocationControl(),
	    // 	new MQA.MapCornerPlacement( MQA.MapCorner.TOP_RIGHT, new MQA.Size( 10,10 ) )
	    // );

	    custom_find_me( map );
	    
	    map.enableMouseWheelZoom();
	});
	if ( string === 'nothing' ) {
	    MQA.EventManager.addListener(window.map, 'click', addLocation);
	}
    });   
}
