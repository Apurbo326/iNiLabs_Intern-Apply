<?php
require_once 'LoggerInterface.php';

// Implement the LoggerInterface in a FileLogger class
class FileLogger implements LoggerInterface {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    // Method to log a message to a file
    public function log($message) {
        // Append the message to the file
        file_put_contents($this->filePath, date('Y-m-d H:i:s') . " - " . $message . "\n", FILE_APPEND);
    }
}
