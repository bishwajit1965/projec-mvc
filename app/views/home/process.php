<?php

class Process
{
    public function __construct()
    {
        header("Location:index.php");
    }
}
if (isset($_POST['submit'])) {
    new Process();
}