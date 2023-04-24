
$(document).ready(function(){

  $("#loginForm").submit(function(event){
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "./php/login_handler.php",
      data: $(this).serialize(),
      success: function(response){
        var data = response.split("_")
        if(data[0] === "success"){
          // login successful, redirect to profile page 
          var id = data[1]
          window.location.href = "profile.html?id="+id;
        } else {
          // login failed, show error message
          $("#response").html('<div class="alert alert-danger">'+response+'</div>');
        }
      }
    });
  });
});