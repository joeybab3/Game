<?php
    namespace Joeybab3\Game;
    
    use Joeybab3\Game\Options;
    
    class Options {
	    
	    protected $debug;
	    protected $rootDirectory;
	    protected $gameTable;
	    protected $playerTable;
	    protected $groupTable;
	    protected $dbuser;
	    protected $dbpass;
	    protected $dbname;
	    
	    public function __construct($optionsFile = null)
		{
			if($optionsFile != null)
			{
				$this->loadOptions($optionsFile);
			}
	    }
	    
	    public function loadOptions($optionsFile)
	    {
		    $options = json_decode(file_get_contents($optionsFile), true);
			$this->setRootDirectory($options['root_directory']);
			$this->setDebug($options['debug']);
			$this->setGameTable($options['game_table']);
			$this->setPlayerTable($options['player_table']);
			$this->setGroupTable($options['group_table']);
			$this->setDbUsername($options['db_username']);
			$this->setDbPassword($options['db_password']);
			$this->setDbName($options['db_name']);
	    }
	    
	    public function setDebug($debug)
	    {
		    $this->debug = $debug;
	    }
	    
	    public function getDebug()
	    {
		    return $this->debug;
	    }
	    
	    public function setRootDirectory($rootDirectory)
	    {
		    $this->rootDirectory = $rootDirectory;
	    }
	    
	    public function getRootDirectory()
	    {
		    return $this->rootDirectory;
	    }
	    
	    public function setGameTable($table)
	    {
		    $this->gameTable = $table;
	    }
	    
	    public function getGameTable()
	    {
		    return $this->gameTable;
	    }
	    
	    public function setPlayerTable($table)
	    {
		    $this->playerTable = $table;
	    }
	    
	    public function getPlayerTable()
	    {
		    return $this->playerTable;
	    }
	    
	    public function setGroupTable($table)
	    {
		    $this->groupTable = $table;
	    }
	    
	    public function getGroupTable()
	    {
		    return $this->groupTable;
	    }
	    
	    public function setDbUsername($username)
	    {
		    $this->dbuser = $username;
	    }
	    
	    public function getDbUsername()
	    {
		    return $this->dbuser;
	    }
	    
	    public function setDbPassword($password)
	    {
		    $this->dbpass = $password;
	    }
	    
	    public function getDbPassword()
	    {
		    return $this->dbpass;
	    }
	    
	    public function setDbName($name)
	    {
		    $this->dbname = $name;
	    }
	    
	    public function getDbName()
	    {
		    return $this->dbname;
	    }
    }
?>