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

            $result = $test_stylist->get_Stylist_Id();

            $this->assertEquals(true, is_numeric($result));
        }

        // function test_Save()
        // {
        //     $stylist_name = "Dan";
        //     $test_stylist = new Stylist($stylist_name);
        //     $test_stylist->save();
        //
        //     $result = Stylist::getAll();
        //
        //     $this->assertEquals($test_stylist, $result[0]);
        // }

        // function test_getAll()
        // {
        //     $stylist1_name = "Carla";
        //     $new_stylst = new Stylist($stylist1_name);
        //     $new_stylst->save();
        //     $stylist2_name = "Francis";
        //     $new_stylst2 = new Stylist($stylist2_name);
        //     $new_stylst2->save();
        //
        //     $result = Stylist::getAll();
        //
        //     $this->assertEquals([$new_stylst, $new_stylist2], $result);
        // }
    }

?>
