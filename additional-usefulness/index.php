<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<title>Search</title>
        <style>
            .box-content {
                width: 500px;
                margin: 0 auto;
            }
            .red {
                color: red;
            }
        </style>
	</head>
	<body>
    <?php
        header('Content-Type: text/html; charset=utf-8');
        error_reporting(E_ALL) ;
        ini_set('display_errors','on') ;

        function input($search)
	    {
            if (isset($_POST[$search])  ) {
                $value = $_POST[$search];
            } else {
                $value = '';
            }

            return '<input name="' . $search . '" value="' . $value .'">';
	    }               
    ?>
    <div class="box-content">
        <h1>Найти строку в тексте</h1>
        <form action="" method="POST">
            <p>Ключевая строка: <?php echo input('search'); ?></p>
            <input type="submit" value="Поиск">
        </form>
        <hr>        
        <div class="box-text">
            <p>
            <?php 
            function getRegExp($search) {  
                while ( mb_strlen($search) > 0) { 
                    
                    $res = preg_match('#(?|"([^"]+?)"|([^"\s]+))(\s|$)#i', $search, $match);

                    if ($res) {
                        $words[] = preg_quote($match[1]);                 
                        $search = substr($search, mb_strlen($match[0]));
                    } else {
                        throw new Exception('Incorrect a string in search');
                    }                  
                }
                
                return "#(". implode('|', $words) .")#"; 
            }
            
            $text = 'Advertisers study how people learn so that they can "teach" them to respond 
            to their advertising. They want us to be interested, to try "something", and 
            then to do it again. These are the elements of learning: interest, experience 
            and repetition. If an advert can achieve this, it is successful. If an advert 
            works well, the same "technique" can be used to advertise different things. 
            So, for example, in winter if the weather is cold and you see a family having 
            a warming cup of tea and feeling cosy, you may be interested and note the name 
            of the tea ... Here the same technique is being used as with the cool, 
            refreshing drink.';

            if(isset($_POST['search'])) 
            {
                $search = trim(strip_tags($_POST['search']));

                try {
                    $reg = getRegExp($search);
                    
                    echo preg_replace($reg, '<b class="red">$1</b>', $text);
                } catch (Exception  $err) {
                    echo '<h4 class="red"> Type a correct string </h4>' . $text;
                }
            } else {
                echo $text ;
            }
                                 
            ?>
            </p>            
        </div>       
    </div>
    </body>
</html>
