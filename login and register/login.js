var errorElement = document.querySelector('.error-message');
var emailInput = document.getElementById('email');
var form = document.getElementById('form');
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};
function checkMatch(event) {
    if(emailInput.value.trim().toString().length > 0 && !isValidEmail(emailInput.value.trim())){
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

emailInput.addEventListener('input', checkMatch);
form.addEventListener('submit', checkMatch);
