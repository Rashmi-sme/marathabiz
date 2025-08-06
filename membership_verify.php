<?php
session_start();

include('config.php');
//resend otp

if (!empty($_GET['do']) == 'resend') {
    
$username = "smechm";
$password = "sme123";
$type = "TEXT";
$sender = "MIDAIN";
$mobileNumber = $_SESSION["mobile"];

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
    unset($_SESSION["otp"]);
    $_SESSION['otp']=$rndno;
    header( "Location: membership_verify.php" );
}
}else{}

//verify otp
if (isset($_POST['form_otp'])) {

$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(!strcmp($rno,$urno))
{
$username = "smechm";
$password = "sme123";
$type = "TEXT";
$sender = "MIEDAI";
$mobileNumber = $_SESSION['mobile'];
$rndno=rand(100000, 999999);
$curl = curl_init();

curl_setopt_array($curl, array(
              CURLOPT_URL => "http://103.211.202.40/sendsms/bulksms_v2.php?apikey=c21lY2htOmlXejVvYkJD&type=TEXT&sender=MIDAIN&entityId=1201158099447823312&mobile=$mobileNumber1&message=Thank%20you%20for%20registering%20with%20us.%20We%20will%20contact%20you%20shortly-MIEDAI",
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
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($err) {
  $errMSGs = "Error :" . $err;
} else {
    if($httpcode == 200){
    
        $name = $_SESSION['name'];
        $designation = $_SESSION['designation'];
        $company_name = $_SESSION['company_name'];     
        $mobile = $_SESSION['mobile'];
        $email = $_SESSION['email'];
        $city = $_SESSION['city'];
        $business_activity = $_SESSION['business_activity'];
        $category = $_SESSION['category'];
      
        
       // $_SESSION['otp']=$rndno;


$sql = "INSERT INTO marathabiz_membership (name, designation, email, mobile, company_name, city, business_activity, category)
 VALUES ('$name', '$designation', '$email', '$mobile', '$company_name', '$city', '$business_activity', '$category')";

//if (!empty($rndno)) {
    

# FIX: Replace this email with recipient email
        # Sender Data
 if ($conn->query($sql) === TRUE){         
       
    $to = "$email";
      
    $subject = "MARATHA INTERNATIONAL BUSINESS ASSOCIATION (MIBA) | Membership";
    $message = "\nName: $name \nDesignation: $designation \nCompany_Name: $company_name \nBusiness_Activity: $business_activity \nEmail: $email \nMobile: $mobile \nCity: $city \nCategory: $category";
    $headers = "From: MARATHA INTERNATIONAL BUSINESS ASSOCIATION (MIBA) | Membership <no-reply@marathabiz.com>" . "\r\n";
    //$headers .= "Cc: gandhi@smechamber.in" . "\r\n";
    $headers .= "Cc: gandhi@smechamber.in, gandhi.iitcindia@gmail.com" . "\r\n";
    

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully";
        header( "Location: membership_success.php" );
    } else {
        echo "Failed to send email";
    } 
}

$conn->close();
    return true;
        
}else{
    $errMSGs = "failure";
}
}

}
else
{
    $errMSGs = "Incorrect OTP";
}
} else {}
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
                <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="sub-style mb-4">
                        <h4 class="sub-title text-white px-3 mb-0">OTP Verification</h4>
                    </div>
                    
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5 col-xl-3 wow fadeInLeft" data-wow-delay="0.1s">
                    </div>
                    <div class="col-lg-5 col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                       
                        <div class="grid_12">
                             <?php
                                          if (!empty($successMSG)) {
                                            echo '<div class="alert alert-success mb-4 alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                                '.$successMSG.'
                                            </div>';
                                            }

                                            if (!empty($errMSGs)) {
                                            echo '<div class="alert alert-danger mb-4 alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                                                '.$errMSGs.'
                                            </div>';
                                            }
                                          ?>
                    
                        <h4 style="text-align: center; font-size: 20px;">Enter OTP*</h4>
                        <div class="carousel_wrapper">
                            <form action="" method="post" style="text-align: center;">
                    
                                <div class="mb-3 mt-3">
                                    <div class="gaps" style="text-align: center;">
                                      <input type="text" name="otpvalue" class="form-control" style="color:#000000;" placeholder="OTP" maxlength="6" minlength="6" 
                                      onkeypress="return isNumber(event)" required>
                                    </div>
                                    
                                </div>

                                <input class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2" name="form_otp" type="submit" value="Verify OTP">
                            </form>
                            <div class="mb-3 mt-3" style="text-align:center; margin-top:20px; padding-bottom: 30px;">
                                <span style="color: #fff;">Did not receive OTP? <a href="membership_verify.php?do=resend">Resend</a>
                                <button onclick="goBack()" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Go Back</button></span>
                            </div>
                        </div>
                    </div>
                                               
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