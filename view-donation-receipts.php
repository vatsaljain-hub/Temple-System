<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['otmsuid'])==0)
  { 
header('location:logout.php');
}
else{


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>	Online Temple Management System | | Donation History</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>

</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="study">
		<div class="container">
			<?php
 $viewid=$_GET['id'];
 $uid=$_SESSION['otmsuid'];
$ret=mysqli_query($con,"select tbluser.ID as uid,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email,tbltemple.ID as tid,tbltemple.TempleName,tbltemple.TempleImage1,tbltemple.TempleLocation,tbltemple.City,tbltemple.State,tbltemple.Country,tbldonation.ID as did,tbldonation.DonationNumber,tbldonation.UserID,tbldonation.TempleID,tbldonation.City as dcity,tbldonation.State as dstate,tbldonation.Country as dcountry,tbldonation.PANNumber,tbldonation.DonationAmount,tbldonation.PaymentOption,tbldonation.Message,tbldonation.DonationDate from tbldonation join tbluser on tbluser.ID=tbldonation.UserID join tbltemple on tbltemple.ID=tbldonation.TempleID where tbldonation.ID='$viewid' && tbldonation.UserID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <table class="table table-bordered" id="print2" border="1">
 <tr>
<td colspan="4" align="left" style="font-size:20px;color:blue">
 <img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" width="600" height="200"> <?php  echo $row['TempleName'];?></td> </tr>

 <tr class="table-warning">
    <th>Receipt Number</th>
    <td><?php echo htmlentities($row['DonationNumber']);?></td>
 
    <th>Date</th>
    <td><?php  echo $row['DonationDate'];?></td>
    
  </tr>
 <tr class="table-info">
    <th>Name</th>
    <td><?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?></td>
 
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Email</th>
    <td><?php echo htmlentities($row['Email']);?></td>
 
    <th>PAN Number</th>
    <td><?php  echo $row['PANNumber'];?></td>
    
  </tr>
  <tr class="table-success">
    <th>City</th>
    <td><?php echo htmlentities($row['dcity']);?></td>
 
    <th>State</th>
    <td><?php  echo $row['dstate'];?></td>
    
  </tr>
  <tr class="table-primary">
    <th>Country</th>
    <td><?php echo htmlentities($row['dcountry']);?></td>
 
    <th>Message</th>
    <td><?php  echo $row['Message'];?></td>
    
  </tr>
   <tr class="table-warning">
    <th>Payment Amount</th>
    <td><?php echo htmlentities($row['DonationAmount']);?></td>
 
    <th>Payment Method</th>
    <td><?php  echo $row['PaymentOption'];?></td>
    
  </tr>
</table>

           <?php $cnt=$cnt+1; } ?>  
		</div>
	</div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>