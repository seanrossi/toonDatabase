<html>
<body>

<?php 

echo "<h1> Cartoon Entry </h1>";
echo "This script allows the user to enter cartoon data.";
echo "<br><br>";

?>

<!-- User Enters cartoon Title and Year -->
<form action="upload_02.php" method="post" accept-charset="utf-8">
Title: <input type="text" name="title">
Year: <input type="text" name="year">

<!-- Database will be searched for a matching cartoon before additional data is requested-->

<input type="submit">

</body>
</html>

