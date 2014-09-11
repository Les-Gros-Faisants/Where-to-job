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
	    
	    map.addControl(
		new MQA.GeolocationControl(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_RIGHT, new MQA.Size( 10,10 ) )
	    );
	    
	    map.enableMouseWheelZoom();
	});
    });   
}
