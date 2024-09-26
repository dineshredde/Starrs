<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="width=device-width, initial-scale=1.0">
    <title>Alumni Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Alumni Profile</h1>
    <form id="updateContactForm" action="php/update_contact.php" method="post">
        <input type="hidden" name="alumni_id" value="alumni_id"> <!-- Set dynamically -->
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">
        <textarea name="address" placeholder="Address"></textarea>
        <button type="submit">Update Contact Info</button>
    </form>

    <h2>Course History</h2>
    <div id="courseHistory">
        <!-- Course history will be populated here via JavaScript and PHP -->
       
    
    </div>

    <script src="alumni_scripts.js"></script>
    
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f8ff; /* Soft blue background */
    padding: 20px; /* Padding around the body for better spacing */
}

table {
    width: 80%; /* Width of the table set to 80% of its container */
    border-collapse: collapse; /* Collapses the border lines between cells */
    margin: 0 auto; /* Center the table horizontally */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Soft shadow around the table */
}

th, td {
    border: 1px solid #dddddd; /* Light grey border for each cell */
    text-align: left; /* Align text to the left in cells */
    padding: 12px; /* Padding inside cells for spacing */
}

th {
    background-color: #007acc; /* Dark blue background for headers */
    color: white; /* White text color for headers */
    font-size: 16px; /* Slightly larger text for headers */
}

tbody tr:hover {
    background-color: #e1f5fe; /* Light blue background on row hover */
    cursor: pointer; /* Changes the cursor to a pointer to indicate interactivity */
}

/* Style for highlighting the header row separately */
thead tr {
    background-color: #003366; /* Even darker blue for the header row */
}

/* Responsive font sizes */
td, th {
    font-size: 14px;
}

/* Style for links inside the table, if any */
a {
    color: #0056b3; /* Blue color for links */
    text-decoration: none; /* No underline for links */
}

a:hover {
    text-decoration: underline; /* Underline on hover for links */
}

    /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1, h2 {
    margin-top: 30px; /* Add margin-top for headings */
    margin-bottom: 20px; /* Add margin-bottom for headings */
}

input[type="email"],
input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

/* Container styles */
#updateContactForm {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Course History styles */
#courseHistory {
    margin-top: 20px; /* Add margin-top for course history section */
}

/* Responsive styles */
@media (max-width: 768px) {
    #updateContactForm {
        width: 90%;
    }
}
</style>
</body>
</html>