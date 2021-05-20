<?php
  include_once('config.php');
  $mobileId = $_REQUEST['mobile'];
  $sql = "SELECT * FROM `Student Data` WHERE `Phone Number`='$mobileId'";

  $search=$con->query($sql);
  while($result = mysqli_fetch_array($search))
  {
      $name=$result["Student Name"];
      $mobile=$result["Phone Number"];
      $email=$result["Email Id"];
      $sub1=$result["Marks_subject1"];
      $sub2=$result["Marks_subject2"];
      $sub3=$result["Marks_subject3"];
      $sub4=$result["Marks_subject4"];
      $sub5=$result["Marks_subject5"];
      $total = $result["Total Marks"];
  }


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <style media="screen">
     table {
       font-family: arial, sans-serif;
       border-collapse: collapse;
       width: 100%;

     }

     td, th {
       border: 1px solid #dddddd;
       text-align: left;
       padding: 8px;
       font-family: "Poppins",sans-serif;
     }

     tr:nth-child(even) {
       background-color: #dddddd;
     }

     .downloadLink{
       width: 90%;
       height: 100%;
     }

     .downloadSubmit{
       height: 100%;
       cursor: pointer;
       width: 100%;
       border: none;
       background-color: #A93c4e;
       color: white;
       border-radius: 2px;
       font-family: "Poppins",sans-serif;
     }
     </style>
     <title>Search By Name</title>
   </head>
   <body>
     <table>
       <tr>
         <th>Student Name</th>
         <th>Phone Number</th>
         <th>Email</th>
         <th>Subject 1</th>
         <th>Subject 2</th>
         <th>Subject 3</th>
         <th>Subject 4</th>
         <th>Subject 5</th>
         <th>Total</th>
         <th>Download PDF</th>
       </tr>
       <tr>
         <td><?php echo $name; ?></td>
         <td><?php echo $mobile; ?></td>
         <td><?php echo $email; ?></td>
         <td><?php echo $sub1; ?></td>
         <td><?php echo $sub3; ?></td>
         <td><?php echo $sub3; ?></td>
         <td><?php echo $sub4; ?></td>
         <td><?php echo $sub5; ?></td>
         <td><?php echo $total; ?></td>
         <td><?php echo "<a class='downloadLink' href='download.php?nameData=$name&mobileData=$mobile&email=$email&sub1=$sub1&sub2=$sub2&sub3=$sub3&sub4=$sub4&sub5=$sub5&total=$total'><button type='button' class='downloadSubmit'>Download</button></a>" ?></td>
       </tr>
     </table>
   </body>
 </html>
