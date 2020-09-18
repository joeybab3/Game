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
	echo "Group Name: " . $me->getName() . "<br/>\n";
	echo "Group Player 1 ID: " . $me->getPlayerId1() . "<br/>\n";
	echo "Group Player 2 ID: " . $me->getPlayerId2() . "<br/>\n";
	echo "Alive: " . $me->getIsAlive() . "<br/>\n";
	echo "Target: " . $me->getTargetEncrypted() . "<br/>\n";
	echo "Target Decrypted: " . $me->getTargetId() . "<br/>\n";
	echo "Target getName: " . $me->getTarget()->getName() . "<br/>\n";
	echo "Points: " . $me->getPoints() . "<br/>\n";
	echo "NC: " . $me->getNC() . "<br/>\n";
	
	echo "Group GetPlayer1ID: " . $me->getPlayer1()->getId() . "<br/>\n";
	echo "Group GetPlayer2ID: " . $me->getPlayer2()->getId() . "<br/>\n";