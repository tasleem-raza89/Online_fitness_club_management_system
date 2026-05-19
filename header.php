<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Navbar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
    
    <script defer src="script.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">FitnessClub</div>
        <ul class="nav-links">
            <li><a href="Home.php" class="active">Home</a></li>
            <li><a href="About.php">About</a></li>
            <li><a href="Workout.php">Workout</a></li>
            <li><a href="Trainer.php">Trainer</a></li>
            <li><a href="Gallery.php">Gallery</a></li>
            <li><a href="Shop.php">Shop</a></li>
            <li><a href="Payment.php">Payment</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul>
        
        <?php if(isset($_SESSION['user'])): ?>
            <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
        <?php else: ?>
            <button class="login-btn" onclick="openModal()">Login</button>
        <?php endif; ?>
        
        <div class="nav-icons">
            <div class="cart-icon" onclick="toggleCart()">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count">0</span>
            </div>
            <div class="hamburger">
                <span>Home</span>
                <span>About</span>
                <span>Workout</span>
                <span>Trainer</span>
                <span>Gallery</span>
                <span>Shop</span>
                <span>Payment</span>
                <span>Contact</span>
            </div>
        </div>
    </nav>
</body>
</html>
