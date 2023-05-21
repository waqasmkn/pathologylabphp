<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Validate and sanitize the form data
    $patient_name = $_POST['patient_name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];

    // Perform additional validation and data processing as needed

    // Store the patient data in the database
    require 'db_config.php'; // Include the database configuration file

    // Prepare the SQL query to insert patient data
    $sql = "INSERT INTO patients (patient_name, sex, age, contact_number, email, address, date) VALUES ('$patient_name','$sex','$age', '$contact_number', '$email', '$address','$date')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Get the auto-generated patient ID
        $patient_id = mysqli_insert_id($conn);

        // Check if the patient ID is valid
        if ($patient_id > 0) {
            $success = "Patient registered successfully! Your Patient Number is $patient_id";
        } else {
            $error = "Error: Failed to retrieve the patient ID";
        }
        
        // Redirect to dashboard.html
        // header('Location: dashboard.html');
        // exit();
    } else {
        // Patient registration failed
        $error = "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html>
<head>
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            background-color: red;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            background-color: red;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group input
        .form-group input[type="submit"]:hover {
            background-color: #c70000;
        }

        .error {
            color: red;
        }
        .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Patient Registration</h1>
        </div>
        <?php if (isset($success)) { ?>
            <p><?php echo $success; ?></p>
        <?php } ?>
       
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="form-group">
                <label for="patient_name">Name:</label> 
                <input type="text" name="patient_name" id="patient_name" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select name="sex" id="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Phone:</label>
                <input type="text" name="contact_number" id="contact_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" >
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Registration Date:</label>
                <input type="date" name="date" id="date" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Register">
            </div>

        </form>
    </div>
    <div class="form-group">
    <a href="dashboard.html" class="button">Dashboard</a>
    </div>
    <div class="footer">
        Footer content
    </div>
</body>
</html>
 