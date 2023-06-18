var errorElement = document.querySelector('.error-message');
var regionSelect = document.getElementById('region');
var habitatSelect = document.getElementById('habitat');
var typeSelect = document.getElementById('type');
var statusSelect = document.getElementById('status');
var nameInput = document.getElementById('name');
var scientificInput = document.getElementById('scientific');
var animalImageInput = document.getElementById('animal-image');
var longevityInput = document.getElementById('logenvity');
var descriptionInput = document.getElementById('description');
var dietInput = document.getElementById('diet');
var eatingHabitsInput = document.getElementById('eating-habits');
var relatedInput = document.getElementById('related');
var form = document.getElementById('add-form');

function sendData(event) {
  event.preventDefault();

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Prepare the AJAX request
  xhr.open('POST', 'processanimal.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

  // Get the form values
  var region = regionSelect.value;
  var habitat = habitatSelect.value;
  var type = typeSelect.value;
  var status = statusSelect.value;
  var name = nameInput.value;
  var scientific = scientificInput.value;
  var animalImage = animalImageInput.files[0]; // Get the selected file
  var longevity = longevityInput.value;
  var description = descriptionInput.value;
  var diet = dietInput.value;
  var eatingHabits = eatingHabitsInput.value;
  var eatingHabitsArray = eatingHabits.split(',');
  var related = relatedInput.value;
  var relatedArray = related.split(',');
  var data = {
    region: [region],
    habitat: [habitat],
    type: [type],
    status: [status],
    name: [name],
    scientific: [scientific],
    longevity: [longevity],
    description: [description],
    diet: [diet],
    eatingHabits: eatingHabitsArray,
    related: relatedArray,
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

  // Send the AJAX request with the form data
  xhr.send(jsonData);

  //SEND THE IMAGES

   // Create an XMLHttpRequest object for image data
   var xhrImage = new XMLHttpRequest();

   // Prepare the AJAX request for image data
   xhrImage.open('POST', 'processimage.php', true);
 
   // Set up the event handler for AJAX response for image data
   xhrImage.onreadystatechange = function () {
     if (xhrImage.readyState === XMLHttpRequest.DONE) {
       if (xhrImage.status === 200) {
         var response = xhrImage.responseText;
         console.log(response);
       } else {
         console.error('AJAX request for image data failed. Error code: ' + xhrImage.status);
       }
     }
   };
 
   // Create a FormData object for image data
   var imageData = new FormData();
 
   // Get the name values
var animalName = nameInput.value;


// Append the image files to the FormData object
imageData.append('animalImage', animalImage);


// Append the name values to the FormData object
imageData.append('animalName', animalName);

   // Send the AJAX request with the image data
   xhrImage.send(imageData);
}

// Add event listener for form submission
form.addEventListener('submit', sendData);
