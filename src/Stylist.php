<?php
    Class stylist
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

        function setStylistName($new_stylist_name)
        {
            $this->stylist_name = $new_stylist_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function setClientId($new_client_id)
        {
            $this->client_id = $new_client_id;
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
            $GLOBALS['DB']->exec("INSERT INTO stylist (stylist_name, client_id) VALUES ('{$this->getStylistName()}', {$this->getClientId()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function GetAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
            $stylists = array();
            foreach ($returned_stylists as $stylist) {
                $stylist_name = $stylist['stylist_name'];
                $client_id = $client['client_id'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($stylist_name, $client_id, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }
    }


?>
