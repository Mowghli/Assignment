<!DOCTYPE html>
<?php session_start();?>
<html>
<body>
	<?php
	echo "<h1>TicTacToe</h1>";
		if(isset($_SESSION["gameID"]) && $_SESSION["gameID"]!=-1){
			header("Location: game.php");
	 		exit;
		}else{
			$_SESSION["gameID"]=-1;
		}
		if(!file_exists("gameData.txt")){
			file_put_contents("gameData.txt",json_encode([]));
		}

	?>
	<p>
		Please select the namer of your players and begin the game!
	<p/>

	<form action="gameBegin.php" method="POST">
	X: <input type="text" name="xName"><br>
	0: <input type="text" name="zName"><br>
	<input type="submit">
	</form>
<a href="scoreboard.php">Click here to check the scoreboard.</a>;
</body>
</html>
