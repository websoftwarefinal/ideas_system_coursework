<?php
class DotEnv {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function load() {
        // Check if the .env file exists
        if (!file_exists($this->filePath)) {
            throw new Exception('.env file not found');
        }
        
        // Read the contents of the .env file
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Loop through each line and set environment variables
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
                list($key, $value) = explode('=', $line, 2);
                putenv("$key=$value");
            }
        }
    }
}