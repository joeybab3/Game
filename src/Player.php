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
                $this->setFirstName($player['first_name']);
                $this->lastName = $player['last_name'];
                $this->playerNumber = $player['number'];
                $this->email = $player['email'];
                $this->paid = $player['paid'];
                $this->twitter = $player['twitter'];
                $this->groupId = $player['group_id'];
                $this->isAlive = $player['is_in'];
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
                    $this->setFirstName($player['first_name']);
                    $this->lastName = $player['last_name'];
                    $this->playerNumber = $player['number'];
                    $this->email = $player['email'];
                    $this->paid = $player['paid'];
                    $this->twitter = $player['twitter'];
                    $this->groupId = $player['group_id'];
                    $this->isAlive = $player['is_in'];
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
        
        public function setPaid($paid)
        {
            $this->paid = intval($paid);
        }
        
        public function getPaid()
        {
            return boolval($this->paid);
        }
        
        public function setTwitter($twitter)
        {
            $this->paid = $twitter;
        }
        
        public function getTwitter()
        {
            return $this->twitter;
        }
        
        public function setGroupId($groupid)
        {
            $this->groupId = $groupid;
        }
        
        public function getGroupId()
        {
            return $this->groupId;
        }
        
        public function setGroup($group)
        {
            if($group->isLoaded())
            {
                $this->setGroupId($group->getId());
            }
            else
            {
                $this->setGroupId($group);
            }
        }
        
        public function getGroup()
        {
            return new Group($this->getGame(), $this->getGroupId());
        }
        
        public function setIsAlive($alive)
        {
            $this->isAlive = intval($alive);
        }
        
        public function getIsAlive()
        {
            return boolval($this->isAlive);
        }
        
        public function setIsBounty($bounty)
        {
            $this->isBounty = intval($bounty);
        }
        
        public function getIsBounty()
        {
            return boolval($this->isBounty);
        }
        
        public function setPoints($points)
        {
            $this->points = $points;
        }
        
        public function getPoints()
        {
            return intval($this->points);
        }
        
        public function setHitId($hitid)
        {
            $this->hitId = $hitid;
        }
        
        public function getHitId()
        {
            return $this->hitId;
        }
        
        public function setHit($hit)
        {
            if($hit->isLoaded())
            {
                $this->setHitId($hit->getId());
            }
            else
            {
                $this->setHitId($hit);
            }
        }
        
        public function getHit()
        {
            return new Hit($this->getGame(), $this->getHitId());
        }
        
        public function save()
        {
	        return true;
        }
    }
?>