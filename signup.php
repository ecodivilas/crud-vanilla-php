<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "school_directory";

        // Create connection
        $conn = new mysqli($server, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }
        
        if(isset($_POST['signup_button'])) {
            // echo 'Working baboom!'; //NOSONAR
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            // echo $name; //NOSONAR

            $sql = "INSERT INTO account (email, username, pass)
                    VALUES ('$email', '$name', '$password')";

            if ($conn->query($sql) === true){
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    ?>
    <div class="container">
        <div class="modal">
            <form action="" method="post" class="form">
                <input type="text" name="name" placeholder="name">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="password" placeholder="password">
                <input type="text" name="confirmPassword" placeholder="Confirm Password">
                <input type="submit" value="Sign Up" name="signup_button">
            </form>
        </div>
    </div>
</body>
</html>