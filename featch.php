<?php
require_once('connection.php');

// Check if a search query is submitted
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM milcard WHERE ID_Number = '$search'";
} else {
    $query = "SELECT * FROM milcard";
}

$result = mysqli_query($com, $query);
?>
<?php
$q = "localhost";
$w = "root";
$r = "";
$db = "milcard";
$com = mysqli_connect($q, $w, $r, $db);
if (isset($_POST['data'])){
    // Handle form submission
    $stmt = $com->prepare("INSERT INTO teken (date) VALUES (?)");
    $stmt->bind_param("s", $n);
    $n = $_POST['data'];
    $stmt->execute();
}
else if(isset($_POST['Break'])){
	$stt = $com->prepare("INSERT INTO Breakfast (Breakfast ) VALUES (?)");
    $stt->bind_param("i", $ne);
    $ne = $_POST['Break'];
    $stt->execute();
}
else if(isset($_POST['Lunch'])){
	$stt = $com->prepare("INSERT INTO Lunch (Lunch ) VALUES (?)");
    $stt->bind_param("i", $ne);
    $ne = $_POST['Lunch'];
    $stt->execute();
}
else if(isset($_POST['Dinner'])){
	$stt = $com->prepare("INSERT INTO Dinner (Dinner ) VALUES (?)");
    $stt->bind_param("i", $ne);
    $ne = $_POST['Dinner'];
    $stt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	 <link rel="stylesheet" href="featch.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="home.php"><h1>home page</h1></a>
<main>
<h1>JIGJIGA UNIVERSITY</h1>
<img id="wis" src="jju.jpg" alt="jju logo" width="200px" height="200px">


    <form method="post" action="">
        <input type="text" name="search" placeholder="Search by ID">
        <input type="submit" value="Search">
		</form> 
		 <form method="post" action="featch.php">
	 <p class="jo"> <span id="cout">inter day</span></p>
	<input type="text" class="me" name="data" placeholder="Inter day" required>
        <input type="submit" value="submit">
		</form> 
   <form method="post" action="featch.php">
	<p class="jon">Breakfast taken student = <span id="count">0</span></p>
	        <input type="text" class="me" name="Break" placeholder="Inter Breakfast taken student">
        <input type="submit" value="submit">
		</form>
	   <form method="post" action="featch.php">
 <p class="jon">Lunch taken student = <span id="counter">0</span></p>
	         <input type="text" name="Lunch" class="me" placeholder="Inter Lunch taken student">
        <input type="submit" value="submit">
		</form>
        	   <form method="post" action="featch.php">
 <p class="jon">Dinner taken student = <span id="counted">0</span></p>
 	         <input type="text" name="Dinner" placeholder="Inter Dinner taken student">
			  <input type="submit" value="submit">
		</form> 
<div id="me" >
    	
    <table border="1">
        <tr>
            <td>Full Name</td>
            <td>ID</td> 
            <td>Sex</td>
            <td>Photo</td>
            <td>Breakfast</td>
            <td>Lunch</td>
            <td>Dinner</td>
            <td>Penalty</td>
        </tr>
        <?php
        for($i = 0; $i < mysqli_num_rows($result); $i++)
        {
            $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <td><?php echo $row['Full_Name']; ?></td> 
                <td><?php echo $row['ID_Number']; ?></td> 
                <td><?php echo $row['Sex']; ?></td> 
                <td><?php echo '<img src="data:photo;base64,'.base64_encode($row['photo']).'" alt="image" style="width: 100px; height: 100px;">'; ?></td>
                <td>
                    <h1>
                        <?php if ($i >= 0) { ?>
                            <button style="background-color: brown;" onclick="changeToParagraph(this)">click</button>
                        <?php } else { ?>
                            <p>&#10004;</p>
                        <?php } ?>
                    </h1>
                </td>
                <td>
                    <h1>
                        <?php if ($i >= 0) { ?>
                            <button style="background-color: brown;" onclick="change(this)">click</button>
                        <?php } else { ?>
                            <p>&#10004;</p>
                        <?php } ?>
                    </h1>
                </td>
                <td>
                    <h1>
                        <?php if ($i >= 0) { ?>
                            <button style="background-color: brown;" onclick="Paragraph(this)">click</button>
                        <?php } else { ?>
                            <p>&#10004;</p>
                        <?php } ?>
                    </h1>
                </td> 
                <td>
                    <h4>
                        <?php if ($i >= 0) { ?>
                            <button style="background-color: brown;" onclick="ni(this)" ondblclick="ni1(this)">penality</button>
                        <?php }   ?>
                    </h4>
                </td>          
            </tr>
            <?php
        }
        ?>

       
    </table>
</div>

<script>
    let count = 0;
    let b = 0;
    let d = 0;
  
    function ni(button) {
        button.parentNode.innerHTML = "<p>he/she was punished</p>";
    }

    function changeToParagraph(button) {
        button.parentNode.innerHTML = "<p>&#10004;</p>";
        document.getElementById("count").innerText = ++count;
    }

    function change(button) {
        button.parentNode.innerHTML = "<p>&#10004;</p>";
        document.getElementById("counter").innerText = ++b;
    }

    function Paragraph(button) {
        button.parentNode.innerHTML = "<p>&#10004;</p>";
        document.getElementById("counted").innerText = ++d;
    }
</script>
</main>
</body>
</html>