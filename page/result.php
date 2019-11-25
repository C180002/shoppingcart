<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
      課題・商品検索アプリケーション
    </title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/shoppingcart.css" />
  </head>
<?php
    require_once "../class/Book.php";
    require_once "../class/DVD.php";

    session_start();

    $category = '';

    if (isset($_GET['category']))
    {
        $category = $_GET['category'];
    }
    else
    {
        if (isset($_SESSION['category']))
        {
            $category = $_SESSION['category'];
        }
    }
    
    $_SESSION['category'] = $category;

    $book_list = array();

    if (isset($_SESSION['book_list']))
    {
        $book_list = $_SESSION['book_list'];
    }
    else
    {
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

        $_SESSION['book_list'] = $book_list;
    }

    $dvd_list = array();

    if (isset($_SESSION['dvd_list']))
    {
        $dvd_list = $_SESSION['dvd_list'];
    }
    else
    {
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

        $_SESSION['dvd_list'] = $dvd_list;
    }
?>
  <body id="products" class="list">
    <header>
      <h1>
        商品検索アプリケーション
      </h1>
    </header>
    <main>
      <article id="result">
        <h2>
          商品検索 - 検索結果
        </h2>
        <section>
          <h3>
            商品一覧
          </h3>
          <table>
            <caption>
              <a href="entry.html">
                検索画面に戻る
              </a>
              &emsp;
              <a href="cart.php">
                カートの中身を見る
              </a>
            </caption>
<?php
    if ($category == 'book')
    {
?>
            <tr>
              <th>
                書籍名
              </th>
              <th>
                価格
              </th>
              <th>
                著者
              </th>
              <th>
                ISBN
              </th>
              <th>
                  
              </th>
            </tr>
<?php
        for ($i = 0; $i < count($book_list); $i++)
        {
?>
            <tr>
              <td>
                <?= $book_list[$i]->getTitle() ?>
              </td>
              <td>
                <?= number_format($book_list[$i]->getPrice()) ?>
              </td>
              <td>
                <?= $book_list[$i]->getAuthor() ?>
              </td>
              <td>
                <?= $book_list[$i]->getISBN() ?>
              </td>
              <td>
                <a href="cart.php?mode=add&index=<?= $i ?>">
                  カートに入れる
                </a>
              </td>
            </tr>
<?php
        }
    }
    elseif ($category == 'dvd')
    {
?>
            <tr>
              <th>
                タイトル
              </th>
              <th>
                価格
              </th>
              <th>
                収録時間
              </th>
              <th>
                
              </th>
            </tr>
<?php
        for ($i = 0; $i < count($dvd_list); $i++)
        {
?>
            <tr>
              <td>
                <?= $dvd_list[$i]->getTitle() ?>
              </td>
              <td>
                <?= number_format($dvd_list[$i]->getPrice()) ?>
              </td>
              <td class="right">
                <?= $dvd_list[$i]->getDuration() ?>
              </td>
              <td>
                <a href="cart.php?mode=add&index=<?= $i ?>">
                  カートに入れる
                </a>
              </td>
            </tr>
<?php
        }
    }
?>
          </table>
        </section>
      </article>
    </main>
    <footer>
      <div id="copyright">
        (C) 2019 The Advanced Course on Web System Development
      </div>
    </footer>
  </body>
</html>
