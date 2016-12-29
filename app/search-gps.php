<?php
  include("../session.php");
  include('konek.php');
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Platform Tracker</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
<link href="../asset/css/style.css" rel="stylesheet">
</head>
<body>
<div class="header">
  <img src="../asset/img/telkom.png">
</div>
<div id="wrapper" class="active">
<!-- Sidebar -->
  <div id="sidebar-wrapper">
  <ul id="sidebar_menu" class="sidebar-nav">
       <li class="sidebar-brand"><a id="menu-toggle" href="#"><?php echo $_SESSION['username']; ?><span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></a></li>
  </ul>
    <ul class="sidebar-nav" id="sidebar">
    <li><a href="index.php">Maps<span class="sub_icon glyphicon glyphicon-globe"></span></a></li>     
      <li><a href="gps.php">GPS<span class="sub_icon glyphicon glyphicon-map-marker"></span></a></li>
      <li><a href="user.php">User<span class="sub_icon glyphicon glyphicon-user"></span></a></li>
      <li><a href="logs.php">Logs<span class="sub_icon glyphicon glyphicon-duplicate"></span></a></li>
      <li><a href="../logout.php">Logout<span class="sub_icon glyphicon glyphicon-off"></span></a></li>
    </ul>
  </div>

  <!-- Page content -->
  <div id="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
      <div class="row">
          <div class="col-md-12">
            <div class="crud">
              <ul>
              <li class="search" style="float:right; padding-right:10px">
                <form action="search-gps.php" method="POST">
                  <input type="text" name="search" class="form" placeholder="masukan user id">
                  <button type="submit" name="cari" class="btn btn-primary">search</button>
                </form>
              </li>
              </ul>
            </div>
            <div class="tampil">
               <table class="table table-striped">
                 <tr>
                   <td>Seller</td>
                   <td>GPS Type</td>
                   <td>IMEI2</td>
                   <td>User Id</td>
                   <td>Plat Nomor</td>
                   <td>Latitude</td>
                   <td>Longitude</td>
                   <td>Speed</td>
                   <td>Heading</td>
                   <td>Sim</td>
                   <td>Port</td>
                   <td>Serial</td>
                   <td>Last Update</td>
                   <td>Last Move</td>
                   <td>Last Scan</td>
                 </tr>
                 <?php
                    if (isset($_POST['search'])) {
                      $cari=$_POST['search'];
                      $res=$con->query("SELECT * from gps where user_id like '%$cari%' or plat_no like'%$cari%'");
                      $row=$res->fetch_array();
                    }
                  ?>
                 <tr>
                   <td><?php echo $row['seller']; ?></td>
                   <td><?php echo $row['gpstype']; ?></td>
                   <td><?php echo $row['imei']; ?></td>
                   <td><?php echo $row['user_id']; ?></td>
                   <td><?php echo $row['plat_no']; ?></td>
                   <td><?php echo $row['lat']; ?></td>
                   <td><?php echo $row['lon']; ?></td>
                   <td><?php echo $row['speed']; ?></td>
                   <td><?php echo $row['heading']; ?></td>
                   <td><?php echo $row['sim']; ?></td>
                   <td><?php echo $row['port']; ?></td>
                   <td><?php echo $row['serial']; ?></td>
                   <td><?php echo $row['last_update']; ?></td>
                   <td><?php echo $row['last_move']; ?></td>
                   <td><?php echo $row['last_scan']; ?></td>
                 </tr>
               </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>
</body>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});
</script>
</html>
