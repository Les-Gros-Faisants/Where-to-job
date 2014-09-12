function moveSearch()
{
  $('#searchbar').hide('slide', {direction: 'up'}, 1000);
}

$( document ).ready(function()
{
  $moved = false;
  $( '#search_form' ).on( 'submit', function()
  {
    if (!$moved)
    {
      $('#searchbar').animate({ "margin-left": "-=35%" }, "slow" );
      $moved = true;
    }

    $.post(
      $( this ).prop( 'action' ),
      {
        "city": $( '#city_field' ).val()
      },
      function(data)
      {
        console.log(data[0]);
      },
      'json'
    );

    return false;
  });

} );
