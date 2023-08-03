<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['otmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit']))
  {
  	$uid=$_SESSION['otmsuid'];
  	 $bod=$_POST['bod'];
	 $cod=$_POST['cod'];
    $cin=$_POST['cin'];
    $cou=$_POST['cou'];
    $totmem=$_POST['totmem'];
    $totmale=$_POST['totmale'];
    $totfemale=$_POST['totfem'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $ip=$_POST['ip'];
    $ipnum=$_POST['ipnum'];
    $message=$_POST['message'];
    $bookingnum=mt_rand(100000000, 999999999);
    $_SESSION['bookingnum']=$bookingnum;
    $room_bookid=$_GET['roombookid'];
    $query=mysqli_query($con, "insert into tblroom(BookingNumber,UserId,TempleID,BookingDate,CheckinTime,CheckoutTime,CheckoutDate,TotalMember,TotalMale,TotalFemale,City,State,Country,IdentityProof,IdentityProofnumber,Message) value('$bookingnum','$uid','$room_bookid','$bod','$cin','$cou','$cod','$totmem','$totmale','$totfemale','$city','$state','$country','$ip','$ipnum','$message')");
    if ($query) {


 echo "<script>window.location.href='thank-you-room.php'</script>"; 
  
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Book Darshan</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
</head>
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>
	<!-- contact -->
	<div class="contact">
	<div class="container">
		<h2>Room Booking</h2>

					
					<!----- contact-grids ----->		
					<div class="contact-grids">
						
						
							<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<div class="contact-form-row">
									<div>
										<span>Booking Date :</span>
										<input type="date" class="form-control" value="" name="bod" required="true" >
									</div>
									<div>
										<span>Check in Time :</span>
										<input type="time" class="form-control" value="" name="cin" required="true" >
									</div>
									<br>
                                    <div>
									<span>Check out Date :</span>
										<input type="date" class="form-control" value="" name="cod" required="true" >
									</div>
									<div>

										<span>Check out Time :</span>
										<input type="time" class="form-control" value="" name="cou" required="true" >
									</div>
									<div>
										<br>
										<span>Total Member :</span>
										<input type="text" class="form-control" value="" name="totmem" required="true">
									</div>
                                    <div>
										<br>
										<span>Total Male :</span>
										<input type="text" class="form-control" value="" name="totmale" required="true">
									</div>
                                    <div>
										<br>
										<span>Total Female :</span>
										<input type="text" class="form-control" value="" name="totfem" required="true">
									</div>
									<div>
										<br>
										<span>City :</span>
										<input type="text" class="form-control" value="" name="city" required="true">
									</div>
									<div>
										<br>
										<span>State :</span>
										<input type="text" class="form-control" value="" name="state" required="true">
									</div>
									<div>
										<br>
										<span>Country :</span>
										<input type="text" class="form-control" value="" name="country" required="true">
									</div>
									<div>
										<br>
										<span>Identity Proof :</span>
										<select type="text" class="form-control"  value="" name="ip" required="true">
											<option value="">Choose Identity Proof</option>
											<option value="Adhar Card">Adhar Card</option>
											<option value="Voter Card">Voter Card</option>
											<option value="Adhar Card">Passport Card</option>
											<option value="Adhar Card">Driving License</option>
										</select>
									</div>
									<div>
										<br>
										<span>Identity Proof Number:</span>
										<input type="text" class="form-control" value="" name="ipnum" required="true">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Message :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>
								<input type="submit" value="send" name="submit">
							</form>
						</div>
						<!----- contact-form ------>
					</div>
					<!----- contact-grids ----->
			
		</div>
	</div>
	<!-- contact -->		
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>