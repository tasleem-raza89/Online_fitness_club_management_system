<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            height: 100vh;
            padding: 15px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }
        .sidebar a:hover {
            background-color: #555;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!--sidebar-->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <div class="header">
            <h1>Dashboard</h1>
        </div>
        <div>
            <h2>
                <?php 
                    //logic
                    session_start();
                    echo "Welcome,". $_SESSION["username"] . "!" ;
                ?>
            </h2>
            <p>This is your admin dashboard. Here, you can manage users, view settings, and more.</p>
        </div>
    </div>
</body>
</html>
