<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            // Arrange
            $id = 1;
            $client_name = "Sam";
            $new_client = new Client($client_name, $id);
            // Act
            $result = $new_client = $new_client->getId();
            // Assert
            $this->assertEquals($id, $result);
        }
        function test_getClientName()
        {
            // Arrange
            $client_name = "Fred";
            $new_client = new Client($client_name);
            // Act
            $result = $new_client = $new_client->getClientName();
            // Assert
            $this->assertEquals($new_client, $result);
        }

        function test_setClientName()
        {
            $client_name = "Bob";
            $new_name = new Client($client_name);
            $new_client_name = "George";

            $new_name->setClientName($new_client_name);
            $result = $new_name->getClientName();

            $this->assertEquals($new_client_name, $result);
        }
    }
    ?>
