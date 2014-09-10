MQA.EventUtil.observe( window, 'load', function() {
    
    var option = {
	elt: document.getElementById( 'map' ),
	zoom: 10,
	latLng: { lat: 48.503121, lng: 6.058019 }
    };

    window.map = new MQA.TileMap( option );

    navigator.geolocation.getCurrentPosition( function( position ) {
	map.setCenter( { lat: position.coords.latitude, lng: position.coords.longitude });
    });
    
    MQA.withModule( 'smallzoom', 'geolocationcontrol', 'mousewheel', function() {
	
	map.addControl(
	    new MQA.SmallZoom(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_LEFT, new MQA.Size( 5,5 ) )
	);
	
	map.addControl(
	    new MQA.GeolocationControl(),
	    new MQA.MapCornerPlacement( MQA.MapCorner.TOP_RIGHT, new MQA.Size( 10,50 ) )
	);
	    
	map.enableMouseWheelZoom();
    });
});
