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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_setStylistName()
        {
            $name = "Fester";
            $new_name = new Stylist($name);
            $new_stylist_name = "Derrick";

            $new_name->setStylistName($new_stylist_name);
            $result = $new_name->getStylistName();

            $this->assertEquals($new_stylist_name, $result);
        }
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

            $result = $test_stylist->getId();

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

        function test_getAll()
        {

            //Arrange
            $name = "Bob";
            $test_Stylist = new Stylist($name);
            $test_Stylist->save();
            $name2 = "Roy";
            $test_Stylist2 = new Stylist($name2);
            $test_Stylist2->save();
            //Act
            $result = Stylist::getAll();
            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_deleteAll()
        {
            $name = "Frank";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $name2 = "Hank";
            $test_stylist2 = new Stylist($name2);
            $test_stylist->save();

            Stylist::deleteAll();
            $result = Stylist::getAll();

            $this->assertEquals([], $result);
        }

        function test_find()
        {
            $name = "Marsha";
            $test_stylist = new Stylist($name);

            $test_stylist->save();

            $result = Stylist::find($test_stylist->getId());

            $this->assertEquals($test_stylist, $result);
        }

        function test_update()
        {
            $stylist_name = "Jaime";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $replacement_name = "Margie";

            $test_stylist->update($replacement_name);
            $result = $test_stylist->getStylistName();

            $this->assertEquals($replacement_name, $result);
        }
    }

?>
