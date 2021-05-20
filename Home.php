<?php
  include_once('config.php');
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style media="screen">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .main {
        display: flex;
        margin-top: 3%;
        margin-left: 12%;
        padding: 10px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 79%;
        width: 75%;
        background-color: #A93c4e;
        border-radius: 10px;
    }

    .text {
        text-align: center;
        color: #fff;
        height: 15%;
        width: 95%;
        font-family: "Poppins",sans-serif;
        font-size: 20px;
        padding-top: 10px;
        font-weight: 600;
        border-bottom: 2px solid rgb(228, 228, 228);
    }

    form {
      height: 100%;
      width: 100%;
      margin-top: 10px;
    }

    .inputData {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 23%;
        height: 100%;
        width: 100%;
    }

    .inputData input {
        height: 12%;
        width: 70%;
        border: none;
        outline: none;
        border-radius: 5px;
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        padding: 5px 9px;
        font-size: 17px;
    }
    .inputData label {
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 19px;
        font-weight: 700;
    }

    #password{
      height: 100%;
      width: 93%
    }

    .password{
      display: flex;
      align-items: center;
      justify-content: left;
      height: 12%;
      width: 75%;
    }

    .showPassword {
      cursor: pointer;
      display: flex;
      height: 22px;
      width: 22px;
      margin-left: 5px;
      align-items: flex-start;
    }

    .submit {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px;
        height: 16%;
        width: 28%;
        margin-top: 3%;
        border: none;
        border-radius: 5px;
        color: rgb(102, 101, 101);
        background-color: #fff;
        font-weight: 600;
        font-size: 20px;
        letter-spacing: 0.5px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease-in-out;
    }

    .submit:hover {
        background-color: #D2AE6D;
        color: white;
    }

    .buttons {
      height: 16%;
      width: 72%;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-around;
    }

    .submit a {
      text-decoration: none;
      color: rgb(102, 101,101);
    }


    </style>
    <title>Home</title>
</head>
<body>
    <div class="main">
        <div class="text">
            <h1>Student Details</h1>
        </div>
        <form action="" method="post">
          <div class="inputData">
            <label for="fName">Student Name</label>
            <input type="text" name="name" placeholder="Student Name"><br>
            <label for="lName">Phone Number</label>
            <input type="text" name="mobile" pattern="[0-9]{10}" placeholder="Phone Number"><br>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email"><br>
            <label for="sub1">Subject 1</label>
            <input type="text" name="sub1"  placeholder="Marks"><br>
            <label for="sub2">Subject 2</label>
            <input type="text" name="sub2"  placeholder="Marks"><br>
            <label for="sub3">Subject 3</label>
            <input type="text" name="sub3"  placeholder="Marks"><br>
            <label for="sub4">Subject 4</label>
            <input type="text" name="sub4"  placeholder="Marks"><br>
            <label for="sub5">Subject 5</label>
            <input type="text" name="sub5"  placeholder="Marks"><br>
            <div class="buttons">
              <button type="submit" class="submit" name="submit">Submit</button>
              <button type="submit" class="submit"><a href="Search.php">Show&nbsp;Database</a></button>
            </div>
          </div>
        </form>
    </div>
</body>
</html>

<?php

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $sub5 = $_POST['sub5'];
    $total = $sub1 + $sub2 + $sub3 + $sub4 + $sub5;

    $sql = "INSERT INTO `Student Data` (`Student Name`, `Phone Number`, `Email Id`, `Marks_subject1`, `Marks_subject2`, `Marks_subject3`, `Marks_subject4`, `Marks_subject5`, `Total Marks`) VALUES ('$name', '$mobile', '$email', '$sub1', '$sub2', '$sub3',
       '$sub4', '$sub5', '$total')";

    $result = mysqli_query($con, $sql);
    if ($result) {
      echo "<script>alert('Data Inserted Successfully')</script>";
    }else {
      echo "<script>alert('!Opss Error!!')</script>";
    }
  }


 ?>
