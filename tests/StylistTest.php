<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {


        function test_getId()
        {
            // Arrange
            $id = 1;
            $stylist_name = "Sam";
            $new_stylist = new Stylist($stylist_name, $id);
            // Act
            $result = $new_stylist->getId();
            // Assert
            $this->assertEquals($id, $result);
        }

        function test_getStylistName()
        {
            $stylist_name = "Kim";
            $new_stylist = new Stylist($stylist_name);

            $result = $new_stylist->getStylistName();

            $this->assertEquals($stylist_name, $result);
        }

        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            $stylist_name = "Samantha";
            $new_stylist = new Stylist($stylist_name);
            $new_stylist->save();

            $result = Stylist::getAll();

            $this->assertEquals($new_stylist, $result[0]);
        }
    }

?>
