<?php
$username = 'pinecone';
$greeting = 'Hello' . ' ' . $username . '.';

$catFood = [
  'item' => 'Tunachovy',
  'qty' => 5,
  'price' => 5,
  'discount' => 4
];
$usualPrice = $catFood['qty'] * $catFood['price'];
$offerPrice = $catFood['qty'] * $catFood['discount'];
$saving = $usualPrice - $offerPrice;
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css">
    <title>Pet Store</title>
  </head>
  <body>
    <div class="container">
      <div>
        <h1>Pet Store</h1>

        <h2>Multi-buy Offer</h2>

        <!--shorthand for echo-->
        <p><?= $greeting ?></p>

        <p class="sticker">Save <?= $saving ?></p>

        <p>Buy <?= $catFood['qty'] ?> packs of <?= $catFood['item'] ?>
          for <?= $offerPrice ?><br>(usual price $<?= $usualPrice ?>)</p>
      </div>
      <div>
        <img src="shopping.webp" class="food">
      </div>
    </div>

  </body>
</html>
