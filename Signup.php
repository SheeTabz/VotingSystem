<?php


    //connecting to the database
    // $dbconnect = mysqli_connect(server, username, password, database);
    $dbconnect = mysqli_connect('localhost', 'Brenda', 'vote@2022', 'voting');

    //check whether database connection is successful.
    if (!$dbconnect){
        echo "Database failed to connect ".mysqli_connect_error();
    }


    if(isset($_POST['save'])){    //if the button save is clicked do the following
    //Here we pass the name of the input button to the global variable _POST[] and picking data from form.
        
    #Creating variables to hold the form data
        $firstname = $surname = $email = $password = '';
        $phonenumber = 0;
        $firstname = $_POST['fname'];
        $surname = $_POST['lname'];
        $phonenumber = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $error = array('fname'=> '', 'lname' => '', 'phone' => '', 'email' => '', 'password'=> '', 'general' => '');

        $success = '';
    // echo ("<p style = 'color:white;'>$firstname $surname $phonenumber $email $password");

    //validating data
    //1.check if any data is missing
    if(empty($firstname)){
       $error['fname'] = "<p style = 'color: red;'> Please enter first name<p/>";
    }
    else{
        //2. htmlspecialchars is used to treat any tags just like any word to prevent cross site scripting attack from occuring in your site
        $firstname= htmlspecialchars($firstname);
        //check if there are special chars used on the name
        if(!preg_match('/^[a-z]+$/i', $firstname)){
            $error['fname'] = "<p style = 'color: red;'> Please use letter a-z on your first name!<p/>";
        }
    }
    if(empty($surname)){
        $error['lname'] = "<p style = 'color: red;'> Please enter last name!<p/>";
    }
    else{
        $surname= htmlspecialchars($surname);
        if(!preg_match('/^[a-z]+$/i', $surname)){
            $error['lname'] = "<p style = 'color: red;'> Please use letter a-z on your last name!<p/>";
            }
    }
    if(empty($phonenumber)){
        $error['phone'] = "<p style = 'color: red;'> Please enter phone number!<p/>";
    }
    else{
        $phonenumber = htmlspecialchars($phonenumber);
        
        if(strlen($phonenumber) != 10){
            $error['phone'] = "<p style = 'color: red;'> Phone number must have 10 digits only!<p/>";
        }
    }
    if(empty($email)){
        $error['email'] = "<p style = 'color: red;'> Please enter your email!<p/>";
    }
    else{
        $email = htmlspecialchars($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "<p style = 'color: red;'>Invalid email address ($email)</p>";
        }
    }
    if(empty($password)){
        $error['password'] = "<p style = 'color: red;'> Please enter your password!<p/>";
    }
    else{
        $password = htmlspecialchars($password);
        if (strlen($password) < 8) {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
            $error['password'] = "<p style = 'color: red;'> ($passwordErr)</p>";
        }
            if(!preg_match("#[0-9]+#",$password)) {
                $passwordErr = "Your Password Must Contain At Least 1 Number!";
                $error['password'] = "<p style = 'color: red;'> ($passwordErr)</p>";
            }
                if(!preg_match("#[A-Z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                    $error['password'] = "<p style = 'color: red;'> ($passwordErr)</p>";
                }
                    if(!preg_match("#[a-z]+#",$password)) {
                        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                        $error['password'] = "<p style = 'color: red;'> ($passwordErr)</p>";
                    }
        $password = crypt("password", "2020");
                   
    if(array_filter($error)) {
        $error['general'] = "<p style = 'color: red;'>Please sort the above errors you can proceed</p>";
    }
    else{
        $sql = "INSERT INTO user(firstname, othernames, phone_number, email, password)
        VALUES('$firstname', '$surname', $phonenumber, '$email', '$password')";

        if ($dbconnect->query($sql)===TRUE){
            $success = "<p style = 'color: green;'>Successful Sign up. You can now <a href='#'>login</a>.</p>";
            // echo "New record created successfully";
        }
        else{
            $error['general'] = "<p style = 'color: red;'>Error: ".$dbconnect->error."</p>";
        }
    }    
                    
    }
} 

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>
  

</head>
<body>
<!-- partial:index -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title></title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
<style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #333333;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
/* .shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
} */
.shape:nth-child(2){
    background: linear-gradient(
        to right,
        #e388de,
        #7d098f
    );
    height : 350px;
    width : 350px;
    left: -160px;
    top: -40px;
}
/* .shape:nth-child(3){
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: 30px;
    bottom: 80px; */
/* } */
.shape:last-child{
    background: linear-gradient(
        to right,
        #e34e0e,
        #f7902f
    );
    right: -100px;
    bottom: -80px;
}
form{
    height: 100%;
    width: 400px;
    margin-top: 100px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    overflow: auto;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form::-webkit-scrollbar {
    display: none;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
.button{
    margin-top: 50px;
    width: 100%;
    background-color: #359ff0;
    color: black;
    padding:  0;
    font-size: 24px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;}
.radio {
  display: inline-flex;
  align-items: center;
}
.radio-input{
    margin: 0 0.5rem 0;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
input[type=radio] {
    border: 0px;
    width: 100%;
    height: 2em;
}

</style>
   
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>

    </div>
    <form action = "signup.php" method = "post" id = "register">
        <h3>Sign Up</h3>
    
<!-- $error = array('fname'=> 'lname' => 'phone' => 'email' => 'password') -->
        <label for="firstname">First name</label>
        <!-- persist data on the formusing Value attribute -->
        <input type="text" placeholder="John" id="fname" name = "fname" value = "<?php if (isset($firstname)) {echo $firstname;}?>" required>
        <?php 
        if (isset($error['fname'])) {
            echo $error['fname'];
            }
        ?>
        <div id = "fnameerror"></div>
        <label for="lastname">Last name</label>
        <input type="text" placeholder="Doe" id="lname" name = "lname" value = "<?php if (isset($surname)) {echo $surname;}?>" required>
        <?php 
        if (isset($error['lname'])) {
            echo $error['lname'];
            }
        ?>
        <label for="phone">Phone Number</label>
        <input type="number" name = "phone" placeholder="+254*******" id="phone" value = "<?php if (isset($phonenumber)) {echo $phonenumber;}?>" required>
        <?php 
        if (isset($error['phone'])) {
            echo $error['phone'];
            }
        ?>
        <label for="email">Email Address</label>
        <input type="email" name = "email" placeholder="essy@youtrack.com" id="email" value = "<?php if (isset($email)) {echo $email;}?>" required>
        <?php 
        if (isset($error['email'])) {
            echo $error['email'];
            }
        ?>
        <label for="password">Password</label>
        <input type="password" id="password" name = "password" value = "<?php if (isset($password)) {echo $password;}?>" required>
        <?php 
        if (isset($error['password'])) {
            echo $error['password'];
            }
        ?>
        <?php 
        if (isset($error['general'])) {
            echo $error['general'];
            }
        ?>
        <?php 
        if (isset($success)) {
            echo $success;
            }
        ?>
        

        <label for="policy">Agree to our Privacy Policy:</label>
        <label class = "radio"><input type="radio" name="policy" id="yes" class="radio-input"onclick="show1();" required>Yes</label>
        <label class = "radio"><input type="radio" name="policy" id="no" class="radio-input" onclick="show2();" required>No</label> 

    <div class = "button" id = "button">
        <input type="submit" id="save" name ="save" value = "Sign Up">
    </div>

    <div class="social">
        <div class="go"><i class="fab fa-google"></i>  Google</div>
        <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
    </div>


    </form>
<script>
    function show1(){
        document.getElementById('button').style.display = 'block';
    }
    function show2(){
        document.getElementById('button').style.display ='none';
    }
    
</script>



</body>
</html>
<!-- partial -->
  
</body>
</html>
