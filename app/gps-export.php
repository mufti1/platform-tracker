<?php 
    include "../session.php";
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
                    $res = $con->query("SELECT * from gps");
                    while ($row=$res->fetch_array()) {
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
                 <?php } ?>
               </table>
 </body>
 </html>