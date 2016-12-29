<?php 
	include "konek.php";
	include "../session.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<table border="1">
                 <tr>
                   <td>IDX</td>
                   <td>IMEI2</td>
                   <td>User Id</td>
                   <td>PLat Nomor</td>
                   <td>Latitude</td>
                   <td>Longitude</td>
                   <td>Speed</td>
                   <td>Heading</td>
                   <td>Acc</td>
                   <td>Oddo</td>
                   <td>Long Time</td>
                 </tr>
                 <?php
                    $res = $con->query("SELECT * from logs");
                    while ($row=$res->fetch_array()) {
                  ?>
                 <tr>
                   <td><?php echo $row['idx']; ?></td>
                   <td><?php echo $row['imei']; ?></td>
                   <td><?php echo $row['user_id']; ?></td>
                   <td><?php echo $row['plat_no']; ?></td>
                   <td><?php echo $row['lat']; ?></td>
                   <td><?php echo $row['lon']; ?></td>
                   <td><?php echo $row['speed']; ?></td>
                   <td><?php echo $row['heading']; ?></td>
                   <td><?php echo $row['acc']; ?></td>
                   <td><?php echo $row['oddo']; ?></td>
                   <td><?php echo $row['long_time']; ?></td>
                 </tr>
                 <?php } ?>
               </table>
 </body>
 </html>