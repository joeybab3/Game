<?php
    namespace Joeybab3\Game;
    class DataModel extends GenericModel {
		private $table;
		public $db = false;
		protected $game;
	    
	    public function __construct($game, $id)
	    {
			parent::__construct($game->getDb(), $id);
			$this->setGame($game);
		    $this->init();
	    }
	    
	    public function init()
	    {
		    return true;
	    }
	    
	    public function setGame($game)
	    {
		    $this->game = $game;
	    }
	    
	    public function getGame()
	    {
		    return $this->game;
	    }
    }
?>