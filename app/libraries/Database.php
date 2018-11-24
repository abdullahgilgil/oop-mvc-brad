<?php
   /**
    * PDO DATABASE CLASS
    * Connect to database
    * Cretae prepared statement
    * Bind values
    * return rows and resuts
    */

   class Database {

      private $host = DB_HOST;
      private $user = DB_USER;
      private $pass = DB_PASS;
      private $dbname = DB_NAME;

      private $dbh;
      private $stmt;
      private $error;
      
      public function __construct(){
         // SET DSN
         $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
         $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         );

         // CREATE PDO INSTANCE
         try {

            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            $this -> dbh -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

         } 
         catch(PDOException $e){
            $this->error = $e -> getMessage();
            echo $this->error;
         }


      } // __construct

      // PREPARE STATEMENT WITH QUERY
      public function query($sql){
         $this->stmt = $this->dbh->prepare($sql);
      }


      // BIND VALUES
      public function bind($param, $value, $type = null){
         if(is_null($type)){
            switch (true) {
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
         } // IF(IS_NULL($TYPE))

         $this->stmt->bindValue($param, $value, $type);

      } // BIND VALUES


      // EXECUTE THE PREPARED STATEMENT
      public function execute(){
         return $this->stmt->execute();   

      } // EXECUTE()


      // GET RESULT SET AS ARRAY OF OBJECT
      public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll();

      } // resultSet()

      // GET SINGLE RECORD AS OBJECT
      public function single(){
         $this->execute();
         return $this->stmt->fetch();
      }

      // GET THE ROWCOUNT
      public function rowCount(){
         return $this->stmt->rowCount();

      } // rowCount()

   }

?>