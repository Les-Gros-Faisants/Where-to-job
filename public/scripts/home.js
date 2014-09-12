function doPost()
{
  $.post(
    $( this ).prop( 'action' ),
    {
      "city": $( '#city_field' ).val()
    },
    function(data)
    {
      if (data.length < 1)
        {
          $("#results").html("<div id=\"no_result\" class=\"ui segment\" style=\"padding: auto;margin: auto;text-align: center;\"> \
                                      <h2>No results found for \"" + $("#city_field").val() + "\"</h2> \
                                     </div>");
          return (false);
        }
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
                          <div class=\"ui grid\"> \
                              <div class=\"six wide column\"> \
                                <div class=\"ui segment img_container\" style=\"height: 140px;\"> \
                                  <img class=\"min_image\" src=\"" + image_name + "\"> \
                                </div> \
                              </div> \
                              <div class=\"ten wide column\"> \
                                <div class=\"ui segment\" style=\"text-align: left;height: 140px;\"> \
                                  <p class=\"min_location_name\">" + item['name'] + "</p> \
                                  <p class=\"min_location_address\"><i class=\"map icon\"></i>" + item['location'] + "</p> \
                                  <p class=\"min_location_city\"><i class=\"map marker icon\"></i>" + item['city'] + "</p> \
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
      // Send locationsJSONObjects to map
      load_map(locationsJSONObjects);
    },
    'json'
  );
}

$( document ).ready(function()
{
  $('#searchbar').animate({ marginLeft: "+=2%" }, 100 );
  $moved = false;
  $( '#search_form' ).on( 'submit', function()
  {
    if (!$moved)
    {
      $('#searchbar').animate({ marginLeft: "-=32%", width: "-=10%" }, "slow", doPost);
      $moved = true;
    }
    else
    {
      doPost();
    }

    return false;
  });

} );
