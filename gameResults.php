<!DOCTYPE html>
<?php 
session_start();
include "gameBuilder.php";
include "TicTacToeGame.php";
?>
<html>
	<body>

		<?php
		if(!isset($_SESSION["gameID"]) ){
			$_SESSION["gameID"]=-1;
		}
		if(empty($_GET['gameID'])){
		header("Location: game.php");
		 exit;
		}
		$reference = ["[ ]", "[X]", "[0]"];
		$list = gameBuilder::getList();
		$gameData = $list[$_GET['gameID']];
		echo "<h1>Results of match between " . $gameData->xName . " and " . $gameData->zName . "</h1>";
		?>
			<table>
			  <?php 
			  	foreach($gameData->gameBoard as $subarr){
			  		echo "<tr>";
			  		foreach($subarr as $space){
			  			echo "<td>". $reference[$space]  . "</td>";
			  		}
			  		echo "</tr>";
			  	}
			  	?>
			
			</table>
			<?php
			echo "<p><b>X Player:</b> ".$gameData->xName."</p>";
			echo "<p><b>O Player:</b> ".$gameData->zName."</p>";
			echo "<p><b>Status of Game:</b> ". ($gameData->gameEnded?"The game is complete":"The game was ended prematurely")." </p>"; 
			switch($gameData->winner){
			  			case 0: echo "<p><b>X Winner:</b> "."The game has not been completed"."</p>";
			  			break;
			  			case 1: echo "<p><b>X Winner:</b> ".$gameData->xName."</p>";
			  			break;
			  			case 2: echo "<p><b>X Winner:</b> ".$gameData->zName."</p>";
			  			break;
			  			default: echo "<p><b>X Winner:</b> ". "Draw" . "</p>";
			  			break;
			  		}
			
			?>
		
	</body>
</html>