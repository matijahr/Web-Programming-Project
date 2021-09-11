<?php

final class DBConfig
{
    const HOST = 'eu-cdbr-west-01.cleardb.com';
    const DB_NAME = 'heroku_219e38f6ea4f6f0';
    const USERNAME = 'ba654019ac899e';
    const PASS = '4918bb12';
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
