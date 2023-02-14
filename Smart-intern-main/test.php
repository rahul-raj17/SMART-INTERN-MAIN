<?php
        $showAlert=false;
        $showError=false;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $fullname=$_POST['organisation'];
    $user=$_POST['username'];
    $Email=$_POST['email'];
    $phone_number= $_POST['phone'];
    $pass= $_POST['pass'];
    $rpass = $_POST['rpass'];
   $domain=$_POST['intrest'];
   $address=$_POST['address'];
    $Pincode=$_POST['pincode'];
    $select_your_region=$_POST['country-state'];
    $hiring=$_POST['i1'];
    $qualification=$_POST['gender'];
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "a1";
    
    $conn = mysqli_connect($servername, $username,$password);
    if(!$conn)
       die("connection is failed : ". mysqli_connect_error() );
       else {
           echo "connected successfully <br>";
       }
    
      

       $sql= "CREATE DATABASE IF NOT EXISTS signup_organisation";//database name: bt20cse167
       $result=mysqli_query($conn,$sql);
       $database="signup_organisation";
$conn=mysqli_connect($servername,$username,$password,$database);


    //    $sql="CREATE TABLE `bt20cse205`.`bt20cse93_data` ( `sno` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(20) NOT NULL ,  
    //     `password` VARCHAR(15) NOT NULL ,  `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`sno`)) ENGINE = InnoDB";

$result=mysqli_query($conn,$sql);
   

