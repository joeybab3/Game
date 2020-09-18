<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	require "../vendor/autoload.php";
	use \Joeybab3\Game\Options;
	use \Joeybab3\Game\Game;
	use \Joeybab3\Game\Group;
	use \Joeybab3\Database\Wrapper as Database;
	
	$options = new Options('options.json');
	
	$D = new Database($options->getDbUsername(),$options->getDbPassword(),$options->getDbName());
	
	$game = new Game($D, 1);
	
	echo "Game Compiles\n <br/>";
	
	$me = new Group($game, 1);
	
	echo "Group Compiles\n\n <br/><br/>";

	$me->loadData();
	
	echo "Group ID: " . $me->getId() . "<br/>\n";
	echo "Alive: " . intval($me->getIsAlive()) . "<br/>\n";
	echo "Points: " . $me->getPoints() . "<br/>\n";