<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\GenericModel;
    
    class DataModel extends GenericModel {
		protected $game;
		protected $gameid;
	    
	    public function __construct($game, $id)
	    {
			parent::__construct($game->getDb(), $id);
			$this->setGame($game);
			$this->setGameId($game->getId());
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
	    
	    public function loadGame()
	    {
		    $game = new Game($this->getDb(), $this->getGameId());
		    $this->setGame($game);
	    }
	    
	    public function setGameId($gameid)
	    {
		    $this->gameid = $gameid;
	    }
	    
	    public function getGameId()
	    {
		    return $this->gameid;
	    }
    }
?>