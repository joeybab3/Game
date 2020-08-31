<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Group;
    
    class Player extends DataModel {
	    private $firstName;
	    private $lastName;
	    private $playerNumber;
	    private $email;
	    private $paid;
	    private $twitter;
	    private $groupId;
	    private $group;
	    private $isAlive;
	    private $isBounty;
	    private $points;
	    private $hitId;
	    private $hit;
	    private $gameId;
	    protected $game;
	    
		public function __construct($game, $playerid = -1)
		{
			if($game->isInit())
			{
				parent::__construct($game, $playerid);
			}
			else
			{
				$game->init();
				parent::__construct($game, $playerid);
			}
			
		    $this->setTable("People");
			$this->setId($playerid);
			$this->init();
	    }
	    
	    public function init()
	    {
		    if($this->getId() != -1)
		    {
			    $this->loadData();
		    }
	    }
	    
	    private function createTable()
	    {
		    $sql = "CREATE TABLE `People` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `number` int(11) NOT NULL,
			  `first_name` varchar(32) CHARACTER SET latin1 NOT NULL,
			  `last_name` varchar(32) CHARACTER SET latin1 NOT NULL,
			  `email` varchar(128) CHARACTER SET latin1 NOT NULL,
			  `paid` tinyint(1) NOT NULL DEFAULT '0',
			  `twitter` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
			  `group_id` int(11) DEFAULT NULL,
			  `is_in` tinyint(1) NOT NULL DEFAULT '1',
			  `is_bounty` tinyint(1) NOT NULL DEFAULT '0',
			  `points` int(11) DEFAULT '0',
			  `hit` int(11) DEFAULT NULL,
			  `game_id` int(11) NOT NULL DEFAULT '1',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		}
		
		public function loadData($player = null)
		{
			if($player != null)
			{
				parent::loadData($player);
				$this->firstName = $player['first_name'];
				$this->lastName = $player['last_name'];
				$this->playerNumber = $player['number'];
				$this->email = $player['email'];
				$this->paid = $player['paid'];
				$this->twitter = $player['twitter'];
				$this->groupId = $player['group_id'];
				//$this->group = new Group($this->getDb(), $this->groupId);
				$this->isIn = $player['is_in'];
				$this->isBounty = $player['is_bounty'];
				$this->points = $player['points'];
				$this->hitId = $player['hit'];
				//$this->hit = new Hit($this->getDb(), $this->hitId);
				$this->gameId = $player['game_id'];
				$this->game = $this->getGame();
			}
			else
			{
				if($this->getId() != -1)
				{
					$player = $this->getDb()->fetchSingleById($this->getTable(),$this->getId());
					parent::loadData($player);
					$this->firstName = $player['first_name'];
					$this->lastName = $player['last_name'];
					$this->playerNumber = $player['number'];
					$this->email = $player['email'];
					$this->paid = $player['paid'];
					$this->twitter = $player['twitter'];
					$this->groupId = $player['group_id'];
					//$this->group = new Group($this->getDb(), $this->groupId);
					$this->isIn = $player['is_in'];
					$this->isBounty = $player['is_bounty'];
					$this->points = $player['points'];
					$this->hitId = $player['hit'];
					//$this->hit = new Hit($this->getDb(), $this->hitId);
					$this->gameId = $player['game_id'];
					$this->game = $this->getGame();
				}
			}
		}
    }
?>