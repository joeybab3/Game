<?php
    namespace Joeybab3\Game;
    class GenericModel {
	    protected $id = -1;
	    
		protected $table;
		protected $dbh;
		
		public $db = false;
		public $loaded = false;
	    
	    public function __construct($database, $id = -1)
	    {
		    if($id != -1)
		    {
			    $this->setId($id);
		    }
		    
			$this->dbh = $database;
			
		    if(!$this->dbh->isInit())
		    {
			    $this->dbh->init();
		    }
		    
		    $this->setLoaded(true);
	    }
		
		public function getDb()
		{
			return $this->dbh;	
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
		    $this->setLoaded(true);
	    }
    }
?>