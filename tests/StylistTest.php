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
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_getId()
        {
            // Arrange
            $client_name = "Carl";
            $new_client = new Client($client_name);
            $new_client->save();
            $client_id = $new_client->getId();

            $id = 1;
            $stylist_name = "Sam";
            $new_stylist = new Stylist($stylist_name, $client_id, $id);
            // Act
            $result = $new_stylist->getId();
            // Assert
            $this->assertEquals($id, $result);
        }

        function test_getStylistName()
        {
            $client_name = "Joe";
            $new_client = new Client($client_name);
            $new_client->save();
            $client_id = $new_client->getId();

            $stylist_name = "Kim";
            $new_stylist = new Stylist($stylist_name, $client_id);

            $result = $new_stylist->getStylistName();

            $this->assertEquals($stylist_name, $result);
        }

        function test_save()
        {
            $stylist_name = "Samantha";
            $new_stylist = new Stylist($stylist_name);
            $new_stylist->save();

            $result = Stylist::getAll();

            $this->assertEquals($new_stylist, $result[0]);
        }

        function test_getAll()
        {
            $stylist1 = "Jeff";
            $new_stylist1 = new Stylist($stylist1);
            $new_stylist1->save();

            $stylist2 = "Jason";
            $new_stylist2 = new Stylist($stylist2);
            $new_stylist2->save();

            $result = Stylist::getAll();

            $this->assertEquals([$new_stylist1, $new_stylist2], $result);
        }

        function test_deleteAll()
        {
            $stylist = "Josh";
            $stylist2 = "Kat";
            $new_stylist = new Stylist($stylist);
            $new_stylist->save();
            $new_stylist2 = new Stylist($stylist2);
            $new_stylist2->save();

            Stylist::deleteAll();
            $result = Stylist::getAll();

            $this->assertEquals([], $result);
        }

        function test_find()
        {
            $stylist = "Jason";
            $stylist2 = "Jaime";
            $new_stylist = new Stylist($stylist);
            $new_stylist2 = new Stylist($stylist2);
            $new_stylist->save();
            $new_stylist2->save();

            $result = Stylist::find($new_stylist2->getId());

            $this->assertEquals($new_stylist2, $result);
        }
    }

?>
