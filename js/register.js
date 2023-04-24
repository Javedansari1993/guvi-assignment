$(document).ready(function() {
    $("form").submit(function(event) {
      event.preventDefault();
      var username = $("#username").val();
      var email = $("#email").val();
      var password = $("#password").val();
      localStorage.setItem("username", username);
      localStorage.setItem("email", email);
      localStorage.setItem("password", password);
      window.location.href = "login.html";
    });
  });