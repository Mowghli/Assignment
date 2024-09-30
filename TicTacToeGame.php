<?php

class TicTacToeGame {

	private $xName;
	public $zName;
	public $gameBoard;
	private $winner;
	private $gameID;
	public $gameEnded;
	 function __construct($xName, $zName, $gameID){
		$this->gameEnded = False;
		$this->winner = 0;
		$this->xName=$xName;
		$this->gameID=$gameID;
		$this->zName = $zName;
		$this->gameBoard = array();
		for($i=0; $i<3; $i++){
			$arr = [];
			for($j=0; $j<3; $j++){
				$arr[]=0;
			}
			$this->gameBoard[] = $arr;
		}

	}

	public function getGameEnded(){
		return $this->gameEnded;
	}

	public function getGameBoard(){
		return $this->gameBoard;
	}

	public function getXName(){
		return $this->xName;
	}
	public function getZName(){
		return $this->zName;
	}
	public function getWinner(){
		return $this->winner;
	}
	public function getGameID(){
		return $this->gameID;
	}


}

?>