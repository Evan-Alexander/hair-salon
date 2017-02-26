<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TaskTest extends PHPUnit_Framework_TestCase
    {
        function test_getStylistName()
        {
            $name = "Sam";
            $test_stylist = new Stylist($name);

            $result = $test_stylist->getStylistName();

            $this->assertEquals($name, $result);
        }
    }

?>
