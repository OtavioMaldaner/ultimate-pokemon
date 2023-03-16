<?php

require_once "Config.php";

class MySQL{
    
    private $connection;

    public function __construct()
    {
        $this->connection = new \mysqli(HOST,USER,PASSWORD,DATABASE);
        $this->connection->set_charset("utf8mb4");
    }

    public function execute($sql): bool
    {
        return $this->connection->query($sql);
    }
    
    public function query($sql): array
    {
        $result = $this->connection->query($sql);
        $item = array();
        $data = array();
        while($item = mysqli_fetch_array($result)){
            $data[] = $item;
        }
        return $data;
    }
}
