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
            $this->client_name = (string) $new_name;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name) VALUES ('{$this->getClientName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach ($returned_clients as $client) {
                $client_name = $client['client_name'];
                $id = $client['id'];
                $new_client = new Client($client_name, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
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
    }
?>
