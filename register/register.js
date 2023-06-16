var passInput = document.getElementById('password');
var cpassInput = document.getElementById('cpassword');
var errorElement = document.querySelector('.error-message');
var firstnameInput = document.getElementById('firstname');
var lastnameInput = document.getElementById('lastname');
var emailInput = document.getElementById('email');
var form = document.getElementById('form');

// Verify the email so it matches with the pattern
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

// Verify the password
const isValidPassword = passInput => {
    const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$/;
    return re.test(String(passInput));
};

function checkMatch(event) {
    if (!isValidPassword(passInput.value.trim()) && passInput.value.trim().toString().length > 0) {
        errorElement.textContent = 'Password must be at least 6 characters, contain one uppercase letter, one lowercase letter, one digit, and one special character.';
        errorElement.style.display = 'block';
        if (event.type == 'submit') {
            event.preventDefault();
        }
    } else if (passInput.value.trim() !== cpassInput.value.trim()) {
        errorElement.textContent = 'Passwords do not match';
        errorElement.style.display = 'block';
        if (event.type == 'submit') {
            event.preventDefault();
        }
    } else if (firstnameInput.value.trim().toString().length > 0 && (firstnameInput.value.trim().toString().length < 3 || firstnameInput.value.trim().toString().length > 15)) {
        errorElement.textContent = 'First Name must have at least 3 characters and a maximum of 15 characters';
        errorElement.style.display = 'block';
        if (event.type == 'submit') {
            event.preventDefault();
        }
    } else if (lastnameInput.value.trim().toString().length > 0 && (lastnameInput.value.trim().toString().length < 3 || lastnameInput.value.trim().toString().length > 15)) {
        errorElement.textContent = 'Last Name must have at least 3 characters and a maximum of 15 characters';
        errorElement.style.display = 'block';
        if (event.type == 'submit') {
            event.preventDefault();
        }
    } else if (emailInput.value.trim().toString().length > 0 && !isValidEmail(emailInput.value.trim())) {
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
            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'processregister.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

            // Form values
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var password = document.getElementById('password').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;

            // The data object that will be sent
            var data = {
                firstname: firstname,
                lastname: lastname,
                pass: password,
                email: email,
                phone: phone
            };

            // Convert the data to JSON string
            var jsonData = JSON.stringify(data);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var status = response.status;
                        var message = response.message;
                        console.log(response);
                        errorElement.style.display = 'block';
                        if (status === 'success') {
                            errorElement.textContent = message;
                            errorElement.style.color = 'white';
                            errorElement.style.backgroundColor = '#53A653';
                            setTimeout(function() {
                                window.location.href = "login.php";
                            }, 1000);
                        } else if (status === 'error') {
                            errorElement.textContent = message;
                            errorElement.style.color = '#af4242';
                            errorElement.style.backgroundColor = '#fde8ec';
                        }
                    } else {
                        // Handle AJAX error
                        console.error('AJAX request failed. Error code: ' + xhr.status);
                    }
                }
            };

            // Send the AJAX request with the JSON data
            xhr.send(jsonData);
        }
    }
}

passInput.addEventListener('input', checkMatch);
cpassInput.addEventListener('input', checkMatch);
firstnameInput.addEventListener('input', checkMatch);
lastnameInput.addEventListener('input', checkMatch);
emailInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
