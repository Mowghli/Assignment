<!DOCTYPE html>
<?php 
session_start();
include "gameBuilder.php";
include "TicTacToeGame.php";
?>

<html>
	<body>

		<?php
		echo "<h1>Scoreboard</h1>";
		if(!isset($_SESSION["gameID"]) ){
			$_SESSION["gameID"]=-1;
		}
		$list = gameBuilder::getList();
		echo "<h2>There have been ".count($list)." games played on this site.</h2>";
		?>
		<form id="scoreboard" action="gameResults.php" method="get">
			<table>
			  <tr>
			  	
			  	<th>Game ID</th>
			    <th>Name of X player</th>
			    <th>Name of Y player</th>
			    <th>Status</th>
			    <th>Winner</th>
			    <th>Link</th>
			  </tr>
			  <?php 
			  	foreach($list as $id => $obj){
			  		$txt ="<tr>";
			  		$txt .="<td>". $obj->gameID . "</td>";
			  		$txt .="<td>". $obj->xName . "</td>";
			  		$txt .="<td>". $obj->zName . "</td>";
			  		$txt .="<td>". ($obj->gameEnded?"The game is complete":"The game was ended prematurely") . "</td>";
			  		switch($obj->winner){
			  			case 0: $txt .="<td>". "The game has not been completed" . "</td>";
			  			break;
			  			case 1: $txt .="<td>". $obj->xName  . "</td>";
			  			break;
			  			case 2: $txt .="<td>". $obj->zName . "</td>";
			  			break;
			  			default: $txt .="<td>". "Draw" . "</td>";
			  			break;
			  		}
			  		$txt .="<td>". '<button type="submit" name="gameID" value='. $obj->gameID. ">Click here</button></td>";
			  		$txt .="</tr>";
			  		echo $txt;
			  	}
			  	
			  	?>
			
			</table>
		</form>

	</body>
</html>