<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    //
    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_setClientName()
        {
            $name = "Fester";
            $stylist_id = 2;
            $id = null;
            $new_name = new Client($name, $stylist_id, $id);
            $new_client_name = "Derrick";

            $new_name->setClientName($new_client_name);
            $result = $new_name->getClientName();

            $this->assertEquals($new_client_name, $result);
        }

        function test_getClientName()
        {
            $name = "Fester";
            $stylist_id = 2;
            $id = null;
            $new_name = new Client($name, $stylist_id, $id);

            $result = $new_name->getClientName();

            $this->assertEquals($name, $result);
        }

        function test_getCLientId()
        {
            //Arrange
            $stylist = "Penny";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client = "Lane";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $id, $stylist_id);
            $test_client->save();
            //Act
            $result = $test_client->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_GetSylistId()
        {
            //Arrange
            $stylist = "Penny";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client = "Lane";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $stylist_id, $id);
            $test_client->save();
            //Act
            $result = $test_client->getStylist_Id();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $stylist = "Penny";
            $id = 2;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client = "Lane";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $stylist_id, $id);

            //Act
            $test_client->save();
            //Assert
            $result = Client::getAll();
            $this->assertEquals($test_client, $result[0]);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Jeff";
            $id = 2;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client = "Tina";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($client, $stylist_id, $id);
            $test_client->save();

            $client2 = "Turner";
            $test_client2 = new Client($client2, $stylist_id, $id);
            $test_client2->save();
            //Act
            Client::deleteAll();
            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            $client = "Evan";
            $stylist_id = 2;
            $id = null;
            $test_client = new Client($client, $stylist_id, $id);
            $test_client->save();

            $result = Client::find($test_client->getId());

            $this->assertEquals($test_client, $result);

        }


    }
?>
