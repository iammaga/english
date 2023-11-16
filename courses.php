<?php

require_once('./connect.php');

$sql = "SELECT `id`, `title`, `price`, `oldprice`, `months`, `prepay` FROM `promo_prices` ORDER BY `order`";
$result = mysqli_query($conn, $sql);
