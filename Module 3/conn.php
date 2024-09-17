<?php
    // User configurations
    $host = "localhost";
    $port = "5432";
    $dbname = "php-db";
    $user = "postgres";
    $password = "317!!Musha4lyf";

    // Connection String
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";  // Include port in DSN

    try {
        // Create a new PDO instance
        $instance = new PDO($dsn, $user, $password);

        // Set an error mode to exception
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Echo messages
        echo "Successfully connected to the database";

    } catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }
?>
