<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Graduation Applications</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Graduation Application Review</h1>
    <div id="applications">
        <!-- PHP script will populate this with applications to review -->
    </div>
    <script src="secretary_scripts.js"></script>
    <style>

        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h1 {
    text-align: center;
    margin-top: 20px;
}

#applications {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.application {
    border-bottom: 1px solid #ccc;
    padding: 20px 0;
}

.application:last-child {
    border-bottom: none;
}

.application h2 {
    margin-bottom: 10px;
}

.application p {
    margin-bottom: 5px;
}

.application .status {
    font-weight: bold;
    color: #007bff;
}
</style>
</body>
</html>