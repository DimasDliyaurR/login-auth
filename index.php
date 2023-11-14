<?php
session_start();

$conn = mysqli_connect("localhost","root","","login-auth");
if(isset($_POST["submit"]))
{

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars(md5($_POST["password"]));

    // Cek Username dan Password Quary
    $check = mysqli_query($conn , "SELECT * FROM `user` WHERE usename = '$username' and password = '$password'")->fetch_assoc();
    if ($check != NULL) {

        if ($check["level"] == "2") {
            $_SESSION["level"] = "admin";
            header("Location:admin/index.php");
        }else{
            $_SESSION["level"] = "user";
            header("Location:user/");
            
        }

    }else {
        echo "<script>alert('password or usrname invalid'); </script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-primary " style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex jus justify-content-center align-items-center" style="min-height: 90vh">
        
    <!-- Card -->
    <div class="card bg-primary-subtle " style="width: 18rem;">
        <h3 class="text-center my-3">Login</h3>
        <form class="mb-3 container text-sm" method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 text-center">
                <a href="regristration.php" class="text-black text-decoration-none">Need Regristration ?</a>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Login</button>
        </form>
        </div>
    </div>
</body>
</html>

