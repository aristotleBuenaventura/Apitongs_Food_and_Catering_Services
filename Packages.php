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


<title>Packages</title>

<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="mainPackages.css">

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


<!-- Tab links -->
<div class="container d-flex justify-content-center">
  <div class="tab my-4">
    <button class="tablinks" onclick="openCity(event, 'Aniv')" id="defaultOpen">Anniversary</button>
    <button class="tablinks" onclick="openCity(event, 'Birth')">Birthday</button>
    <button class="tablinks" onclick="openCity(event, 'Debut')">Debut</button>
    <button class="tablinks" onclick="openCity(event, 'Prom')">Promenade</button>
    <button class="tablinks" onclick="openCity(event, 'Wed')">Wedding</button>
    <button class="tablinks" onclick="openCity(event, 'Kiddie')">Kiddie Party</button>
    <button class="tablinks" onclick="openCity(event, 'Baby')">Baby Shower</button>
    <button class="tablinks" onclick="openCity(event, 'Corporate')">Corporate Events</button>
    <button class="tablinks" onclick="openCity(event, 'Funeral')">Funeral Wake</button>
  </div>
</div>


<div id="Aniv" class="tabcontent">
  <div class="header container-fluid img-fluid"id="anniversary">
    <div class="container">
      <div class="description">
          <p>Anniversary</p>
          <a href="#anniv"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">Real love stories never have endings.</h3>
            <div class="container text-light">
                <p>Anniversaries are wonderful, magical, celebratory occasions. Anniversaries 
                  are opportunities for recollections of the year gone by and positive reflections 
                  for the year ahead. This past year has been hard but a happy and successful year 
                  in some many ways. It has been defined by a kaleidoscope of happy memories, 
                  supportive friendships and enduring relationships. We look forward to another 
                  wonderful year, a time to build and strengthen forged relationships even further; 
                  a time to create and cherish even more shared memories and a time filled with dreams 
                  that are brought ever closer and milestones whatever they may be achieved. 
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>



<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
          <input Name="" type="Image" src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F9%2F2017%2F06%2FHD-201402-r-butter-basted-rib-eye-steak.jpg" class="img-size">
      </div>
  
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
    <input Name="" type="Image" src="https://static.onecms.io/wp-content/uploads/sites/9/2016/03/HD-201410-r-ricotta-crepes-with-honey-walnuts-and-rose.jpg" class="img-size">
      </div>
  
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
    <input Name="" type="Image" src="https://www.askideas.com/media/06/Happy-Anniversary-HD-Wallpaper.jpg" class="img-size">
      </div>
  
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
    <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894256941268860980/Kalupol-Chicken-d5c3376.jpg" class="img-size">
      </div>
  
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
    <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894257583391653909/LTO_California-Pizza-Kitchen_Mothers-Day-offer_900x600.jpg" class="img-size">
      </div>
  
    <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
    <input Name="" type="Image" src="https://static.onecms.io/wp-content/uploads/sites/9/2014/12/HD-fw200611_almondduck.jpg" class="img-size">
      </div>
  
  
  </div>
  </div>
  <!--additional conteeent-->
<section class="content addContent "  id="anniv">
  <div class="container py-5 ">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold"> Anniversary</h1>    
                  </p>
                  <p class="text-dark fw-light">
                    Celebrate your anniversary with us with a great deals and satisfying and one of kind catering services.
                  </p>
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Anniversary Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
                <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book1">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>

</div>
</div>
</div>
</div>



<div id="Birth" class="tabcontent">
  <div class="header container-fluid img-fluid"id="birthday">
    <div class="container">
      <div class="description">
          <p>Birthday</p>
          <a href="#birth"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">Hope all your birthday wishes come true!</h3>
            <div class="container text-light">
                <p>Your birthday is a day to celebrate the time you have spent on this earth. 
                  You have successfully managed to live one more year, gained a lot of experiences, 
                  created memories, learned new things, met new people and many more things might 
                  have changed from your last birthday. It’s time you spend some quality time with
                   your friends and family and make a plan to achieve more in the upcoming year. 
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>

