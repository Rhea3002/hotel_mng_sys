<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<!--Store data in sxl files-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <!-- <link href="assets/css/font-awesome.css" rel="stylesheet" /> -->
    <!-- Morris Chart Styles-->
    <!-- <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
    <!-- Custom Styles-->
    <!-- <link href="assets/css/custom-styles.css" rel="stylesheet" /> -->
    <!-- Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />  -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>

</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="#" class="w3-bar-item w3-button">User Profile</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
    <div class="w3-container w3-teal">
        <button class="w3-button w3-teal w3-xlarge w3-right fa" style="font-size:24px" onclick="openRightMenu()">&#xf2bd;</button>
        <h1>ADMIN</h1>
    </div>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a class="active-menu w3-bar-item w3-button" href="adminhome.php">Status</a>
        <a href="roombook.php" class="w3-bar-item w3-button">Room Booking</a>
        <a href="payment.php" class="w3-bar-item w3-button">Payment</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">
        <div class="w3-container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            ADMINISTRATOR<small> accounts </small>
                        </h1>
                    </div>
                </div>


                <?php
                include('db.php');
                $sql = "SELECT * FROM `login`";
                $re = mysqli_query($con, $sql)
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>User name</th>
                                                <th>Password</th>

                                                <th>Update</th>
                                                <th>Remove</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($row = mysqli_fetch_array($re)) {

                                                $id = $row['id'];
                                                $us = $row['usname'];
                                                $ps = $row['pass'];
                                                if ($id % 2 == 0) {
                                                    echo "<tr class='gradeC'>
													<td>" . $id . "</td>
													<td>" . $us . "</td>
													<td>" . $ps . "</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=usersettingdel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
                                                } else {
                                                    echo "<tr class='gradeU'>
													<td>" . $id . "</td>
													<td>" . $us . "</td>
													<td>" . $ps . "</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button></td>
													<td><a href=usersettingdel.php?eid=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
                                                }
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                        <div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
                                Add New Admin
                            </button>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add the User name and Password</h4>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Add new User name</label>
                                                    <input name="newus" class="form-control" placeholder="Enter User name">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input name="newps" class="form-control" placeholder="Enter Password">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                <input type="submit" name="in" value="Add" class="btn btn-primary">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['in'])) {
                        $newus = $_POST['newus'];
                        $newps = $_POST['newps'];

                        $newsql = "Insert into login (usname,pass) values ('$newus','$newps')";
                        if (mysqli_query($con, $newsql)) {
                            echo ' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
                        }
                        header("Location: usersetting.php");
                    }
                    ?>

                    <div class="panel-body">

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Change the User name and Password</h4>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Change User name</label>
                                                <input name="usname" value="<?php echo $us; ?>" class="form-control" placeholder="Enter User name">
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Change Password</label>
                                                <input name="pasd" value="<?php echo $ps; ?>" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            <input type="submit" name="up" value="Update" class="btn btn-primary">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /. ROW  -->
        <?php
        if (isset($_POST['up'])) {
            $usname = $_POST['usname'];
            $passwr = $_POST['pasd'];

            $upsql = "UPDATE `login` SET `usname`='$usname',`pass`='$passwr' WHERE id = '$id'";
            if (mysqli_query($con, $upsql)) {
                echo ' <script language="javascript" type="text/javascript"> alert("User name and password update") </script>';
            }

            header("Location: usersetting.php");
        }
        ob_end_flush();




        ?>



        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>