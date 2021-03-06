<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	require "../vendor/autoload.php";
	use Joeybab3\Game\Options;
	use \Joeybab3\Game\Game;
	use \Joeybab3\Game\Player;
	use \Joeybab3\Database\Wrapper as Database;
	
	$options = new Options('options.json');
	
	$D = new Database($options->getDbUsername(),$options->getDbPassword(),$options->getDbName());
	
	$game = new Game($D, 1);
	
	echo "Game Compiles\n ";
	
	$me = new Player($game);
	
	echo "Player Compiles\n ";