<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259241978847342/maxresdefault.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259451111018608/birthday_dinner_ideas_ina-garten-baked-pasta-tomatoes-eggplant-recipe.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259679612506122/01_everything_bagel_pigs_in_blanket_0.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894260010798964746/kids-party-.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://hips.hearstapps.com/rbk.h-cdn.co/assets/17/21/pesto-parmesan-pastry-straws_002.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://www.tasteofhome.com/wp-content/uploads/2018/01/Mini-Burgers-with-the-Works_EXPS_SDAM19_35357_C12_06_4b-1.jpg?fit=700,700" class="img-size">
          </div>
  
  <!--additional conteeent-->
<section class="content addContent" id="birth">
  <div class="container py-5">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold">Birthday</h1>    
                  </p>
                  <p class="text-dark fw-light">
                  Birthday catering package that observes the importance of a safe and small celebration. Experience
                   high quality catering service in the venue of your choice with the presence of limited guest plus the 
                   help of our event planner for catering coordination.
                    
                  </p>
             
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Birthday Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
              <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>     
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book2">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>
  </div>
  </div>
</div>
</div>

<div id="Debut" class="tabcontent">
  <div class="header container-fluid img-fluid"id="debut">
    <div class="container">
      <div class="description">
          <p>Debut</p>
          <a href="#debuts"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">18 doesn't feel much different, but it sure is fun to say!</h3>
            <div class="container text-light">
                <p>A debut is more than just a birthday celebration; it’s a young 
                  woman’s formal introduction into society. In many ways, it’s one 
                  of the most important events in a young lady’s life, second only 
                  to her wedding.
                </p>
                <p>
                  Of course, in older days, the debut served as an opportunity for a 
                  young woman to formally meet the sons of wealthy or influential 
                  families for marriage prospects. Thankfully, young women today have 
                  more options. You’ve done everything you could to give your daughter
                   everything she needs to make her own choices in life – from her 
                   education to her opportunities, to growing up in a safe and nurturing 
                   environment.
                </p>
                <p>
                  To doting parents, a young lady’s debut signifies that bittersweet moment 
                  when they have to let her walk – or dance – on her own two feet as a 
                  beautiful, capable young woman. It’s not just an evening of food and 
                  entertainment – it’s an opportunity for her family and friends to express
                   their love for her with advice, guidance and inspiration. It’s also an 
                   affirmation of her own unique worth as an adult and an individual.
                </p>
                <p>
                  To take a phrase from the unforgettable slogan from a baby care brand in the 
                  80s – you’re hosting your daughter’s debut “Because the baby is now a lady.” 
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>

<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261118221058058/Danielle-18th-Birthday-Party-Debut-Event-Photography-San-Diego-Crowne-Plaza-by-AbounaPhoto-3872-870x.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261337285353502/shutterstock_650415253.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261598531760238/Akira_Back-e1632833034173.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262003038838844/Meati-Foods-mycelium-chicken-e1625740438561.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262524504076348/lemon.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262850934145124/catering-1.jpg" class="img-size">
          </div>
    
          
          <!--additional conteeent-->
<section class="content addContent" id="debuts">
  <div class="container py-5">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold">Debut</h1>    
                  </p>
                  <p class="text-dark fw-light">
                  Debut catering package that celebrates the traditional way with a full course menu, classy styling, 
                  dedicated manpower and event planner for catering coordination.
                    
                  </p>
             
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Debut Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
              <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book3">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>
  
  </div>
  </div>
</div>
</div>

<div id="Prom" class="tabcontent">
  <div class="header container-fluid img-fluid"id="prom">
    <div class="container">
      <div class="description">
          <p>Promenade</p>
          <a href="#proms"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">The light teaches you to convert life into a festive promenade.</h3>
            <div class="container text-light">
                <p>Prom is a significant, unique, serious event. The brightness of 
                  graduation memories depends on the quality of its organization. Prom 
                  catering allows you not to be tied to the place. Today it is not
                   necessary to organize a cool prom in the bar, restaurant or club. 
                   Original celebration can be held in any desired location. 
                </p>
                <p>
                  Prom catering at school, college or higher education institute is a 
                  professional catering service with the provision of everything that
                   is required for the organization and execution of the event. We take
                    care of all issues related to the preparation and delivery of food
                     and drinks, serving tables, reception and accommodation of the guests.
                </p>
                <p>
                  We will organize your prom of any format. It can be a solemn banquet, a
                   noisy party or an outdoor buffet. Depending on the chosen format, 
                   we are ready to offer different options of cold and hot snacks,
                    main courses, desserts and drinks.
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>

