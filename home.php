<?php
    include_once "connection.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];


        //sql operation //working
        $query="Select * from admin where email = '$email' AND password = '$password'";
        $result = mysqli_query($conn,$query);

        //condition checking //working
        if($result && $row=mysqli_fetch_assoc($result)){

            // putting fetching email and putting username in session
            session_start();
            $_SESSION["username"] = $row["username"];
            header("location:dashboard.php");
        }
        else{
            echo "Wrong Email or password";
        }
    }
?>