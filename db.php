<?php
$host = 'sql6.freesqldatabase.com';
$dbname = 'sql6696320';
$user = 'sql6696320';
$password = 'ZQSqgSan6R';
$port = 3306;

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $password);
    echo "Connected to database successfully";

    // Inserting a new user
    $username = 'admin';
    $password = 'admin';
    $stmt = $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    echo "New user inserted successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
