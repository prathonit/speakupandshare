<?php
    class Db{
        public function __construct() {
            $this->hostname = 'localhost';
            $this->username = 'pks';
            $this->password = 'pwdpwd';
            $this->database = 'sus';
            $this->handle = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        }
    }
?>