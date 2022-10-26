<?php 
  include "connection.php";
  session_start();
  if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  } else {
    $email = "";
  }
  $result = mysqli_query($conn,"SELECT * FROM registration WHERE email='$email'");
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $userDB = $row['username'];
      $emailDB = $row['email'];
      $firstnameDB = $row['firstname'];
      $lastnameDB = $row['lastname'];
      $roleDB = $row['role'];
    }
  }

  $sqlCode = "SELECT count(*) as total from reservation WHERE email='$email'";
  $results = $conn->query($sqlCode);
  $data =  $results->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"> -->

<title>Inquiry</title>

<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mainAbout.css">

</head>

<body>

<!-- Navbar  -->  
<nav class="navbar navbar-expand-lg navbar-light bg-warning sticky-top ">
  <div class="container">
    <img src ="apitonglogo.png" class="img-responsive logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-a">
          <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="Packages.php">Packages</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="Inquiry.php">Inquiry</a>
    </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="About.php">About Us</a>
      </li>

      <?php if($roleDB == 'user')
      {
      ?>
      <li class="nav-item nav-a">
        <a class="nav-link" href="reservation.php">Bookings</a>
        <?php if($data['total'] > 0) 
        {
        ?>
        <span class="position-absolute top-0 start-100 ml-1 mt-1 translate-middle badge rounded-pill bg-danger">
        <?php
        echo $data['total'];
        ?>
  </span>
         <?php
        }
        ?> 
      </li>
      <li class="nav-item nav-a">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
        <li class="nav-item nav-a">
          <a class="nav-link" href="Logout.php">Log out</a>
        </li>
      <?php }
      elseif($roleDB == 'admin') {
        ?>
          <li class="nav-item nav-a">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item nav-a">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
          <li class="nav-item nav-a">
          <a class="nav-link" href="Logout.php">Log out</a>
        </li>
        <?php
      }
      else{ ?>
        

      <li class="nav-item nav-a">
        <a class="nav-link" href="loginBackEnd.php">Log in</a>
      </li>
      <?php } ?>
      
    </div>
  </div>
</nav>

<div class="container privacypolicy text-light my-5">

  <h4>APITONG'S FOOD AND CATERING SERVICES PRIVACY POLICY</h4>
  <br>
  <p>At Apitongs Food and Catering Services, we know your privacy is important. The following information outlines the types of information we collect 
  when our services are used. We take all reasonable steps to ensure that this information remains private.</p>
  <br>
  <br>
  
  <h4>PERSONAL DATA</h4>
  <br>
  <p>Apitong's Food and Catering Services collects personal information when you use its Web site. We may combine personal information collected from you with 
  information from other sources to provide a better user experience, including customizing content. Apitongs Food and Catering Services uses cookies and other 
  technologies to enhance your online experience and to learn how we can improve the quality of our services. Apitongs Food and Catering Services servers 
  automatically record information when you visit its Web site or Web services, including the URL, IP address, browser type and language, and the date and time 
  of your request.</p>
  <br>
  <br>
  
  <h4>HOW WE USE YOUR INFORMATION</h4>
  <br>
  <p>We may use personal information to provide the services you’ve requested, including services that display customized content. We may also use personal 
  information for auditing, research and analysis in order to improve our technologies and services. When we use third parties to assist us in processing your 
  personal information, we require that they comply with our Privacy Policy and other appropriate confidentiality and security measures. We may share information 
  with third parties in limited circumstances, when complying with legal process, preventing fraud or imminent harm, and ensuring the security of our network and 
  services. Apitongs Food and Catering Services Catering processes personal information on our servers in the Philippines. In general, Apitongs Food and Catering 
  Services does not share or disclose personal information with third parties and makes every reasonable effort to keep your information private except as 
  noted above.</p>
  <br>
  
  
  <h4>DISCLAIMER</h4>
  <br>
  <p>In preparation of this site, every effort has been made to offer the most current, correct and clearly expressed information possible. However, no guarantee 
  is given concerning the accuracy, timeliness or exhaustiveness of the information made available on this site. Therefore, the information contained on this site 
  is intended only to provide a general indication of our services. For definitive information of our services, please contact Apitong's Food and Catering Services directly. 
  Apitong's Food and Catering Services reserves the right to modify its site’s content at any time and without notice. Apitong's Food and Catering Services cannot be 
  held liable for the consequences of such modifications. Similarly, Apitong's Food and Catering Services reserves the right to interrupt or suspend all or some of the site’s 
  functions at any time and without notice. Apitong's Food and Catering Services cannot be held liable for any damage or virus that could damage or render unusable 
  your computer equipment following the visit to our site. The information and software at this site are protected by copyright. You may only use the information, 
  text or graphics contained on this site for your personal use and may not reproduce it, in whole or in part, for any other purpose. In order to facilitate access 
  to other sites that could furnish additional information, Apitong's Food and Catering Services has inserted a number of links on its site. However, Apitong's Food 
  and Catering Services cannot be held liable for a third party site that you access via our site. Apitong's Food and Catering Services does not have any way of 
  controlling the content of these third party sites. Regardless of the circumstances, Apitong's Food and Catering Services cannot be held liable for the unavailability of the sites, 
  the content, or for the advertising or other information available on third party sites.</p>
  
  
  </div>



<!-- Footer  -->
<div class="global">
		<div class="container">
			<div class="row ">
				<div class="col col-12 col-md-6 col-xl-6 mt-5">
          <h6>Legal</h6>
          <ul class="nav flex-column">
            <li><a href="TermsCondition.php">Terms & Conditions</a></li>
            <li><a href="PrivacyPolicy.php">Privacy Policy</a></li>
          </ul>
			  </div>
				<div class="col col-12 col-md-6 col-xl-6 mt-5 mb-5">
          <h6>Support</h6>
          <ul class="nav flex-column">
            <li>Phone Number: +639178883334</li>
            <li>Landline: 394-7896<li>
            <li>Email: apitongscatering@business.com</li>
          </ul>
			  </div>
				<div class="social">
          <div class="mt-5 mb-4">
              <a href="https://www.facebook.com/Dirtysoda11"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/RAVEN75754452?s=09"><i class="fa fa-twitter"></i></a>
              <a href="https://www.instagram.com/algeralddelapaz/"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-snapchat-ghost"></i></a>
          </div>
        </div>
        <p class="copyright mb-5"> &copy; Apitongs Food & Catering Services. All Rights Reserved</p>
      </div>
  </div>
</div>
			
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>

<script src="mainPolicy.js"></script>

</body>

</html>