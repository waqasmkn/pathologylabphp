<?php
// Check if patient_id is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the form data
    $patient_id = $_POST['patient_id'];

    // Include the database configuration file
    require 'db_config.php';

    // Retrieve patient information from the patients table
    $sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
    $patientResult = mysqli_query($conn, $sql);

    // Retrieve test information from the tests table
    $sql = "SELECT * FROM tests WHERE patient_id = '$patient_id'";
    $testResult = mysqli_query($conn, $sql);

    // Check if patient exists
    if (mysqli_num_rows($patientResult) > 0) {
        // Fetch patient data
        $patientData = mysqli_fetch_assoc($patientResult);

        // Print patient information with red color
        echo '<h2 style="color: red;" align="center">Invoice</h2>';
        echo '<table class="invoice-table">';
        echo '<tr><td><strong style="color: red;">Patient ID:</strong></td><td>' . $patientData['patient_id'] . '</td></tr>';
        echo '<tr><td><strong style="color: red;">Patient Name:</strong></td><td>' . $patientData['patient_name'] . '</td></tr>';
        echo '<tr><td><strong style="color: red;">Sex:</strong></td><td>' . $patientData['sex'] . '</td></tr>';
        echo '<tr><td><strong style="color: red;">Age:</strong></td><td>' . $patientData['age'] . '</td></tr>';
        echo '<tr><td><strong style="color: red;">Contact Number:</strong></td><td>' . $patientData['contact_number'] . '</td></tr>';
        echo '<tr><td><strong style="color: red;">Address:</strong></td><td>' . $patientData['address'] . '</td></tr>';
        echo '</table>';

        // Check if tests exist
        if (mysqli_num_rows($testResult) > 0) {
            // Print test information
            echo '<h2 style="color: red;">Test Details</h2>';
            echo '<table style="border: 1px solid red; color: red; background-color: white;">';
            echo '<tr>';
            echo '<th>Test ID</th>';
            echo '<th>Test Name</th>';
            echo '<th>Price</th>';
            echo '</tr>';

            $totalPrice = 0; // Variable to store the total price

            while ($testData = mysqli_fetch_assoc($testResult)) {
                echo '<tr>';
                echo '<td>' . $testData['test_id'] . '</td>';
                echo '<td>' . $testData['test_name'] . '</td>';
                echo '<td>' . $testData['price'] . '</td>';
                echo '</tr>';

                $totalPrice += $testData['price']; // Add the price to the total
            }

            echo '</table>';

            // Print total price
            echo '<h2 style="color: red;">Total Price: ' . $totalPrice . '</h2>';
        } else {
            echo 'No test records found for patient ID ' . $patient_id;
        }

        // Add print button
// Add print button
echo '<div style="text-align: center; margin-top: 20px;"><button onclick="printReport()" style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Print Report</button></div>';

// JavaScript function to print the report
echo '<script>
function printReport() {
    window.print();
}
</script>';
    }
}
