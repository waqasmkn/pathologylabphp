<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the form data
    $patient_id = $_POST['patient_id'];
    $test_id = $_POST['test_id'];
    $result_value = $_POST['result_value'];
    $normal_range = $_POST['normal_range'];

    // Perform additional validation and data processing as needed

    // Store the result data in the database
    require 'db_config.php'; // Include the database configuration file

    // Create a database connection
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to insert result data
    $sql = "INSERT INTO results (patient_id, test_id, result_value, normal_range) VALUES ('$patient_id', '$test_id', '$result_value', '$normal_range')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Result registration successful
        $success = "Result registered successfully!";
        // Redirect to dashboard.html
        header('Location: dashboard.html');
        exit();
    } else {
        // Result registration failed
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
    var normalRange = "";

    switch (testId) {
        case "1":
            normalRange = "No specific value range, as it includes multiple blood components such as red blood cells, white blood cells, and platelets. Each component has its own C";

            break;
        case "2":
            normalRange = "Sodium (Na): 135-145 mmol/L ,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L,Bicarbonate (HCO3): 22-28 mmol/L,Blood Urea Nitrogen (BUN): 7-20 mg/dL,Creatinine: 0.6-1.3 mg/dL,Glucose: 70-99 mg/dL,Calcium (Ca): 8.5-10.5 mg/dL";
            break;

        case "3":
            normalRange = "Total Bilirubin: 0.3-1.2 mg/dL,Direct Bilirubin: 0.0-0.3 mg/dL,Alanine Aminotransferase (ALT): 0-45 U/L,Aspartate Aminotransferase (AST): 0-40 U/L,Alkaline Phosphatase (ALP): 20-140 U/L,Total Protein: 6.0-8.3 g/dL,Albumin: 3.5-5.0 g/dL";
            break;

        case "4":
            normalRange = "Blood Urea Nitrogen (BUN): 7-20 mg/dL,Creatinine: 0.6-1.3 mg/dL,Estimated Glomerular Filtration Rate (eGFR): >60 mL/min/1.73m²";
            break;

        case "5":
            normalRange = "Total Cholesterol: <200 mg/dL,Triglycerides: <150 mg/dL,High-Density Lipoprotein (HDL) Cholesterol: >40 mg/dL (men), >50 mg/dL (women),Low-Density Lipoprotein (LDL) Cholesterol: <130 mg/dL,Very Low-Density Lipoprotein (VLDL) Cholesterol: <30 mg/dL";
            break;

        case "6":
            normalRange = "Thyroid-Stimulating Hormone (TSH): 0.4-4.0 mIU/L,Free Thyroxine (FT4): 0.8-1.8 ng/dL,Triiodothyronine (T3): 80-200 ng/dL";
            break;

        case "7":
            normalRange = "Various parameters are evaluated, including pH, specific gravity, protein, glucose, ketones, red and white blood cells, etc. Specific value ranges depend on each parameter.";
            break;

        case "8":
            normalRange = "Fasting Plasma Glucose (FPG): 70-99 mg/dL (normal), 100-125 mg/dL (prediabetes), ≥126 mg/dL (diabetes) Random Plasma Glucose: <140 mg/dL (normal), ≥200 mg/dL (diabetes)";
            break;

        case "9":
            normalRange = "HbA1c: <5.7% (normal), 5.7-6.4% (prediabetes), ≥6.5% (diabetes)";
            break;

         case "10":
            normalRange = "Sodium (Na): 135-145 mmol/L,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L,Bicarbonate (HCO3): 22-28 mmol/L";
            break;

        case "11":
            normalRange = "CRP: <10 mg/L (low risk), 10-100 mg/L (moderate risk), >100 mg/L (high risk)";
            break;

        case "12":
            normalRange = "ESR: <15 mm/h (men), <20 mm/h (women)";
            break;

        case "13":
            normalRange = "PT: 11-13.5 seconds";
            break;

        case "14":
            normalRange = "aPTT: 25-35 seconds";
            break;

        case "15":
            normalRange = "Serum Iron: 60-170 µg/dL (men), 40-160 µg/dL (women)";
            break;

        case "16":
            normalRange = "25-Hydroxyvitamin D: >30 ng/mL (sufficient), 20-30 ng/mL (insufficient), <20 ng/mL (deficient)";
            break;

        case "17":
            normalRange = "Vitamin B12: 200-900 pg/mL";
            break;

        case "18":
            normalRange = "Sodium (Na): 135-145 mmol/L,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L";
            break;

        case "19":
            normalRange = "Blood Type: A, B, AB, or O Rh Factor: Positive (+) or Negative (-)";
            break;

        case "20":
            normalRange = "No specific value ranges. It is a test to identify bacteria or other organisms in the urine and determine their sensitivity to antibiotics.";
            break;

        // Add cases for the remaining test IDs and corresponding names and normal ranges

        default:
            normalRange = "";
            break;
    }

    document.getElementById("normal_range").value = normalRange;
}

</script>             
    <title>Results</title>
    <style>
        body {
            background-color: white; /* Set background color to white */
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
        
        input[type="text"] {
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
            background-color: red; /* Set footer background color to red */
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
        <h1>Results</h1>
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
        <option value="1">1:Complete Blood Count (CBC)</option>
        <option value="2">2:Basic Metabolic Panel (BMP)</option>
        <option value="3">3:Liver Function Tests (LFTs)</option>
        <option value="4">4:Kidney Function Tests (KFTs)</option>
        <option value="5">5:Lipid Profile</option>
        <option value="6">6:Thyroid Function Tests (TFTs)</option>
        <option value="7">7:Urinalysis</option>
        <option value="8">8:Blood Glucose Test</option>
        <option value="9">9:Hemoglobin A1c (HbA1c)</option>
        <option value="10">10:Electrolyte Panel</option>
        <option value="11">11:C-Reactive Protein (CRP)</option>
        <option value="12">12:Erythrocyte Sedimentation Rate (ESR)</option>
        <option value="13">13:Prothrombin Time (PT)</option>
        <option value="14">14:Activated Partial Thromboplastin Time (aPTT)</option>
        <option value="15">15:Serum Iron Test</option>
        <option value="16">16:Vitamin D Test</option>
        <option value="17">17:Vitamin B12 Test</option>
        <option value="18">18:Serum Electrolytes (Sodium, Potassium, Chloride)</option>
        <option value="19">19:Blood Type and Rh Factor</option>
        <option value="20">20:Urine Culture and Sensitivity</option>
    </select>
</div>
<div>
    <label for="normal_range">Normal Range:</label>
    <input type="text" name="normal_range" id="normal_range" readonly>
</div>

            <div>
                <label for="result_value">Result Value:</label>
                <input type="text" name="result_value" id="result_value" required>
            </div>
           
            <div>
                <input type="submit" value="Register Result">
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
