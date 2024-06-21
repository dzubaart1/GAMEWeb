<?php
    $path = "/~s336533/game";

    include('queryGenerator.php');
    include('sphere.php');
    include('date.php');

    const EASY_TASK_XP = 10;
    const MEDIUM_TASK_XP = 15;
    const HARD_TASK_XP = 20;

    class Engine
    {
        //TODO: CLASS
        public $user;
        public $userSpheres;
        public $dates;
        public $pdo;
        private $path;
        
        public function __construct($path)
        {
            $this->pdo = $this->getPDO();
            $this->path = $path;
        }

        function getPDO()
        {
            $host = 'pg';
            $db = 'postgres';
            $user = 'postgres';
            $password = '1Qwerty';
    
            /*
            $db = 'pg';
            $user = 's336533';
            $password = 'fWty2E3yNk56wvM6';*/
    
            $dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    
            return new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        
        function getSpheresByEmail($email)
        {
            $query = $this -> pdo ->query(QueryAllSpheresForEmail($email));
    
            $userSpheres = array();
            
            if($query->rowCount() != 0)
            {
                $userSpheres = $query->fetchAll(\PDO::FETCH_ASSOC);
            }

            $resSpheres = array();

            if(count($userSpheres) > 0)
            {
                $id = 0;
                foreach($userSpheres as $sphere)
                {
                    array_push($resSpheres, new Sphere($sphere['sphere'], $sphere['color'], $id, $this->path));
                    $id = $id + 1;
                }
            }
    
            return $resSpheres;
        }

        public function initEngine()
        {    
            if(trim($_COOKIE['email']) == '')
            {
                echo 'EMAIL NOT REGISTERED {' . $_COOKIE['email'];
                exit();
            }

            $this -> user = $this -> getUser($_COOKIE['email']);
            $this -> userSpheres = $this->getSpheresByEmail($_COOKIE['email']);
            $this -> dates = array();
        }

        public function initSpheresByXpForAllTime()
        {
            $sphereQuery = $this->pdo->query(QueryGetUserSpheresXPAtAll($this->user['email']));
            $res = $sphereQuery->fetchAll(\PDO::FETCH_ASSOC);

            foreach($res as $sphere)
            {
                $s = $this->getSphere($sphere['sphere']);
                $s->xp = $sphere['sum'];
            }

            usort($this->userSpheres, "spheresSort");
        }

        public function tryAddUser($name, $email, $password)
        {
            $checkUserQuery = $this->pdo -> query(QuerySpecificUser($email));

            if($checkUserQuery->rowCount() != 0)
            {
                setcookie('message', 'Register Failed. User has already registered!', time()+60*60*24, '/');
                return false;
            }

            $addUserQuery = $this->pdo -> query(QueryAddNewUser($name, $email, $password));

            setcookie('message', '', -1, '/');
            setcookie('email', $email, time()+60*60*24, '/');

            return true;
        }

        public function tryAddSphere($sphere)
        {
            if(trim($sphere) == '')
            {
                $sphere = 'Сфера';
            }

            $addSphereQuery = $this->pdo -> query(QueryAddSphere($this->user['email'], $sphere));
            return true;
        }

        public function tryRemoveSphere($sphere)
        {
            $removeSphereQuery = $this->pdo -> query(QueryRemoveSphere($this->user['email'], $sphere));
            return true;
        }

        public function tryUpdateSphere($newSphere, $oldSphere, $color)
        {
            $udpateQuery = $this->pdo -> query(QueryUpdateSphere($this->user['email'], $newSphere, $oldSphere, $color));
        }

        public function tryLoginUser($email, $password)
        {
            $checkUserQuery = $this->pdo -> query(QuerySpecificUser($email));

            if($checkUserQuery->rowCount() == 0)
            {
                setcookie('message', 'Login Failed. User has not registered!', time()+60*60*24, '/');
                return false;
            }

            $user = $checkUserQuery->fetchAll(\PDO::FETCH_ASSOC);
  
            if(strcmp($password, $user[0]['password']) != 0)
            {
                setcookie('message', 'Login Failed. Password incorrect!', time()+60*60*24, '/');
                return false;
            }

            setcookie('message', '', -1, '/');
            setcookie('email', $email, time()+60*60*24, '/');

            return true;
        }

        public function addResultsToSphere($sphere, $easyTasks, $mediumTasks, $hardTasks)
        {
            if(!$mediumTasks)
            {
                $mediumTasks = 0;
            }

            if(!$easyTasks)
            {
                $easyTasks = 0;
            }

            if(!$hardTasks)
            {
                $hardTasks = 0;
            }

            $sumXp = $easyTasks * EASY_TASK_XP + $mediumTasks * MEDIUM_TASK_XP + $hardTasks * MEDIUM_TASK_XP;
            $addXPQuery = $this->pdo -> query(QueryAddResults($this->user['email'], $sphere, $sumXp));
        }

        public function initHistory()
        {
            $historyQuery = $this->pdo -> query(QueryHistoryRange($this->user['email'], $_COOKIE['fromdate'], $_COOKIE['todate']));
            $temp = $historyQuery->fetchAll(\PDO::FETCH_ASSOC);

            foreach($temp as $row)
            {
                $sphere = $this->getSphere($row['sphere']);
                $sphere->xp = $row['sum'];
                $resDate = $this->getDate($row['date']);

                if(!$resDate)
                {
                    $resDate = new Date($row['date']);
                    array_push($this->dates, $resDate);
                }

                $resDate->addSphere($sphere);
            }
        }

        public function getUser($email)
        {
            $checkUserQuery = $this->pdo -> query(QuerySpecificUser($email));
            return $checkUserQuery->fetchAll(\PDO::FETCH_ASSOC)[0];
        }

        private function getSphere($sphere)
        {
            foreach($this->userSpheres as $s)
            {
                if(strcmp($sphere, $s->name) == 0)
                {
                    return $s;
                }
            }
        }

        private function getDate($date)
        {
            foreach($this->dates as $d)
            {
                if(strcmp($date, $d->date) == 0)
                {
                    return $d;
                }
            }
        }
    }

    function spheresSort($sphere1, $sphere2)
    {
        if($sphere1->xp < $sphere2->xp)
        {
            return 1;
        }
        else if($sphere1->xp > $sphere2->xp)
        {
            return -1;
        }
        
        return 0;
    } 

    abstract class Component
    {
        abstract public function print();
    }

    $engine = new Engine($path);
?>