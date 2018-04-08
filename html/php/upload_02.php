<html>
<body>

<meta http-equiv="Content Type" content="text/html;charset=UTF-8">

<?php 
error_reporting(-1);
ini_set('error_reporting', E_ALL);
$servername = "localhost";
$username = "fan";
$password = "cartoon";
$database = "Cartoon_Database";

echo "<h1> Cartoon Entry </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";

$title = $_POST["title"];
$title = htmlspecialchars($title);
echo "$title<br>";
$year = $_POST["year"];


//<!--Check mysql database for similar entry.-->
$conn = mysqli_connect( $servername, $username, $password, $database );

if (!$conn)
{
    die( "Connection Failed" . mysqli_connect_error() );
}

$query = "SELECT * FROM Toons WHERE title='" . $title . "';";
$result = mysqli_query( $conn, $query );

if( mysqli_num_rows( $result ) == 0 )
{
    echo "$title not found. Please enter data<br>";
    ?>
    <form action="insertToon.php" method="post" accept-charset="utf-8">
    <input type="text" name="title" value="<?php echo $title ?>">
    <?php
    echo "<input type='hidden' name='year' value=" . $year . ">";
    ?>
    <br>
    Director: <input type="text" name="director">
    <br>
    Character1: <input type="text" name="chr1">
    <br>
    Character2: <input type="text" name="chr2">
    <br>
    Character3: <input type="text" name="chr3">
    <br>
    Color: 
    <select name="color">
        <option value="b&w">Black and White</option>
        <option value="2-strip"> 2-strip Technicolor</option>
        <option value="3-strip"> 3-strip Technicolor</option>
    </select>
    <br>
    <input type="submit">
    <?php

}

else
{
    $query = "SELECT releaseTitle FROM Releases";

    $result = mysqli_query($conn, $query);
    echo "$title has already been added. You may add a release for this cartoon, or enter a new cartoon.<br>";

    echo "<a href='upload_01.php'> Return to Toon Entry</a>";
    echo "<br>";

    echo "<form action='insertToAvailability.php' method='post'>";
    echo "<select name='Release_Title'>";
    
    echo "<option value='addRelease'>Add Release</option>";
    
    if( mysqli_num_rows($result))
    {
        

        while( $row = mysqli_fetch_assoc($result) )
        {
            echo "<option value='" . $row["releaseTitle"] . "'>" . $row["releaseTitle"] . "</option>";
            //echo $row["releaseTitle"];
            //echo "<br>";
        }
    }
        echo "</select>";
        echo "<input type='hidden' name='title' value='$title'>";
        echo "<input type='hidden' name='year' value='$year'>";
        echo "<br>";
        echo "<input type='submit'>";
}

?>


</body>
</html>