<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266084373463090/fc0b38f753c8e4dbd29934110ac46263.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266543117058049/dsc4372.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267035163443210/imag2e.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267412101341254/brian-chan-12169-unsplash.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267883469824100/mlc_027.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894268182909579324/6ddfcdf07d86dbbc91a87b9f9e151c72.JPG" class="img-size">
          </div>
      
      <!--additional conteeent-->
<section class="content addContent" id="proms">
  <div class="container py-5">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold">Promenade</h1>    
                  </p>
                  <p class="text-dark fw-light">
                  Promenade package that caters to large-scale celebrations featuring a 
                  full course menu, basic styling, dedicated manpower and corporate planner for catering coordination.
                    
                  </p>
             
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Promenade Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
              <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book4">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>
          
  
  </div>
  </div>
</div>
</div>

<div id="Wed" class="tabcontent">
  <div class="header container-fluid img-fluid"id="wedding">
    <div class="container">
      <div class="description">
          <p>Wedding</p>
          <a href="#weds"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">Where the adventure begins</h3>
            <div class="container text-light">
                <p>Any bride will tell you that the reception flies by. But the last 
                  dance doesn't have to signal the end of the celebration. There are 
                  always revelers who refuse to let the good times come to a close, 
                  so it's essential to have an after-hours game plan. It isn't just a 
                  way to prolong your wedding day (and you will appreciate every extra 
                  minute) consider it another chance to impress your guests with 
                  surprising details and personal touches. Here's how to get the 
                  party started.
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>






<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894269052254572605/weddings-2013-12-wedding-food-tiny-burgers-main.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894269307507310672/image.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894269855396659300/wedding-buffet-2e2165m.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894270657196601344/wedding-catering-company-10.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894272627521245264/db65adcc-9313-4c52-b610-203a8efa672a_rs_768.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894271091885867058/PETblog_appetizers1.jpg" class="img-size">
          </div>
  
      
      <!--additional conteeent-->
<section class="content addContent" id="weds">
  <div class="container py-5">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold">Wedding</h1>    
                  </p>
                  <p class="text-dark fw-light">
                  Wedding catering package that honors the importance of a safe and small celebration. Experience high-quality 
                  catering service in the venue of your choice with the presence of limited guests plus the help of our event 
                  planner for catering coordination.
                    
                  </p>
                  <p class="text-dark fw-light">
                    Each packages have minumum guests of 30, and the price of each packages it depends on the number of guests.
                  </p>
             
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Wedding Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
              <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>     
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book5">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>    
  </div>
  </div>
</div>
</div>

<div id="Kiddie" class="tabcontent">
  <div class="header container-fluid img-fluid" id="kids">
    <div class="container">
      <div class="description">
          <p>Kiddie Party</p>
          <a href="#Kiddies"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">The day you were born was the best day of my life.</h3>
            <div class="container text-light">
                <p>Birthday parties are great when you’re the one being celebrated. But for parents, throwing a birthday party for a child can seem like a daunting task. For some, the idea of planning a party is overwhelming. For others, the cost of throwing a birthday party 
                  might be a deterrent. We understand the challenges that can come when it’s time for another birthday but don’t underestimate the importance of a birthday celebration.
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>



<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
    <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266084373463090/fc0b38f753c8e4dbd29934110ac46263.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266543117058049/dsc4372.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267035163443210/imag2e.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267412101341254/brian-chan-12169-unsplash.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267883469824100/mlc_027.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894268182909579324/6ddfcdf07d86dbbc91a87b9f9e151c72.JPG" class="img-size">
          </div>
  
  
  </div>
  </div>
  <!--additional conteeent-->
<section class="content addContent "  id="Kiddies">
  <div class="container py-5 ">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-danger">
                    
                         <h1 class="font-weight-bold"> Kiddie Party</h1>    
                  </p>
                  <p class="text-dark fw-light">
                    Celebrate your anniversary with us with a great deals and satisfying and one of kind catering services.
                  </p>
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Kiddie Party Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
                <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book6">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>

