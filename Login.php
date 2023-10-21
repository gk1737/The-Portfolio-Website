
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,400;1,700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./style.css">
    <style>
    
    .box{
        width: 70%;
        height: 80%;
        top:25%;
        left:25%;
         margin:auto;
        text-align: center;
    }
    
    .box legend{
        color:aliceblue
    }
    .box fieldset{
        margin: auto;
        color: #e7d7e6;
        background: rgba(0,0,0,0.4);
    }
    .box input[type="text"],.box input[type="email"],.box input[type="password"]{
border:0;
background:none;
display:block;
margin: 5px auto;
text-align: center;
border: 3px solid #0367fd;
padding: 7px 5px;
width:200px;
height:30px;
outline:none;
color:white;
border-radius:20px;
transition:0.25px;
    }
    .box input[type="text"]:focus,.box input[type="email"]:focus,.box input[type="password"]:focus
{
width:250px;
border-color:#ffc400ec;
}
.box input[type="submit"]{
border:0;
background:none;
display:block;
margin: 5px auto;
text-align: center;
border: 3px solid #0367fd;
padding: 7px 5px;
width:75px;
outline:none;
color:white;
border-radius:24px;
transition:0.25px;
    }
.box input[type="submit"]:hover{
    background-color: #e7d7e6;
    color:black;
}


</style>
</head>
<body>
    <div class="bodyContainer">
        <div class="headerContainer">
        <div class="navbar">
            <div class="menu">
                <li><a href="./index.html">HOME</a></li>
                <li><a href="./aboutUs.html">ABOUT US</a></li>
                <li><a href="./Project.html">PROJECTS</a></li>
                <li><a href="./contactUs.html">CONTACT US</a></li>
            </div>
            <div class="logReg">
                <li><a href="./Login.php">LOG IN</a></li>
                <li><a href="./registration.php">SIGN UP</a></li>
            </div>
        </div>
        <div class="heading">
            <h1>THE PORTFOLIO WEBSITE</h1>
        </div>
    </div>
    <div class="mainContainer">

    <div class="container">

    <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="registration.php" method="post" class="box">
            <fieldset>
                <legend>Login Form</legend>
           
           
                <input type="email" class="form-control" name="email" placeholder="Email:">
            
                <input type="password" class="form-control" name="password" placeholder="Password:">
            
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
                <br>
                <div>
        <div><p>If not registered yet <a href="./registration.php">Register Here</a></p></div>
      </div>
            </fieldset>
        </form>
        
    </div>
     
</div>
</div> 
</body>
</html>