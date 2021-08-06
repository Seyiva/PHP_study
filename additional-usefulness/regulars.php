<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>PHP</title>
</head>
<body>
<?php

//Урок 26 - Работа с регулярными выражениями на PHP. Глава 1

//1
echo preg_replace('#a.b#'  ,'!','ahb acb aeb aeeb adcb axeb')  ; echo '<br>' ; // ahb, acb, aeb
//2
echo preg_replace('#a..a#'  ,'!','aba aca aea abba adca abea')  ; echo '<br>' ; // abba adca abea
//3
echo preg_replace('#ab.a#'  ,'!','aba aca aea abba adca abea')  ; echo '<br>' ; // abba и abea, не захватив adca
//4
echo preg_replace('#ab+a#'  ,'!','aa aba abba abbba abca abea')  ; echo '<br>' ; // aba, abba, abbba
//5
echo preg_replace('#ab*a#'  ,'!','aa aba abba abbba abca abea')  ; echo '<br>' ; // aa, aba, abba, abbba
//6
echo preg_replace('#ab?a#'  ,'!','aa aba abba abbba abca abea')  ; echo '<br>' ; // aa, aba
//7
echo preg_replace('#(ab)+#'  ,'!','ab abab abab abababab abea')  ; echo '<br>' ; //  'ab' повторяется 1 или более раз
//8
echo preg_replace('#a\.a#'  ,'!','a.a aba aea')  ; echo '<br>' ; // a.a
//9
echo preg_replace('#2\+3#'  ,'!','2+3 223 2223')  ; echo '<br>' ; // 2+3
//10
echo preg_replace('#2\++3#'  ,'!','23 2+3 2++3 2+++3 345 567')  ; echo '<br>' ;
//11
echo preg_replace('#2\+*3#'  ,'!','23 2+3 2++3 2+++3 445 677')  ; echo '<br>' ;
//12
echo preg_replace('#\*q+\+#'  ,'!','*+ *q+ *qq+ *qqq+ *qqq qqq+')  ; echo '<br>' ; // *q+, *qq+, *qqq+
//13
echo preg_replace('#\*q*\+#'  ,'!','*+ *q+ *qq+ *qqq+ *qqq qqq+')  ; echo '<br>' ; // *+, *q+, *qq+, *qqq+
//14
echo preg_replace('#a.+?a#'  ,'!','aba accca azzza wwwwa')  ; echo '<br>' ;

//Урок 27 - Работа с регулярными выражениями на PHP. Глава 2

