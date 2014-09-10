/* Scripts sidebar */

function displaySidebar()
{
	$('.demo.sidebar').sidebar('toggle');
}
displaySidebar();


$( "#loginbutton" ).click(function() {
	$('#loginmodal').modal('show');
});
