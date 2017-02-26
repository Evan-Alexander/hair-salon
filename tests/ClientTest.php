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

        function testgetId()
        {
            //Arrange
            $stylist = "Penny";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client = "Lane";
            $stylist_id = $test_stylist->get_Stylist_Id();
            $test_client = new Client($client, $id, $stylist_id);
            $test_client->save();
            //Act
            $result = $test_client->getId();
            //Assert
            $this->assertEquals(true, is_numeric($result));
        }
    }


?>
