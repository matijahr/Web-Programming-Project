<?php

final class DBConfig
{
    const HOST = 'db';
    const DB_NAME = 'WebProject';
    const USERNAME = 'root';
    const PASS = 'test';
}

try {
    $conn = new PDO(
        "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::DB_NAME,
        DBConfig::USERNAME,
        DBConfig::PASS
    );

} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
