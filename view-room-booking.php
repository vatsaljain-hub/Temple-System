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
<title>	Online Temple Management System | | Room Booking History</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?"))
{
var values = document.getElementById(strid);
var printing =
window.open('','','left=0,top=0,width=550,height=400,toolbar=0,scrollbars=0,sta­?tus=0');
printing.document.write(values.innerHTML);
printing.document.close();
printing.focus();
printing.print();

}
}
</script>
</head>
<body>
<?php include_once('includes/header.php');?>
	<!-- study -->
	<div class="study">
		<div class="container">
			<?php
 
 $uid=$_SESSION['otmsuid'];
$viewid=$_GET['id'];
$ret=mysqli_query($con,"select tbluser.ID as uid,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,
tbluser.Email,tbluser.RegDate,tbltemple.ID as tid,tbltemple.TempleName,tbltemple.TempleLocation,
tbltemple.City as tcity,tbltemple.State as tstate,tbltemple.Country as tcountry,tbltemple.Description,
tbltemple.TempleImage1,tblroom.ID as bid,tblroom.BookingNumber,tblroom.UserId,tblroom.TempleID,
tblroom.BookingDate,tblroom.CheckinTime,tblroom.TotalMember,tblroom.City as dcity,tblroom.State as dstate,tblroom.Country 
as dcountry,tblroom.IdentityProof,tblroom.IdentityProofnumber,tblroom.CheckoutTime,tblroom.CheckoutDate,tblroom.Message,tblroom.BookingDate,tblroom.Status
 from tblroom join tbluser on tbluser.ID=tblroom.UserId join tbltemple on tbltemple.ID=tblroom.TempleID where tblroom.ID='$viewid'
  && tblroom.UserId='$uid'");

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <table class="table table-bordered">
 <tr>
<td colspan="6" align="center" style="font-size:20px;color:blue">
 View Room Booking Details of :<?php echo htmlentities($row['BookingNumber']);?></td> </tr>

 <tr class="table-warning">
    <th>Temple Name</th>
    <td colspan="2"><?php echo htmlentities($row['TempleName']);?></td>
 
    <th>Temple Image</th>
    <td colspan="2"><img src="admin/templeimages/<?php echo htmlentities($row['TempleImage1']);?>" height='200' width='200'></td>
    
  </tr>
 <tr class="table-info">
  <th>Temple Country</th>
    <td><?php echo htmlentities($row['tcountry']);?></td>
    <th>Temple State</th>
    <td><?php echo htmlentities($row['tstate']);?></td>
 
    <th>Temple City</th>
    <td><?php  echo $row['tcity'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Temple Location</th>
    <td><?php echo htmlentities($row['TempleLocation']);?></td>
 
    <th>Temple Description</th>
    <td colspan="4"><?php  echo $row['Description'];?></td>
    
  </tr>
 <tr>
<td colspan="6" align="center" style="font-size:20px;color:blue">
 Detail of Devotee</td> </tr>
  
 <tr class="table-danger">
    <th>Darshanarthi(Devotee) Name</th>
    <td> <?php echo htmlentities($row['FirstName']);?>  <?php echo htmlentities($row['LastName']);?></td>
 
    <th>Darshanarthi(Devotee) Email</th>
    <td colspan="4"><?php  echo $row['Email'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Darshanarthi(Devotee) Mobile Number</th>
    <td><?php echo htmlentities($row['MobileNumber']);?></td>
 
    <th>Darshanarthi(Devotee) Reg Date</th>
    <td colspan="4"><?php  echo $row['RegDate'];?></td>
    
  </tr>
<tr>
  <td colspan="6" align="center" style="font-size:20px;color:blue">
 Detail of Room</td> </tr>

 <tr class="table-danger">
    <th>Booking Date
    <td colspan="2"><?php echo htmlentities($row['BookingDate']);?></td>
 
    <th>Check in Time</th>
    <td colspan="2"><?php  echo $row['CheckinTime'];?></td>

    
  </tr>
  <tr class="table-danger">
    <th>Total Member</th>
    <td><?php echo htmlentities($row['TotalMember']);?></td>
 
    <th>City of Devotee</th>
    <td><?php  echo $row['dcity'];?></td>
     <th>State of Devotee</th>
    <td><?php echo htmlentities($row['dstate']);?></td>
  </tr>
 
  <tr class="table-danger">
    <th>Country of Devotee</th>
    <td><?php  echo $row['dcountry'];?></td>
    <th>Identity Proof of Devotee</th>
    <td><?php echo htmlentities($row['IdentityProof']);?></td>
 
    <th>Identity Proof Number</th>
    <td><?php  echo $row['IdentityProofnumber'];?></td>
    
  </tr>
  <tr class="table-danger">
    <th>Message</th>
    <td><?php echo htmlentities($row['Message']);?></td>
 
    <th>Check out Date</th>
    <td><?php  echo $row['CheckoutDate'];?></td>

    <th>Check out Time</th>
    <td><?php  echo $row['CheckoutTime'];?></td>

    <th>Room Book Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Darshan request has been accepted";
}



if($row['Status']=="Rejected")
{
  echo "Darshan request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
  </tr>
 
</table>

           <?php $cnt=$cnt+1; } ?>
		</div>
	</div>
	<!-- study -->
				
	<?php include_once('includes/footer.php');?>
</body>
</html><?php } ?>