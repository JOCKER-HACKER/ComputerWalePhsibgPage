<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'sql6.freesqldatabase.com';
$dbname = 'sql6696320';
$user = 'sql6696320';
$password = 'ZQSqgSan6R';
$port = 3306;

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $password);
    

    // Inserting a new user
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header("Location: downloading.html");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    header("Location: login.html");
}
?>);
}
?>