<?php
include '../elems/init.php' ;
session_start() ;

if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {
  //статистика покупок - сумма продаж по месяцам
  function showStatisticTable($link) {
    $title = 'statistics' ;
    $query = "  SELECT YEAR(purchases.date_purchase) as year, MONTHNAME(purchases.date_purchase) as month,
  	 SUM(products.price) as total_sum, COUNT(products.quantity) as count_product FROM `products`
     LEFT JOIN `purchases` ON purchases.product_id = products.id WHERE purchases.date_purchase IS NOT NULL
     GROUP BY YEAR(purchases.date_purchase), MONTHNAME(purchases.date_purchase) " ;

      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

      $content = '<table>
            <tr>
              <th>date purchase</th>
              <th>total_sum purchase</th>
              <th>total_quantity purchase</th>
            </tr>' ;
      foreach ($data as $purchase) {
              $content .= " <tr>
                <td>{$purchase['month']} {$purchase['year']} </td>
                <td>{$purchase['total_sum']} </td>
                <td>{$purchase['count_product']} </td>
                </tr>" ;
      }
      $content .= '</table>' ;

      include "elems/layout.php" ;
  }
  showStatisticTable($link) ;
} else {
    header('Location: ../login.php') ; die() ;
}

// SELECT *, DATE(date_purchase)
//            FROM `categories`
//            LEFT JOIN `products` ON products.category_id = categories.id
//            LEFT JOIN `purchases` ON purchases.product_id = products.id
//            AND purchases.date_purchase > LAST_DAY(DATE(date_purchase) - INTERVAL 2 MONTH)
//            AND purchases.date_purchase <= LAST_DAY(DATE(date_purchase)  - INTERVAL 1 MONTH) GROUP BY purchases.date_purchase

// " SELECT *
//           FROM `categories`
//           LEFT JOIN `products` ON products.category_id = categories.id
//           LEFT JOIN `purchases` ON purchases.product_id = products.id
//           AND purchases.date_purchase > LAST_DAY(CURDATE() - INTERVAL 2 MONTH)
//           AND purchases.date_purchase <= LAST_DAY(CURDATE()  - INTERVAL 1 MONTH) GROUP BY purchases.date_purchase "