// $sql=   "CREATE TABLE IF NOT EXISTS  `bt20cse205`.`bt20cse93_data` ( `S. NO` INT(100) NOT NULL AUTO_INCREMENT ,  `First_name` VARCHAR(11) NOT NULL ,  `Last_name` VARCHAR(11) NOT NULL ,
//         `Branch` VARCHAR(11) NOT NULL ,  `Date_of_admission` DATE NOT NULL ,  `Address` VARCHAR(100) NOT NULL ,  `Email` VARCHAR(20) NOT NULL ,
//           `user_name` VARCHAR(11) NOT NULL ,  `password` VARCHAR(255) NOT NULL ,  `r_password` VARCHAR(255) NOT NULL ,  `student_contact` INT(10) NOT NULL ,  `gender` VARCHAR(11) NOT NULL ,  `interest1` TEXT NOT NULL , 
//            `interest2` TEXT NOT NULL ,  `teach_std` VARCHAR(20) NOT NULL ,    PRIMARY KEY  (`S. NO`),
//                UNIQUE  `8` (`user_name`)) ENGINE = InnoDB";
  

  // $sql=   "CREATE TABLE IF NOT EXISTS  `smart_intern1`.`intern_table` ( `S. NO` INT(255) NOT NULL AUTO_INCREMENT , 
  // `full_name` VARCHAR(11) NOT NULL , `username` VARCHAR(11) NOT NULL , `email` VARCHAR(11) NOT NULL , `phone_number` INT(10) NOT NULL , 
  // `password` INT(10) NOT NULL , `rpassword` INT(10) NOT NULL , `pincode` INT(8) NOT NULL , `select_region` VARCHAR(10) NOT NULL , `gender` VARCHAR(10) NOT NULL , 
  // `searching_for` VARCHAR(10) NOT NULL , `preferred_domain` VARCHAR(10) NOT NULL , `x_board` VARCHAR(10) NOT NULL , `x_percentage` DOUBLE(10) NOT NULL , 
  // `xyearof_passing` (10) NOT NULL , `xii_board` text(10) NOT NULL , `xii_percentage` text(10) NOT NULL , `xii_year_of_passing` text(4) NOT NULL , 
  // `graduation_board` text(10) NOT NULL , `graduation_percentage` text(10) NOT NULL , `graduation_year_of_passing` 
  // text(4) NOT NULL , `masters_board` text(10) NOT NULL , `masters_percentage` text(10) NOT NULL , 
  // `masters_year_of_passing` text(4) NOT NULL , `year` INT NOT NULL , PRIMARY KEY (`S. NO`)) ENGINE = InnoDB";

 // CREATE TABLE `smart_intern`.`smart_table` ( `S. NO` INT(255) NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(11) NOT NULL , `username` VARCHAR(11) NOT NULL , `email` VARCHAR(11) NOT NULL , `phone_number` INT(10) NOT NULL , `password` INT(10) NOT NULL , `rpassword` INT(10) NOT NULL , `pincode` INT(8) NOT NULL , `select_region` VARCHAR(10) NOT NULL , `gender` VARCHAR(10) NOT NULL , `searching_for` VARCHAR(10) NOT NULL , `preferred_domain` VARCHAR(10) NOT NULL , `x_board` VARCHAR(10) NOT NULL , `x_percentage` DOUBLE(10) NOT NULL , `x_year_of_passing` INT(10) NOT NULL , `xii_board` VARCHAR(10) NOT NULL , `xii_percentage` DOUBLE(10) NOT NULL , `xii_year_of_passing` INT(4) NOT NULL , `graduation_board` VARCHAR(10) NOT NULL , `graduation_percentage` DOUBLE(10) NOT NULL , `graduation_year_of_passing` INT(4) NOT NULL , `masters_board` VARCHAR(10) NOT NULL , `masters_percentage` DOUBLE(10) NOT NULL , `masters_year_of_passing` INT(4) NOT NULL , `year` INT NOT NULL , PRIMARY KEY (`S. NO`)) ENGINE = InnoDB;
 $sql=   "CREATE TABLE IF NOT EXISTS  `signup_organisation`.`mytab1` ( `organisation_name` VARCHAR(10) NOT NULL ,  `username` VARCHAR(10) NOT NULL ,  `email` VARCHAR(30) NOT NULL ,  `phone_number` INT(10) NOT NULL , 
  `password` VARCHAR(255) NOT NULL ,  `r_password` VARCHAR(255) NOT NULL , `domain` VARCHAR(10) NOT NULL,  `pincode` INT(8) NOT NULL ,  `region` VARCHAR(10) NOT NULL , 
   `qualification` VARCHAR(10) NOT NULL ,  `hiring_for` VARCHAR(10) NOT NULL, `address` VARCHAR(40) NOT NULL
  
 
) ENGINE = InnoDB";


  $result=mysqli_query($conn,$sql);



    
       
       $existSql = "SELECT * FROM `mytab1` WHERE username='$user' ";
      $result = mysqli_query($conn,$existSql);

       $numExistRows = mysqli_num_rows($result);
       echo $numExistRows;
       
       if($numExistRows>0){
           $showError = "Username Already Exists";
       }
       else
       {
       if(($pass == $rpass) )
       {
           $hash=password_hash($pass, PASSWORD_DEFAULT);
  //  $sql="INSERT INTO mytab1 ( full_name, username, email, phone_number, pass, pincode,gender,searching_for,
  //  preffered_domain,select_your_region,board_x,percentage_x,year_of_passing_x,board_xii,percentage_xii,year_of_passing_xii,board_graduation,percentage_graduation,year_of_passing_graduation,masters_board,masters_percentage,masters_year)
  //    VALUES ( '$fullname', '$username', '$Email', '$phone_number', '$hash', ,'$Pincode','$Gender','$searching_for',
  //    '$preferred_domain', '$select_your_region','$ClassX_Board','$ClassX_Percentage','$ClassX_YrOfPassing',' $ClassXII_Board','$ClassXII_Percentage',
  //    '$ClassXII_YrOfPassing','$Graduation_Board','$Graduation_Percentage','$Graduation_YrOfPassing'
  //   )";   

 

    // $sql="INSERT INTO `mytab1` (`full_name`, `username`, `email`, `phone_number`, `password`, `r_password`, `pincode`, `region`, `gender`, `searching_for`, `preferred_domain`, `board_x`, `percentage_x`, 
    // `year_of_passing_x`, `board_xii`, `percentage_xii`, `year_of_passing_xii`, `graduation_board`, 
    // `percentage_graduatio`, `graduation_year_of_passing`, `masters_board`, `masters_percentage`, `masters_year_of_passing`) VALUES ('$fullname', '$user', '$Email', '$phone_number', '$hash', '$hash', '$Pincode', '$select_your_region', '$Gender', '$searching_for', '$preferred_domain',
    //  '$ClassX_Board', '$ClassX_Percentage', '$ClassX_YrOfPassing', '$ClassXII_Board', '$ClassXII_Percentage', '$ClassXII_YrOfPassing', '$Graduation_Board', 
    //  '$Graduation_Percentage', '$Graduation_YrOfPassing', '$masters_board', '$masters_percentage', '$master_year_of_passing')
    // ";

    $sql="INSERT INTO `mytab1` ( `organisation_name` ,  `username`  ,  `email` ,  `phone_number`  , 
    `password`  ,  `r_password`  , `domain` ,  `pincode`  ,  `region`  , 
     `qualification`  ,  `hiring_for` , `address` ) VALUES ('$fullname','$user','$Email','$phone_number',
     '$hash','$hash','$domain','$Pincode','$select_your_region','$qualification','$hiring','$address')";
    
    // $sql="INSERT INTO `mytab1`(`full_name`,`username`,`email`) VALUES ('$fullname','$user','$email')
    // ";
     $result = mysqli_query($conn, $sql);  
     if($result){
         $showAlert= true;
     }
    }
     else{
         $showError = "password do not match";
     }
       }
// if($result)
// {
//    echo "The db was created successfully last_id -> " ;
// }
// else
// {
//     echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
// }

  }  ?>
    <?php
     if($showAlert){
echo "<p ><h1 style='color:white; font-size: 17px; font-family: system-ui;  margin-left: 50rem;'>You have successfully submitted the form</h1></p>";
   
    }
    if($showError){
        echo "<p ><h1 style='color:red; font-size: 25px; font-family: system-ui;  margin-left: 52rem; '>$showError</h1></p>";
    }
    ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
  
   
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
  
