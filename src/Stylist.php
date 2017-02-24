<?php
    Class Stylist
    {
        private $stylist_name;
        private $client_id;
        private $id;

        function __construct($stylist_name, $client_id, $id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->client_id = $client_id;
            $this->id = $id;
        }

        function setStylistName($new_name)
        {
            $this->stylist_name =  (string) $new_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function setClientId()
        {
            $this->client_id = (int) $new_client_id;
        }

        function getClientId()
        {
            return $this->client_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {

            $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name, client_id) VALUES ('{$this->getStylistName()}', '{$this->getClientId()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach ($returned_stylists as $stylist){
                $stylist_name = $stylist['stylist_name'];
                $id = $stylist['id'];
                $client_id = $stylist['client_id'];
                $new_stylist = new Stylist($stylist_name, $client_id, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }

        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach($stylists as $stylist) {
                $stylist_id = $stylist->getId();
                if ($stylist_id == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
    }
?>
