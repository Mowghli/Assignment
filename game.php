<!DOCTYPE html>
<?php session_start();?>
<html>
	<body>
		<?php
		if(!isset($_SESSION["gameID"]) || $_SESSION["gameID"]==-1){
			header("Location: index.php");
	 		exit;
		}
		$reference = ["[_]", "X", "0"];
		$gameBoard = $_SESSION['gameboard'];
		echo $_SESSION["gameID"];
		
		echo "<h1>Match between" . $_SESSION['xName'] . " and " . $_SESSION['zName'] . "</h1>";
		echo "<h2>It is currently " .($_SESSION["turn"]==1?$_SESSION['xName']:$_SESSION['zName']). "'s turn</h2>";
		?>
		<form id="scoreboard" action="gameRunner.php" method="post">
			<table>
			  <?php 
			  for($i=0; $i<count($gameBoard); $i++){
			  		echo "<tr> ";
			  		for($j=0; $j<count($gameBoard[$i]); $j++){
			  			$t = $i . ",".$j;
			  			switch($gameBoard[$i][$j]){
				  			case 0: echo '<td><button type="submit" name="gameCoords" value='. $t .'>'.$reference[$gameBoard[$i][$j]].'</button></td>';
				  					break;
				  			case 1: echo "<td>". $reference[$gameBoard[$i][$j]]  . "</td>";
				  					break;
				  			case 2: echo "<td>". $reference[$gameBoard[$i][$j]]  . "</td>";
				  					break;
				  			default: 
				  					break;
			  			}
			  		}
			  		echo "</tr>";
			  	}
			  	?>
			
			</table>
		</form>
		<?php
			echo "<p><b>X Player:</b> ".$_SESSION['xName']."</p>";
			echo "<p><b>O Player:</b> ".$_SESSION['zName']."</p>";
			echo "<p><b>Status of Game:</b> ". ($_SESSION['gameEnded']?"The game is complete":"The game has not yet been completed")." </p>"; 
			switch($_SESSION['winner']){
	  			case 0: echo "<p><b>X Winner:</b> "."The game has not been completed"."</p>";
	  					break;
	  			case 1: echo "<p><b>X Winner:</b> ".$_SESSION['xName']."</p>";
	  					break;
	  			case 2: echo "<p><b>X Winner:</b> ".$_SESSION['zName']."</p>";
	  					break;
	  			default: echo "<p><b>X Winner:</b> ". "Draw" . "</p>";
	  					break;
			  		}
			
			?>
	</body>
</html>