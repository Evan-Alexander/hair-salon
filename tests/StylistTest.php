<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function test_constructorAndGetters()
        {
            // Arrange
            $stylist_name = "Sue";
            $client_id = 1;
            $id = 1;

            // Act
            $new_stylist = new Stylist($stylist_name, $client_id, $id);

            // Assert
            $result_stylist_name = $new_stylist->getStylistName();
            $result_client_id = $new_stylist->getClientId();
            $result_array = array();
            array_push($result_array, $result_stylist_name, $result_client_id);

            $this->assertEquals($result_array, [$stylist_name, $client_id]);
        }
    }

?>
