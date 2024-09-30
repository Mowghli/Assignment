<!DOCTYPE html>
<?php session_start();
include "gameBuilder.php";
	if(!isset($_SESSION["gameID"]) || $_SESSION["gameID"]==-1){
			header("Location: index.php");
	 		exit;
		}

	if(empty($_POST['gameCoords'])){
		header("Location: game.php");
		 exit;
	}
	$arr = explode(',',$_POST['gameCoords']);
	$gameboard = $_SESSION["gameboard"];
	
	$gameboard[$arr[0]][$arr[1]]=($_SESSION["turn"]==1?1:2);
	$gameID = $_SESSION['gameID'];
	$winner = 0;
	$gameEnded =false;



	// check for draw

	$flag = true;
	for($i=0; $i<count($gameboard); $i++){
		for($j=0; $j<count($gameboard[$i]); $j++){
			if($gameboard[$i][$j]==0){
				$flag=false;
				break;
			}
		
		}
	}
	$dFlag = $flag;
	if($dFlag){
		$winner = 3;
		$gameEnded =true;	
	}
	

	//check if X won
	$flag = false;
	for($i=0; $i<count($gameboard[0]); $i++){
		$flag |= (($gameboard[$i][0]==$gameboard[$i][1])&&($gameboard[$i][0]==$gameboard[$i][2])&&($gameboard[$i][0]==1));
	}
	for($i=0; $i<count($gameboard); $i++){
		$flag |= (($gameboard[0][$i]==$gameboard[1][$i])&&($gameboard[0][$i]==$gameboard[2][$i])&&($gameboard[0][$i]==1));
	}
	$flag |=(($gameboard[0][0]==$gameboard[1][1])&&($gameboard[0][0]==$gameboard[2][2])&&($gameboard[0][0]==1));
	$flag |=(($gameboard[0][2]==$gameboard[1][1])&&($gameboard[0][2]==$gameboard[2][0])&&($gameboard[0][2]==1));
	$xFlag = $flag;

	if($xFlag){
		$winner = 1;
		$gameEnded =true;	
	}


	//for if Z won

	$flag = false;
	for($i=0; $i<count($gameboard[0]); $i++){
		$flag |= (($gameboard[$i][0]==$gameboard[$i][1])&&($gameboard[$i][0]==$gameboard[$i][2])&&($gameboard[$i][0]==2));
	}
	for($i=0; $i<count($gameboard); $i++){
		$flag |= (($gameboard[0][$i]==$gameboard[1][$i])&&($gameboard[0][$i]==$gameboard[2][$i])&&($gameboard[0][$i]==2));
	}
	$flag |=(($gameboard[0][0]==$gameboard[1][1])&&($gameboard[0][0]==$gameboard[2][2])&&($gameboard[0][0]==2));
	$flag |=(($gameboard[0][2]==$gameboard[1][1])&&($gameboard[0][2]==$gameboard[2][0])&&($gameboard[0][2]==2));
	$zFlag = $flag;
	if($zFlag){
		$winner = 2;
		$gameEnded =true;
	}

	gameBuilder::updateOldList($gameboard, $gameID, $winner, $gameEnded);
	var_dump($arr);
	var_dump($zFlag);
	var_dump($dFlag);
	var_dump($xFlag);

	




	if($xFlag || $zFlag || $dFlag){

		$_SESSION["gameID"]=-1;
		header("Location: gameResults.php?gameID=".$gameID);
	 		exit;
	}

	$_SESSION["gameboard"] = $gameboard;
	$_SESSION['turn'] = $_SESSION['turn']==1?0:1;
	header("Location: game.php");
	exit;


	










?>