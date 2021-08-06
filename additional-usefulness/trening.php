<?php
error_reporting(E_ALL) ;
ini_set('display_errors','on') ;

//1.1 'l', 'e', 'g' и 'a'
$arr = [
		['a', 'b', 'c'],
		['d', 'e', 'f'],
		['g', 'h', 'i'],
		['j', 'k', 'l'],
	];
echo $arr[3][2]; echo $arr[1][1]; echo $arr[2][0]; echo $arr[0][0]; echo '<br>' ;

// 1.2
$sum1 = 0 ;
$arr1 = [[1, 2], [3, 4], [5, 6]];
foreach ($arr1 as $value) {
  $sum1 += array_sum($value);
} echo $sum1; echo '<br>' ;

// 1.3
$sum2 = 0 ;
$arr2 = [
		[
			[1, 2],
			[3, 4],
		],
		[
			[5, 6],
			[7, 8],
		],
	];
foreach ($arr2 as $elem) {
  foreach ($elem as $v) {
    $sum2 += array_sum($v) ;
  }
} echo $sum2 ; echo '<br>' ;

  //1.4
  $bg = [
		'boys'  => [1 => 'Коля', 2 => 'Вася', 3 => 'Петя'],
		'girls' => [1 => 'Даша', 2 => 'Маша', 3 => 'Лена'],
	];
  echo $bg['boys'][1] ;   echo $bg['girls'][2] ;  echo '<br>' ;

  //1.5
  $days = [
		'ru' => ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
		'en' => ['mn', 'ts', 'wd', 'th', 'fr', 'st', 'sn'],
	];
  echo  $days['en'][2] ; echo '<br>' ;

  //1.6
  $sal = [
		[
			'name'   => 'user1',
			'age'    => 30,
			'salary' => 1000,
		],
		[
			'name'   => 'user2',
			'age'    => 31,
			'salary' => 2000,
		],
		[
			'name'   => 'user3',
			'age'    => 32,
			'salary' => 3000,
		],
	];
  $user1 = $sal[0]['salary'] ;  $user3 = $sal[2]['salary'] ;
  $sal_sum = $user1 + $user3; echo $sal_sum ; echo '<br>' ;

  //1.7
  $with_keys = [[1, 2, 3, [4, 5, [6, 7]]], [8, [9, 10]]];
  echo array_sum($with_keys[0]) . ' ';   echo array_sum($with_keys[1]) . ' ';
  $four = $with_keys[0][3][0] ;   $five = $with_keys[0][3][1] ;
  $ff = $four + $five ; echo $ff . ' ';
  echo $with_keys[0][3][2][0] + $with_keys[0][3][2][1] . ' ';
  echo array_sum($with_keys[1][1]) ; echo '<br>' ;

  //2.1
  $sum5 = 0 ;
  $array = [[1, 2, 3], [4, 5, 6, 7], [8, 9]];
  foreach ($array as $sub) {
		foreach ($sub as $elem) {
			$sum5 += $elem;
		}
	} echo $sum5 ; echo '<br>' ;

  //2.2
  $arr6 = [
		[
			[1, 2, 3],
			[6, 7, 8],
			[3, 8, 4],
			[6, 7, 9],
		],
		[
			[9, 1, 2],
			[4, 5, 6],
		],
		[
			[9, 1, 2],
			[4, 5, 6],
			[5, 6, 3],
		],
	];
  $sum6 = 0 ;
  foreach ($arr6 as $sub) {
		foreach ($sub as $subsub) {
			foreach ($subsub as $elem) {
				$sum6 += $elem;
			}
		}
	} echo $sum6 ; echo '<br>' ;

  //2.3
  $k_v = [
		[
			'name'   => 'user1',
			'age'    => 30,
			'salary' => 1000,
		],
		[
			'name'   => 'user2',
			'age'    => 31,
			'salary' => 2000,
		],
		[
			'name'   => 'user3',
			'age'    => 32,
			'salary' => 3000,
		],
	];
  foreach ($k_v as $key => $sub) {
    foreach ($sub as $key1 => $elem) {
      echo $key1 .'=>'. $elem .'<br>';
    }
  }
  //2.4
  $g_k_v = [
		'group1'  => ['user11', 'user12', 'user13', 'user43'],
		'group2'  => ['user21', 'user22', 'user23'],
		'group3'  => ['user31', 'user32', 'user33'],
		'group4'  => ['user41', 'user42', 'user43'],
		'group5'  => ['user51', 'user52'],
	];
  foreach ($g_k_v as $key => $sub) {
    foreach ($sub as $val => $elem) {
      echo $key . '=>'. $elem .'<br>';
    }
  }
  //3.1
  $empty_arr = [];

	for ($i = 0; $i < 3; $i++) { // создаем подмассивы внешним циклом
		for ($j = 0; $j < 5; $j++) {
			$empty_arr[$i][$j] = $j + 1; // заполняем подмассив числами
		}
	}	var_dump($empty_arr);
  //3.2
 $for_x = [] ;
 $v = 'x' ;
 for ($i = 0; $i < 3; $i++) { // создаем подмассивы внешним циклом
   for ($j = 0; $j < 4; $j++) {
     $for_x[$i][$j] = $v; // заполняем подмассив числами
   }
 }	var_dump($for_x);
  //3.3
  $in_fuull = [];
  for ($i = 0; $i < 3; $i++) { // создаем подмассивы внешним циклом
    for ($j = 0; $j < 2; $j++) {
      for ($k = 0; $k < 5; $k++) {
        $in_fuull[$i][$j][$k] = $k + 1; // заполняем подмассив числами
      }
    }
  }	var_dump($in_fuull);
  //3.4 [[1, 2], [3, 4], [5, 6], [7, 8]]
  $count_n = [] ;
  $k = 1;
  for ($i = 0; $i < 4; $i++) { // создаем подмассивы внешним циклом
    for ($j = 0; $j < 2; $j++) {
      $count_n[$i][$j] = $k ;
      $k++ ;
    }
  } var_dump($count_n);
  //3.5 [[2, 4, 6], [8, 10, 12], [14, 16, 18], [20, 22, 24]]
  $down = [] ;
  for ($i = 0, $k = 2; $i < 4; $i++) { // создаем подмассивы внешним циклом
    for ($j = 0; $j < 3; $j++, $k+=2 ) {
      $down[$i][$j] = $k ;
    }
  } var_dump($down);
  //3.6 [[[1, 2], [3, 4]], [[5, 6], [7, 8]]]
  $three = [] ;
  $v = 1 ;
  for ($i = 0; $i < 2; $i++) { // создаем подмассивы внешним циклом
    for ($j = 0; $j < 2; $j++ ) {
      for ($k = 0; $k < 2; $k++ ) {
        $three[$i][$j][$k] = $v ;
        $v++ ;
      }
    }
  } var_dump($three);

