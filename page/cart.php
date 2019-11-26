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
    require_once('../class/Book.php');
    require_once('../class/DVD.php');

    session_start();

    $mode = '';

    if (isset($_GET['mode']))
    {
        $mode = $_GET['mode'];
    }

    if ($mode == 'clear')
    {
        unset($_SESSION['cart']['book']);
        unset($_SESSION['cart']['dvd']);
    }
    else
    {
        $category = '';

        if (isset($_SESSION['category']))
        {
            $category = $_SESSION['category'];
        }

        $category_content_list = array();

        if (isset($_SESSION['cart'][$category]))
        {
            foreach ($_SESSION['cart'][$category] as $ctgry)
            {
                $category_content_list[] = $ctgry;
            }
        }

        if ($mode == 'add')
        {
            $category_list = array();

            if ($category == 'book')
            {
                $category_list = $_SESSION['book_list'];
            }
            elseif ($category == 'dvd')
            {
                $category_list = $_SESSION['dvd_list'];
            }

            $index = $_GET['index'];

            $category_content = $category_list[$index];

            $category_content_list[] = $category_content;

            $_SESSION['cart'][$category] = $category_content_list;
        }
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
          カート
        </h2>
        <section>
          <h3>
            選択された商品一覧
          </h3>
          <table>
            <caption>
              <a href="result.php">
                商品一覧に戻る
              </a>
              &emsp;
              <a href="cart.php?mode=clear">
                カートを空にする
              </a>
            </caption>
<?php
    if (!isset($_SESSION['cart']['book']) && !isset($_SESSION['cart']['dvd']))
    {
?>
            <tr>
              <td>
                <p>
                  カートに商品は入っていません。
                <p>
              </td>
            </tr>
<?php
    }
?>
<?php
    if (isset($_SESSION['cart']['book']))
    {
?>
            <tr>
              <td>
                Book
              </td>
            </tr>
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
        foreach ($_SESSION['cart']['book'] as $book_cart)
        {
?>
            <tr>
              <td>
                <?= $book_cart->getTitle() ?>
              </td>
              <td>
                <?= number_format($book_cart->getPrice()) ?>
              </td>
              <td>
                <?= $book_cart->getAuthor() ?>
              </td>
              <td>
                <?= $book_cart->getISBN() ?>
              </td>
            </tr>
<?php
        }
    }

    if (isset($_SESSION['cart']['dvd']))
    {
?>
            <tr>
              <td>
                DVD
              </td>
            </tr>
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
        foreach ($_SESSION['cart']['dvd'] as $dvd_cart)
        {
?>
            <tr>
              <td>
                <?= $dvd_cart->getTitle() ?>
              </td>
              <td>
                <?= number_format($dvd_cart->getPrice()) ?>
              </td>
              <td class="right">
                <?= $dvd_cart->getDuration() ?>
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
