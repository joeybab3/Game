<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Options;
    
    class Game extends GenericModel {
	    protected $dbh;
	    protected $isInit;
	    protected $year;
	    protected $number;
	    
		public function __construct($database, $gameid = -1)
		{
			parent::__construct($database);
			
		    $this->setTable("game");
			$this->setId($gameid);
			$this->init();
	    }
	    
	    public function init()
	    {
		    if($this->getId() != -1)
		    {
			    $this->loadData();
		    }
		    $this->init = true;
	    }
	    
	    public function isInit()
	    {
		    return $this->isInit;
	    }
	    
	    public function setYear($year)
	    {
		    $this->year = $year;
	    }
	    
	    public function getYear()
	    {
		    return $this->year;
	    }
	    
	    public function setNumber($number)
	    {
		    $this->number = $number;
	    }
	    
	    public function getNumber()
	    {
		    return $this->number;
	    }
	    
	    private function createTable()
	    {
		    $sql = 
		    	"CREATE TABLE IF NOT EXISTS `game` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(64) NOT NULL,
				  `status` int(1) NOT NULL DEFAULT '0',
				  `is_group_game` tinyint(4) NOT NULL,
				  `botEmail` varchar(64) NOT NULL,
				  `botHandle` varchar(64) NOT NULL,
				  `year` year(4) NOT NULL DEFAULT '2017',
				  `school` int(11) NOT NULL,
				  `number` int(11) NOT NULL,
				  `leader_id` int(11) DEFAULT NULL,
				  `start_date` date DEFAULT NULL,
				  `players` int(11) NOT NULL DEFAULT '0',
				  `alive` int(11) DEFAULT '0',
				  `form` varchar(256) NOT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		}
		
		public function loadData($data = null)
		{
			if($this->getId() != -1 && $data == null)
			{
				$game = $this->getDb()->fetchSingleById($this->getTable(),$this->getId());
				parent::loadData($game);
				$this->firstName = $player['first_name'];
				$this->lastName = $player['last_name'];
				$this->playerNumber = $player['number'];
				$this->email = $player['email'];
				$this->paid = $player['paid'];
				$this->twitter = $player['twitter'];
				$this->groupId = $player['group_id'];
				$this->group = new Group($this->getDb(), $this->groupId);
				$this->isIn = $player['is_in'];
				$this->isBounty = $player['is_bounty'];
				$this->points = $player['points'];
				$this->hitId = $player['hit'];
				$this->hit = new Hit($this->getDb(), $this->hitId);
				$this->gameId = $player['game_id'];
				$this->game = $this->getGame();
			}
		}
    }
?>