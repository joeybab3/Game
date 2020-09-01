<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Group;
    use Joeybab3\Game\DataModel;
    
    class Player extends DataModel {
	    protected $firstName;
	    protected $lastName;
	    protected $playerNumber;
	    protected $email;
	    protected $paid;
	    protected $twitter;
	    protected $groupId;
	    protected $isAlive;
	    protected $isBounty;
	    protected $points;
	    protected $hitId;
	    
		public function __construct($game, $playerid = -1)
		{
			$this->setTable("People");
			if($game->isInit())
			{
				parent::__construct($game, $playerid);
			}
			else
			{
				$game->init();
				parent::__construct($game, $playerid);
			}
			
		    
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
		    $table = $this->getTable();
		    $sql = "CREATE TABLE `{$table}` (
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
			return $this->getDb()->query($sql);
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
				$this->isIn = $player['is_in'];
				$this->isBounty = $player['is_bounty'];
				$this->points = $player['points'];
				$this->hitId = $player['hit'];
				$this->setGameId($player['game_id']);
				$this->loadGame();
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
					$this->isIn = $player['is_in'];
					$this->isBounty = $player['is_bounty'];
					$this->points = $player['points'];
					$this->hitId = $player['hit'];
					$this->setGameId($player['game_id']);
					$this->loadGame();
				}
			}
		}
		
		public function setFirstName($firstname)
		{
			$this->firstName = $firstname;
		}
		
		public function getFirstName()
		{
			return $this->firstName;
		}
		
		public function setLastName($lastname)
		{
			$this->lastName = $lastname;
		}
		
		public function getLastName()
		{
			return $this->lastName;
		}
		
		public function setPlayerNumber($num)
		{
			$this->playerNumber = $num;
		}
		
		public function getPlayerNumber()
		{
			return $this->playerNumber;
		}
		
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
    }
?>