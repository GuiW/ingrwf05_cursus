$(function(){
  $('#add_module_form').addClass('hidden');
  $('.toggle_btn').on('click', function(e){
    e.preventDefault();
    $('#add_module_form').toggleClass('hidden');
     $('#add_module_btn').toggleClass('hidden');
  })
})