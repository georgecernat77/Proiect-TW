var form = document.getElementById('add-form');
form.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent the form from submitting normally

  // Get the form values
  var region = document.getElementById('region').value;
  var habitat = document.getElementById('habitat').value;
  var diet = document.getElementById('diet').value;
  var type = document.getElementById('type').value;

  // Construct the data object
  var data = {
    region: region,
    habitat: habitat,
    diet: diet,
    type: type,
  };

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Prepare the AJAX request
  xhr.open('POST', 'processfilter.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json'); // Set the content type to JSON

  // Set up the event handler for AJAX response
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle the response from the server
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'success') {
          var matchingFiles = response.message;
          // Create an XMLHttpRequest object
          var filesXHR = new XMLHttpRequest();

          // Prepare the AJAX request
          filesXHR.open('GET', 'getjsonfiles.php', true);

          // Set up the event handler for AJAX response
          filesXHR.onreadystatechange = function () {
            if (filesXHR.readyState === XMLHttpRequest.DONE) {
              if (filesXHR.status === 200) {
                // Handle the response from the server
                var filesResponse = JSON.parse(filesXHR.responseText);

                if (filesResponse.status === 'success') {
                  var files = filesResponse.files;

                  // Check if files is a string and parse it as JSON
                  if (typeof files === 'string') {
                    files = JSON.parse(files);
                  }

                  // Loop through each file
                  files.forEach(function (file) {
                    // var filename = '.' + file;
                    var matchingFileElement = document.getElementById(file);

                    if (matchingFileElement) {
                        for (var i = 0; i < matchingFiles.length; i++) {
                            var matchingFile = matchingFiles[i];
                            if(file == matchingFile){
                                matchingFileElement.style.display = 'block';
                            }
                            else{
                                if(!matchingFiles.includes(file))
                                  matchingFileElement.style.display = 'none';
                            }
                          }
                    }
                  });
                } else {
                  console.log('Error: ' + filesResponse.message);
                }
              } else {
                // Handle any errors that occurred during the AJAX request
                console.error('AJAX request failed. Error code: ' + filesXHR.status);
              }
            }
          };

          // Send the AJAX request
          filesXHR.send();
        } else {
            // WHEN NO MATCHES FOUND
            var filesXHR = new XMLHttpRequest();

          // Prepare the AJAX request
          filesXHR.open('GET', 'getjsonfiles.php', true);

          // Set up the event handler for AJAX response
          filesXHR.onreadystatechange = function () {
            if (filesXHR.readyState === XMLHttpRequest.DONE) {
              if (filesXHR.status === 200) {
                // Handle the response from the server
                var filesResponse = JSON.parse(filesXHR.responseText);

                if (filesResponse.status === 'success') {
                  var files = filesResponse.files;

                  // Check if files is a string and parse it as JSON
                  if (typeof files === 'string') {
                    files = JSON.parse(files);
                  }

                  // Loop through each file
                  files.forEach(function (file) {
                    // var filename = '.' + file;
                    var matchingFileElement = document.getElementById(file);

                    if (matchingFileElement) {
                        matchingFileElement.style.display = 'none';
                    }
                  });
                } else {
                  console.log('Error: ' + filesResponse.message);
                }
              } else {
                // Handle any errors that occurred during the AJAX request
                console.error('AJAX request failed. Error code: ' + filesXHR.status);
              }
            }
          };

          // Send the AJAX request
          filesXHR.send();
        }
      } else {
        // Handle any errors that occurred during the AJAX request
        console.error('AJAX request failed. Error code: ' + xhr.status);
      }
    }
  };

  // Convert the data object to JSON string
  var jsonData = JSON.stringify(data);

  // Send the AJAX request with the JSON data
  xhr.send(jsonData);
});
