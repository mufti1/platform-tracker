<?php 
  include("../session.php");
  include('konek.php');
  if(isset($_POST['user'])){
    $nama=$_POST['nama'];
    $user=$_POST['user'];
    $password=$_POST['password'];
    $notes=$_POST['notes'];
    $seller=$_POST['seller'];
    $sql ="UPDATE user set user_id='$user', username='$nama', password='$password', notes='$notes', seller='$seller' where user_id=".$_GET['user_id'];
    if ($con->query($sql)) {
      header('Location:user.php');
    }
    else{
      echo "gagal mengedit data";
    }
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
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
<div class="back">
  <a href="user.php" class="btn btn-primary">kembali</a>
</div>
 <?php 
      if (isset($_GET['user_id'])){
        $res = $con->query("SELECT * from user where user_id=".$_GET['user_id']);
        $row = $res->fetch_array();

    ?>
  <div class="container">
    <div class="row edit">
      <form role="form" action=" " method="POST">
      <div class="form-group">
            <label for="usr">User Id:</label>
            <input type="text" class="form-control" id="usr" name="user" autofocus="autofocus" required="required" placeholder="eg:001" value="<?php echo $row['user_id']; ?>">
          </div>
          <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" id="usr" name="nama" required="required" placeholder="eg:mufff" value="<?php echo $row['username']; ?>">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="usr" name="password" required="required" value="<?php echo $row['password']; ?>">
          </div>
          <div class="form-group">
            <label for="notes">Notes:</label>
            <input type="text" class="form-control" id="usr" name="notes" required="required" placeholder="eg:penting" value="<?php echo $row['notes']; ?>">
          </div>
          <div class="form-group">
            <label for="seller">Seller:</label>
            <input type="text" class="form-control" id="usr" name="seller" required="required" placeholder="eg:jondy" value="<?php echo $row['seller']; ?>">
          </div>
          <div class="form-group">
            <button class="btn btn-success" type="submit" name="kirim">kirim</button>
          </div>
    </form>
    <?php } ?>
    </div>
  </div>
</body>
</html>