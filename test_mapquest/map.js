MQA.EventUtil.observe( window, 'load', function() {

    var option = {
	elt: document.getElementById( 'map' ),
	zoom: 10,
	latLng: { lat: 39.743943, lng: -105.020089 }
    };
    
    window.map = new MQA.TileMap( option );
    
    MQA.withModule( 'smallzoom', 'geolocationcontrol', 'mousewheel', function() {
	
	map.addControl(
	    new MQA.SmallZoom(),
		new MQA.MapCornerPlacement( MQA.MapCorner.TOP_LEFT, new MQA.Size( 5,5 ) )
	);
	
	map.addControl(
	    new MQA.GeolocationControl(),
	    new MQA.MapCornerPlacement( MQA.MapCorner.TOP_RIGHT, new MQA.Size( 10,50 ) )
	);
	    
	map.addControl(
	    new MQA.InsetMapControl({
                size: { width: 150, height: 125 },
                zoom: 3,
                mapType: 'map',
                minimized: true
	    }),
	    new MQA.MapCornerPlacement(MQA.MapCorner.BOTTOM_RIGHT)
        );
	
	map.enableMouseWheelZoom();
    });
});
