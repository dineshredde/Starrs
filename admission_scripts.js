function submitApplication() {
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const email = document.getElementById('email').value;
    const personalStatement = document.getElementById('personal_statement').value;
    // Assuming you handle files on the server side, just preparing to send text data here.
    
    const formData = `first_name=${encodeURIComponent(firstName)}&last_name=${encodeURIComponent(lastName)}&email=${encodeURIComponent(email)}&personal_statement=${encodeURIComponent(personalStatement)}`;

    fetch('submit_application.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        alert('Application submitted successfully!');
    })
    .catch(error => console.error('Error:', error));
}