<?php  
    include_once "connection.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email = $_POST["email"];
        $old_password = $_POST["old_pass"];
        $confirm_password = $_POST["confirm_pass"];
        $username = $_POST["username"];

        if($old_password == $confirm_password){
             //sql operation //working in progress
            $query="Select * from user where username ='$username'";
            $result = mysqli_query($conn,$query);

            //checking username already exists
            if($result && $row=mysqli_fetch_assoc($result)){
                exit("Username already exists! try again!");
            }
            else{
                $query="Select * from user where email ='$email'";
                $result = mysqli_query($conn,$query);

                //checking email already exists
                if($result && $row=mysqli_fetch_assoc($result)){
                    exit("Email already exists! Use diffrent One");
                }
                else{
                    //inserting user record!
                    $query="INSERT INTO `fitness_club`.`users` (
                    `email` ,
                    `password` ,
                    `username` ,
                    `user_id`
                    )
                    VALUES (
                    '$email', '$confirm_password', '$username', NULL
                    )";
                    $result = mysqli_query($conn,$query);
                    echo "records entered Please Log in!";
                }
            }
        }
        else{
            exit("password and confirm password are not matched!");
        }
    }
?>