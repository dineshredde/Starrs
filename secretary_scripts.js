document.addEventListener('DOMContentLoaded', function() {
    // Function to load graduation applications
    function loadApplications() {
        fetch('get_applications.php')  // Assuming an endpoint that returns application data as JSON
            .then(response => response.json())
            .then(applications => {
                const applicationsContainer = document.getElementById('applications');
                applicationsContainer.innerHTML = '';  // Clear existing applications

                applications.forEach(application => {
                    const div = document.createElement('div');
                    div.className = 'application';
                    div.innerHTML = `
                        <h2>${application.studentName} - ${application.program}</h2>
                        <p>Status: ${application.status}</p>
                        <button onclick="updateApplicationStatus('${application.id}', 'approved')">Approve</button>
                        <button onclick="updateApplicationStatus('${application.id}', 'rejected')">Reject</button>
                    `;
                    applicationsContainer.appendChild(div);
                });
            })
            .catch(error => console.error('Error loading applications:', error));
    }

    // Function to update the status of an application
    function updateApplicationStatus(applicationId, newStatus) {
        fetch('update_application_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: applicationId, status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Update successful:', data);
            loadApplications();  // Reload applications to reflect changes
        })
        .catch(error => console.error('Error updating application:', error));
    }

    // Attach these functions to the window object to make them accessible from HTML buttons
    window.updateApplicationStatus = updateApplicationStatus;

    // Initial load of applications
    loadApplications();
});