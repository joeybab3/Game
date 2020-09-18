<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Player;
    use Joeybab3\Game\DataModel;
    
    class Group extends DataModel {
	    
	    protected $name;
        protected $playerId1;
        protected $playerId2;
        protected $isAlive;
        protected $target;
        protected $points;
        protected $nc;
	    
		public function __construct($game, $groupid = -1)
		{
			$this->setTable("group");
			if($game->isInit())
			{
				parent::__construct($game, $groupid);
			}
			else
			{
				$game->init();
				parent::__construct($game, $groupid);
			}
			
		    
			$this->setId($groupid);
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
		    $sql = "CREATE TABLE IF NOT EXISTS `{$table}` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `pid1` int(11) NOT NULL,
			  `pid2` int(11) DEFAULT NULL,
			  `is_in` int(2) NOT NULL DEFAULT '1',
			  `target` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
			  `name` varchar(128) DEFAULT NULL,
			  `nc` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
			  `points` int(11) DEFAULT '0',
			  `game_id` int(11) NOT NULL DEFAULT '1',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
			return $this->getDb()->query($sql);
		}
		
		public function loadData($group = null)
        {
            if($group != null)
            {
                parent::loadData($group);
                $this->setName($group['name']);
                $this->setPlayerId1($group['pid1']);
                $this->setPlayerId2($group['pid2']);
                $this->setIsAlive($group['is_in']);
                $this->setPoints($group['points']);
                $this->setGameId($group['game_id']);
                $this->setNC($group['nc']);
                $this->loadGame();
            }
            else
            {
                if($this->getId() != -1)
                {
                    $group = $this->getDb()->fetchSingleById($this->getTable(),$this->getId());
                    parent::loadData($group);
                    $this->setName($group['name']);
	                $this->setPlayerId1($group['pid1']);
	                $this->setPlayerId2($group['pid2']);
	                $this->setIsAlive($group['is_in']);
	                $this->setPoints($group['points']);
	                $this->setGameId($group['game_id']);
	                $this->setNC($group['nc']);
                    $this->loadGame();
                }
            }
        }
		
		public function setName($name)
        {
            $this->name = $name;
        }
        
        public function getName()
        {
            return $this->name;
        }
        
        public function setPlayerId1($id)
        {
            $this->playerId1 = $id;
        }
        
        public function getPlayerId1()
        {
            return $this->playerId1;
        }
        
        public function setPlayerId2($id)
        {
            $this->playerId1 = $id;
        }
        
        public function getPlayerId2()
        {
            return $this->playerId1;
        }
        
        public function setIsAlive($alive)
        {
            $this->isAlive = intval($alive);
        }
        
        public function getIsAlive()
        {
            return intval($this->isAlive);
        }
		
		public function setPoints($points)
        {
            $this->points = intval($points);
        }
        
        public function getPoints()
        {
            return intval($this->points);
        }
        
        public function setNC($nc)
        {
            $this->nc = $nc;
        }
        
        public function getNC()
        {
            return $this->nc;
        }
    }
?>