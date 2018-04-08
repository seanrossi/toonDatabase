<html>
<body>

<?php

$servername = "localhost";
$username = "fan";
$password = "cartoon";
$database = "Cartoon_Database";

echo "<h1> Cartoon Entry </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";

$title = $_POST["title"];
$year = $_POST["year"];
$director = $_POST["director"];
$chr1 = $_POST["chr1"];
$chr2 = $_POST["chr2"];
$chr3 = $_POST["chr3"];
$color = $_POST["color"];

echo "$title $year $director $chr1 $chr2 $chr3 $color<br>";

//<!--Check mysql database for similar entry.-->
$conn = mysqli_connect( $servername, $username, $password, $database );

if (!$conn)
{
    die( "Connection Failed" . mysqli_connect_error() );
}

$query = "INSERT INTO Toons (title, year, director, chr1, chr2, chr3, color) VALUES ('$title', '$year', '$director', '$chr1', '$chr2', '$chr3', '$color');";
echo "$query<br>";
$result = mysqli_query( $conn, $query );

$query = "SELECT releaseTitle FROM Releases";

$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result))
{
	echo "<form action='insertToAvailability.php' method='post'>";
	echo "<select name='Release_Title'>";
	
    echo "<option value='addRelease'>Add Release</option>";

    while( $row = mysqli_fetch_assoc($result) )
    {
      echo "<option value='" . $row["releaseTitle"] . "'>" . $row["releaseTitle"] . "</option>";
      //echo $row["releaseTitle"];
      //echo "<br>";
    }

    echo "</select>";
}

echo "<input type='hidden' name='title' value='$title'>";
echo "<input type='hidden' name='year' value='$year'>";

?>

<br>

<br>
<input type="submit">

</body>
</html>
