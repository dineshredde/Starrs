document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Create a new FormData object passing in the form
        const formData = new FormData(form);

        // Use the fetch API to send the form data to the server asynchronously
        fetch('register_course.php', {
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
            displayCourse(data); // Function to handle the display of the registered course
        })
        .catch(error => {
            console.error('Failed to register course:', error);
        });
    });

    function displayCourse(courseData) {
        const coursesContainer = document.getElementById('courses');
        const courseElement = document.createElement('div');
        if (courseData.name && courseData.description) {
            courseElement.textContent = `Registered Course: ${courseData.name} - ${courseData.description}`;
        } else {
            courseElement.textContent = 'Error: Course data is incomplete.';
        }
        coursesContainer.appendChild(courseElement);
    }
});