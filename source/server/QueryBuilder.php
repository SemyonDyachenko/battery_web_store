<?php 

class QueryBuilder {

    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function GetAll($tablename)
    {
        $query = "SELECT * FROM {$tablename}";

        $statement = $this->pdo->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function CreateInsertQuery($tablename,$data)
    {
        $keys = implode(",",array_keys($data));
        $tags = ":" . implode(", :",array_keys($data));

        $query = "INSERT INTO {$tablename} ({$keys}) VALUES ({$tags})";

        $statement = $this->pdo->prepare($query);
        $statement.execute($data);

    }



}

?>