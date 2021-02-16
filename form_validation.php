<?php
$nameError = "";
$EmailError = "";
$genderError = "";
$WebsiteError = "";
if(isset($_POST['submit']))
{
if(empty($_POST['username']))
{
    $nameError = "this field is mandatory";
}
else{
    $name = test_user_input($_POST['username']);
    if(!preg_match("/^[A-Za-z ,.'-]*$/",$name))
    {
        $nameError = " only latters and white space are allowed";
    }
}
if(empty($_POST["Email"]))
{
    $EmailError = "this field is mandatory";
}
else{
    $Email = test_user_input($_POST['Email']);
    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$Email))
    {
        $EmailError = "invalid email id";
    }
}
if(empty($_POST['gender']))
{
    $genderError = "this field is mandatory";
}
else{
    $gender= test_user_input($_POST['gender']);
}

if(empty($_POST['website']))
{
    $WebsiteError = "this field is mandatory";
}
else{
    $website= test_user_input($_POST['website']);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
    {
        $WebsiteError = " invalid address formate";
    }
   
}
if(!empty($_POST["username"])&& !empty($_POST["Email"])&& !empty($_POST["gender"])&& !empty($_POST["website"]))
{
    if((preg_match("/^[A-Za-z ,.'-]*$/",$name)==true)&&(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$Email)==true)&&
(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)==true))

{

    echo "<h2>Your Submit Information</h2>";
echo "Name:".ucwords($_POST["username"])."<br>"; 

echo "E-mail:{$_POST["Email"]} <br>"; 
echo "Gender:{$_POST["gender"]}<br>";
echo "Website:{$_POST["website"]} <br>";
echo "Comment:{$_POST["comment"]} <br>"; 
}
else{
    echo "<span class='Error'>please complete form with a valid details:";

}
}
}

function test_user_input($data)
{
     return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_Validation</title>
    <style>
input[type = "text"],input[type = "email"],textarea

    {
        width: 600px;
        border-radius: 1px solid dashed;
        font-size: 1.0em;
    padding: .5em;
    background-color: rgb(221, 216, 212);
    }
    .Error
    {
        color: red;
    }
    </style>
</head>
<body>
  <h2>form validation with php</h2>  
  <form action="form_validation.php" method="post">
  <legend>*Please Fill out the following fields</legend>
  <fieldset style="width: 550px;">
  Full Name *:<br>
  <input type="text" id="" name="username" placeholder="Mandatory field">&nbsp;&nbsp;&nbsp;<span class="Error"><?php echo $nameError;?></span> <br>
 E-Mail *:<br>
  <input type="text"  id="" name="Email" placeholder="Mandatory field">&nbsp;&nbsp;&nbsp; <span class="Error"><?php echo $EmailError;?></span><br>
  Gender *:<br>
  <input type="radio"  id="" name="gender" value="Male" placeholder="Mandatory field">
  <label for="male">Male</label>
   <input type="radio"  id="" name="gender" value="Female">
   <label for="male">Female</label><br>
   &nbsp;&nbsp;&nbsp;<span class="Error"> <?php echo $genderError;?></span>  <br>
  Website *:<br>
  <input type="text" id="" name="website" placeholder="Mandatory field"><br>&nbsp;&nbsp;&nbsp; <span class="Error"><?php echo $WebsiteError;?></span><br>
  Comment:<br>
  <textarea name="comment" id="" cols="25" rows="5" style="resize:none"></textarea><br><br>
  <button type="submit" name="submit" >Submit Your information</button>
  
  </fieldset>
  
  </form>
</body>
</html>