//1
echo preg_replace('#ab{2,4}a#', '!', 'aa aba abba abbba abbbba abbbbba'); echo '<br>' ;
//2
echo preg_replace('#ab{0,3}a#', '!', 'aa aba abba abbba abbbba abbbbba'); echo '<br>' ;
//3
echo preg_replace('#ab{4,}a#', '!', 'aa aba abba abbba abbbba abbbbba'); echo '<br>' ;
//4
echo preg_replace('#a\da#', '!', 'a1a a2a a3a a4a a5a aba aca'); echo '<br>' ; // \d одна цифра между a
//5
echo preg_replace('#a\d+a#', '!', 'a1a a22a a333a a4444a a55555a aba aca'); echo '<br>' ; // \d+ любое кол-во цифр между a
//6
echo preg_replace('#a\d*a#', '!', 'aa a1a a22a a333a a4444a a55555a aba aca'); echo '<br>' ;
//7
echo preg_replace('#a\Db#', '!', 'avb a1b a2b a3b a4b a5b abb acb'); echo '<br>' ; // \D не цифра
//8
echo preg_replace('#a\Wb#', '!', 'ave a#b a2b a$b a4b a5b a-b acb'); echo '<br>' ; // \W не буква и не цифра
//9
echo preg_replace('#\s#', '!', 'ave a#a a2a a$a a4a a5a a-a aca'); echo '<br>' ;
//10
echo preg_replace('#a[bex]a#', '!', 'aba aea aca aza axa'); echo '<br>' ;
//11
echo preg_replace('#a[b.+*]a#', '!', 'aba aea aca aza axa a.a a+a a*a'); echo '<br>' ;
//12
echo preg_replace('#a[3-7]+a#', '!', 'aa a1a a22a a333a a4444a a55555a aba aca'); echo '<br>' ;
//13
echo preg_replace('#a[a-g]a#', '!', 'aa aba ada aea aha'); echo '<br>' ;
//14
echo preg_replace('#a[a-fj-z]a#', '!', $str); echo '<br>' ;
//15
echo preg_replace('#a[a-fA-Z]a#', '!', $str); echo '<br>' ;
//16
echo preg_replace('#a[^ex]a#', '!', 'aba aea aca aza axa a-a a#a'); echo '<br>' ; // заменить все кроме [^ex]
//17
echo preg_replace('#w[а-яё]w#u', '!', 'wйw wяw wёw wqw'); echo '<br>' ;
//18
echo preg_replace('#w[а-яё]w#u', '!', 'wйw wяw wёw wqw'); echo '<br>' ;
//19
echo preg_replace('#a[a-zA-Z]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa'); echo '<br>' ;
//20
echo preg_replace('#a[a-z]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa'); echo '<br>' ;
//21
echo preg_replace('#a[a-z0-9]+a#', '!', 'aAXa aeffa aGha aza ax23a a3sSa'); echo '<br>' ;
//21
echo preg_replace('#[а-яА-ЯЁё]+#u', '!', 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ'); echo '<br>' ;
//22, 23
echo preg_replace('#^aaa#', '!', 'aaa aaa aaa'); echo '<br>' ;
echo preg_replace('#aaa$#', '!', 'aaa aaa aaa'); echo '<br>' ;
//24
echo preg_replace('#a(e+|x+)a#', '!', 'aeeea aeea aea axa axxa axxxa'); echo '<br>' ;
//25
echo preg_replace('#a(ee|x+)a#', '!', 'aeeea aeea aea axa axxa axxxa'); echo '<br>' ;
//26
echo preg_replace('#\b#', '!', 'xbx aca aea abba adca abea'); echo '<br>' ;
//27
echo preg_replace('#\\\\#', '!', 'a\a abc'); echo '<br>' ;
//28
echo preg_replace('#a\\\\{3}a#', '!', 'a\a a\\a a\\\\\a'); echo '<br>' ; //'#a\\\\{3}a#', '!', 'a\a a\\a a\\\\\a'
//29
echo preg_replace('#\/...\\\#', '!', 'bbb /aaa\ bbb /ccc\ '); echo '<br>' ;
echo preg_replace('#/[a-z]+\\\\#', '!', 'bbb /aaa\ bbb /ccc\\'); echo '<br>' ; //  это точнее конечно )
//30
echo preg_replace('#<b>(.+?)</b>#', '!', 'bbb <b> hello </b>, <b> world </b> eee '); echo '<br>' ;

// Урок 28 - Работа с регулярными выражениями на PHP. Глава 3

//1
echo preg_replace('#([a-z]+\d*)@([a-z]+)#', '$2@$1', 'aaa@bbb eee7@kkk'); echo '<br>' ;
echo preg_replace('#([a-z0-9]+)@([a-z0-9]+)#', '$2@$1', 'aaa@bbb eee7@kkk');  echo '<br>' ; //с сайта
//2
echo preg_replace('#([a-z])+([0-9])#', '$1$2$2', 'a1b2c3'); echo '<br>' ; // не получлось через (?:)
echo preg_replace('#\d#', '$0$0', 'a1b2c3');  echo '<br>' ; //с сайта
//3
echo preg_replace('#([a-z0-9])\1#', '!', 'aae xxz 33a'); echo '<br>' ;
//4
echo preg_replace('#([a-z])\1+#', '!', 'aaa bcd xxx efg'); echo '<br>' ;
//5
echo preg_match('#^[a-zA-Z-.]+@[a-z]+\.[a-z]{2,3}$#', 'my-mail@mail.ru');  echo '<br>' ;
echo preg_match('#^[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,}$#', 'mymail@mail.ru'); echo '<br>' ;
//6
$str = 'mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru';
	preg_match_all('#[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,}#', $str, $matches);
	var_dump($matches); echo '<br>' ;
//7
echo preg_match('#^[a-z0-9-]+\.[a-z]{2,}$#', 'site.com');  echo '<br>' ;
//8
echo preg_match('#^[a-z0-9-]+\.[a-z0-9-]+\.[a-z]{2,}$#', 'hello.my-site.com');  echo '<br>' ;
//9
echo preg_match('#^http://[a-z0-9-]+\.[a-z]{2,}$#', 'http://site.com');  echo '<br>' ;
//10
echo preg_match('#^http://|https://[a-z0-9-]+\.[a-z]{2,}$#', 'https://site.com');  echo '<br>' ; //  ^https?://
//11
echo preg_match('#^https?://[a-z0-9-]+\.[a-z]{2,}+\/*$#', 'https://site.com');  echo '<br>' ; //   /?
//12
echo preg_match('#^https?#', 'https://site.com/'); echo '<br>' ;
//13
echo preg_match('#\.(txt|html|php)$#', 'https://site.txt'); echo '<br>' ;
//14
echo preg_match('#\.(jpg|jpeg)$#', 'site.jpeg'); echo '<br>' ;
//15
echo preg_match('#^\d{1,12}$#', '012345678910'); echo '<br>' ;
//16
preg_match_all('#\d#', 'asf5asg 2asg sahh3', $matches);
echo(array_sum($matches[0])); echo '<br>' ;
//17
echo preg_replace('#(\d{2})\-(\d{2})\-(\d{4})#', '$3.$2.$1','31-12-2014'); echo '<br>' ;
//18
$str = 'http://site.ru, http://site.com, https://site.info';
	echo preg_replace('#https?://([a-z0-9-]+\.[a-z]{2,})#', '<a href="$0">$1</a>', $str);echo '<br>' ;


//Урок № 29. Работа с регулярными выражениями на PHP. Глава 4
  //1
  echo preg_replace('#(?<=b)aaa#i', '!', 'baaa '); echo '<br>' ;
  //2
  echo preg_replace('#(?<!b)aaa#i', '!', 'waaa baaa '); echo '<br>' ;
  //3
  echo preg_replace('#aaa(?=b)#i', '!', 'aaab'); echo '<br>' ;
  //4
  echo preg_replace('#aaa(?!b)#i', '!', 'aaab aaaw'); echo '<br>' ;
  //5
  echo preg_replace('#(?<!\*)\*(?!\*)#', '!', 'aaa * bbb ** eee * ** ccc * ** *'); echo '<br>' ;
  //6
  echo preg_replace('#(?<!\*)\*{2}(?!\*)#', '!', 'aaa * bbb ** eee *** kkk ****');
  //7
  echo preg_replace('#([a-z])(?=\1)#', '!', 'aabbccdefffgh'); echo '<br>' ; //!a!b!cde!!fgh
  //если после 1 буквы стоит её повтор, томеняем на '!' первую букву
  //8
  echo preg_replace('#(?<=([a-z]))\1#', '!', 'aabbccdefffgh'); echo '<br>' ; //a!b!c!def!!gh
  //9
  function func($matches)  	{
  		return $matches[0] * $matches[0];
  	}
  echo preg_replace_callback('#\d#', 'func', '123456789'); echo '<br>' ;
  //10
  function square($matches)
  	{
      return $matches[1] * 2;
  	}
  echo preg_replace_callback("#'(\d+)'#", 'square', "2aaa'3'bbb'4'"); echo '<br>' ;

  // other task
  $class = 'Core\\Page' ;
  $match = 'Core\\Page' ;
  preg_match('#(.+)\\\\(.+?)$#', $class, $match);
  var_dump($match) ;

  /*к примеру, из адреса '/test/:var1/:var2/' метод
  сделает регулярку '#^/test/(?<var1>[^/]+)/(?<var2>[^/]+)/?$#' */

  $res = preg_replace('#/:([^/]+)#', '/(?<$1>[^/]+)', $path) ;

  /*  preg_match('#(?P<day>\d{2})-(?P<month>\d{2})-(?P<year>\d{4})#', '29-10-2025', $match);
	var_dump($match);
	echo $match['day'] . '.' . $match['month'] . '.' . $match['year'];

 	//$res = preg_match('#^(?P<day>\d{2})-(?P<month>\d{2})-(?P<year>\d{4})$#', '10-10-2025', $match);
	$res = preg_match('#^(?P<day>\d{2})-(?P<month>(?P=day))-(?P<year>\d{4})$#', '10-10-2025', $match);

	var_dump($res);
	var_dump($match); */

	/*
		(?P<name>pattern)
		(?<name>pattern)
		(?'name'pattern)

		(?P=name)
		\k<name>
		\k'name'
		\k{name}
		\g{name}
		\g<name>
		\g'name'
	*/
?>
</body>
</html>
