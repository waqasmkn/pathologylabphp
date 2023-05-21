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

    // Retrieve result information from the results table
    $sql = "SELECT * FROM results WHERE patient_id = '$patient_id'";
    $resultResult = mysqli_query($conn, $sql);

    // Check if patient exists
    if (mysqli_num_rows($patientResult) > 0) {
        // Fetch patient data
        $patientData = mysqli_fetch_assoc($patientResult);

        echo '<div class="patient-info">';
        echo '<h2 style="color: red;" align="center">Patient Information</h2>';
        echo '<p><strong style="color: red;">Patient ID:</strong> ' . $patientData['patient_id'] . '</p>';
        echo '<p><strong style="color: red;">Patient Name:</strong> ' . $patientData['patient_name'] . '</p>';
        echo '<p><strong style="color: red;">Sex:</strong> ' . $patientData['sex'] . '</p>';
        echo '<p><strong style="color: red;">Age:</strong> ' . $patientData['age'] . '</p>';
        echo '<p><strong style="color: red;">Contact Number:</strong> ' . $patientData['contact_number'] . '</p>';
        echo '<p><strong style="color: red;">Address:</strong> ' . $patientData['address'] . '</p>';
        echo '</div>';

        // Check if tests exist
        if (mysqli_num_rows($testResult) > 0) {
            // Print test information
            echo '<h2 style="color: red;">Test Results</h2>';
            echo '<table style="border: 1px solid red; color: red; background-color: white;">';
            echo '<tr>';
            echo '<th>Test ID</th>';
            echo '<th>Test Name</th>';
            echo '<th>Test Description</th>';
            echo '<th>Result Value</th>';
            echo '<th>Normal Range</th>';
            echo '</tr>';

            while ($testData = mysqli_fetch_assoc($testResult)) {
                // Fetch result data for each test
                $resultData = mysqli_fetch_assoc($resultResult);

                echo '<tr>';
                echo '<td>' . $testData['test_id'] . '</td>';
                echo '<td>' . $testData['test_name'] . '</td>';
                echo '<td>' . $testData['test_description'] . '</td>';
                echo '<td>' . $resultData['result_value'] . '</td>';
                echo '<td>' . $resultData['normal_range'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'No test records found for patient ID ' . $patient_id;
        }

        // Add print button
echo '<div style="text-align: center; margin-top: 20px;"><button onclick="printReport()" style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Print Report</button></div>';

// JavaScript function for printing the report
echo '<script>
function printReport() {
    window.print();
}
</script>';
    }
}


    


