<?php
class dbConfig {
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function dbConfig() {
        $this -> serverName = 'localhost';
        $this -> userName = 'malestick';
        $this -> password = 'ma465';
        $this -> dbName = 'malestick';
    }
}
?>