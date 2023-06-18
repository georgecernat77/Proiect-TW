var errorElement = document.querySelector('.error-message');
var welcomeMessage = document.querySelector('.sidebar .welcome-message');
var firstnameInput = document.getElementById('firstname');
var lastnameInput = document.getElementById('lastname');
var phoneInput = document.getElementById('phone');
var emailInput = document.getElementById('email');
var form = document.getElementById('update-form');

function checkMatch(event) {
  if (
    firstnameInput.value.trim().toString().length > 0 &&
    (firstnameInput.value.trim().toString().length < 3 ||
      firstnameInput.value.trim().toString().length > 15)
  ) {
    errorElement.textContent =
      'First Name must have at least 3 characters and a maximum of 15 characters';
    errorElement.style.display = 'block';
    if (event.type == 'submit') {
      event.preventDefault();
    }
  } else if (
    lastnameInput.value.trim().toString().length > 0 &&
    (lastnameInput.value.trim().toString().length < 3 ||
      lastnameInput.value.trim().toString().length > 15)
  ) {
    errorElement.textContent =
      'Last Name must have at least 3 characters and a maximum of 15 characters';
    errorElement.style.display = 'block';
    if (event.type == 'submit') {
      event.preventDefault();
    }
  } else {
    errorElement.textContent = '';
    errorElement.style.display = 'none';
    if (event.type == 'submit') {
      event.preventDefault();
      // Create an XMLHttpRequest object
      var xhr = new XMLHttpRequest();

      // Prepare the AJAX request
      xhr.open('POST', 'updateAcc.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

      // Get the form values
      var firstname = document.getElementById('firstname').value;
      var lastname = document.getElementById('lastname').value;
      var phone = document.getElementById('phone').value;

      // Construct the data object
      var data = {
        firstname: firstname,
        lastname: lastname,
        phone: phone,
      };

      // Convert the data object to JSON string
      var jsonData = JSON.stringify(data);

      // Set up the event handler for AJAX response
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var status = response.status;
            var message = response.message;

            errorElement.style.display = 'block';
            if (status === 'success') {
              errorElement.textContent = message;
              errorElement.style.color = 'white';
              errorElement.style.backgroundColor = '#53A653';
              welcomeMessage.textContent = firstname + ' ' + lastname;
            } else if (status === 'error') {
              errorElement.textContent = message;
              errorElement.style.color = '#af4242';
              errorElement.style.backgroundColor = '#fde8ec';
            }
          } else {
            // Handle any errors that occurred during the AJAX request
            console.error('AJAX request failed. Error code: ' + xhr.status);
          }
        }
      };

      // Send the AJAX request with the JSON data
      xhr.send(jsonData);
    }
  }
}

firstnameInput.addEventListener('input', checkMatch);
lastnameInput.addEventListener('input', checkMatch);
phoneInput.addEventListener('input', checkMatch);
emailInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