</div>
</div>
</div>
</div>

<div id="Baby" class="tabcontent">
  <div class="header container-fluid img-fluid"id="babyBG">
    <div class="container">
      <div class="description">
          <p>Baby Shower</p>
          <a href="#Babys"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">You're not one year older, you're one year better.</h3>
            <div class="container text-light">
                <p>A baby shower is a party attended by friends and family to celebrate the impending birth of a new baby and ‘shower’ the mum to be with love and good wishes.  A baby shower typically includes food, games and also gifts for the new parents, to ensure they have everything they need ahead of the birth.
Let an expert catering team devise a beautiful and tasteful baby shower menu for your special event. Host the perfect baby shower, without doing any of the catering work yourself! We can also help you out with theming and decorations as well as linen and silverware hire.
Creative, informal and delicious are the three words that spring to mind when we think of baby shower catering.

                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>



<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
    <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259241978847342/maxresdefault.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259451111018608/birthday_dinner_ideas_ina-garten-baked-pasta-tomatoes-eggplant-recipe.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894259679612506122/01_everything_bagel_pigs_in_blanket_0.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894260010798964746/kids-party-.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://hips.hearstapps.com/rbk.h-cdn.co/assets/17/21/pesto-parmesan-pastry-straws_002.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://www.tasteofhome.com/wp-content/uploads/2018/01/Mini-Burgers-with-the-Works_EXPS_SDAM19_35357_C12_06_4b-1.jpg?fit=700,700" class="img-size">
          </div>
  
  
  </div>
  </div>
  <!--additional conteeent-->
<section class="content addContent "  id="Babys">
  <div class="container py-5 ">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold"> Baby Shower</h1>    
                  </p>
                  <p class="text-dark fw-light">
                    Celebrate your anniversary with us with a great deals and satisfying and one of kind catering services.
                  </p>
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Baby Shower Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
                <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book7">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>

</div>
</div>
</div>
</div>

<div id="Corporate" class="tabcontent">
  <div class="header container-fluid img-fluid"id="corporateBG">
    <div class="container">
      <div class="description">
          <p>Corporate Events</p>
          <a href="#Corporates"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">Business opportunities are like buses, there's always another one coming.</h3>
            <div class="container text-light">
                <p>Those looking for a sense of elegance about their events don't need to look further - Apitong's top-notch corporate catering services are sure to turn 
                  any business affair into a matter of exquisite celebration! We combine and balance all the unique elements of every event and turn it into something truly unforgettable.
                </p>
                <p>Having Apitong at your next corporate gathering is a great way to evoke an atmosphere of prestige, grace, and luxury without sacrificing the event's main intent. Hosts and guests alike 
                  will surely enjoy everything it has to offer – from the medley of the served food's flavors, to the lavishly decorated environment, to even the cool but enjoyable ambiance.
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>



<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
    <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261118221058058/Danielle-18th-Birthday-Party-Debut-Event-Photography-San-Diego-Crowne-Plaza-by-AbounaPhoto-3872-870x.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261337285353502/shutterstock_650415253.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894261598531760238/Akira_Back-e1632833034173.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262003038838844/Meati-Foods-mycelium-chicken-e1625740438561.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262524504076348/lemon.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894262850934145124/catering-1.jpg" class="img-size">
          </div>
  
  
  </div>
  </div>
  <!--additional conteeent-->
<section class="content addContent "  id="Corporates">
  <div class="container py-5 ">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold"> Corporate Events</h1>    
                  </p>
                  <p class="text-dark fw-light">
                    Celebrate your anniversary with us with a great deals and satisfying and one of kind catering services.
                  </p>
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Corporate Events Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
                <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book8">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>

</div>
</div>
</div>
</div>

<div id="Funeral" class="tabcontent">
  <div class="header container-fluid img-fluid"id="funeralBG">
    <div class="container">
      <div class="description">
          <p>Funeral Wake</p>
          <a href="#Funerals"><button class="btn btn-dark btn-lg">Reserve now</button></a>
      </div>
    </div>
  </div>

