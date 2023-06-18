var errorElement = document.querySelector('.error-message');
var emailInput = document.getElementById('email');
var form = document.getElementById('form');

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

function checkMatch(event) {
    if (emailInput.value.trim().toString().length > 0 && !isValidEmail(emailInput.value.trim())) {
        errorElement.textContent = 'That does not look like a valid email';
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
            xhr.open('POST', 'processlogin.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

            // Get the form values
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Construct the data object
            var data = {
                email: email,
                pass: password
            };

            // Convert the data object to JSON string
            var jsonData = JSON.stringify(data);

            // Set up the event handler for AJAX response
            xhr.onreadystatechange = function() {
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
                            setTimeout(function() {
                                window.location.href = "../myaccount/myaccount.php";
                            }, 1000);
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

emailInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
