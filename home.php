<?php
session_start();
require_once('connection.php');

// Retrieve all the apps from the database
$stmt = $pdo->query("SELECT * FROM apps");
$apps = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Apps</title>
</head>
<body>
    <h1>Uploaded Apps</h1>
    <table>
        <thead>
            <tr>
                <th>App Name</th>
                <th>Description</th>
                <th>Developer</th>
                <th>Download Count</th>
                <th>Image</th>
                <th>APK File</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apps as $app) { ?>
                <tr>
                    <td><?php echo $app['app_name']; ?></td>
                    <td><?php echo $app['app_desc']; ?></td>
                    <td><?php echo $app['developer']; ?></td>
                    <td><?php echo $app['download_count']; ?></td>
                    <td><img src="uploads/<?php echo $app['image']; ?>" width="100"></td>
                    <td><a href="uploads/<?php echo $app['apk_file']; ?>"><?php echo $app['apk_file']; ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="uplode-front-end.php" class="uplode-app-link">do you want to uplode an app</a>
</body>
</html>
