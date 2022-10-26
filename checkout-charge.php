<?php
    include "config.php";
    include "connection.php";
 
    session_start();
    if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    } else {
    $email = "";
    }
    
    $res=mysqli_query($conn,"select id, sum(price) as total_price, event from reservation where email = '$email' and payment != 'paid'");
	$row=mysqli_fetch_array($res);

    $result = mysqli_query($conn,"SELECT * FROM registration WHERE email='$email'");
    $resultCheck = mysqli_fetch_array($result);

    $token = $_POST["stripeToken"];
    $contact_name = $resultCheck['firstname'];
    $token_card_type = $_POST["stripeTokenType"];
    $email = $resultCheck["email"];
    $amount = $row['total_price'];
    $desc = $row['event'];
    $id = $row["id"];
    $charge = \Stripe\Charge::create([
        'amount'=>str_replace(",","",$amount) * 100,
        'description'=>$desc,
        'currency'=>'php',
        'source'=>$token,
    ]);
    if($charge){
        header("Location:success.php?amount=$amount&id=$id");
    }





?>