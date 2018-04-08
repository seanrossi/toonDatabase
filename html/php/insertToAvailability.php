<html>
<body>
<?php 

error_reporting(-1);
ini_set('error_reporting', E_ALL);
$servername = "localhost";
$username = "fan";
$password = "cartoon";
$database = "Cartoon_Database";

echo "<h1> Add Availability </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";

$releaseTitle = $_POST["Release_Title"];
$title = $_POST["title"];
$year = $_POST["year"];

//<!--Check mysql database for similar entry.-->
$conn = mysqli_connect( $servername, $username, $password, $database );

if (!$conn)
{
    die( "Connection Failed" . mysqli_connect_error() );
}

//$query = "SELECT * FROM Releases WHERE releaseTitle='$releaseTitle';";
//$result = mysqli_query( $conn, $query );

//if( mysqli_num_rows( $result ) == 0 )
if( $_POST["Release_Title"] == "addRelease" )
{
    echo "Please fill additional fields for $releaseTitle:<br>";
    echo "<form action='addRelease.php' method='post'>";
    //echo "<input type='hidden' name='Release_Title' value='$releaseTitle'>";
    echo "<input type='hidden' name='title' value='$title'>";
    echo "<input type='hidden' name='year' value='$year'>";
    ?>
    <br>
    Release Title: <input type="text" name="Release_Title">
    <br>
    Format:
    <select name="format">
    <option value="vhs">VHS</option>
    <option value="laserdisc">Laserdisc</option>
    <option value="dvd">DVD</option>
    <option value="bluray">Blu Ray</option>
    </select>
    <br>
    runTime: <input type="text" name="runTime">
    <br>
    Number of toons: <input type="text" name="numToons">
    <br>
    Release Date: <input type="text" name="releaseDate">
    <br>
    <input type="submit">
    <?php

}

else
{
    echo "$title<br>";
    $query = "INSERT INTO Availability (cartoonTitle, releaseTitle, year) VALUES ('$title', '$releaseTitle', '$year');";
    echo "$query<br>";
    $result = mysqli_query( $conn, $query );

    echo "<a href=upload_01.php>Return to Toon Entry</a>";
}

?>


</body>
</html>

