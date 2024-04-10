<?php
require_once('connection.php');
$query = "SELECT * FROM teken";
$quy = "SELECT * FROM breakfast";
$quey = "SELECT * FROM lunch";
$que = "SELECT * FROM dinner";
$result = mysqli_query($com, $query);
$rsult = mysqli_query($com, $quy);
$reult = mysqli_query($com, $quey);
$reslt = mysqli_query($com, $que);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="card.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="home.php"><h1>home page</h1></a>
<main>
<h1>JIGJIGA UNIVERSITY</h1>
<img id="wis" src="jju.jpg" alt="jju logo" width="200px" height="200px">
<h2>JIGJIGA UNIVERSITY CAFE TEKEN STUDENTS NUMBER</h2>
    <table border="1">
        <tr>
            <td>Date</td>
            <td>Breakfast</td>
            <td>Lunch</td>
            <td>Dinner</td>
        </tr>
        <?php
        while ($row1 = mysqli_fetch_assoc($result)) {
            $row2 = mysqli_fetch_assoc($rsult);
            $row3 = mysqli_fetch_assoc($reult);
            $row4 = mysqli_fetch_assoc($reslt);
            ?>
            <tr>
                <td><?php echo isset($row1['date']) ? $row1['date'] : "null"; ?></td>
                <td><?php echo isset($row2['Breakfast']) ? $row2['Breakfast'] : "null"; ?></td>
                <td><?php echo isset($row3['Lunch']) ? $row3['Lunch'] : "null"; ?></td>
                <td><?php echo isset($row4['Dinner']) ? $row4['Dinner'] : "null"; ?></td>
            </tr>
        <?php } ?>
    </table>
	</main>
</body>
</html>