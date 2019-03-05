<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

include 'header.php';

var_dump($_GET);
var_dump($_SESSION);

$result = GetFromDBWithId($_GET['id'], $connection);

echo "<div class='row'>";

for ($count = 0; $count < count($result); $count++) { 
	if(is_array($result[$count]) == true ) {
	//Loop And FillIn HTML//////////////////////////
        ?>

<img src="<?php echo $result[$count]['img'] ?>" alt="">
<h2><?php echo $result[$count]['title'] ?></h2>
<p><?php echo $result[$count]['description'] ?></p>

<?php
	}
	if (isset($_SESSION["loggedin"])){
	if($_SESSION["loggedin"] == true) echo "<p><a href='edit.php?id=".$result[$count]['id']."'</a>edit the article</p>";
    }
}

echo "</div class='row'>";

include 'footer.php';
