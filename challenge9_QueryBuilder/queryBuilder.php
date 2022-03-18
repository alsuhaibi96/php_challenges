<?php


//Database query builder calss

class Database {

     public const hostname = 'localhost';
     public const username = 'root';
     public const pass = '';
     public const db = 'library';


    //intializing the important variables 
    public $connection;

    private $table_name;
    private $columns    = [];
    private $values     = [];

    private $condition;
    private $limit;
    private $orderBy;
    private $groupBy;

    private $join;
    private $rightJoin;
    private $leftJoin;

    private $duplicate;
    private $columnCount;

    public $result;

    //Construct function for the connection
    public function __construct() 
    {
        try 
        {
            $this->connection = new PDO("mysql:host=".self::hostname.";dbname=".self::db."", self::username, self::pass);
        }
        catch(PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    //For retrieving the table name
    public function table(string $table_name):DataBase
    {
        $this->table_name = $table_name;
        return $this;
    }

    //for selecting from multiple columns
    public function select(string ...$columns):DataBase
    {
        $this->columns = $columns;
        return $this;
    }

    //for ordering the data accoring to specific order
    public function orderBy(string $order, string ...$columns):DataBase
    {
        $this->orderBy = implode(',', $columns) . " $order";
        return $this;
    }

    public function groupBy(string ...$columns):DataBase
    {
        $this->groupBy = implode(',', $columns);
        return $this;
    }

    public function where(string $columns, string $opreation, $value):DataBase
    {
        $condition = $columns . " " . $opreation . "  '$value'";

        $this->condition === null ?
            $this->condition = $condition :  
            $this->condition .= ' AND ' . $condition;

        return $this;
    }

    public function orWhere(string $column, string $opreation, $value):DataBase
    {
        $condition = $column . " " . $opreation . "  '$value'";
        $this->condition = $this->condition . ' OR ' . $condition;

        return $this;
    }

    public function value(...$values):DataBase
    {
        $this->values []= $values;
        return $this;
    }

    public function limit($number, $to = null):DataBase
    {
        $toRecord = $to === null ? '' : ",$to";
        $this->limit = "$number".$toRecord;

        return $this;
    }

    public function leftJoin(string $table_name, $FK, $PK):DataBase
    {
        $this->leftJoin = " LEFT JOIN  $table_name  ON  $FK  =  $PK";
        return $this;
    }

    public function rightJoin(string $table_name, $FK, $PK):DataBase
    {
        $this->rightJoin = " RIGHT JOIN  $table_name  ON  $FK  =  $PK";
        return $this;
    }

    public function join(string $table_name, $FK, $PK):DataBase
    {
        $this->join = " JOIN  $table_name  ON  $FK  =  $PK";
        return $this;
    }

    public function get()
    {
        $this->initializStm();

        $sql = "SELECT ". $this-> columns . 
                " FROM ". $this-> table_name 
                        . $this-> join
                        . $this-> leftJoin
                        . $this-> rightJoin
                        . $this-> condition 
                        . $this-> groupBy
                        . $this-> orderBy 
                        . $this-> limit;

        $stm = $this->connection->prepare($sql);
        echo $sql;
        if ($stm->execute())
        {
            $this->result = $stm->fetchAll();
        }
        else
        {
            $this->result = "error";
        }

    }

    public function update()
    {

        $this->initializStm();

        $sql = "UPDATE ". $this->table_name
                        . " SET " 
                        . $this->values 
                        . $this-> condition;
        
        $this->connection->prepare($sql)->execute();

        $this->resetInput();
    }

    public function count(string $column = null , bool $duplicate = true)
    {
        $this->columnCount = $column;
        $this->duplicate   = $duplicate;
        
        $this->initializStm();

        $sql = "SELECT COUNT (". $column ." )".
                " FROM ". $this->table_name 
                        . $this->condition 
                        . $this->orderBy;

        $stm = $this->connection->prepare($sql);
        if ($stm->execute())
        {
            $this->result = $stm->fetchAll();
        }
        
        $this->resetInput();
    }

    private function initializStm()
    {
        $this->table_name = $this->table_name === null ? ''  : $this->table_name;

        $this->columns    = $this->columns    === [] ? '*' : implode(', ', $this->columns);
        $this->values     = $this->values     === [] ? ''  : implode(', ', $this->values);

        $this->join      = $this->join      === null ? '' : $this->join;
        $this->rightJoin = $this->rightJoin === null ? '' : $this->rightJoin;
        $this->leftJoin  = $this->leftJoin  === null ? '' : $this->leftJoin;

        $this->condition = $this->condition === null ? ''  : " WHERE $this->condition ";
        $this->orderBy   = $this->orderBy   === null ? ''  : " ORDER BY $this->orderBy ";
        $this->limit     = $this->limit     === null ? ''  : " LIMIT $this->limit ";
        $this->groupBy   = $this->groupBy   === null ? ''  : " GROUP BY $this->groupBy ";

        $this->duplicate   = $this->duplicate   === true ? '' : 'DISTINCT';
        $this->columnCount = $this->columnCount === null ? " id " : "$this->duplicate  $this->columnCount";
    }

    private function resetInput()
    {
        $this->table_name = null;
        $this->columns    = [];
        $this->values     = [];

        $this->join      = null;
        $this->rightJoin = null;
        $this->leftJoin  = null;

        $this->condition   = null;
        $this->order       = null;
        $this->orderColumn = null;
        $this->limit       = null;

        $this->columnCount = null;
        $this->duplicate   = null;

        $this->result = [];
    }
}

$DataBase = new DataBase();

// Example JOIN
$DataBase -> table('product')
    -> select('product.id', 'product.name', 'categories.name')
    -> join('categories', 'product.category_id', 'categories.id')
    -> get();

echo "<hr>";
echo "Example JOIN";
print_r($DataBase->result);
echo "<hr>";

// Example LEFT JOIN

$DataBase1 = new DataBase();
$DataBase1 -> table('product')
    -> select('product.id', 'product.name', 'categories.name')
    -> leftJoin('categories', 'product.category_id', 'categories.id')
    -> get();

echo "<hr>";
echo "Example JOIN";
print_r($DataBase1->result);
echo "<hr>";

// Example RIGHT JOIN

$DataBase2 = new DataBase();
$DataBase2 -> table('product')
    -> select('product.id', 'product.name', 'categories.name')
    -> rightJoin('categories', 'product.category_id', 'categories.id')
    -> get();

echo "<hr>";
echo "Example JOIN";
print_r($DataBase2->result);
echo "<hr>";
