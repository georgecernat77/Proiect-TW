// Get the form element
var form = document.getElementById('delete-form');

// Add event listener for form submission
form.addEventListener('submit', function(event) {
  event.preventDefault();

  // Get the form values
  var nameInput = document.getElementById('extract-name');
  var name = nameInput.value;
  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Prepare the AJAX request
  xhr.open('POST', 'removeanimal.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Set up the event handler for AJAX response
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Request successful
        var response = xhr.responseText;
        console.log(response);
        // Handle the response as needed
      } else {
        // Request failed
        console.error('AJAX request failed. Error code: ' + xhr.status);
      }
    }
  };

  // Send the AJAX request with the form data
  xhr.send('name=' + encodeURIComponent(name));
});
