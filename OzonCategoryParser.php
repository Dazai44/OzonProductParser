<?php set_time_limit(0);

require 'files.php'; //подключение файла со всемми библиотеками, классами и тд\
use DiDom\Document;

class OzonCategoryParser {

    

     public function getCategories($headers){
        
        $connect = new GetConnect();

        $url  = 'https://www.ozon.ru/';
        $html = $connect->connection($url, $headers);

        $document = new Document($html);

        $all_titles = [];
        
        for($i = 0; $i < 27; $i++){
            $title = $document->first('.c6c')
            ->find('div')[0]
            ->find('a')[$i]
            ->text();
            $all_titles[] = $title;
        }

        return $all_titles;
     }

}