<div class="container mb-5">
  <div class="container features">
    <div class="row content-text">
        <div class="col">
            <h3 class="feature-title text-light">Nothing brings us together like sharing a meal, no matter what the occasion.</h3>
            <div class="container text-light">
                <p>In times of grief and pain, food can sustain us and provide a momentary respite. Honoring a lost loved one’s 
                  life can become easier and less stressful with food. Whether you prefer a full buffet meal or simple appetizers 
                  to sustain those present, you can achieve this basic goal quickly and easily with the help from Apitong's Food and 
                  Catering Services.
                </p>
                <p><p>You can host friends and family members at your home or another location related to the memorial service. Wherever 
                  you choose to host a memorial event, funeral catering can provide everything you need to accomplish your objectives.
                </p>
                </p>
            </div>
        </div>  
        <div class="col">
            <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link accordionLink" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Details
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Capacity: Up to 1,250 guests<br>
                        Area: 1, 072 square meters
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed accordionLink" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Request for Proposal
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      If you require any further information or wish to guarantee your place
                      please call us at +639178883334 
                      or 394-7896.
                    </div>
                    <div class="card-body">Request for Proposal.</div>
                        
                    
                  </div>
                </div>
              </div>
        </div>  
    </div>
    
</div>
</div>



<div class="container-fluid bg-light">

  <div class="container features">
    <div class="row">
    <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266084373463090/fc0b38f753c8e4dbd29934110ac46263.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894266543117058049/dsc4372.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267035163443210/imag2e.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267412101341254/brian-chan-12169-unsplash.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894267883469824100/mlc_027.jpg" class="img-size">
          </div>
      
          <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
        <input Name="" type="Image" src="https://cdn.discordapp.com/attachments/755646434526625882/894268182909579324/6ddfcdf07d86dbbc91a87b9f9e151c72.JPG" class="img-size">
          </div>
  
  
  </div>
  </div>
  <!--additional conteeent-->
<section class="content addContent "  id="Funerals">
  <div class="container py-5 ">
      <div class="row">
          <div class="col-lg-8">
              <div class="text-block">
          
              
                  <p class="text-dark">
                    
                         <h1 class="font-weight-bold"> Funeral Wake Booking</h1>    
                  </p>
                  <p class="text-dark fw-light">
                    Celebrate your anniversary with us with a great deals and satisfying and one of kind catering services.
                  </p>
                  <h3 class="mb-3">Inclusions</h3>

                  <p class="text-dark fw-light"> 
                    Package 1 we offer basic and affordable packages, which includes:
                 </p>
                 <div class="ml-5">
                  <p class="text-dark fw-light">
                    &#9642; Full-service Catering
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; Reception Set-up and Design.
                  </p>
                  <p class="text-dark fw-light">
                    &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                  </p>
                  <h4 class="mb-3">
                     This package is just PHP 1200 per person
                  </h4>
                 
                 </div>

                 <!--Package 2-->
                 <p class="text-dark fw-light">
                 Package 2 package that include light and sound systems, which includes also:
               </p>
               <div class="ml-5">
                <p class="text-dark fw-light">
                  &#9642; Full-Service Catering 
                </p>
                <p class="text-dark fw-light">
                  &#9642; Reception Set-up and Design.
                </p>
                <p class="text-dark fw-light">
                  &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
                </p>
                <p class="text-dark fw-light">
                  &#9642; It include a light and sound system.
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1600 per person
                  </h4>
               </div>
               <!--Package 3-->
               <p class="text-dark fw-light">
               Package 3 a complete package which includes the following:
             </p>
             <div class="ml-5">
              <p class="text-dark fw-light">
                &#9642; Full-Service Catering it includes 5 dishes, 2 desserts and 2 	kinds of drinks.
              </p>
              <p class="text-dark fw-light">
                &#9642; Reception Set-up and Design.
              </p>
              <p class="text-dark fw-light">
                &#9642; An event coordinator that will facilitate the planning and 	execution of your event.
              </p>
                <p class="text-dark fw-light">
                  &#9642; Light and sound system.
                </p>
                <p class="text-dark fw-light">
                  &#9642; Event photographer and vidoegrapher
                </p>
                <h4 class="mb-3">
                     This package is just PHP 1900 per person
                  </h4>
             </div>
               
              </div>
          </div>
          
          <!---form--->

          <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded form_background" style="top: 100px;">
        
                  
                  <p class="text-muted">
                      <span class="h2">Funeral Wake Booking</span>
                   
                  </p>
          
              
              <hr class="my-4">
              <form action="#" id="booking-form" class="form" method="post" autocomplete="off">
                <div class="mb-4">
                  <label for="bookingDate" class="form_label" style="display:flex">Event Date <p style="color: red">*</p></label>
                  <input type="date" id="bookingDate" class="form_control" name="bookingDate" placeholder="Choose your dates" required>
                </div>
                <div class="mb-4">
                  <label for="package" class="form_label" style="display:flex">Package<p style="color: red">*</p></label>
                    <select name="package" id="package">
                      <option value="package1">Package 1</option>
                      <option value="package2">Package 2</option>
                      <option value="package3">Package 3</option>
                      
                    </select>
                </div>              
                <div class="mb-4">
                  <label for="guests" class="form_label" style="display:flex">Guests<p style="color: red">*</p></label>
                  <input type="text" id="guests" class="form_control" name="guests" placeholder="How many guests? " required>

                </div>    
            
                <div class="d-grid mb-4">
                  <button class="btn btn-success" type="submit" name="book9">Book your event</button>
                </div>         
              </form>

            </div>

          </div>
      </div>

  </div>
