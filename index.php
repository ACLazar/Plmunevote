<!DOCTYPE html>
<html>
<head>
    <title>PLMun EVote: Your Voice, Your Choice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="center">
    <br>
    <img src="plmun.jpg" alt="PLMun Evote" class="image">
    <h1>PLMun Evote</h1>
    <form method="post">
    <br><input type="text" placeholder="Enter Email" name="email" required><br>
    <br><input type="password" id="myInput" placeholder="Enter Password" name="password" required><br>
    <input type="checkbox" onclick="myFunction()">Show Password
    <br><br>
    <input type="submit" value="Login">
    </form>
</div>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbplmun_evote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "select * from tbladmin limit 1" ;
            $result = mysqli_query($conn, $query);

            if ($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password && $user_data['email'] === $email)
                    {
                        header("Location: admin.php");
                        die;
                    }
                    else if ($user_data['password'] !== $password && $user_data['email'] === $email)
                    { 
                        echo "Your Password Is Incorrect!";
                    }
                    else if ($user_data['email'] !== $email && $user_data['password'] === $password)
                    {
                        echo "Your Email Is Incorrect";
                    }
                    else if($user_data['email'] !== $email && $user_data['password'] !== $password)
                    {
                        echo "Your Email And Password Is Incorrect";
                    }
                }
            }
           
        }
    }
    

    $conn -> close();

?>