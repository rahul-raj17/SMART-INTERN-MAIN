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
    $dbname = "bt20cse205";
    
    $conn = mysqli_connect($servername, $username,$password, $dbname);
    
    if(!$conn)
       die("connection is failed : ". mysqli_connect_error() );
       else {
           echo "connected successfully <br>";
       }
    //    $hash = $password_hash($pass);

    $sql = "select * from bt20cse93_data WHERE user_name='$user' and teach_std='$w_ho' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    echo "hello".$num;
    
    if ($num == 1){
         while($row=mysqli_fetch_assoc($result)){
             if (password_verify($pass, $row['password'])){ 
                
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                header("location: student_profile.php");
            } 
            
    else{
        $showError = "Invalid Credentials2";
    }
}
    }
} 
    
?>