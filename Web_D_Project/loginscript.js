// Function to validate login credentials
function validateLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    // Hardcoded credentials for demonstration purposes
    const correctUsername = 'admin';
    const correctPassword = 'password123';

    // Check if username and password match
    if (username === correctUsername && password === correctPassword) {
        alert('Login successful!');
        errorMessage.textContent = ''; // Clear error message
        return true;
    } else {
        errorMessage.textContent = 'Incorrect username or password.';
        return false;
    }
}