//4.1

$products = [
		[
			'name'   => 'мясо',
			'price'  => 100,
			'amount' => 5,
		],
		[
			'name'   => 'овощи',
			'price'  => 200,
			'amount' => 6,
		],
		[
			'name'   => 'фрукты',
			'price'  => 300,
			'amount' => 7,
		],
	];
	foreach ($products as $product) {
		echo $product['name'] .'-'. $product['price'] .'euros'. $product['amount'] .'<br>' ;
	}
	//4.2
	$products[] = [
		'name'   => 'рыба',
		'price'  => 50,
		'amount' => 2,
	];
	var_dump($products);
	//5.1
$var = [
	[
		'country' => 'Россия',
		'city' =>    'Москва',
	],
	[
		'country' => 'Беларусь',
		'city' =>    'Минск',
	],
	[
		'country' => 'Россия',
		'city' =>    'Питер',
	],
	[
		'country' => 'Россия',
		'city' =>    'Владивосток',
	],
	[
		'country' => 'Украина',
		'city' =>    'Львов',
	],
	[
		'country' => 'Беларусь',
		'city' =>    'Могилев',
	],
	[
		'country' => 'Украина',
		'city' =>    'Киев',
	],
] ;
$conv = [] ;
foreach ($var as $value) {
		$conv[$value['country']][] = $value['city'] ;
} var_dump($conv) ;
//5.2
$dt_ev = [
	[
		'date'  => '2019-12-29',
		'event' => 'name1',
	],
	[
		'date'  => '2019-12-31',
		'event' => 'name2',
	],
	[
		'date'  => '2019-12-29',
		'event' => 'name3',
	],
	[
		'date'  => '2019-12-30',
		'event' => 'name4',
	],
	[
		'date'  => '2019-12-29',
		'event' => 'name5',
	],
	[
		'date'  => '2019-12-31',
		'event' => 'name6',
	],
	[
		'date'  => '2019-12-29',
		'event' => 'name7',
	],
	[
		'date'  => '2019-12-30',
		'event' => 'name8',
	],
	[
		'date'  => '2019-12-30',
		'event' => 'name9',
	],
] ;
$conversion = [] ;
foreach ($dt_ev as $element) {
	$conversion[$element['date']][] = $element['event'] ;
} var_dump($conversion) ;
//5.3
$events = [
	'2019-12-29'=> ['name1', 'name3', 'name5', 'name7'],
	'2019-12-30'=> ['name4', 'name8', 'name9'],
	'2019-12-31'=> ['name2', 'name6'],
] ;
var_dump($events) ;
$conv_event = [] ;
foreach ($events as $key_date => $sub_arr) {
	foreach ($sub_arr as $value_names => $elem) {
		$conv_event[] = ['date'  => $key_date ,
										'name'  =>	$elem ];
	}
} var_dump($conv_event) ;

