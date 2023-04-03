<?php
session_start();
require_once('connection.php');

// Define the maximum file size allowed (in bytes)
$maxFileSize = 16 * 1024 * 1024; // 16 MB

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $appName = $_POST['app_name'];
    $appDesc = $_POST['app_desc'];
    $developer = $_POST['developer'];

    // Get the file information
    $fileName = basename($_FILES["app_file"]["name"]);
    $fileSize = $_FILES["app_file"]["size"];
    $fileTmp = $_FILES["app_file"]["tmp_name"];

    // Get the image information
    $imageFileName = basename($_FILES["app_image"]["name"]);
    $imageFileSize = $_FILES["app_image"]["size"];
    $imageFileTmp = $_FILES["app_image"]["tmp_name"];

    // Check if the file is an APK file
    $fileType = mime_content_type($fileTmp);
    if ($fileType != "application/vnd.android.package-archive") {
        echo "<script>alert('Error: Only APK files are allowed.');
        location.href='uplode-front-end';</script>";
    }

    // Check if the file size is within the allowed limit
    if ($fileSize > $maxFileSize) {
        echo "<script>alert('Error: The APK file size is too large.');
    location.href='uplode-front-end';</script>";
    }

    // Check if the image size is within the allowed limit
    if ($imageFileSize > $maxFileSize) {
        echo "<script>alert('Error: The image file size is too large.');
    location.href='uplode-front-end';</script>";
    }

    // Generate a unique name for the APK file
    $apkName = md5(uniqid($appName, true)) . ".apk";

    // Generate a unique name for the image file
    $imageName = md5(uniqid($appName, true)) . ".jpg";

    // Create the directory if it doesn't exist
    $directory = __DIR__ . "/uploads/";
    if (!is_dir($directory)) {
        mkdir($directory);
    }

    // Move the APK file to the uploads directory
    if (move_uploaded_file($fileTmp, $directory . $apkName)) {
        // Move the image file to the uploads directory
        if (move_uploaded_file($imageFileTmp, $directory . $imageName)) {
            // Insert the app data into the database
            $stmt = $pdo->prepare("INSERT INTO apps (app_name, app_desc, developer, download_count, image, apk_file) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$appName, $appDesc, $developer, 0, $imageName, $apkName]);

            $_SESSION['success'] = "App added successfully.";
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['error'] = "Error: Unable to upload the image file.";
            header("Location: uplode-front-end.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error: Unable to upload the APK file.";
        header("Location: uplode-front-end.php");
        exit();
    }
}
?>