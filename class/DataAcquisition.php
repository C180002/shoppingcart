<?php
    require_once "../class/Book.php";
    require_once "../class/DVD.php";

    class DataAcquisition
    {
        public function acquireBook()
        {
            $book_list = array();

            $book = new Book();

            // $book->setId('B01');
            $book->setTitle('Head First PHP & MySQL');
            $book->setPrice(4650);
            $book->setAuthor('Lynn Beighley');
            $book->setISBN('978-4873114446');

            $book_list[] = $book;

            $book = new Book();

            // $book->setId('B02');
            $book->setTitle('リーダブルコード');
            $book->setPrice(2600);
            $book->setAuthor('Dustin Boswell');
            $book->setISBN('978-4873115658');

            $book_list[] = $book;

            $book = new Book();

            // $book->setId('B03');
            $book->setTitle('Head First デザインパターン');
            $book->setPrice(5060);
            $book->setAuthor('Eric Freeman');
            $book->setISBN('978-4873112497');

            $book_list[] = $book;

            $book = new Book();

            // $book->setId('B04');
            $book->setTitle('PHPによるデザインパターン入門');
            $book->setPrice(2400);
            $book->setAuthor('下岡 秀幸');
            $book->setISBN('978-4798015163');

            $book_list[] = $book;

            return $book_list;
        }
        
        public function acquireDVD()
        {
            $dvd_list = array();
            
            $dvd = new DVD();

            // $book->setId('D01');
            $dvd->setTitle('The Net');
            $dvd->setPrice(500);
            $dvd->setDuration(114);

            $dvd_list[] = $dvd;

            $dvd = new DVD();

            // $book->setId('D02');
            $dvd->setTitle('Star Wars: Force Awakens');
            $dvd->setPrice(2800);
            $dvd->setDuration(150);

            $dvd_list[] = $dvd;

            $dvd = new DVD();

            // $book->setId('D03');
            $dvd->setTitle('Outbreak');
            $dvd->setPrice(900);
            $dvd->setDuration(129);

            $dvd_list[] = $dvd;

            return $dvd_list;
        }
    }
?>