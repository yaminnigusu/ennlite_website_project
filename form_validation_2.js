// form_validation_2.js

function validateForm2() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email_2").value.trim();
    const phone_number = document.getElementById("phone_number_2").value.trim();
    const subject = document.getElementById("subject").value.trim();
    const message = document.getElementById("message").value.trim();
  
    // Validate Name (letters only)
    const namePattern = /^[A-Za-z\s]+$/;
    if (!namePattern.test(name)) {
      alert("Please enter a valid name (letters and spaces only).");
      return false;
    }
  
    // Validate Email (required format)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }
  
    // Validate Phone Number (optional, if provided must be digits)
    if (phone_number !== "") {
      const phoneNumberPattern = /^\d{10}$/; // 10 digits phone number
      if (!phoneNumberPattern.test(phone_number)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
      }
    }
  
    // Validate Subject (non-empty)
    if (subject === "") {
      alert("Please enter a subject.");
      return false;
    }
  
    // Validate Message (non-empty)
    if (message === "") {
      alert("Please enter a message.");
      return false;
    }
  
    // If all validations pass, return true to submit the form
    return true;
  }
  