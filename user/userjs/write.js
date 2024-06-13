function validateForm() {
    // Check if the checkbox is checked
    if (!document.getElementById("exampleCheck1").checked) {
      // If checkbox is not checked, display an alert
      alert("Please agree to the terms before submitting.");
      // Return false to prevent form submission
      return false;
    }
    // If checkbox is checked, allow form submission
    return true;
  }