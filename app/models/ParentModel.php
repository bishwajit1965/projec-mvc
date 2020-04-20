<?php
class ParentModel
{
    protected $dbHandler = [];
    public function __construct()
    {
        $this->dbHandler = new Database();
    }
}