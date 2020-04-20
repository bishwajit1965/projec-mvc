<?php
/**
 * Database class extends PDO class
 */
class Database extends PDO
{
    public function __construct()
    {
        $dsn = 'mysql:dbname=pro_mvc;host=127.0.0.1';
        $user = 'root';
        $passWord = '';
        parent::__construct($dsn, $user, $passWord);
    }
    public function select($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                return $rows;
            }
        }
    }
}