<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Player;
    use Joeybab3\Game\DataModel;
    
    class Group extends DataModel {
	    
		public function __construct($game, $groupid = -1)
		{
			$this->setTable("People");
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
				$this->setGameId($group['game_id']);
				$this->loadGame();
			}
			else
			{
				if($this->getId() != -1)
				{
					$group = $this->getDb()->fetchSingleById($this->getTable(),$this->getId());
					parent::loadData($group);
					$this->setGameId($group['game_id']);
					$this->loadGame();
				}
			}
		}
    }
?>