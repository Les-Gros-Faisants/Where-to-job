function addLocation(event) {
    var lat = event.ll.getLatitude();
    var lng = event.ll.getLongitude();
    pointLat = document.getElementById("lat");
    pointLng = document.getElementById("lng");
    pointLat.value = lat;
    pointLng.value = lng;
    alert(lat+' '+lng);
}

function load_map( string ) {

    if ( string === 'nominatim' ) {
	alert( 'nominatim' );
    } else if ( string === 'addLocation' ) {
	alert( 'addLocation' );
    }

    MQA.EventUtil.observe( window, 'load', function() {
	
	document.getElementById( 'map' ).style.width = window.innerWidth + 'px';
	
	window.onresize = function( event ) {
	    document.getElementById( 'map' ).style.width = window.innerWidth + 'px';
    	    var resize_map = new MQA.Size ( 
    		document.getElementById( 'map' ).style.width,
    		document.getElementById( 'map' ).style.height
    	    );
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

	if ( string === 'addLocation' ) {
	    alert( 'enculer' );
	    MQA.EventManager.addListener(window.map, 'click', addLocation);
	}   
    });
}
