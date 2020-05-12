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
    /**
     * Will insert data to database table
     *
     * @param string $table
     * @param array $fields
     *
     * @return void
     */
    public function insert($table, $fields)
    {
        $keys = implode(',', array_keys($fields));
        $values = ":" .implode(', :', array_keys($fields));
        $sql = "INSERT INTO $table($keys) VALUES($values)";
        $stmt = $this->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute() ;
    }
    /**
     * Display data from database
     *
     * @param string $table
     *
     * @return void
     */
    public function selectData($sql)
    {
        // $sql = "SELECT * FROM $table";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                return $rows;
            }
        }
    }
    /**
     * Select data from database
     *
     * @param string $sql
     * @param array $fields
     *
     * @return mixed
     */
    public function select($sql, $fields= [], $fetchStyle=PDO::FETCH_OBJ)
    {
        $stmt = $this->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchStyle);
    }
    /**
     * Will check if data exists
     *
     * @param string $sql
     * @param string $userName
     * @param string $password
     *
     * @return mixed
     */
    public function returnedRows($sql, $userName, $password)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute([$userName, $password]);
        return $stmt->rowCount();
    }
    /**
     * Will fetch user data for log in
     *
     * @param string $sql
     * @param string $userName
     * @param string $password
     *
     * @return mixed
     */
    public function selectUser($sql, $userName, $password)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute([$userName, $password]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Will update data in database
     *
     * @param string $table
     * @param array $fields
     * @param string $condition
     *
     * @return mixed
     */
    public function update($table, $fields, $condition)
    {
        $updateKeys = null;
        foreach ($fields as $key => $value) {
            $updateKeys .="$key =:$key,";
        }
        $updateKeys = rtrim($updateKeys, ",");
        $sql = "UPDATE $table SET $updateKeys WHERE $condition";
        $stmt = $this->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    /**
     * Will delete data from database
     *
     * @param string $table
     * @param string $condition
     * @param integer $limit
     *
     * @return mixed
     */
    public function delete($table, $condition, $limit=1)
    {
        $sql = "DELETE FROM $table WHERE $condition LIMIT $limit";
        return $this->exec($sql);
    }
}