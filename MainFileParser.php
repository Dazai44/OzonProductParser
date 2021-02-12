<?php 
set_time_limit(0); // время выолнения неограничено

require_once 'files.php'; //подключение файла со всемми библиотеками, классами и тд
use DiDom\Document; //подключение класса для парсинга 
use DiDom\Element;
use JonnyW\PhantomJs\Client;

$url  = 'https://www.ozon.ru/'; //url сайта который парсим

//объекты классов
$parser = new Parser;   //инициализация моего класса Parser(Упращает работу с curl)
$categories = new OzonCategoryParser(); // класс для парсинга категорий
$functions = new SomeFunctions(); //класс с функциями
$connect = new GetConnect(); // класс для получения html через curl
$client = Client::getInstance();

//массивы с заголовками(желательно изменить на свои)
$headers = $functions->GetHeaders();

//получение категорий
$categorys = $categories->getCategories($headers);

//получение данных из форм и обработка их
$data = $_POST['name-product']; 
$data = $functions->mb_ucfirst($data); 
$data = trim($data);
$data = str_replace(' ', '+', $data);
$data_number = $_POST['quantity-product'];

//проверки на ввод коректных данных
if($data_number == '' || $data_number == 0){
    $errors[] = 'Колличество должно быть от 1 до 4'; // не допускаем ввод 0 что бы не запутать
}
if($data_number > 0){
    $data_number = $data_number -1; 
}
if(in_array($data, $categorys)){
    $errors[] = 'Вы пытаетесь спарсить категорию';
}
//ошибки с номером
if($data_number > 4){
    $errors[] = 'Чтобы выводить больше 4 товаров, необходимы proxy сервера'; // проверка если больше 4 то вывод ошибки ибо что бы парсить больше 4 нужны прокси сервера
}

$request_url = $functions->TakeGetStringOzon($url, $data);  //получение url страницы по запросу в форме

//получение html по запросу
$html = $connect->connection($request_url, $headers);

$document = new Document($html);

//переменные (массивы) для вывода из цикла for
$titles_oz = [];
$prices_oz = [];
$prices_without_sale_oz = [];
$links_oz = [];
$images_oz = [];
$percents_oz = [];
$all_titles_category = [];

//если массив с ошибками пуст
if(empty($errors)){ 

        //циклы для получение необоходимых данных
        
            // 1 тип вывода данных
         if($document->first('.a0t8.a0u') == null){ 
                for($i = 0; $i <= $data_number; $i++){
                //заголовок
                
                $title = $document->find('.a0c6.a0c9.a0c8')[$i]->first('.a0s9')->find('a')[1]->text();
                
                $titles_oz[] = $title;
                sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                //цена со скидкой 
                $price = $document->find('.a0c4')[$i]->first('.a0s9')->first('.b5v4')->first('span')->text();
                sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                //Цена без скидки и процент скидки
                if($document->find('.a0c6.a0c9.a0c8')[$i]->first('.a0s9')->first('.b5v4')->find('span')[1]){
                    $price_without_sale = $document->find('.a0c6.a0c9.a0c8')[$i]->first('.a0s9')->first('.b5v4')->find('span')[1]->text(); 
                    $percent = $document->find('.a0r')[$i]->first('.a2a1.a2q3')->first('span')->text();
                }else{
                    $percent = '0%';
                    $price_without_sale = $price;
                }
                $percents_oz[] = $percent;
                $prices_oz[] = $price;
                $prices_without_sale_oz[] = $price_without_sale;
                sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                //ссылка на товар
                $link = $document->find('.a0c4')[$i]->first('.a0s9')->find('a')[1]->attr('href');
                $link = substr($link, 1); // вырезаем / в начале строки
                $link = $url . $link;
                $links_oz[] = $link;
                sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                //картинка товара
                $img = $document->find('.a0c4')[$i]->first('.a0i4')->first('.a0i7')->first('img')->attr('src');
                $images_oz[] = $img;
                sleep(rand(2,6)); //рандомная задержка(чтобы не банили)
                
                } 
                   

                
        }

    // 2 тип вывода данных
    if($document->first('.a0c6.a0d.a0c9.a0c8')){ 

                for($i = 0; $i <= $data_number; $i++){ 
                    //заголовок
                    $title = $document->find('.a0c6.a0d.a0c9.a0c8')[$i]->first('.a0s9.a0t')->first('a')->text();
                    $titles_oz[] = $title;
                    sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                    //цена со скидкой 
                    $price = $document->find('.a0c6.a0d.a0c9.a0c8')[$i]->find('.a0t0')[2]->first('.b5v4.a5d2')->first('span')->text();
                    
                    sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                    //Цена без скидки

                    if($document->find('.a0c6.a0d.a0c9.a0c8')[$i]->find('.a0t0')[2]->first('a')->first('.b5v4.a5d2')->find('span')[1]){
                        $price_without_sale = $document->find('.a0c6.a0d.a0c9.a0c8')[$i]->find('.a0t0')[2]->first('a')->first('.b5v4.a5d2')->find('span')[1]->text();
                        $percent = $document->find('.a0c6.a0d.a0c9.a0c8')[$i]->find('.a0t0')[2]->first('.a0x.a5d2')->first('.a0x0')->text();
                    }else{
                        $percent = '0%';
                        $price_without_sale = $price;
                    }
                    $percents_oz[] = $percent;
                    $prices_oz[] = $price;
                    $prices_without_sale_oz[] = $price_without_sale;
                    sleep(rand(2,6)); //рандомная задержка(чтобы не банили)
                    

                    //ссылка на товар
                    $link = $document->find('.a0t0')[$i]->first('a')->attr('href');
                    $link = substr($link, 1); // вырезаем / в начале строки
                    $link = $url . $link;
                    $links_oz[] = $link;
                    //sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                    //картинка товара
                    $img = $document->find('.a0c6.a0d.a0c9.a0c8')[$i]->first('.a0t0')->first('a')->first('.a0i4.a0i5')->first('.a0i7.a0i8')->first('img')->attr('src');
                    $images_oz[] = $img;
                    sleep(rand(2,6)); //рандомная задержка(чтобы не банили)

                }
        } 

}
