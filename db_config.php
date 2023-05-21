<?php

// Database Configuration
define('DB_HOST', 'sql211.epizy.com');
define('DB_USERNAME', 'epiz_34104575');
define('DB_PASSWORD', 'rI5nFepwkLSp1xH');
define('DB_NAME', 'epiz_34104575_lis');

// Create a database connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
