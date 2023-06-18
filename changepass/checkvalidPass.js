var newPasswordInput = document.getElementById('newpassword');
var confirmPasswordInput = document.getElementById('cpassword');
var errorElement = document.querySelector('.error-message');
var oldPasswordInput = document.getElementById('oldpassword');
var form = document.getElementById('update-form');

const isValidPassword = passInput => {
  const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$/;
  return re.test(String(passInput));
};

function checkMatch(event) {
  if (!isValidPassword(newPasswordInput.value.trim()) && newPasswordInput.value.trim().toString().length > 0) {
    errorElement.textContent = 'Please provide a valid password';
    errorElement.style.display = 'block';
    errorElement.style.color = '#af4242';
    errorElement.style.backgroundColor = '#fde8ec';
    if (event.type == 'submit') {
      event.preventDefault();
    }
  } else if (oldPasswordInput.value.trim().toString().length > 0 && oldPasswordInput.value.trim() == newPasswordInput.value.trim()) {
    errorElement.textContent = 'Please provide a different password';
    errorElement.style.display = 'block';
    errorElement.style.color = '#af4242';
    errorElement.style.backgroundColor = '#fde8ec';
    if (event.type == 'submit') {
      event.preventDefault();
    }
  } else if (newPasswordInput.value.trim() !== confirmPasswordInput.value.trim()) {
    errorElement.textContent = 'Passwords do not match';
    errorElement.style.display = 'block';
    errorElement.style.color = '#af4242';
    errorElement.style.backgroundColor = '#fde8ec';
    if (event.type == 'submit') {
      event.preventDefault();
    }
  } else {
    errorElement.textContent = '';
    errorElement.style.display = 'none';
    if (event.type == 'submit') {
      event.preventDefault(); // Prevent the form from submitting

      // Create an XMLHttpRequest object
      var xhr = new XMLHttpRequest();

      // Prepare the AJAX request
      xhr.open('POST', 'updatepass.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

      // Get the form values
      var oldPassword = document.getElementById('oldpassword').value;
      var newPassword = document.getElementById('newpassword').value;
      var confirmPassword = document.getElementById('cpassword').value;

      // Construct the data object
      var data = {
        opass: oldPassword,
        npass: newPassword,
        cpass: confirmPassword
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
              errorElement.textContent = 'Password updated successfully!';
              errorElement.style.color = 'white';
              errorElement.style.backgroundColor = '#53A653';
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

newPasswordInput.addEventListener('input', checkMatch);
confirmPasswordInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
