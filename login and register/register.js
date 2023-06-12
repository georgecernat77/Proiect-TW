var passInput = document.getElementById('password');
var cpassInput = document.getElementById('cpassword');
var errorElement = document.querySelector('.error-message');
var firstnameInput = document.getElementById('firstname');
var lastnameInput = document.getElementById('lastname');
var emailInput = document.getElementById('email');
var form = document.getElementById('form');
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};
const isValidPassword = passInput => {
    const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$/;
    return re.test(String(passInput));
};
function checkMatch(event) {
    if (!isValidPassword(passInput.value.trim()) && passInput.value.trim().toString().length > 0) {
        errorElement.textContent = 'Password must be at least 6 characters, contain one uppercase letter, one lowercase letter, one digit, and one special character.';
        errorElement.style.display = 'block';
        if(event.type == 'submit'){
            event.preventDefault();
        }
    }
    else if (passInput.value.trim() !== cpassInput.value.trim()) {
    errorElement.textContent = 'Passwords do not match';
    errorElement.style.display = 'block';
    if(event.type == 'submit'){
        event.preventDefault();
    }
  } 
  else if(firstnameInput.value.trim().toString().length > 0 && (firstnameInput.value.trim().toString().length < 3 ||  firstnameInput.value.trim().toString().length > 15)){
    errorElement.textContent = 'First Name must have at least 3 characters and a maximum of 15 characters';
    errorElement.style.display = 'block';
    if(event.type == 'submit'){
        event.preventDefault();
    }
  }
  else if(lastnameInput.value.trim().toString().length > 0 && (lastnameInput.value.trim().toString().length < 3 ||  lastnameInput.value.trim().toString().length > 15)){
    errorElement.textContent = 'Last Name must have at least 3 characters and a maximum of 15 characters';
    errorElement.style.display = 'block';
    if(event.type == 'submit'){
        event.preventDefault();
    }
  }
  else if(emailInput.value.trim().toString().length > 0 && !isValidEmail(emailInput.value.trim())){
    errorElement.textContent = 'That does not look like a valid email';
    errorElement.style.display = 'block';
    if(event.type == 'submit'){
        event.preventDefault();
    }
  }
  else {
    errorElement.textContent = '';
    errorElement.style.display = 'none';
  }
}

passInput.addEventListener('input', checkMatch);
cpassInput.addEventListener('input', checkMatch);
firstnameInput.addEventListener('input', checkMatch);
lastnameInput.addEventListener('input', checkMatch);
emailInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
