<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
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
        
        if(isset($_POST['login_button'])) {
            // echo 'Working baboom!'; //NOSONAR
            $_SESSION['validate'] = false;
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM account WHERE email='$email' AND pass='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $rowCount = mysqli_num_rows($result);
            echo $row['email'];
            if($rowCount > 0){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['validate'] = true;
                echo 'you have logged in successfully';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        }
    ?>
    <div class="container">
        <div class="modal">
            <form action="" method="post" class="form">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="password" placeholder="password">
                <input type="submit" value="Login" name="login_button">
            </form>
        </div>
    </div>
</body>
</html>
