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
  
  if ( $roleDB == 'user' || $email == "") :
    header('Location: index.php');
    exit();
  endif;

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

<div class="bg-light">
  <div class="container">

    <div class="atitle px-4 py-4">
                    <h2>List of Users and Admins</h2>
                </div>
            <div class="col-lg-12">
                <div class="spacer"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>User Image</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $res=mysqli_query($conn,"select * from registration");
                            while($row=mysqli_fetch_array($res))
                            {
                            echo "<tr>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; ?> <p>None</p> <?php echo "</td>";
                            echo "<td>"; echo $row["username"]; echo "</td>";
                            echo "<td>"; echo $row["email"]; echo "</td>";
                            echo "<td>"; echo $row["password"]; echo "</td>";
                            echo "<td>"; echo $row["role"]; echo  "</td>";
                            echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"<button type="button"
                            class="greenbtn px-3 py-3">Edit</button></a> <?php echo "</td>";
                            echo "<td>"; ?> <a href="deleteRegistration.php?id=<?php echo $row["id"]; ?>"<button type="button"
                            class="redbtn px-3 py-3">Delete</button></a> <?php echo "</td>";
                            echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div class="spacer"></div>
            </div>
            <div class="atitle px-4 py-4">
                <h2>Message Inquiries</h2>
            </div>
        <div class="col-lg-12">
            <div class="spacer"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res=mysqli_query($conn,"select * from inquiries");
                        while($row=mysqli_fetch_array($res))
                        {
                        echo "<tr>";
                        echo "<td>"; echo $row["id"]; echo "</td>";
                        echo "<td>"; echo $row["name"]; echo "</td>";
                        echo "<td>"; echo $row["email"]; echo "</td>";
                        echo "<td>"; echo $row["message"]; echo "</td>";
                        echo "<td>"; ?> <a href="deleteInquiries.php?id=<?php echo $row["id"]; ?>"<button type="button"
                        class="redbtn px-3 py-3">Delete</button></a> <?php echo "</td>";
                        echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <div class="spacer"></div>
        </div>

        <div class="atitle px-4 py-4">
                <h2>Reservations</h2>
            </div>
        <div class="col-lg-12">
            <div class="spacer"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Packages</th>
                    <th>Guests</th>
                    <th>Guest per Head</th>
                    <th>Price</th>
                    <th>Email</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res=mysqli_query($conn,"select * from reservation");
                        while($row=mysqli_fetch_array($res))
                        {
                          if($row['payment'] == 'none'){
                            echo "<tr>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; echo $row["event"]; echo "</td>";
                            echo "<td>"; echo $row["date"]; echo "</td>";
                            echo "<td>"; echo $row["packages"]; echo "</td>";
                            echo "<td>"; echo $row["guests"]; echo "</td>";
                            echo "<td>"; echo $row["pHead"]; echo "</td>";
                            echo "<td>"; echo $row["price"]; echo "</td>";
                            echo "<td>"; echo $row["email"]; echo "</td>";
                            echo "<td>"; ?> <a href="deleteReservation.php?id=<?php echo $row["id"]; ?>"<button type="button"
                            class="redbtn px-3 py-3">Delete</button></a> <?php echo "</td>";
                            echo "</tr>";
                          }
                        }
                    ?>
                </tbody>
            </table>
            <div class="spacer"></div>
        </div>

        <div class="atitle px-4 py-4">
                <h2>Successful Transaction</h2>
            </div>
        <div class="col-lg-12">
            <div class="spacer"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Packages</th>
                    <th>Guests</th>
                    <th>Guest per Head</th>
                    <th>Price</th>
                    <th>Email</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res=mysqli_query($conn,"select * from reservation");
                        while($row=mysqli_fetch_array($res))
                        {
                          if($row['payment'] == 'paid'){
                            echo "<tr>";
                            echo "<td>"; echo $row["id"]; echo "</td>";
                            echo "<td>"; echo $row["event"]; echo "</td>";
                            echo "<td>"; echo $row["date"]; echo "</td>";
                            echo "<td>"; echo $row["packages"]; echo "</td>";
                            echo "<td>"; echo $row["guests"]; echo "</td>";
                            echo "<td>"; echo $row["pHead"]; echo "</td>";
                            echo "<td>"; echo $row["price"]; echo "</td>";
                            echo "<td>"; echo $row["email"]; echo "</td>";
                            echo "<td>"; ?> <a href="deleteReservation.php?id=<?php echo $row["id"]; ?>"<button type="button"
                            class="redbtn px-3 py-3">Delete</button></a> <?php echo "</td>";
                            echo "</tr>";
                          }
                        }
                    ?>
                </tbody>
            </table>
            <div class="spacer"></div>
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

<script src="mainIndex.js"></script>

</body>

</html>