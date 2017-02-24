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

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_getId()
        {
            // Arrange
            $id = 1;
            $client_name = "Sam";
            $new_client = new Client($client_name, $id);
            // Act
            $result = $new_client->getId();
            // Assert
            $this->assertEquals($id, $result);
        }

        function test_getClientName()
        {
            // Arrange
            $client_name = "Fred";
            $new_client = new Client($client_name);
            // Act
            $result = $new_client->getClientName();
            // Assert
            $this->assertEquals($client_name, $result);
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

        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            $client_name = "Joe";
            $new_client = new Client($client_name);
            $new_client->save();

            $result = Client::getAll();

            $this->assertEquals($new_client, $result[0]);
        }

        function test_getAll()
        {
            $client1 = "Fred";
            $new_client1 = new Client($client1);
            $new_client1->save();

            $client2 = "Sam";
            $new_client2 = new Client($client2);
            $new_client2->save();

            $result = Client::getAll();

            $this->assertEquals([$new_client1, $new_client2], $result);
        }

        function test_deleteAll()
        {
            $client1 = "Frankenstein";
            $client2 = "Dracula";
            $new_client1 = new Client($client1);
            $new_client1->save();
            $new_client2 = new Client($client2);
            $new_client2->save();

            Client::deleteAll();
            $result = Client::getAll();

            // $this->assertEquals([], $result);

        }
    }
    ?>
