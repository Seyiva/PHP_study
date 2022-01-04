<meta charset="utf-8">
<?php
header('Content-Type: text/html; charset=utf-8');

function getСoordinates() {

    if(($file = fopen('10.08.21_viz.ru.csv', 'r')) !== false ) {
        $res = [] ;
        while (($data = fgetcsv($file, 512, ";")) !== false ) {
            $res[] = $data ;
        }
        
        fclose($file) ;
    }

    $newRes = array_splice($res, 0, 2);

    // цикл создает столько запросов file_get_contents, сколько строк лежит в csv
    foreach($res as $arr) {
        $place = $arr[2]. ' ' .$arr[5]. ' ' . $arr[6] .'<br>' ;    
        
        $address = file_get_contents('https://geocode-maps.yandex.ru/1.x/?geocode=' . urlencode($place) . '&apikey=ca11f0d6-a7f4-495d-b446-a6af40e88a40&format=json&lang=ru_RU');
        $resp = json_decode($address) ; 
        
        if ($resp->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0) {
            // Получение строки с адресом AddressLine
            echo $resp->response->GeoObjectCollection->featureMember[0]->GeoObject->metaDataProperty->GeocoderMetaData->AddressDetails->Country->AddressLine;
            echo ' - point ' ;
            // Получение строки с координатами Point->pos
            echo $resp->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;
            echo '<br>' ;
        } else {
            echo 'Ничего не найдено<br>';
        } 
    }   

}