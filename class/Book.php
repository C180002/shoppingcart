<?php
    class Book
    {
        private $title = '';
        private $price = '';
        private $author = '';
        private $isbn = '';

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

        public function getAuthor()
        {
            return $this->author;
        }

        public function setAuthor($author)
        {
            $this->author = $author;
        }

        public function getISBN()
        {
            return $this->isbn;
        }

        public function setISBN($isbn)
        {
            $this->isbn = $isbn;
        }

        function __construct()
        {

        }

        // function __construct($title, $price, $author, $isbn)
        // {
        //     $this->title = $title;
        //     $this->price = $price;
        //     $this->author = $author;
        //     $this->isbn = $isbn;
        // }
    }
?>