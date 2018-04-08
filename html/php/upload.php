<html>
<body>

<?php 

echo "<h1> Cartoon Entry </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";

?>

<form action="insertToon.php" method="post">
Title: <input type="text" name="title">
Year: <input type="text" name="year">
Director: <input type="text" name="director">
Character1: <input type="text" name="chr1">
Character2: <input type="text" name=chr2">
Character3: <input type="text" name="chr3">
Color: <input type="text" name="color">

<input type="submit">

</body>
</html>

