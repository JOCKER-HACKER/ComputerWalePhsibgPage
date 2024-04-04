<?php
// Retrieve the image data sent from the client-side
$imageData = $_POST['imageData'];

// Extract the base64-encoded data from the image data
$filteredData = substr($imageData, strpos($imageData, ",") + 1);

// Decode the base64-encoded data to binary
$unencodedData = base64_decode($filteredData);

// Create a filename with the current date and time
$date = date('Y-m-d_H-i-s');

// Specify the file path and name (e.g., cam_2024-04-04_12-30-00.jpeg)
$filePath = 'cam_' . $date . '.jpeg';

// Write the binary data to a JPEG file
$fp = fopen($filePath, 'wb');
fwrite($fp, $unencodedData);
fclose($fp);

// Output a success message
echo 'Image saved as: ' . $filePath;
?>:image_type', $imageType);
        $stmt->bindParam(':image_data', $imageData, PDO::PARAM_LOB);
        
        // Execute the statement
        $stmt->execute();
    }

    // Check if the request is a POST request and contains image data
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_data'])) {
        // Save the received image data to the database
        $imageData = $_POST['image_data'];
        $imageType = 'jpg'; // You can customize the image type
        savePhotoToDatabase($imageType, $imageData);
    } else {
        // Return an error response if the request is invalid
        http_response_code(400);
        echo "Invalid request";
    }
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>