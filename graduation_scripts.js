document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Create a new FormData object passing in the form
        const formData = new FormData(form);

        // Optional: Dynamically set the student_id if it's not hardcoded in the HTML
        // This should be adapted or removed based on how your application manages user sessions
        formData.set('student_id', 'your_dynamic_student_id_here');

        // Use the fetch API to send the form data to the server asynchronously
        fetch('submit_graduation_application.php', {
            method: 'POST',
            body: formData  // FormData will be sent as 'multipart/form-data'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();  // Assuming the server responds with JSON
        })
        .then(data => {
            console.log('Success:', data);
            alert('Application for graduation submitted successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to submit application for graduation: ' + error.message);
        });
    });
});