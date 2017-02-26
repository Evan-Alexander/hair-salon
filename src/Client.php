<?php
    Class Client
    {
        private $client_name;
        private $stylist_id;
        private $id;

        function __construct($client_name, $stylist_id, $id)
        {
            $this->client_name = $client_name;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = (string) $new_client_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getStylist_Id()
        {
            return $this->stylist_id;
        }

        function setStylist_Id($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, stylist_id) VALUES ('{$this->getClientName()}', {$this->getStylist_Id()})");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $client_name = $client['client_name'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($client_name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        static function searchBystylist($stylist_id)
        {
            $found_clients = array();
            $clients = Client::getAll();
            foreach ($clients as $client) {
                $found_stylist_id = $client->getStylist_Id();
                if ($found_stylist_id == $stylist_id) {
                    array_push($found_clients, $client);
                }
            }
            return $found_clients;
        }

        function update($new_name, $new_cuisine_id)
        {
            $this->setClientName($new_name);
            $this->setStylist_Id($new_cuisine_id);
            $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$this->client_name}', cuisine_id = '{$this->cuisine_id}' WHERE id = {$this->getId()};");
        }

        function deleteClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()}");
        }
    }
?>
