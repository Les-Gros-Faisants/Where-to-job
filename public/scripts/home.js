function moveSearch()
{
  $('#searchbar').hide('slide', {direction: 'up'}, 1000);
}

$( document ).ready(function()
{
  $('#searchbar').animate({ marginLeft: "+=2%" }, 100 );
  $moved = false;
  $( '#search_form' ).on( 'submit', function()
  {
    if (!$moved)
    {
      $('#searchbar').animate({ marginLeft: "-=27%" }, "slow",
      function() {
          $.post(
            $( this ).prop( 'action' ),
            {
              "city": $( '#city_field' ).val()
            },
            function(data)
            {
              var i = 0;
              var locationsJSONObjects = [];
              data.forEach(function(item) {
                var done = false;
                var images_path = "assets/images/locations_images/"
                var image_name = images_path + "no_image.png";
                if (item["photos"] != "")
                  image_name = images_path + item["photos"];
                var miniatureId = "#min" + i;
                var miniature = "<div id=min" + i + " class=\"ui segment miniature\"> \
                                  <div class=\"ui grid middle aligned\"> \
                                    <div class=\"row\"> \
                                      <div class=\"six wide column segment\"> \
                                        <div class=\"ui item\"> \
                                          <img class=\"rounded ui image min_image\" src=\"" + image_name + "\"> \
                                        </div> \
                                      </div> \
                                      <div class=\"six wide column\"> \
                                        <div class=\"ui segment\" style=\"tex-align: left;\"> \
                                          <p class=\"min_location_name\">" + item['name'] + "</p> \
                                          <p class=\"min_location_address\"><i class=\"map icon\"></i>" + item['location'] + "</p> \
                                          <p class=\"min_location_city\"><i class=\"map marker icon\"></i>" + item['city'] + "</p> \
                                        </div> \
                                      </div> \
                                    </div> \
                                  </div> \
                                 </div>";


                $(miniature).appendTo('#results');
                $(miniatureId).fadeIn( "slow", function() {
                  // Finished fade in
                  // Do stuff..
                });
                locationsJSONObjects.push(item);
                i += 1;
              });
              console.log(locationsJSONObjects);
              // Send locationsJSONObjects to map
            },
            'json'
          );
      });
      $moved = true;
    }

    return false;
  });

} );
