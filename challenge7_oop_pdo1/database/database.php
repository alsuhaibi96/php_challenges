<?php 

class Database {
    
    public const HOSTNAME = 'localhost';
    public const USERNAME = 'root';
    public const PASSWORD = '';
    public const DATABASE = 'library';

    public $pdo;
    public $sql;
    public $result =array();

    //Setting up the connection
    public function __construct()
    {
        $this->pdo = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);
        try 
        {       
            
            $pdo = new PDO("mysql:host=".self::HOSTNAME.";dbname=".self::DATABASE.";charset=utf8mb4",self::USERNAME, self::PASSWORD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Data base connected";
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }


    //The select method
    public function select($table, $row = '*', $where = null)
    {
        if ($where != null)
        {
            $this->sql = "SELECT $row FROM $table WHERE $where";
        }
        else
        {
            $this->sql = "SELECT $row FROM $table";
        }

        $this->result = $this->pdo->query($this->sql);
    }

    //The insert method
    public function insert($table, $data = array())
    {
        $table_columns = implode(',', array_keys($data));
        $table_values  = implode("','", $data);

        $this->sql    = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";
        $this->result = $this->pdo->query($this->sql);
    }

    //The upate method
    public function update($table, $data = array(), $id)
    {
        $param = array();

        foreach ($data as $key => $value)
        {
            $param [] = "$key = '$value'";
        }

        $this->sql  = "UPDATE $table SET ".implode(',',$param);
        $this->sql .= "WHERE $id";

        $this->result = $this->pdo->query($this->sql);
    }

    //The update method
    public function delete($table, $id)
    {
        $this->sql = "DELETE FROM $table";
        $this->sql .=" WHERE $id";

        $this->result = $this->pdo->query($this->sql);
    }
}

