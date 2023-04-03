<!DOCTYPE html>
<html>
<head>
    <title>Add App</title>
</head>
<body>
    <h1>Upload App</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="app_name">App Name:</label>
    <input type="text" name="app_name" id="app_name">
    <br><br>
    <label for="app_desc">App Description:</label>
    <textarea name="app_desc" id="app_desc" rows="4" cols="50"></textarea>
    <br><br>
    <label for="developer">Developer Name:</label>
    <input type="text" name="developer" id="developer">
    <br><br>
    <label for="app_file">APK File:</label>
    <input type="file" name="app_file" id="app_file">
    <br><br>
    <input type="submit" value="Upload App">
</form>
</body>
</html>