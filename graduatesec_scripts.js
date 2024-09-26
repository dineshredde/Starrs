document.addEventListener('DOMContentLoaded', function() {
    // Select the form by the section it's contained in to ensure we're targeting the right one
    const updateStatusForm = document.querySelector('section:nth-of-type(2) form');

    updateStatusForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data into FormData object
        const formData = new FormData(updateStatusForm);

        // Serialize FormData into URL-encoded string for POST request
        const searchParams = new URLSearchParams();
        for (const pair of formData) {
            searchParams.append(pair[0], pair[1]);
        }

        fetch('php/update_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: searchParams
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            alert('Status updated successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to update status: ' + error.message);
        });
    });
});