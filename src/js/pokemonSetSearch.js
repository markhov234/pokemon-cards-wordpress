document.addEventListener('DOMContentLoaded', function() {
 

  const myData = {
    name: 'John',
    age: 30, 
    city: 'New York',
    country: 'USA',
    likes: ['pizza', 'sushi', 'burgers']
  }
  const buttontriggerajax = document.getElementById('trigger-ajax');
  buttontriggerajax.addEventListener('click', function() {
    console.log("button clicked")
    jQuery.ajax({
      type:'post',
      url:`${window.location.origin}/wp-admin/admin-ajax.php`,
      data:{
        action:'my_trigger_ajax_action',
        ajax_data: myData
      },
      complete: function(response){
        console.log(response.responseJSON);
      }
  });
})});