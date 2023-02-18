$(document).ready(function() {
  // Function to handle form submission
  $("#registration-form").submit(function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    // Get the form data
    var formData = {
      firstName: $("#firstName").val(),
      lastName: $("#lastName").val(),
      studentID: $("#studentID").val(),
      email: $("#email").val(),
      timeSlot: $("#timeSlot").val()
    };

    // Send the form data using AJAX
    $.ajax({
      type: "POST",
      url: "regfunction.php",
      data: JSON.stringify(formData),
      success: function(response) {
        // Handle the successful form submission
        if (response === "success") {
          // Update the remaining seats for the selected time slot
          var remainingSeats = parseInt($("#timeSlot option:selected").data("remaining-seats"));
          $("#timeSlot option:selected").data("remaining-seats", remainingSeats - 1);
          $("#timeSlot option:selected").text($("#timeSlot option:selected").text() + " (" + remainingSeats + " seats remaining)");

          // Reset the form fields
          $("#registration-form")[0].reset();

          // Show a success message to the user
          $("#message").text("Registration successful!").removeClass("error").addClass("success");
        } else {
          // Show an error message to the user
          $("#message").text("Error: " + response).removeClass("success").addClass("error");
        }
      },
      error: function(xhr, status, error) {
        // Show an error message to the user
        $("#message").text("Error: " + error).removeClass("success").addClass("error");
      }
    });
  });
});
