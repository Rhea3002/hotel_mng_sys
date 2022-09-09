<?

$sql = "select * from roombook";  //display new room bookings

$msql = "SELECT * FROM `roombook`";  //display Booked rooms

$pid = $_GET['pid'];
$sql ="select * from payment where id = '$pid' "  //to print the receipt using id
?>