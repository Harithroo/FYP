<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'fyp';
//create a DB connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if the DB connection fails, display an error message and exit
if (!$conn)
{
//  die('Could not connect: ' . mysqli_error($conn));
}
//select the database
mysqli_select_db($conn, $dbname);

$SQLv = "SELECT * FROM owners WHERE name='".$_POST['value']."'";
$query = mysqli_query($conn, $SQLv) or die(mysqli_error($conn));


echo '<table>';

while ($data = mysqli_fetch_array($query)) {

  echo '
  <tr style="background-color:pink;">
    <td style="font-size:18px;">'.$data["name"].'</td>
    <td style="font-size:18px;">'.$data["nic"].'</td>
  </tr>';

}

echo '</table>';

?>