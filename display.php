<?php
include_once "dbconnect.php";

foreach ($pdo->query('SELECT * FROM students') as $row) {
    echo $row['name'] . '<br>';
}