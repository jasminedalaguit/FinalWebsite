<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label>Folder Name</label>
        <input type="text" name="foldername" id="foldername">

        <label>File Upload</label>
        <input type="file" name="upload" id="upload" accept=".pdf">

        <button type="submit">Submit</button>
    </form>
    
</body>
</html>