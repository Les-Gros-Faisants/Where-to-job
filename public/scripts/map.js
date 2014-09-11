function load_map( string ) {

MQA.EventUtil.observe( window, 'load', function() {

<<<<<<< HEAD
    $( '#map' ).css( 'width', $( '#map_div' ).width() );

=======
    $( '#map' ).css( 'width', $( '#map_div' ).width() - 25);
>>>>>>> d136ff70720a78dd4818873efe2e0c0f5012d5b6
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
	zoom: 10,
	latLng: { lat: 48.503121, lng: 6.058019 },
	mtype: 'map'
    };
    window.map = new MQA.TileMap( option );

    navigator.geolocation.getCurrentPosition( function( position ) {
	map.setCenter ({
	    lat: position.coords.latitude,
	    lng: position.coords.longitude
	});
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

}
