document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('#login form');
    const messageContainer = document.querySelector('#login p') || createMessageContainer();

    loginForm.addEventListener('submit', function(event) {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!username || !password) {
            event.preventDefault();  // Prevent the form from submitting
            displayMessage('Both username and password are required.');
        }
    });

    function displayMessage(message) {
        messageContainer.textContent = message;  // Display the error message
    }

    function createMessageContainer() {
        const newMessage = document.createElement('p');
        document.querySelector('#login').appendChild(newMessage);
        return newMessage;
    }
});