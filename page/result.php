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

    $book_list = array();

    $book = new Book();

    $book->setTitle('Head First PHP & MySQL');
    $book->setPrice(4650);
    $book->setAuthor('Lynn Beighley');
    $book->setISBN('978-4873114446');

    $book_list[] = $book;

    $book = new Book();

    $book->setTitle('リーダブルコード');
    $book->setPrice(2600);
    $book->setAuthor('Dustin Boswell');
    $book->setISBN('978-4873115658');

    $book_list[] = $book;

    $book = new Book();

    $book->setTitle('Head First デザインパターン');
    $book->setPrice(5060);
    $book->setAuthor('Eric Freeman');
    $book->setISBN('978-4873112497');

    $book_list[] = $book;

    $book = new Book();

    $book->setTitle('PHPによるデザインパターン入門');
    $book->setPrice(2400);
    $book->setAuthor('下岡 秀幸');
    $book->setISBN('978-4798015163');

    $book_list[] = $book;

    $dvd_list = array();

    $dvd = new DVD();

    $dvd->setTitle('The Net');
    $dvd->setPrice(500);
    $dvd->setDuration(114);

    $dvd_list[] = $dvd;

    $dvd = new DVD();

    $dvd->setTitle('Star Wars: Force Awakens');
    $dvd->setPrice(2800);
    $dvd->setDuration(150);

    $dvd_list[] = $dvd;

    $dvd = new DVD();

    $dvd->setTitle('Outbreak');
    $dvd->setPrice(900);
    $dvd->setDuration(129);

    $dvd_list[] = $dvd;

    $category = $_GET['category'];
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
        foreach ($book_list as $bk)
        {
?>
            <tr>
              <td>
                <?= $bk->getTitle() ?>
              </td>
              <td>
                <?= number_format($bk->getPrice()) ?>
              </td>
              <td>
                <?= $bk->getAuthor() ?>
              </td>
              <td>
                <?= $bk->getISBN() ?>
              </td>
              <td>
                <a href="cart.php">
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
        foreach ($dvd_list as $d)
        {
?>
            <tr>
              <td>
                <?= $d->getTitle() ?>
              </td>
              <td>
                <?= number_format($d->getPrice()) ?>
              </td>
              <td class="right">
                <?= $d->getDuration() ?>
              </td>
              <td>
                <a href="cart.php">
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
