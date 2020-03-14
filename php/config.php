<!-- Config File for connecting to database and secure session -->
<?php 
    class MyDB extends SQLite3 {
       function __construct() {
          $this->open('../developer.db');
       }
    }
    $db = new MyDB();
    if(!$db) {
       echo $db->lastErrorMsg();
    } else {
       echo "Opened database successfully\n";
    }

?>