<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the form data
    $patient_id = $_POST['patient_id'];
    $test_id = $_POST['test_id'];
    $test_name = $_POST['test_name'];
    $test_description = $_POST['test_description'];
    $price = $_POST['price'];

    // Perform additional validation and data processing as needed

    // Store the test data in the database
    require 'db_config.php'; // Include the database configuration file

    // Create a database connection
    

    // Prepare the SQL query to insert test data
    $sql = "INSERT INTO tests (patient_id, test_id, test_name, test_description, price) VALUES ('$patient_id', '$test_id', '$test_name', '$test_description', '$price')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Test registration successful
        $success = "Test registered successfully!";
        header('Location: dashboard.html'); // Redirect to dashboard.html
        exit();
    } else {
        // Test registration failed
        $error = "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<script>
    function updateTestNameAndPrice() {
        var testId = document.getElementById("test_id").value;
        var testName = "";
        var testPrice = "";

        switch (testId) {
            case "1":
                testName = "Complete Blood Count (CBC)";
                testPrice = "950";
                break;
            case "2":
                testName = "Basic Metabolic Panel (BMP)";
                testPrice = "850";
                break;
            case "3":
                testName = "Liver Function Tests (LFTs)";
                testPrice = "650";
                break;
case "4":
                testName = "Kidney Function Tests (KFTs)";
                testPrice = "350";

                break;

            case "5":
                testName = "Lipid Profile";
                 testPrice = "150";

                break;

            case "6":
                testName = "Thyroid Function Tests (TFTs)";
                 testPrice = "250";

                break;
                case "7":
                testName = "Urinalysis";
                 testPrice = "350";

                break;
            case "8":
                testName = "Blood Glucose Test";
                 testPrice = "850";

                break;
             case "9":
                testName = "Hemoglobin A1c (HbA1c)";
                testPrice = "750";

                break;
            case "10":
                testName = "Electrolyte Panel";
                testPrice = "750";

                break;
             case "11":
                testName = "C-Reactive Protein (CRP)";
                testPrice = "650";

                break;
             case "12":
                testName = "Erythrocyte Sedimentation Rate (ESR)";
                 testPrice = "850";


                break;
             case "13":
                testName = "Prothrombin Time (PT)";
                                testPrice = "750";

                break;
             case "14":
                testName = "Activated Partial Thromboplastin Time (aPTT)";
                                testPrice = "950";

                break;
            case "15":
                testName = "Serum Iron Test";
                                testPrice = "950";

                break;
            case "16":
                testName = "Vitamin D Test";
                                testPrice = "650";

                break;
            case "17":
                testName = "Vitamin B12 Test";
                                testPrice = "650";

                break;
            case "18":
                testName = "Serum Electrolytes (Sodium, Potassium, Chloride)";
                                testPrice = "850";

                break;
             case "19":
                testName = "Blood Type and Rh Factor";
                                testPrice = "350";

                break;
             case "20":
                testName = "Urine Culture and Sensitivity";
                                testPrice = "1500";
                break;

            // Add more cases for the remaining test IDs, corresponding names, and prices
            default:
                testName = "";
                testPrice = "";
                break;
        }

        document.getElementById("test_name").value = testName;
        document.getElementById("price").value = testPrice;
    }
</script>


    <title>Tests</title>
    <style>
        body {
            background-color: white; /* Change background color to red */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        .error {
            color: red;
        }
        
        form {
            margin-top: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        footer {
            background-color: red; /* Add red background color to the footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
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
        <h1>Tests</h1>
        <?php if (isset($success)) { ?>
            <p><?php echo $success; ?></p>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <label for="patient_id">Patient ID:</label>
                <input type="text" name="patient_id" id="patient_id" required>
            </div>
  <div>
    <label for="test_id">Test ID:</label>
    <select name="test_id" id="test_id" onchange="updateTestNameAndPrice()" required>
        <option value="">Select Test ID</option>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
</div>
<div>
    <label for="test_name">Test Name:</label>
    <input type="text" name="test_name" id="test_name" required readonly>
</div>
            <div>
                <label for="price">Price:</label>
                <input type="text" name="price" id="price" required readonly>
            </div>
            <div>

<div>
                <label for="test_description">Test Description:</label>
                <textarea name="test_description" id="test_description" rows="4" required></textarea>
            </div>
                <input type="submit" value="Register Test">
            </div>
        </form>
    </div>
            <div class="form-group">
    <a href="dashboard.html" class="button">Dashboard</a>
    </div>

    <footer> 
        This is the footer. <!-- Add content to the footer -->
    </footer>  
</body>
</html>

