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
    }


?>
