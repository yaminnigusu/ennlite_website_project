// form_validation.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("contact_form");
  
    form.addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent default form submission
  
      // Validate form fields
      if (validateForm()) {
        // If form is valid, submit the form
        form.submit();
      }
    });
  
    function validateForm() {
      let isValid = true;
  
      // Validate Full Name
      const fullNameInput = document.getElementById("full_name");
      const fullNamePattern = /^[A-Za-z\s]+$/; // Only letters and spaces allowed
      if (!fullNamePattern.test(fullNameInput.value.trim())) {
        isValid = false;
        fullNameInput.classList.add("is-invalid");
      } else {
        fullNameInput.classList.remove("is-invalid");
      }
  
      // Validate Email
      const emailInput = document.getElementById("email");
      const emailPattern = /^[^\s@]+@(gmail\.com|yahoo\.com)$/; // Only gmail.com or yahoo.com allowed
      if (!emailPattern.test(emailInput.value.trim())) {
        isValid = false;
        emailInput.classList.add("is-invalid");
      } else {
        emailInput.classList.remove("is-invalid");
      }
  
      // Validate Phone Number
      // Updated Phone Number Validation with Country Code (Optional)


      const phoneNumberInput = document.getElementById("phone_number");
      // Updated Phone Number Validation with Country Code (Optional)
         const phoneNumberPattern = /^(\+\d{1,3})?\d{10}$/;

      if (!phoneNumberPattern.test(phoneNumberInput.value.trim())) {
        isValid = false;
        phoneNumberInput.classList.add("is-invalid");
      } else {
        phoneNumberInput.classList.remove("is-invalid");
      }
  
      return isValid;
    }
  });
  