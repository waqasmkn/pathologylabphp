
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
                body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        h2 {
            color: #333;
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th, table td {
            border: 1px solid red;
            padding: 8px;
            text-align: left;
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
        .button-red {
    display: inline-block;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    border: none;
}
.patient-table {
    border-collapse: collapse;
    width: 100%;
}

.patient-table td {
    padding: 8px;
    border: 1px solid #ccc;
}

.patient-table tr:nth-child(even) {
    background-color: #f2f2f2;
}
.invoice-table {
    border-collapse: collapse;
    width: 100%;
}

.invoice-table td {
    padding: 8px;
    border: 1px solid #ccc;
}

.invoice-table tr:nth-child(even) {
    background-color: #f2f2f2;
}
  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
.form-container {
    text-align: center;
    margin-top: 20px;
}

.button-red {
    display: inline-block;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.form-group {
    text-align: center;
    margin-top: 20px;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: red;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

footer {
    background-color: red;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <h1>Generate Invoice</h1>
                 <div class="form-container">
    <form method="POST" action="invoiceprint.php">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" id="patient_id" required>
        <br>
        <input type="submit" value="Generate Invoice" class="button-red">
    </form>
</div>
<div class="form-group">
    <a href="dashboard.html" class="button">Dashboard</a>
</div>
<footer>
    This is the footer.
</footer>

</html>
