<?php
    Class Client
    {
        private $id;
        private $client_name;

        function __construct($client_name, $id = null)
        {
            $this->client_name = $client_name;
            $this->id = $id;
        }

        function setClientName($new_name)
        {
            $this->client_name = $new_name;
        }
        
        function getClientName()
        {
            return $this->client_name;
        }

        function getId()
        {
            return $this->id;
        }
    }


?>
