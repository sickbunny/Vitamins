
form = document.getElementById("vitaminForm");
  messageDiv = document.querySelector('.message-php');

form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    formData = new FormData(form);
    
      fetch('_php/database.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          messageDiv.innerHTML = `
            <p>Success, the following items were inserted:</p>
            <ul>
              <li>Name: ${data.data.name}</li>
              <li>Brand: ${data.data.brand}</li>
              <li>Dosage: ${data.data.dosage}</li>
              <li>Serving Size: ${data.data.serve_size}</li>
              <li>My Serving: ${data.data.my_serve}</li>
              <li>pill type: ${data.data.pill_type}</li>
              <li>Day: ${data.data.day ? true : false}</li>
              <li>Night: ${data.data.night ? true : false}</li>
              <li>As Needed: ${data.data.asNeeded ? true : false}</li>
              <li>Benefits: ${data.data.benefits}</li>
            </ul>
          `;
          form.reset();
        } else {
          messageDiv.innerHTML = 'Error: ' + data.message;
        }
      })
      .catch(error => {
        console.error(error);
        messageDiv.innerHTML = 'Error: ' + error.message;
      });
})