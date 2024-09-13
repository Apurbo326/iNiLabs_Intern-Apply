<?php
require_once 'FileLogger.php';
require_once 'DatabaseLogger.php';

// FileLogger Example
$fileLogger = new FileLogger('logs.txt');
$fileLogger->log("This is a message logged to a file.");

// DatabaseLogger Example
try {
    $pdo = new PDO('mysql:host=localhost;dbname=logging_db', 'root', ''); 
    $databaseLogger = new DatabaseLogger($pdo);
    $databaseLogger->log("This is a message logged to the database.");
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
