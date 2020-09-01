<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Options;
    
    class Game extends GenericModel {
	    protected $isInit;
	    protected $year;
	    public $number;
	    
		public function __construct($database, $gameid = -1)
		{
			parent::__construct($database);
			
		    $this->setTable("game");
			$this->setId($gameid);
			$this->init();
			
			return $this;
	    }
	    
	    public function init()
	    {
		    if($this->isInit)
		    {
			    
		    }
		    else
		    {
			    if($this->getId() != -1)
			    {
				    $this->loadData();
			    }
			    $this->isInit = true;
		    }
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
			}
		}
    }
?>