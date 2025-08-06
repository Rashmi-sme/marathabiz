<?php

session_start();
//$membership_cat = $_GET['value'];

if (isset($_POST['submit'])) {      
$username = "smechm";
$password = "sme123";
$type = "TEXT";
$sender = "MIDAIN";
$mobileNumber = $_POST["mobile"];

$rndno=rand(100000, 999999);
    
$curl = curl_init();

curl_setopt_array($curl, array(
              CURLOPT_URL => "http://103.211.202.40/sendsms/bulksms_v2.php?apikey=c21lY2htOmlXejVvYkJD&type=TEXT&sender=MIDAIN&entityId=1201158099447823312&mobile=$mobileNumber&message=$rndno%20is%20the%20OTP%20for%20the%20registration%20process%20for%20MIDAIN%20-%20Small%20and%20Medium%20Business%20Development%20Chamber%20of%20India",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: b04b5d1c-1164-cc2c-1675-6833c1604270"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  $errMSGs = "Error :" . $err;
} else {
  
$_SESSION['name'] = $_POST['name'];
$_SESSION['designation']= $_POST['designation'];
$_SESSION['company_name'] = $_POST['company_name'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['business_activity'] = $_POST['business_activity'];
$_SESSION['category']=implode(',',$_POST['category']);
 
$_SESSION['otp']=$rndno;

header( "Location: membership_verify.php" );
}
//}
} 
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Become Member | MARATHA INTERNATIONAL BUSINESS ASSOCIATION (MIBA)</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
       <meta content="MARATHA INTERNATIONAL BUSINESS ASSOCIATION (MIBA), chamber, business, maratha" name="keywords">
        <meta content="MARATHA INTERNATIONAL BUSINESS ASSOCIATION (MIBA)</b> is founded by Shri Chandrakant Salunkhe Founder and President- Maharashtra Industry Development Association (MIDA) and SME Chamber of India to integrate the Maratha Entrepreneurs from Maharashtra, other parts of India and abroad to establish and enhance business contacts and business" name="description">
        <link rel="icon" href="img/favicon.png" type="image/x-icon">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style type="text/css">
            .border-white {
                border-color: #000 !important;
            }

            .btn.btn-light:hover {
                box-shadow: inset 300px 0 0 0 #be282e;
                color: var(--bs-light) !important;
            }
            .btn.btn-light {
                /* box-shadow: inset 0 0 0 0 var(--bs-primary) !important; */
            }
            .btn-light:hover {
                color: #000;
                background-color: #be282e;
                border-color: #fbfafb;
            }
            .text-primary {
                color: #be282e !important;
            }
            .form-floating>label {
                color: #fff;
                font-weight: bold;
            }

            label {
                color: #fff;
            }
            .contact {
                background: linear-gradient(#efa286e3, #efa286e6);
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }

        </style>
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php include('header.php') ?>

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Become Member</h1>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                    
                    <li class="breadcrumb-item active text-primary">Become Member</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="sub-style">
                        <h4 class="sub-title px-3 mb-0" style="color: #000;">Become a Member</h4>
                    </div>
                   
                </div>
                
                <div class="row g-4 align-items-center">

                    <div class="col-md-6 col-lg-4 col-xl-12 wow fadeInUp" data-wow-delay="0.1s" style="color: #000;">
                        <ul>
                            <li>Opportunity to attend Events, Programmes and Activities.</li>
                            <li>Assistance for Business, import, export and Investment opportunities.</li>
                            <li>Inclusion of name in Maratha Entrepreneurs Directory.</li>
                            <li>Participation at Buyer-Seller Meets and Business Matchmaking Programmes.</li>
                            <li>Eligibility for applying "Maratha Entrepreneurship Excellence Awards".</li>
                            <li>Members will get an opportunity for presentation and display of their products and services at the venue.</li>
                            
                        </ul>
                       
                    </div>


                    <div class="col-lg-5 col-xl-12 wow fadeInLeft" data-wow-delay="0.1s">
                        <h2 class="display-5 text-white mb-2" style="color:#000 !important;     font-size: 35px; padding-bottom: 10px;">Application For Membership Form
                        </h2>
                        
                        <form action="" method="post">
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent border border-white" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control bg-transparent border border-white" id="phone" name="mobile" placeholder="Mobile No.">
                                        <label for="phone">Your Mobile</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white" id="project" name="designation" placeholder="Designation">
                                        <label for="project">Designation</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white" id="subject" name="company_name" placeholder="Company Name">
                                        <label for="subject">Company Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white" id="subject" name="city" placeholder="City">
                                        <label for="subject">City</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent border border-white" id="subject" name="business_activity" placeholder="Business Activity">
                                        <label for="subject">Business Activity</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">

                                        <div class="checkbox">
                                            <label style="font-size: 20px;">Interested in Membership Category <span class="emp">*</span></label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Silver Category - Micro Enterprises (Turnover upto Rs. 5 cr)"> Silver Category - Micro Enterprises (Turnover upto Rs. 5 cr)
                                            </label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Gold Category - Small Enterprises (Turnover from Rs. 5 cr to Rs. 50 cr)"> Gold Category - Small Enterprises (Turnover from Rs. 5 cr to Rs. 50 cr)
                                            </label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Platinum Category - Medium sized Enterprises (Turnover from Rs. 50 cr to 250 cr)"> Platinum Category - Medium sized Enterprises (Turnover from Rs. 50 cr to 250 cr)
                                            </label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Mid - Corporate Category - Mid - Corporate Enterprises (Turnover from Rs. 250 cr to Rs 500 cr)"> Mid - Corporate Category - Mid - Corporate Enterprises (Turnover from Rs. 250 cr to Rs 500 cr)
                                            </label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Corporate Category (Turnover from Rs. 500 cr and above)"> Corporate Category (Turnover from Rs. 500 cr and above)
                                            </label><br>
                                            <label style="padding-left: 20px; font-size: 18px;">
                                              <input type="checkbox" name="category[]" value="Patron Category - By Invitation ( valid for 5 yrs)"> Patron Category - By Invitation ( valid for 5 yrs)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-light text-primary w-100 py-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <?php include('footer.php'); ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   
       
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>        
    </body>
</html>