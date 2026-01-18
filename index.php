<?php
    session_start();

    if(isset($_SESSION["username"]) == false){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>

<body>
    <nav>
        <h1 class="logo">Binus Database</h1>
        <p style="font-size: 20px;">Welcome to Binus Database,<?php if(isset($_SESSION["username"])): ?>
            <?=  htmlspecialchars($_SESSION["username"]["username"]) ?>
        <?php endif; ?></p>
        <ul class="links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="hero">
        <h1 class="hero-header" style="margin: 2em 0 2em 0;">Welcome to Binus Database!</h1>
        <img src="asset/House2.jpg" alt="" srcset="" class="hero-img">
    </section>

    <section class="features">
        <h2 class="ft-title">Students' Database</h2>
        <p class="ft-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, voluptatibus.</p>
    </section>

    <div class="card-container">
        <div class="card">
            <img src="asset/House2.jpg" alt="" srcset="" class="card-img">
            <div class="card-content">
                <div class="card-header">Example</div>
                <div class="card-desc">Lorem ipsum dolor sit amet.</div>
            </div>

            <p class="card-detail">2025</p>
            <button class="card-btn">Details</button>
        </div>

        <div class="card">
            <img src="asset/House2.jpg" alt="" srcset="" class="card-img">
            <div class="card-content">
                <div class="card-header">Example</div>
                <div class="card-desc">Lorem ipsum dolor sit amet.</div>
            </div>

            <p class="card-detail">2025</p>
            <button class="card-btn">Details</button>
        </div>

        <div class="card">
            <img src="asset/House2.jpg" alt="" srcset="" class="card-img">
            <div class="card-content">
                <div class="card-header">Example</div>
                <div class="card-desc">Lorem ipsum dolor sit amet.</div>
            </div>

            <p class="card-detail">2025</p>
            <button class="card-btn">Details</button>
        </div>

        <div class="card">
            <img src="asset/House2.jpg" alt="" srcset="" class="card-img">
            <div class="card-content">
                <div class="card-header">Example</div>
                <div class="card-desc">Lorem ipsum dolor sit amet.</div>
            </div>

            <p class="card-detail">2025</p>
            <button class="card-btn">Details</button>
        </div>
    </div>

    <footer>
        <h1 class="logo">Binus Database</h1>
        <p class="copyright" style="font-size: 20px;">2025, Binus University</p>
    </footer>
</body>
</html>