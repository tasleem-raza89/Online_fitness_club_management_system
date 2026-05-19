<?php
session_start();
?>

<section class="hero">
    <div class="hero-content">
        <h1>Elevate Your Fitness Journey</h1>
        <p>Join us and transform your body with expert training and nutrition.</p>

        <?php if (isset($_SESSION['user_id'])) { ?>
            <button class="cta-btn" onclick="window.location.href='dashboard.php'">Go to Dashboard</button>
        <?php } else { ?>
            <button class="cta-btn" onclick="window.location.href='login.php'">Get Started</button>
        <?php } ?>
    </div>
</section>
