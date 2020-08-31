<?php
    namespace Joeybab3\Game;
    class GenericModel {
	    private $id = -1;
		private $table;
		private $dbh;
		public $db = false;
		public $loaded = false;
	    
	    public function __construct($database, $id = -1)
	    {
		    if(!$database->isInit())
		    {
			    $this->dbh = $database;
			    $this->dbh->init();
		    }
		    
		    if($id != -1)
		    {
			    $this->setId($id);
		    }
			
		    $this->init();
	    }
		
		public function getDb()
		{
			return $this->dbh;	
		}
	    
	    public function init()
	    {
		    $this->loaded = true;
		    return true;
	    }
	    
	    public function isLoaded()
	    {
		    return $this->loaded;
	    }
	    
	    public function setLoaded($loaded)
	    {
		    $this->loaded = $loaded;
	    }
		
		public function getTable()
		{
			return $this->table;
		}
		
		public function setTable($tablename)
		{
			$this->table = $tablename;
		}
	    
	    public function getId()
	    {
		    return $this->id;
	    }
	    
	    public function setId($id)
	    {
		    $this->id = $id;
	    }
	    
	    public function loadData($object)
	    {
		    $this->setId($object['id']);
	    }
    }
?>