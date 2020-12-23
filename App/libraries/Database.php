<?php
    //pdo database class
    class Database
    {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            //set dsn
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //create pdo
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            }
            catch(PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //prep statement with query
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        //bind values
        public function bind($param, $value, $type = null)
        {
            if (is_null($type))
            {
                switch(true)
                {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                    break; 
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                    break; 
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        }

        //execute  prepared stmt
        public function execute()
        {
            return $this->stmt->execute();
        }

        //get result set as array of objects
        public function resset()
        {
            $this->execute();
            //echo $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function single()
        {
            $this->execute();
            //echo $this->stmt->fetch(PDO::FETCH_OBJ);
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowcount()
        {
            return $this->stmt->rowCount();
        }
    }