<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    // require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            // Stylist::deleteAll();
        }

        function test_getId()
        {
            // Arrange
            $client_name = "Sam";
            $stylist_id = 1;
            $id = null;
            $new_client = new Client($client_name, $stylist_id, $id);
            // Act
            $result = $new_client->getId();
            // Assert
            $this->assertEquals($id, $result);
        }

        function test_getClientName()
        {
            // Arrange
            $client_name = "Fred";
            $stylist_id = 1;
            $id = null;
            $new_client = new Client($client_name, $stylist_id, $id);
            // Act
            $result = $new_client->getClientName();
            // Assert
            $this->assertEquals($client_name, $result);
        }
    //
    //     function test_setClientName()
    //     {
    //         $client_name = "Bob";
    //         $new_name = new Client($client_name);
    //         $new_client_name = "George";
    //
    //         $new_name->setClientName($new_client_name);
    //         $result = $new_name->getClientName();
    //
    //         $this->assertEquals($new_client_name, $result);
    //     }
    //
    //
    //     function test_save()
    //     {
    //         $client_name = "Joe";
    //         $new_client = new Client($client_name);
    //         $new_client->save();
    //
    //         $result = Client::getAll();
    //
    //         $this->assertEquals($new_client, $result[0]);
    //     }
    //
    //     function test_getAll()
    //     {
    //         $client1 = "Fred";
    //         $new_client1 = new Client($client1);
    //         $new_client1->save();
    //
    //         $client2 = "Sam";
    //         $new_client2 = new Client($client2);
    //         $new_client2->save();
    //
    //         $result = Client::getAll();
    //
    //         $this->assertEquals([$new_client1, $new_client2], $result);
    //     }
    //
    //     function test_deleteAll()
    //     {
    //         $client1 = "Frankenstein";
    //         $client2 = "Dracula";
    //         $new_client1 = new Client($client1);
    //         $new_client1->save();
    //         $new_client2 = new Client($client2);
    //         $new_client2->save();
    //
    //         Client::deleteAll();
    //         $result = Client::getAll();
    //
    //         $this->assertEquals([], $result);
    //
    //     }
    //
    //     function test_find()
    //     {
    //         $client1 = "Frankenstein";
    //         $client2 = "Dracula";
    //         $new_client1 = new Client($client1);
    //         $new_client1->save();
    //         $new_client2 = new Client($client2);
    //         $new_client2->save();
    //
    //         $result = Client::find($new_client2->getId());
    //
    //         $this->assertEquals($new_client2, $result);
    //     }
    //
    //     function test_getStylists()
    //     {
    //         $client_name = "Joe";
    //         $new_client = new Client($client_name);
    //         $new_client->save();
    //         $client_id = $new_client->getId();
    //
    //         $client_name2 = "Fred";
    //         $new_client2 = new Client($client_name2);
    //         $new_client2->save();
    //         $client_id2 = $new_client2->getId();
    //
    //         $stylist = "Jason";
    //         $new_stylist = new Stylist($stylist, $client_id);
    //         $new_stylist->save();
    //
    //         $stylist2 = "Jaime";
    //         $new_stylist2 = new Stylist($stylist2, $client_id2);
    //         $new_stylist2->save();
    //
    //         $stylist3 = "John";
    //         $new_stylist3 = new Stylist($stylist3, $client_id2);
    //         $new_stylist3->save();
    //
    //         $result = $new_client->getStylists();
    //
    //         $this->assertEquals([$new_stylist2, $new_stylist3],$result);
    //
    //     }
    }
    ?>
