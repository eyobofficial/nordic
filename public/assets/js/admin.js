$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})


$(function(){
	$('a.delete-catagory').on('click', function(evt){
		return confirm('Are you sure want to delete this event catagory?');
	});
});