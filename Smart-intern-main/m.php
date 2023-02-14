<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signin.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
<link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/logo1.png" rel="apple-touch-icon">
<title>Student-profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="profile.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="header">
    
    <h2 style="color: whitesmoke;">Student Profile</h2>
    
  </div>


  <div class="row">
    <div class="column side">
      <!-- <h2>Side</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p> -->
<br/><br/>


      <div>
       
        <input type="checkbox" name="open" id="open" >
        
        <label for="open" class="open" style="border-radius: 10px;">
        
           <i  style="border-radius: 10px; border:3px solid blue;"> <span style="font-size:20px;"> Click me</span></i>
        </label>
      
    
        <div class="menu">
            <div class="logo">
                <a href="#">
                </a>
            </div>
          <ul>
              <li>
                  <a href="index.php">
                      <span><i class="fas fa-home"></i></span>
                      Home
                  </a>
              </li>
              <li>
                  <a href="courses.php">
                      <span><i class="fas fa-address-card"></i></span>
                      Courses
                  </a>
              </li>
              <li>
                  <a href="about.php">
                      <span><i class="fas fa-cog"></i></span>
                      About us
                  </a>
              </li>
              <li>
                  <a href="contact.php">
                      <span><i class="fas fa-address-book"></i></span>
                      Contact us
                  </a>
              </li>
              <li>
                  <a href="logout.php" style="color: red;">
                      <span><i class="fas fa-comments-alt-dollar"></i></span>
                      Logout
                  </a>
              </li>
          </ul>
        </div>
      </div>
      <!-- class="alert alert-success" role="alert" -->
    </div>

    <div >
  <h4>Active user :<a style="color: green;">🟢</a><?php echo $_SESSION['username'] ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <a href="logout.php" style="background:black;padding:2px;border-radius:2px;border: 1px solid blue;color:blanchedalmond">Logout</a>

  </h4>
  <p>Hello <?php echo $_SESSION['username'] ?>! Now you are logged in. 

</p>
  <hr style="color: blue;"/>
</div>


    <div class="column middle">
   <div class="card"> 
        <img src="assets/img/profile.png" alt="loading..." style="width:100%">
        <h1><?php echo $_SESSION['username'] ?></h1>
        <p class="title">From CSE Branch</p>
        <p>IIIT Nagpur</p>
        
      </div>


      
          <div class="personal">
         
   
  
   <?php
// if(isset($_POST['submit'])){
//     $address=array($_POST["name"],$_POST["namelast"],$_POST["branch"],$_POST["date"],$_POST["myText"], $_POST["email"],$_POST["phone"],$_POST["contact"],$_POST["gender"]);
//  } 


// session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: signin.php");
//     exit;
// }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_intern3";

$conn = mysqli_connect($servername, $username,$password, $dbname);

if(!$conn)
   die("connection is failed : ". mysqli_connect_error() );
   else {
       echo "connected successfully <br>";
   }
  $usn=$_SESSION['username'];
  echo $usn;
   $sql="SELECT * FROM mytab1 WHERE username='$usn' ";
   $result = $conn->query($sql);  //running query after selecting all containt from content_form

   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
       $address=array( $row["full_name"],$row["email"],$row["phone_number"],$row["region"],$row["searching_for"],$row["preferred_domain"],$row["pincode"],$row["gender"]);
    
   
    echo "<span style='height:3rem  '><p style='color:black;background-color:#ddd; font-weight: bolder; font-size: 1.4rem; font-family: system-ui;  margin-left: 0rem; padding: 0.5rem;'>full name : $address[0]</p></span>";
    echo "<span style='height:3rem  '><p style='color:black; font-weight: bolder; font-size: 1.4rem; font-family: system-ui;  margin-left: 0rem; padding: 0.5rem;'>Email : $address[1]</p></span>";
    echo "<span style='height:3rem  '><p style='color:black;background-color:#ddd; font-weight: bolder; font-size: 1.4rem; font-family: system-ui;  margin-left: 0rem;padding: 0.5rem; '>Phone number : $address[2]</p></span>";
    echo "<span style='height:3rem  '><p style='color:black; font-weight: bolder; font-size: 1.4rem; font-family: system-ui;  margin-left: 0rem; padding: 0.5rem;'>Region :$address[3]</p></span>";
    echo "<span style='height:3rem  '><p style='color:black; background-color:#ddd; font-weight: bolder; font-size: 1.4rem; font-family: system-ui;  margin-left: 0rem; padding: 0.5rem;'>Searching for : $address[4]</p></span>";
    echo "<span style='height:3rem  '><p  style='color:black; font-weight: bolder; font-size: 1.4rem; margin-left: 0rem; padding: 0.5rem;'>Preferred domain : $address[5]</p></span>";
    echo "<span style='height:3rem  '><p  style='color:black; background-color:#ddd;font-weight: bolder; font-size: 1.4rem;  margin-left: 0rem; padding: 0.5rem;'>Pincode : $address[6]</p></span>";
    echo "<span style='height:3rem  '><p  style='color:black; font-weight: bolder; font-size: 1.4rem;  margin-left: 0rem; padding: 0.5rem;'>gender : $address[7]</p></span>";
    // echo "<p  style='color:black; font-size: 17px;  margin-left: 10rem;'>Gender : $address[8]</p>";

    
  




    }
  } else {
    echo "0 results";
  }
  $conn->close();
 ?>

          </div>
      
      


<!-- get in touch -->


  </div>

  

</body>

</html>
