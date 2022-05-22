<?php
 $servername = "localhost";
$username = "root";
$password = " ";
$dbname = "logapp";

try{
    $conn = new PDO ("mysql:host= $servername; 
        dbname=$dbname", $username, $password);


$conn->setAttribute(PDO::ATTR_ERRMODE. PDO::
ERRMODE_EXCEPTION);

//login
//define variables and assign 0

$name = $password = $nameErr =$passwordErr = $error = "";

// now validate the form inputs

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if username is empty 
    if (empty(test_input($_POST["name"]))){
        $nameErr = "Enter Username";}
    }  else{
        $name = test_input($_POST["name"]);
    }

    if (empty(test_input($_POST["password"])))  {
        $passwordErr = "Enter Password";
    }else{
        $password = test_input($_POST["password"]);
    } 
}

//validate login coordinates
if (empty($nameErr)&&empty($password)) {
    $stmt = $conn->query("SELECT id FROM 'user
        WHERE name = '$name'and password = '$passwor';");

    if ($stmt->execute()) {
        if ($stmt->rowcount()==1) {
            session_start();
            $_SESSION["name"] = $name;
            header("location:welcome.php");
        } else {
            $error = "username and password didn't match";
        }
    }
}
{
catch(PDOException $e)
{
    echo "Error: ".$e->getMessage();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> User login </title>
</head>
<body align = "center">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method ="post">
        <h1>User Login </h1>
        username: <input type="text" name="name">
        <br><br>
        Password: <input type="password" name="password">
        <br> <br>

        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>