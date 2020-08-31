<?php
	require "../vendor/autoload.php";
	use Joeybab3\Game\Options;
	use \Joeybab3\Game\Game;
	use \Joeybab3\Database\Wrapper as Database;
	
	$options = new Options('options.json');
	
	$D = new Database($options->getDbUsername(),$options->getDbPassword(),$options->getDbName());
	
	$game = new Game($D);
	
	echo "Game Compiles\n ";
