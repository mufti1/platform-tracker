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
              <li>
                <a href="user.php" class="btn btn-success">Kembali</a>
              </li>
              <li class="search" style="float:right; padding-right:10px">
                <form action="search-user.php" method="POST">
                  <input type="text" name="search" placeholder="masukan user_id, username atau seller" class="form">
                  <button type="submit" name="cari" class="btn btn-primary">search</button>
                </form>
              </li>
              </ul>
            </div>
            <div class="tampil">
               <table class="table table-striped">
                 <tr>
                   <td>User Id</td>
                   <td>Nama</td>
                   <td>Password</td>
                   <td>Notes</td>
                   <td>Seller</td>
                   <td>Action</td>
                 </tr>
                 <?php
                  if (isset($_POST['search'])) {
                    $cari=$_POST['search'];
                  
                    $res = $con->query("SELECT * from user where user_id like '%$cari%' or username like '%$cari%' or seller like '%$cari%' or date like '%$cari%'");
                    while ($row=$res->fetch_array()) {
                  ?>
                 <tr>
                   <td><?php echo $row['user_id']; ?></td>
                   <td><?php echo $row['username']; ?></td>
                   <td>###</td>
                   <td><?php echo $row['notes']; ?></td>
                   <td><?php echo $row['seller']; ?></td>
                   <td><a href="edit-user.php?user_id=<?=$row['user_id']?>" class="btn btn-primary navbar-btn login">Edit</a>&nbsp;&nbsp;<a onclick="return confirm('anda yakin akan menghapus data ini?');" href="delete-user.php?user_id=<?=$row['user_id']?>" class="btn btn-danger navbar-btn login">Delete</a></td>
                 </tr>
                 <?php }
                  } ?>
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
