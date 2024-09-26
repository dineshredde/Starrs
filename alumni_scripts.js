
document.getElementById('updateContactForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Stop the form from submitting normally

    // Form data to be sent
    var formData = new FormData(this);

    // Create an XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/update_contact.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Check the response from the server
            if (xhr.responseText === 'success') {
                alert('Details updated successfully!');
            } else if (xhr.responseText === 'no change') {
                alert('No changes were made.');
            } else {
                alert('Error updating details.');
            }
        } else {
            alert('Details Updated successfully');
            
        }
    };
    xhr.send(formData);
});