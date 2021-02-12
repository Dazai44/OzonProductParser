<?php
require_once 'files.php';

class GetConnect {

    public function connection($url, $headers = [], $head = null){ //$header = 1 - вывод заголовков; 0 - не выводит

        $parser = new Parser; // инициализация моего класса Parser(Упращает работу с curl)
        
        $parser
            ->set(CURLOPT_URL, $url)
            ->set(CURLOPT_HEADER, $head) // 1 - вывод заголовков; 0 - не выводит
            ->set(CURLOPT_HTTPHEADER, $headers)
            ->set(CURLOPT_RETURNTRANSFER, true)
            ->set(CURLOPT_ENCODING, "")
            ->set(CURLOPT_SSL_VERIFYPEER, false)
            ->set(CURLOPT_FOLLOWLOCATION, 1);
        $html = $parser->exec($url);
        
        return $html;
        
    }



}