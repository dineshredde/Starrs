<?php
session_start();
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM applications WHERE email = ? AND uniq_id = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['uniq_id'] = $user['uniq_id']; // Set session variable
        header("Location: student.php"); // Redirect to a different page
        exit();
    } else {
        echo "Invalid login credentials.";
    }

   

    $stmt->close();
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1><a href="index.php" >Welcome to the University Portal</a></h1>
        <h4><a href="admissions.php" class="interactive-link">Application</a></h4>
        <h4><a href="applicant_login.php" class="interactive-link">Click here to check the status of application</a></h4>
        
        
        
    </header>
    
    <div id="login">
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>  <!-- Display error messages -->
        <form action="" method="post">
            <h3>LOGIN AS STUDENT</h3>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <p><a href="faculty_login.php">Faculty Login</a></p>
        <input type="submit" value="Login">
    </form>
    </div>
    <script src="index_scripts.js"></script>

    <style>
        h1 a {
            text-decoration: none; /* Removes the underline */
            color: white; /* Set this to whatever your normal text color is */
        }
        /* Optionally, style it on hover to give feedback that it's clickable */
        h1 a:hover {
            text-decoration: underline;
        }
        .interactive-link {
            text-decoration: none; /* Removes underline */
            color: blue; /* Sets text color */
            font-size: 18px; /* Sets font size */
            transition: all 0.3s ease; /* Smooth transition for hover effect */
        }

        .interactive-link:hover, .interactive-link:focus {
            color: red; /* Changes color on hover/focus */
            text-decoration: none; /* Adds underline on hover/focus */
        }

        .interactive-link:active {
            color: green; /* Changes color when clicked */
        }
       
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url('univ_bg.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
}

header {
    background-color: rgba(51, 51, 51, 0.8);
    color: #fff;
    padding: 20px;
    margin-bottom: 20px;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

nav ul li a:hover {
    text-decoration: underline;
}

#login {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(249, 249, 249, 0.9);
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
}

#login:hover {
    transform: scale(1.03);
}

#login label {
    display: block;
    margin-bottom: 5px;
}

#login input[type="text"],
#login input[type="password"],
#login select {
    width: calc(100% - 12px);
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

#login input[type="text"]:focus,
#login input[type="password"]:focus,
#login select:focus {
    border-color: #007bff;
}

#login button {
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#login button:hover {
    background-color: #45a049;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}





        
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px; /* Add margin-bottom to create space */
        }
        
        header h1 {
            margin: 0;
            font-size: 24px;
            margin-bottom: 20px; /* Add margin-bottom to create space below the heading */;
        }
        
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            margin-top: 20px; /* Add margin-top to create space above the navigation links */;
        }
        
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        
        nav ul li a:hover {
            text-decoration: underline;
        }
        
        #login {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        #login label {
            display: block;
            margin-bottom: 5px;
        }
        
        #login input[type="text"],
        #login input[type="password"],
        #login select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        #login select {
            width: 100%;
        }
        
        #login button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        #login button:hover {
    background-color: #45a049;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}


    </style>

    
    <footer>
        <p>University Portal © 2024</p>
    </footer>
</body>
</html>
