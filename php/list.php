<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

//FillIn SQL //////////////////////
$SQL = $connection->prepare('SELECT * FROM article');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();

//var_dump($result);
if (isset($_SESSION["loggedin"])) {
   if ($_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='new.php'> new.php </a></p></div>";
}

for ($count = 0; $count < count($result); $count++) {
    echo "<div class='row'>";

  
	if(is_array($result[$count]) == true ) {

	//Loop and Create HTML
    // print_r($result[$count]);
        ?>

<a href="<?php echo 'view.php?id='.$result[$count]['id'] ?>">
    <h2><?php echo $result[$count]['title'] ?></h2>
</a>
<p><?php echo $result[$count]['description'] ?></p>
<img src="<?php echo $result[$count]['img'] ?>" alt="">

<?php
	}
	echo "</div>";
}



