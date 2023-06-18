var form = document.getElementById('appointment-form');
var today = new Date().toISOString().split('T')[0];
document.getElementById("date").setAttribute('min', today); // set only valid dates
var dateInput = document.getElementById("date");
var timeSelect = document.getElementById("time");
var errorElement = document.querySelector('.error-message');

// Update available times when the date is changed
dateInput.addEventListener("change", function () {
    updateAvailableTimes();
});

// Initial check when the page loads
updateAvailableTimes();


function checkMatch(event) {

    event.preventDefault(); // Prevent the form from submitting
    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Prepare the AJAX request
    xhr.open('POST', 'processvisit.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

    // Get the form values
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;
    var place = document.getElementById('place').value;

    // Construct the data object
    var data = {
        date: date,
        time: time,
        place: place
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

form.addEventListener('submit', checkMatch);

function updateAvailableTimes() {
    var selectedDate = new Date(dateInput.value);
    var currentDate = new Date();

    // Clear all options except the default one
    while (timeSelect.options.length > 1) {
        timeSelect.remove(1);
    }

    // Add available times based on the selected date
    if (selectedDate.toDateString() === currentDate.toDateString()) {
        var currentHour = Math.max(currentDate.getHours() + 1, 9); // Start from 9 AM

        // Add times starting from the current hour
        for (var i = currentHour; i <= 17; i++) {
            var optionValue = (i < 10 ? "0" + i : i) + ":00";
            var optionText = (i % 12 || 12) + ":00 " + (i < 12 ? "AM" : "PM");
            var option = new Option(optionText, optionValue);
            timeSelect.add(option);
        }
    } else {
        // Add all available times starting from 9 AM
        for (var i = 9; i <= 17; i++) {
            var optionValue = (i < 10 ? "0" + i : i) + ":00";
            var optionText = (i % 12 || 12) + ":00 " + (i < 12 ? "AM" : "PM");
            var option = new Option(optionText, optionValue);
            timeSelect.add(option);
        }
    }
}