// Удобное хранение данных в PHP
// Задача 1
$ryty = [
	[
		'country' => 'Россия',
		'city' =>    'Москва',
	],
	[
		'country' => 'Беларусь',
		'city' =>    'Минск',
	],
	[
		'country' => 'Россия',
		'city' =>    'Питер',
	],
	[
		'country' => 'Россия',
		'city' =>    'Владивосток',
	],
	[
		'country' => 'Украина',
		'city' =>    'Львов',
	],
	[
		'country' => 'Беларусь',
		'city' =>    'Могилев',
	],
	[
		'country' => 'Украина',
		'city' =>    'Киев',
	],
] ;
$new_Arr = [] ;
foreach ($ryty as $elem) {
	$new_Arr[$elem['country']][] = $elem['city'] ;
} var_dump($new_Arr) ;
// Задача 2
$calendar = [
	[
		'year' =>  2019,
		'month' => 11,
		'day' => 20,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2019,
		'month' => 11,
		'day' => 21,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2019,
		'month' => 12,
		'day' => 25,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2019,
		'month' => 12,
		'day' => 26,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2020,
		'month' => 10,
		'day' => 29,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2020,
		'month' => 10,
		'day' => 30,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2020,
		'month' => 11,
		'day' => 19,
		'data' => ['массив с данными']
	],
	[
		'year' =>  2020,
		'month' => 11,
		'day' => 20,
		'data' => ['массив с данными']
	],
] ;
$new_list = [] ;
foreach ($calendar as $elem) {
	$new_list[$elem['year']] [$elem['month']] [$elem['day']] = $elem['data'] ;
} var_dump($new_list) ;
//var_dump($new_list[2020]);
// Задача 3 - решена выше)

// Задача 4

$horos = [
	[
		'year' =>  2019,
		'month' => 11,
		'day' => 20,
		'oven' => ['сегодня вы красавчик'],
		'leo' => ['сегодня вы блистаете'],
		'cancer' => ['сегодня вы мечтаете'],
		'fish' => ['сегодня вы хитрите']
	],
	[
		'year' =>  2019,
		'month' => 11,
		'day' => 21,
		'oven' => ['сегодня вы красавчик'],
		'leo' => ['сегодня вы популярны'],
		'cancer' => ['сегодня вы мечтаете'],
		'fish' => ['сегодня вы хитрите']
	],
	[
		'year' =>  2019,
		'month' => 12,
		'day' => 20,
		'oven' => ['зачем вы делаете это'],
		'leo' => ['вам везет'],
		'cancer' => ['вы грустите'],
		'fish' => ['когда вы перестанете хитрить']
	],
	[
		'year' =>  2019,
		'month' => 12,
		'day' => 25,
		'oven' => ['капец полный'],
		'leo' => ['как так можно было'],
		'cancer' => ['вам весело'],
		'fish' => ['вы попали']
	],
	[
		'year' =>  2020,
		'month' => 1,
		'day' => 30,
		'oven' => ['капец полный'],
		'leo' => ['как так можно было'],
		'cancer' => ['вам весело'],
		'fish' => ['вы попали']
	],
	[
		'year' =>  2020,
		'month' => 2,
		'day' => 27,
		'oven' => ['капец полный'],
		'leo' => ['как так можно было'],
		'cancer' => ['вам весело'],
		'fish' => ['вы попали']
	],
	[
		'year' =>  2020,
		'month' => 3,
		'day' => 30,
		'oven' => ['капец полный'],
		'leo' => ['как так можно было'],
		'cancer' => ['вам весело'],
		'fish' => ['вы попали']
	],
] ;
$new_list_horo = [] ;
foreach ($horos as $elem) {
	$new_list_horo[$elem['year']] [$elem['month']] [$elem['day']] = $elem['leo'] ;
} var_dump($new_list_horo) ;

// Задача 5
$school = [
	[
		'class' =>  '11A',
		'student' => 'том харди'

	],
	[
		'class' =>  '11B',
		'student' => 'марк уолберг'
	],
	[
		'class' =>  '11A',
		'student' => 'джастин тимберлайк'

	],
	[
		'class' =>  '11B',
		'student' => 'том круз'
	],
	[
		'class' =>  '10A',
		'student' => 'том харди'
	],
	[
		'class' =>  '10B',
		'student' => 'марк уолберг'
	],
	[
		'class' =>  '9',
		'student' => 'бил гейтс'
	],
	[
		'class' =>  '9',
		'student' => 'стив джобс'
	],
	[
		'class' =>  '8',
		'student' => 'андриано челентано'
	],
] ;

$new_list_school = [] ;
foreach ($school as $elem) {
	$new_list_school[$elem['class']][] = $elem['student']   ;
} var_dump($new_list_school) ;

// Задача 6
$to_do_list = [
	[
		'day' =>  20,
		'case_title' => 'полить цветы',
		'completed' => 'yes',
	],
	[
		'day' =>  20,
		'case_title' => 'поиграть в компьютер',
		'completed' => 'no',
	],
	[
		'day' =>  15,
		'case_title' => 'погулять с собакой',
		'completed' => 'yes',
	],
	[
		'day' =>  15,
		'case_title' => 'покормить рыбок',
		'completed' => 'no',
	],
];
$new_list_to_do = [] ;
foreach ($to_do_list as $elem) {
	$new_list_to_do[$elem['completed']][] = $elem['case_title']   ;
} var_dump($new_list_to_do) ;
