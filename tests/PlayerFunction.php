<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	require "../vendor/autoload.php";
	use \Joeybab3\Game\Options;
	use \Joeybab3\Game\Game;
	use \Joeybab3\Game\Player;
	use \Joeybab3\Database\Wrapper as Database;
	
	$options = new Options('options.json');
	
	$D = new Database($options->getDbUsername(),$options->getDbPassword(),$options->getDbName());
	
	$game = new Game($D, 1);
	
	echo "Game Compiles\n <br/>";
	
	$me = new Player($game, 1);
	
	echo "Player Compiles\n\n <br/><br/>";

	$me->loadData();
	
	echo "Player ID: " . $me->getId() . "<br/>\n";
	echo "First Name: " . $me->getFirstName() . "<br/>\n";
	echo "Last Name: " . $me->getLastName() . "<br/>\n";
	echo "Player Number: " . $me->getPlayerNumber() . "<br/>\n";
	echo "Email: " . $me->getEmail() . "<br/>\n";
	echo "Paid: " . intval($me->getPaid()) . "<br/>\n";
	echo "Twitter: @" . $me->getTwitter() . "<br/>\n";
	echo "Player getGroupId: " . $me->getGroupId() . "<br/>\n";
	echo "Group OBJ getId: " . $me->getGroup()->getId() . "<br/>\n";
	echo "Alive: " . intval($me->getIsAlive()) . "<br/>\n";
	echo "Is Bounty: " . intval($me->getIsBounty()) . "<br/>\n";
	echo "Points: " . $me->getPoints() . "<br/>\n";
	
	echo "Partner id: " . $me->getPartner()->getId() . "<br/>";