document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const messageParagraph = document.querySelector('p');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const formData = new FormData(form);

        fetch('submit_graduation_application.php', {
            method: 'POST',
            body: formData  // FormData will be sent as 'multipart/form-data'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();  // Assuming the server responds with JSON
        })
        .then(data => {
            console.log('Success:', data);
            updateMessage(`Application submitted successfully. Status: ${data.status}`);
        })
        .catch(error => {
            console.error('Failed to submit application:', error);
            updateMessage(`Error: ${error.message}`);
        });
    });

    function updateMessage(message) {
        messageParagraph.textContent = message;  // Update the message displayed to the user
    }
});