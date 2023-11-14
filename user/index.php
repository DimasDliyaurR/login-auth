<?php
session_start();
if (isset($_SESSION["level"])) 
{
    # code...
    if ($_SESSION["level"] != "user") {
        header("Location:../index.php");
    }
}else{
    header("Location:../");
}

if (isset($_POST["logout"])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mb-3">
        <h1>User Interface</h1>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <input type="submit" value="logout" class="btn btn-danger" name="logout">
        </form>
    </div>
</body>
</html>