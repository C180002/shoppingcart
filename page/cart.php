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
