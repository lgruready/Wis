<?php

include "dbconnect.php";

try {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS school");
    echo "Database created successfully.";
} catch (PDOException $e) {
    die("Database creation failed: " . $e->getMessage());
}

try{
    $pdo->exec("USE school");
    $pdo->exec("CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        age INT NOT NULL
    )");
    echo "Table created successfully.";
} catch (PDOException $e) {
    die("Table creation failed: " . $e->getMessage());
}

try {
    $pdo->exec("INSERT INTO students (name, age) VALUES ('John Doe', 20)");
    echo "Data inserted successfully.";
} catch (PDOException $e) {
    die("Data insertion failed: " . $e->getMessage());
}

try {
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($students);
    echo "</pre>";
} catch (PDOException $e) {
    die("Data retrieval failed: " . $e->getMessage());
}