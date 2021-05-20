<?php
  include_once('config.php');

  $conition = 0;

  function check_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);

      return $data;
  }

  if (!$con) {
      die("Connection to the Server Failed Due to::".mysqli_connect_error());
  }

  if (isset($_POST['submitName'])) {

    $name = check_input($_POST['searchByName']);
    $conition = 1;

    $sql = "SELECT `Student Name`, `Phone Number`, `Email Id`, `Marks_subject1`, `Marks_subject2`, `Marks_subject3`, `Marks_subject4`, `Marks_subject5`, `Total Marks` FROM `Student Data` WHERE `Student Name` = '$name'";
    $result = $con->query($sql);

  } elseif (isset($_POST['submitPhone'])) {

    $mobile = check_input($_POST['searchByPhone']);
    $conition = 1;

    $sql = "SELECT `Student Name`, `Phone Number`, `Email Id`, `Marks_subject1`, `Marks_subject2`, `Marks_subject3`, `Marks_subject4`, `Marks_subject5`, `Total Marks` FROM `Student Data` WHERE `Phone Number` = '$mobile'";
    $result = $con->query($sql);

  } elseif (isset($_POST['submitMarks'])) {

    $Marks = check_input($_POST['searchByMarks']);
    $conition = 2;

    $sql = "SELECT `Student Name`,`Phone Number`, `Email Id` FROM `Student Data` WHERE `Marks_subject1` OR `Marks_subject2` OR `Marks_subject3` OR `Marks_subject4` OR `Marks_subject5` >= $Marks ";
    $result = $con->query($sql);
  }

  $con->close();


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap');
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body{
        display: flex;
        flex-direction: column;
        height: 100vh;
        width: 100%;
        margin-top: 2%;
        align-items:flex-start;
        justify-content: center;

      }

      .search{
        height: 20%;
        padding: 20px 0px;
        width: 80%;
        margin-bottom: 5%;
        margin-left: 10%
      }

      .searchBar{
        display: flex;
        flex-direction: row;
        height: 40%;
        width: 70%;
        border: 1px solid gray;
        outline: none;
        font-size: 20px;
        padding: 0px 10px;
        border-radius: 20px;
        font-family: "Poppins",sans-serif;
        margin-top: 3%;
        margin-left: 3%;
        transition: all 0.3s ease-in-out;
      }

      .searchBar:focus{
        width: 76%;
        margin-left: 0%;
      }

      .submit {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px;
        height: 40%;
        margin-top: 1%;
        font-family: "Poppins",sans-serif;
        width: 13%;
        margin-left: 15%;
        border: none;
        border-radius: 5px;
        color: white;
        background-color: #A93c4e;
        transition: all 0.3s ease-in-out;
      }

      .submit:hover {
        background-color: #D2AE6D;
        color: white;
      }

      .bottomLine {
        border: 1px solid gray;
        margin-top: 2%;
        height: 1px
      }

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

      .data {
        height: 70%;
        width: 100%;
        margin-top: 20%;
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
    <title>Search</title>
  </head>
  <body>
    <div class="search">
      <form action="" method="post">
      <input type="text" class="searchBar" name="searchByName" placeholder="Search By Name">
      <button type="submit" class="submit" name="submitName">Submit</button>
      <input type="text" class="searchBar" name="searchByPhone" placeholder="Search By Phone Number">
      <button type="submit" class="submit" name="submitPhone">Submit</button>
      <input type="text" class="searchBar" name="searchByMarks" placeholder="Search By Marks">
      <button type="submit" class="submit" name="submitMarks">Submit</button>
      </form>
      <hr class="bottomLine">
    </div>
    <div class="data">
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
      <?php
        if ($conition == 1) {

      if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
      ?>

      <tr>
        <td><?php $nameData=$row["Student Name"]; echo $nameData; ?></td>
        <td><?php $mobileData=$row["Phone Number"]; echo $mobileData;  ?></td>
        <td><?php $email=$row["Email Id"]; echo $email; ?></td>
        <td><?php $sub1=$row["Marks_subject1"]; echo $sub1; ?></td>
        <td><?php $sub2=$row["Marks_subject2"]; echo $sub2; ?></td>
        <td><?php $sub3=$row["Marks_subject3"]; echo $sub3; ?></td>
        <td><?php $sub4=$row["Marks_subject4"]; echo $sub4; ?></td>
        <td><?php $sub5=$row["Marks_subject5"]; echo $sub5; ?></td>
        <td><?php $total=$row["Total Marks"]; echo $sub1; ?></td>
        <td><?php echo "<a class='downloadLink' href='download.php?nameData=$nameData&mobileData=$mobileData&email=$email&sub1=$sub1&sub2=$sub2&sub3=$sub3&sub4=$sub4&sub5=$sub5&total=$total'><button type='button' class='downloadSubmit'>Download</button></a>" ?></td>
      </tr>
      <?php
    }
  }
}
elseif ($conition == 2) {

  if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
      ?>

      <tr>
        <td><a href="StudentInfoByName.php?mobile=<?php echo $row['Phone Number']; ?>"><?php echo $row["Student Name"]; ?></td>
        <td><?php echo $row["Phone Number"]; ?></td>
        <td><?php echo $row["Email Id"]; ?></td>
      </tr>

      <?php
    }
  }
}
       ?>
       </table>
    </div>
  </body>
</html>
