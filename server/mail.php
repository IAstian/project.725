<?php
    //Get form data
    
    //check for submit
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $headers = "MIME-Version: 1.0" ."\r\n";
    $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " .$name. "<".$email.">". "\r\n";
    $toEmail = $_POST['recepient'];
    $subject = $_POST['subject'];
    $body = ' <div style="background: #fff; padding: 2px 1px;">
    
        <h1 style="background: #fff; padding: 20px;">you have received an email from <br> '.$name.'</h1>
        <h2 style="color: black;">'.$email.'</h2>
        <h3 style="color: black;">Message :</h3> <br>
        <p style="color: black;"> '.$message.' </p>
        
        </div>
    ';
        if(empty($name) && empty($email) && empty($message)){
        
            return false;
        }else{
            return true;
        }
        if(filter_var($email , FILTER_VALIDATE_EMAIL) === true){
            return true;
        }
     $action = mail($toEmail , $subject , $body ,$headers);
     if($action){
         echo 'Sent';
     }else{
         echo 'Not sent,[Server could not complete request]';
     }
    
    
 
    
?>