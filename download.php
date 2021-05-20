<?php

  require_once __DIR__ . '/vendor/autoload.php';


  $name = $_REQUEST['nameData'];
  $mobile = $_REQUEST['mobileData'];
  $email = $_REQUEST['email'];
  $sub1 = $_REQUEST['sub1'];
  $sub2 = $_REQUEST['sub2'];
  $sub3 = $_REQUEST['sub3'];
  $sub4 = $_REQUEST['sub4'];
  $sub5 = $_REQUEST['sub5'];
  $total = $_REQUEST['total'];

$mpdf = new \Mpdf\Mpdf();

  $table = ''.

  $table.= '<style>
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
        }</style>';

  $table.= '<table>
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
    </tr>';

    $table .= '<tr><td>'.$name.'</td>';
    $table .= '<td>'.$mobile.'</td>';
    $table .= '<td>'.$email.'</td>';
    $table .= '<td>'.$sub1.'</td>';
    $table .= '<td>'.$sub2.'</td>';
    $table .= '<td>'.$sub3.'</td>';
    $table .= '<td>'.$sub4.'</td>';
    $table .= '<td>'.$sub5.'</td>';
    $table .= '<td>'.$total.'</td></tr></table>';

    $mpdf->WriteHTML($table);
    $mpdf->Output('Student.pdf', 'D');


 ?>