</section>

</div>
</div>
</div>
</div>


<div class="container features">
  <div class="row content-text">
    <h3 class="feature-title text-light">Request for Proposal</h3>
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
          
          <div class="container text-light">
              <p>If you require any further information or wish to guarantee your place
                  please call us at +639178883334 
                  or 394-7896.</p>
              <a href="Inquiry.php"><button class="btn btn btn-light btn-lg">Inquire now</button></a>
          </div>
      </div>  
      
      <div class="col col-12 col-xl-6 d-flex justify-content-center mb-5">
          <div class="container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2729.818297825859!2d121.05931872638772!3d14.624916157068517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1635818164516!5m2!1sen!2sph" 
              style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


document.getElementById("defaultOpen").click();
</script>



			
	
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

<script src="mainPackages.js"></script>

<?php
// $guests = $_POST["guests"];
if (isset($_POST["guests"])){
  $guests = $_POST["guests"];
} else {
  $guests = "";
}

if(isset($_POST["book1"]))
{
  if (isset($_SESSION['email'])){

    if($_POST["package"] == "package1")
    {
      
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Anniversary','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Anniversary','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Anniversary','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead,$total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
	
	//insert data to database
}
elseif(isset($_POST["book2"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Birthday','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Birthday','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Birthday','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
}	
elseif(isset($_POST["book3"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Debut','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Debut','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Debut','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}
elseif(isset($_POST["book4"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Promenade','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Promenade','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Promenade','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}
elseif(isset($_POST["book5"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Wedding','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Wedding','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Wedding','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}
elseif(isset($_POST["book6"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Kiddie Party','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Kiddie Party','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Kiddie Party','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}
elseif(isset($_POST["book7"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Baby Shower','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Baby Shower','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Baby Shower','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}
elseif(isset($_POST["book8"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Corporate Events','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Corporate Events','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Corporate Events','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}

elseif(isset($_POST["book9"]))
{
  if (isset($_SESSION['email'])){
    if($_POST["package"] == "package1")
    {
      $pricePerHead = 1200;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Funeral Wake','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package2")
    {
      $pricePerHead = 1600;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Funeral Wake','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
    if($_POST["package"] == "package3")
    {
      $pricePerHead = 1900;
      $total = $guests * $pricePerHead;
      mysqli_query($conn, "insert into reservation values(NULL,'Funeral Wake','$_POST[bookingDate]','$_POST[package]', $guests, $pricePerHead, $total, '$emailDB','none')");
      ?>
        <script type="text/javascript">
            alert("Your Booking has been successfully added.");
        </script>
      <?php
    }
  }
  else {
    ?>
    <script type="text/javascript">
        alert("Please Log in first!");
    </script>
    <?php
  }
	
}

			
?>

</body>

</html>