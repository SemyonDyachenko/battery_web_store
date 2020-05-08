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

        return $statement->fetchAll();
    }

    public function GetAllCount($tablename)
    {
        $query = "SELECT * FROM {$tablename}";

        $statement = $this->pdo->prepare($query);

        $statement->execute();

        return $statement->rowCount();
    }



    public function GetAllData($tablename,$key,$value)
    {
        $query = "SELECT * FROM {$tablename} WHERE {$key} = ?";

        $statement = $this->pdo->prepare($query);

        $statement->execute($value);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function Get($tablename,$keystring,$keyvalue,$value)
    {
        $query = "SELECT ({$keystring}) FROM {$tablename} WHERE {$keyvalue} = ? ";

        $statement = $this->pdo->prepare($query);

        $statement->execute($value);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function Create($tablename,$data)
    {
        $keys = implode(",",array_keys($data));
        $tags = ":" . implode(", :",array_keys($data));

        $query = "INSERT INTO {$tablename} ({$keys}) VALUES ({$tags})";

        $statement = $this->pdo->prepare($query);
        $statement->execute($data);

    }



}

?>