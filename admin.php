<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
</head>
<body>
    <div>
    <img src="plmun.jpg" alt="Admin's Picture">


    
    </div>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbplmun_evote";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acctid = $_POST['AcctId'];
}
$query = "SELECT * from tbladmin";
$result = mysqli_query($conn, $query);


if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>email</th>
            <th>Pass</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>". $row["AcctId"]. "</td>
            <td>". $row["email"]. "</td>
            <td>". $row["password"]. "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>     
</body>
</html>

