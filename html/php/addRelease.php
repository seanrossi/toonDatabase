<html>
<body>

<?php

$servername = "localhost";
$username = "fan";
$password = "cartoon";
$database = "Cartoon_Database";

echo "<h1> Release Entry </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";



$title = $_POST["title"];
$releaseTitle = $_POST["Release_Title"];
$year = $_POST["year"];
$format = $_POST["format"];
$runTime = $_POST["runTime"];
$numToons = $_POST["numToons"];
$releaseDate = $_POST["releaseDate"];

//<!--Check mysql database for similar entry.-->
$conn = mysqli_connect( $servername, $username, $password, $database );

if (!$conn)
{
    die( "Connection Failed" . mysqli_connect_error() );
}

$query = "INSERT INTO Releases (releaseTitle, format, runTime, numToons, releaseDate) VALUES('$releaseTitle','$format',$runTime,$numToons,$releaseDate);";
echo "$query<br>";
$result = mysqli_query( $conn, $query );

$query = "INSERT INTO Availability (cartoonTitle, releaseTitle, year) VALUES ('$title', '$releaseTitle', '$year');";
echo "$query<br>";
$result = mysqli_query( $conn, $query );


echo "<a href='upload_01.php'>Back to Toon Entry</a>";

?>
</body>
</html>
