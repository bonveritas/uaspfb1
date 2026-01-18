<?php
    include "utils/db.php";

    $error = "";

    if(isset($_POST["register"]) == true){
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $campus = trim($_POST["campus"]);
        $major = $_POST["major"];
        $allowedmajor = ['1', '2', '3'];

        if($username === ""){
            $error = "Username must be filled!";
        }
        elseif(strlen($username) < 5 || strlen($username) > 20){
            $error = "Username must be more than 5 and less than 20!";
        }
        elseif($email === ""){
            $error = "Email must be filled!";
        }
        elseif(strlen($email) < 5 || strlen($email) > 50){
            $error = "Email must be more than 5 and less than 50!";
        }
        elseif($password === ""){
            $error = "Password must be filled!";
        }
        elseif(strlen($password) < 5 || strlen($password) > 25){
            $error = "Password must be more than 5 and less than 25!";
        }
        elseif($campus === ""){
            $error = "Campus must be filled!";
        }
        elseif($major === ""){
            $error = "Major must be selected!";
        }
        elseif(!in_array($major, $allowedmajor, true)){
            $error = "Invalid major!";
        }

        if($error === ""){
            $query = "INSERT INTO users(username, email, password, campus, majorid) VALUES(?, ?, ?, ?, ?);";
            $stmt = mysqli_prepare($conn, $query);

            mysqli_stmt_bind_param($stmt, "ssssi", $username, $email, $password, $campus, $major);

            if(mysqli_stmt_execute($stmt) == true){
                header("Location: login.php?success=1");
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
    <title>Register</title>
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
        <div class="container">
            <form action="" method="post" class="form" id="form">
                <h2 style="text-align: center;">Register</h2>

                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-input" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-input" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-input" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="campus">Campus</label>
                    <input type="text" name="campus" id="campus" class="form-input" placeholder="Campus">
                </div>
                <div class="form-group">
                    <label for="major">Select your Major</label>
                    <select name="major" id="major" class="form-input">
                        <option value="" hidden>Available Majors</option>
                        <option value="1">Information Systems</option>
                        <option value="2">Computer Science</option>
                        <option value="3">Accounting</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" name="register">Register</button>
                    <a href="login.php" style="text-align: center;">I have an account</a>
                </div>

                <?php if($error !== ""): ?>
                    <div class="error-message" style="text-align: center;"></div>
                        <?= htmlspecialchars($error) ?>
                    </div> 
                <?php endif; ?>
            </form>
        </div>
    </div>

    <footer>
        <h1 class="logo">Binus Database</h1>
        <p class="copyright" style="font-size: 20px;">2025, Binus University</p>
    </footer>
</body>
</html>