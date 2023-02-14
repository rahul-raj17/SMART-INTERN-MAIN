<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $user= $_POST["usern"];
    $pass = $_POST["passd"];
    $w_ho = $_POST["stdent"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    if($w_ho=='student')  
    $dbname = "smart_intern3";
    else
    $dbname="signup_organisation";
    
    $conn = mysqli_connect($servername, $username,$password, $dbname);
    
    if(!$conn)
       die("connection is failed : ". mysqli_connect_error() );
    
    //    $hash = $password_hash($pass);
    echo $w_ho;
    
    $sql = "select * from mytab1 WHERE username='$user' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
   // echo "pass".$pass;
   // echo $num;
    // echo $sql['password'];
    if ($num == 1){
         while($row=mysqli_fetch_assoc($result)){
            echo $row['password'];
          //  echo $num;
          //echo password_verify($pass, $row['password']);
             if (password_verify($pass,$row['password'])){ 
                echo $num;
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                
                if($w_ho=='student')
                header("location: profile.php");
                else
                header("location: company_profie.php");
               // header("location: profile.php");

            } 

            
    else{
        $showError = true;
        echo "wrong password";
     
    }
}
    }
    else
    {
        $showError=true;
    }
} 
    
?>
 <?php
 
     
    if($showError){
        echo "<p><h1 style='color:white; font-size: 17px; font-family: system-ui;  margin-left: 10rem; '>Invalid credential</h1></p>";
    }
    ?>
    </body>
    </html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student's and Staff's Login </title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="student()">Student</button>
                <button type="button" class="toggle-btn" onclick="staff()">Admin</button>
            </div>
            <div class="social-icons">
                <a href="https://moodle.iiitn.ac.in/"><img href="" src="linkedin.png" alt=""></a>
                <a href="https://mail.google.com/mail/u/0/#inbox"><img src="google.png" alt=""></a>
                <a href="https://slack.com/intl/en-in/"><img src="slack.png" alt=""></a>
            </div>
            <form id="student" action="signin.php" class="input-group" method="POST">
                <input type="text" name="usern" class="input-field" placeholder="Student User Id" required>
                <input type="password" name="passd" class="input-field" placeholder="Enter Password" required>
                <input type="text" name="stdent" value="student" hidden placeholder="Enter Branch Name" required class="text-name"> 

                <input type="checkbox" class="check-box"><span>&nbsp;I agree to the terms & conditions <a href="tp.php">Sign-up here</a></span>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <form id="staff" action="signin.php" class="input-group" method="POST">
                <input type="text" name="usern" class="input-field" placeholder="Administration User Id" required>
                <input type="password" name="passd" class="input-field" placeholder="Enter Password" required>
                <input type="text" name="stdent" value="admin" hidden placeholder="Enter Branch Name" required class="text-name"> 

                <input type="checkbox" class="check-box"><span>&nbsp; I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Login</button>
            </form>
        </div>
        
    </div>
     <script>
         var x = document.getElementById("student");
         var y = document.getElementById("staff");
         var z = document.getElementById("btn");
         function staff(){
             x.style.left = "-400px";
             y.style.left = "50px";
             z.style.left = "110px";
         }
         function student(){
             x.style.left = "50px";
             y.style.left = "450px";
             z.style.left = "0";
         }

     </script>
    
</body>
</html>