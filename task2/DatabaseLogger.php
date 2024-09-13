<?php
require_once 'LoggerInterface.php';

// Implement the LoggerInterface in a DatabaseLogger class
class DatabaseLogger implements LoggerInterface {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Method to log a message to the database
    public function log($message) {
        $stmt = $this->pdo->prepare("INSERT INTO logs (message, created_at) VALUES (:message, :created_at)");
        $stmt->execute([
            ':message' => $message,
            ':created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