<body>
 <section class="my-5">
  <div class="container">
    <div class="title">New to Smart Intern ? Signup here!! </div>
    <div class="content">
      <form action="test.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Organisation Name</span>
            <input type="text" name="organisation" placeholder="Enter the name of the Organisation" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Choose your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your Company email" required>
          </div>
          <div class="input-box">
            <span class="details">Telephone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="rpass" placeholder="Confirm your password" required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Please Enter the full address " required>
          </div>
          
          <div class="input-box">
            <span class="details" >Pincode</span>
            <input type="t" name="pincode" placeholder="Enter your pincode" required>
          </div>
          <div class="input-box">
            <!--- India states -->
            <span class="details">Select Your Region</span>
<select id="country-state" name="country-state" class="">
 <option>Select State</option> -->


 <option value="Andhra Pradesh">Andhra Pradesh</option>
  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
  <option value="Assam">Assam</option>
  <option value="Bihar">Bihar</option>
  <option value="Chandigarh">Chandigarh</option>
  <option value="Chhattisgarh">Chhattisgarh</option>
  <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
  <option value="Daman and Diu">Daman and Diu</option>
  <option value="Delhi">Delhi</option>
  <option value="Goa">Goa</option>
  <option value="Gujarat">Gujarat</option>
  <option value="Haryana">Haryana</option>
  <option value="Himachal Pradesh">Himachal Pradesh</option>
  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
  <option value="Jharkhand">Jharkhand</option>
  <option value="Karnataka">Karnataka</option>
  <option value="Kerala">Kerala</option>
  <option value="Ladakh">Ladakh</option>
  <option value="Lakshadweep">Lakshadweep</option>
  <option value="Madhya Pradesh">Madhya Pradesh</option>
  <option value="Maharashtra">Maharashtra</option>
  <option value="Manipur">Manipur</option>
  <option value="Meghalaya">Meghalaya</option>
  <option value="Mizoram">Mizoram</option>
  <option value="Nagaland">Nagaland</option>
  <option value="Odisha">Odisha</option>
  <option value="Puducherry">Puducherry</option>
  <option value="Punjab">Punjab</option>
  <option value="Rajasthan">Rajasthan</option>
  <option value="Sikkim">Sikkim</option>
  <option value="Tamil Nadu">Tamil Nadu</option>
  <option value="Telangana">Telangana</option>
  <option value="Tripura">Tripura</option>
  <option value="Uttam Pradesh">Uttam Pradesh</option>
  <option value="Uttarakhand">Uttarakhand</option>
  <option value="West Bengal">West Bengal</option>
</select>
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" value="B.Tech" name="gender" id="dot-1">
          <input type="radio" value="M.Tech" name="gender" id="dot-2">
          <input type="radio" value="Any" name="gender" id="dot-3">
          <span class="gender-title">Minimum Qualification Requirement</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">B.Tech</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">M.Tech</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Any</span>
            </label>
          </div>
          

          <div class="hobby-details">
            <input type="radio" value="Job" name="i1" id="dot-7">
            <input type="radio" value="Internship" name="i1" id="dot-8">
            <input type="radio" value="Both" name="i1" id="dot-9">

            <span class="hobby-title">Hiring for</span>
            <div class="category">
              <label for="dot-7">
              <span class="dot seven"></span>
              <span class="hobby">Job</span>
            </label>
            <label for="dot-8">
              <span class="dot eight"></span>
              <span class="hobby">Internship</span>
            </label>
            <label for="dot-9">
              <span class="dot nine"></span>
              <span class="hobby">Both</span>
              </label>
              
            </div>
            <div class="hobby-details">
              <input type="radio" value="AI/ML" name="intrest" id="dot-4">
              <input type="radio" value="Web Development" name="intrest" id="dot-5">
              <input type="radio" value="Software Development" name="intrest" id="dot-6">
              <input type="radio" value="AR/VR" name="intrest" id="dot-10">


              <span class="hobby-title">Domain</span>
              <div class="category">
                <label for="dot-4">
                <span class="dot four"></span>
                <span class="gender">AI/ML</span>
              </label>
              <label for="dot-5">
                <span class="dot five"></span>
                <span class="gender">Web Developement</span>
              </label>
              <label for="dot-6">
                <span class="dot six"></span>
                <span class="gender">Software Developement</span>
                </label>
             
              <label for="dot-10">
                <span class="dot ten"></span>
                <span class="hobby">AR/VR</span>
                </label>
              </div>
            
        
        </div>
        <div class="button">
          <input type="submit" value="Post Job">
        </div>
        <div class="button">
          <input type="reset" value="Reset">
        </div>
        <div text align="center"><a href="">Already Registered ? Login here</a></div>
      </form>

    </div>
  </div>
 </section>
</body>
</html>