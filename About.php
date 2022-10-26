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
  $roleDB = "";
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

<div class="about-section">
  <h1>About Us</h1>
  <p><b>The Beginning of Success </b></p>
  <p>Apitong's Catering provides a variety of Food and Catering Services throughout Manila. It is founded by Chef Cesar Apitong who was once a Chef from a local restaurant nearby T.I.P.
But due to the pandemic, <br>business hasn't strived and couldn't function after that. After a lot of thinking, Chef decided to create his own Food and Catering Services.</p>

</div>

<h3 style="text-align:center">OUR TEAM</h3>

<div class="container">
  <div class="row">
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="cesar.jpg" alt="Abilong, Cesar" style="width:20%">
        <div class="container">
          <h2>Abilong, Cesar</h2>
          <p class="title">Head Chief</p>
          <p>the person highest in authority in kitchen<br>The Next Chief Boy Logro "PingPingPing"</p>
          <p>Abilong@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Aquino.png" alt="Aquino, Recon" style="width:20%">
        <div class="container">
          <h2>Aquino, Recon</h2>
          <p class="title">Art Director, Production & Scheduler </p>
        <p>Production who provide equipment and more.</p>
        <p>Aquino@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Banel.png" alt="Bañel, John Edwin" style="width:20%">
        <div class="container">
          <h2>Bañel, John Edwin</h2>
          <p class="title">Cameraman,Photographer & Designer</p>
        <p>The most important thing the memory capturer and designer.</p>
          <p>Bañel@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Aristotle.png" alt="Buenaventura, Aristotle" style="width:20%">
        <div class="container">
          <h2>Buenaventura, Aristotle</h2>
          <p class="title">Co-Founder & Manager leader</p>
        <p>Vice President of Apitong’s Food & Catering Services and Leader in service crew .</p>
        <p>Buenaventura@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Chedie.png" alt="Casas, Chedie Kyle" style="width:20%">
        <div class="container">
          <h2>Casas, Chedie Kyle</h2>
          <p class="title">Chef & Founder Ceo of Apitong’s Food & Catering Services</p>
        <p>The founder of Apitong’s Food & Catering Services and lead taker.</p>
        <p>Casas@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Gerald.png" alt="Dela Paz, Gerald" style="width:20%">
        <div class="container">
          <h2>Dela Paz, Gerald</h2>
          <p class="title">Deputy Chef</p>
        <p>To assist the Head Chef with the preparation and service of events meals and
			beverages to an excellent standard, and to provide a professional impression to all visitors, parents, pupils
			and staff.</p>
      <p>Dela_Paz@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Javier.png" alt="Dela Paz, Gerald" style="width:20%">
        <div class="container">
          <h2>Golpe, Reginald</h2>
          <p class="title">Floor Director</p>
        <p>Who supervise new employees and promote the company culture to staff members.</p>
      <p>Golpe@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Darren.png" alt="Pascual, Darren Paul" style="width:20%">
        <div class="container">
          <h2>Pascual, Darren Paul</h2>
          <p class="title">Purchasing Manager</p>
        <p> heads a team responsible for procuring goods and services for resale or company use</p>
		<p>Pascual@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4">
      <div class="card">
        <img src="Reginald.png" alt="Rodillas, Gerard Adrian" style="width:20%">
        <div class="container">
          <h2>Rodillas, Gerard Adrian</h2>
          <p class="title">Manager</p>
        <p>planning, organizing, leading, and controlling.</p>
        <p>Rodillas@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col col-12 col-md-6 col-xl-4 mb-5 ">
      <div class="card">
        <img src="Zoilo.png" alt="Zoilo, Julieto" style="width:20%">
        <div class="container">
          <h2>Zoilo, Julieto</h2>
          <p class="title">Kitchen Porter</p>
		<p>Washing all cooking tools and utensils fast
		Supporting kitchen staff by taking on food prep tasks</p>
        <p>Zoilo@hotmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  </div>
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
      </div>



<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>

<!-- <script src="mainAbout.js"></script> -->

</body>

</html>