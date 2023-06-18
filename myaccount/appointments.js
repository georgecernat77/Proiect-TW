// Create an XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Set up the request
xhr.open('GET', 'processappointment.php'); 

// Set the response type to JSON
xhr.responseType = 'json';

// Define the callback function when the request is complete
xhr.onload = function () {
  if (xhr.status === 200) {
    var appointments = xhr.response;
    console.log(xhr.response);
    // Get the table body element
    var tableBody = document.getElementById('appointments-table-body');
    if (appointments.length === 0) {
      tableBody.innerHTML = 'No appointments made';
      tableBody.style.fontSize = '1.5rem';
      tableBody.style.textAlign = 'center';
      var tableHead = document.querySelector('.appointments-table thead');
      tableHead.style.display = 'none';
    } else {
      tableBody.innerHTML = '';

      // Iterate over the appointments and create table rows dynamically
      appointments.forEach(function (appointment) {
        // Create a new table row
        var row = document.createElement('tr');

        // Create table cells for each appointment property
        var dateCell = document.createElement('td');
        dateCell.textContent = appointment.date;
        var timeCell = document.createElement('td');
        timeCell.textContent = appointment.time;
        var placeCell = document.createElement('td');
        placeCell.textContent = appointment.place;

        // Append the cells to the row
        row.appendChild(dateCell);
        row.appendChild(timeCell);
        row.appendChild(placeCell);

        // Append the row to the table body
        tableBody.appendChild(row);
      });
    }
  }
};

// Send the request
xhr.send();
