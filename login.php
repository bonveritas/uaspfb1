<?php
    include "utils/db.php";

    $error = "";
    session_start();

    if(isset($_POST["login"]) == true){
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $vpassword = $_POST["vpassword"];
        $remember = isset($_POST["checkbox"]) && $_POST["checkbox"] == "on";

        if($username === ""){
            $error = "Username must be filled!";
        }
        elseif(strlen($username) < 5 || strlen($username) > 20){
            $error = "Username must be more than 5 and less than 20!";
        }
        elseif($password === ""){
            $error = "Password must be filled!";
        }
        elseif(strlen($password) < 5 || strlen($password) > 25){
            $error = "Password must be more than 5 and less than 25!";
        }
        elseif($vpassword === ""){
            $error = "Password must be verified!";
        }
        elseif($password !== $vpassword){
            $error = "Password doesn't match!";
        }

        if($error === ""){
            $query = "SELECT userid, username, email, password, campus FROM users WHERE username = ?;";
            $stmt = mysqli_prepare($conn, $query);

            mysqli_stmt_bind_param($stmt, "s", $username);

            if(mysqli_stmt_execute($stmt) == true){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);

                    if($row["password"] == $password){
                        $_SESSION["username"] = [
                            "userid" => $row["userid"],
                            "username" => $row["username"],
                            "email" => $row["email"]
                        ];

                        if($remember == true){
                            setcookie("userid", $row["userid"], time() + 7 * 3600, "/");
                        }

                        header("Location: index.php");
                    }
                }
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
</head>

<body>
    <nav>
        <h1 class="logo">Binus Database</h1>
        <ul class="links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <div class="form-bg">
        <form action="" method="post" class="form" id="form">
            <h2 style="text-align: center;">Login</h2>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" id="username" class="form-input" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-input" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="vpassword">Verify Password</label>
                <input type="password" name="vpassword" id="vpassword" class="form-input" placeholder="Verify Password">
            </div>
            <div class="form-ck" style="margin-bottom: 10px;">
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Remember me</label>
            </div>

            <div class="form-group">
                <button type="submit" name="login">Login</button>
                <a href="register.php" style="text-align: center;">I don't have an account</a>
            </div>

            <?php if($error !== ""): ?>
                    <div class="error-message" style="text-align: center;"></div>
                        <?= htmlspecialchars($error) ?>
                    </div> 
            <?php endif; ?>
        </form>
    </div>

    <footer>
        <h1 class="logo">Binus Database</h1>
        <p class="copyright" style="font-size: 20px;">2025, Binus University</p>
    </footer>
</body>
</html>