<?php
    class DVD
    {
        private $title = '';
        private $price = '';
        private $duration = '';

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getDuration()
        {
            return $this->duration;
        }

        public function setDuration($duration)
        {
            $this->duration = $duration;
        }

        function __construct()
        {

        }

        // function __construct($title, $price, $duration)
        // {
        //     $this->title = $title;
        //     $this->price = $price;
        //     $this->duration = $duration;
        // }
    }
?>