<?php
    class Stylist
    {
        private $stylist_name;
        private $stylist_id;

        function __construct($stylist_name, $stylist_id = null)
        {
            $this->stylist_name = $stylist_name;
            $this->id = $stylist_id;
        }

        function setStylistName($new_name)
        {
            $this->stylist_name = (string) $new_name;
        }

        function getStylistName()
        {
            return $this->stylist_name;
        }

        function get_Stylist_Id()
        {
            return $this->id;
        }
    }
?>
