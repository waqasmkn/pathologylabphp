
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            background-color: red; /* Set button background color to red */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkred; /* Change button background color on hover */
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
    <h1>Generate Report</h1>
    <form method="POST" action="report.php">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" id="patient_id" required>
        <br>
        <input type="submit" value="Generate Report">
    </form>
    <div class="form-group">
        <a href="dashboard.html" class="button">Dashboard</a>
    </div>

    <footer>
        This is the footer.
    </footer>

    <script>
        // Function to print the report
        function printReport() {
            window.print();
        }
    </script>
</body>
</html>
