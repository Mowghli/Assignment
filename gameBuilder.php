<?php

class gameBuilder{

	public static function getList(){
		$list = file_get_contents("gameData.txt");
		$list = json_decode($list);
		return $list;
	}

	public static function updateList(TicTacToeGame $newGame) {
		include_once("TicTacToeGame.php");

		$list = file_get_contents("gameData.txt");
		$list = json_decode($list);
		$arr = [];
		$arr["gameBoard"] = $newGame->getGameBoard();
		$arr["zName"] = $newGame->getZName();
		$arr["xName"] = $newGame->getXName();
		$arr["winner"] = $newGame->getWinner();
		$arr["gameEnded"] = $newGame->getGameEnded();
		$arr["gameID"] = $newGame->getGameID();
		array_push($list, $arr);
		
		return file_put_contents("gameData.txt", json_encode($list));
	}

	public static function updateOldList($gameBoard, $gameID, $winner, $gameEnded) {
		include_once("TicTacToeGame.php");

		$list = file_get_contents("gameData.txt");
		$list = json_decode($list);
		$list[$gameID]->gameBoard= $gameBoard;
		$list[$gameID]->winner = $winner;
		$list[$gameID]->gameEnded = $gameEnded;
		
		return file_put_contents("gameData.txt", json_encode($list));
	}


}
?>

