$(document).ready(function() {
	// Fetch user information from local storage
	var email = localStorage.getItem("email");
	var age = localStorage.getItem("age");
	var dob = localStorage.getItem("dob");
	var contact = localStorage.getItem("contact");

	// Display user information on page
	$("#email").text(email);
	$("#age").text(age);
	$("#dob").text(dob);
	$("#contact").text(contact);

	// Handle update form submission
	$("#update-form").submit(function(event) {
		event.preventDefault();
		// var email = $("#email").val();
		var age = $("#age-input").val();
		var dob = $("#dob-input").val();
		var contact = $("#contact-input").val();

		// Update user information in local storage
		localStorage.setItem("email", email);
		localStorage.setItem("age", age);
		localStorage.setItem("dob", dob);
		localStorage.setItem("contact", contact);

		alert("Information updated successfully.");
	});

	// Handle logout button click
	$("#logout-btn").click(function() {
		// localStorage.removeItem("username");
		localStorage.removeItem("age");
		localStorage.removeItem("dob");
		localStorage.removeItem("contact");
		window.location.href = "register.html";
    })
})