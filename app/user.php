<?php
  include("../session.php");
  include('konek.php');
  if (isset($_POST['user'])) {
    $user=$_POST['user'];
    $nama=$_POST['nama'];
    $pass=$_POST['password'];
    $notes=$_POST['notes'];
    $seller=$_POST['seller'];
    $date=$_POST['date'];
    $sql=("INSERT INTO user (user_id,username,password,notes,seller,date) VALUES ('$user','$nama','$pass','$notes','$seller','$date')");
    if ($con->query($sql)) {
      header('Location:user.php');
    }
    else{
      echo "gagal menambah user, user id sudah ada atau sistem error";
    }
  }
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
                <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahModal">Tambah</button>
              </li>
              <li>
                <a href="export.php" class="btn btn-primary">export to excel</a>
              </li>
              <li class="search" style="float:right; padding-right:10px">
                <form action="search-user.php" method="POST">
                  <input type="text" name="search" class="form" placeholder="masukan user_id, username atau seller">
                  <button type="submit" name="cari" class="btn btn-primary" >search</button>
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
                   <td>Seller</td>
                   <td>Notes</td>
                   <td>Bergabung sejak</td>
                   <td>Action</td>
                 </tr>
                 <?php
                    $res = $con->query("SELECT * from user");
                    while ($row=$res->fetch_array()) {
                  ?>
                 <tr>
                   <td><?php echo $row['user_id']; ?></td>
                   <td><?php echo $row['username']; ?></td>
                   <td>###</td>
                   <td><?php echo $row['seller']; ?></td>
                   <td><?php echo $row['notes']; ?></td>
                   <td><?php echo $row['date']; ?></td>
                   <td><a href="edit-user.php?user_id=<?=$row['user_id']?>" class="btn btn-primary navbar-btn login">Edit</a>&nbsp;&nbsp;<a onclick="return confirm('anda yakin akan menghapus data ini?');" href="delete-user.php?user_id=<?=$row['user_id']?>" class="btn btn-danger navbar-btn login">Delete</a></td>
                 </tr>
                 <?php } ?>
               </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bagian modal -->

<!-- Modal -->
<div id="tambahModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <div class="modal-body">
        <form role="form" action=" " method="POST">
        <div class="form-group">
            <label for="usr">User Id:</label>
            <input type="text" class="form-control" id="usr" name="user" autofocus="autofocus" required="required" placeholder="eg:001">
          </div>
          <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="nama" required="required" placeholder="eg:mufff">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="usr" name="password" required="required">
          </div>
          <div class="form-group">
            <label for="notes">Notes:</label>
            <input type="text" class="form-control" id="usr" name="notes" required="required" placeholder="eg:penting">
          </div>
          <div class="form-group">
            <label for="seller">Seller:</label>
            <input type="text" class="form-control" id="usr" name="seller" required="required" placeholder="eg:jondy">
          </div>
          <div class="form-group">
            <input type="hidden" name="date" value="<?php echo date("Y/m/d");?>">
          </div>
          <div class="form-group">
            <button class="btn btn-success" type="submit" name="kirim">kirim</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
