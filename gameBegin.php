<?php
session_start();
include "gameBuilder.php";
include "TicTacToeGame.php";
	
	if(!empty($_SESSION["gameID"]) && $_SESSION["gameID"]!=-1){
		header("Location: game.php");
			exit;
	}else{
		$_SESSION["gameID"]=-1;
	}
	$list = gameBuilder::getList();
	$zName = $_POST["zName"];
	$xName = $_POST["xName"];
	$gameID = count($list);
	
	$newGame = new TicTacToeGame($xName, $zName, $gameID);
	gameBuilder::updateList($newGame);
	$_SESSION["zName"]=$zName;
	$_SESSION["xName"]=$xName;
	$_SESSION["winner"]=0;
	$_SESSION["gameEnded"]=false;
	$_SESSION["gameboard"]=[[0,0,0],[0,0,0],[0,0,0]];
	$_SESSION["turn"] = 1;
	var_dump($_SESSION["gameboard"]);
	$_SESSION["gameID"]=$gameID;
	header("Location: game.php");
	exit;







?>