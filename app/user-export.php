<?php 
	include("../session.php");
	include "konek.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<table border="1">
                 <tr>
                   <td>User Id</td>
                   <td>Nama</td>
                   <td>Password</td>
                   <td>Seller</td>
                   <td>Notes</td>
                   <td>Bergabung sejak</td>
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
                 </tr>
                 <?php } ?>
               </table>
 </body>
 </html>