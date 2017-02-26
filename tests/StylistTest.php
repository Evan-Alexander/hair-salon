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

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function test_getStylistName()
        {
            $name = "Sam";
            $test_stylist = new Stylist($name);

            $result = $test_stylist->getStylistName();

            $this->assertEquals($name, $result);
        }

        function test_get_Stylist_Id()
        {
            $stylist_name = "Fred";
            $id =1;
            $test_stylist = new Stylist($stylist_name, $id);

            $result = $test_stylist->get_Stylist_Id();

            $this->assertEquals(true, is_numeric($result));
        }

        function test_Save()
        {
            $stylist_name = "Dan";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();

            $result = Stylist::getAll();

            $this->assertEquals($test_stylist, $result[0]);
        }
    }

?>
