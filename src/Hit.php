<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Group;
    use Joeybab3\Game\Player;
    use Joeybab3\Game\DataModel;
    
    class Hit extends DataModel {
	    
		public function __construct($game, $hitid = -1)
		{
			$this->setTable("hit");
			if($game->isInit())
			{
				parent::__construct($game, $hitid);
			}
			else
			{
				$game->init();
				parent::__construct($game, $hitid);
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
		    $sql = "CREATE TABLE IF NOT EXISTS `{$table}` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `number` int(11) NOT NULL,
			  `killer` int(11) NOT NULL,
			  `victim` int(11) NOT NULL,
			  `round` int(11) NOT NULL,
			  `media_group` int(11) DEFAULT NULL,
			  `status` int(11) DEFAULT '0',
			  `killed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `verified` timestamp NULL DEFAULT NULL,
			  `for_group` int(11) NOT NULL,
			  `against_group` int(11) DEFAULT NULL,
			  `bonus` int(11) NOT NULL,
			  `game_id` int(11) NOT NULL DEFAULT '1',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			return $this->getDb()->query($sql);
		}
		
		public function loadData($hit = null)
		{
			if($hit != null)
			{
				parent::loadData($hit);
				$this->setGameId($hit['game_id']);
				$this->loadGame();
			}
			else
			{
				if($this->getId() != -1)
				{
					$hit = $this->getDb()->fetchSingleById($this->getTable(),$this->getId());
					parent::loadData($hit);
					$this->setGameId($hit['game_id']);
					$this->loadGame();
				}
			}
		}
    }
?>