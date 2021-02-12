<?php

class Parser{

    //задаются переменные
    private $url;
    private $ch;

    //привызове класса будет создаваться $ch - дескриптор
    public function __construct(){
        $this->ch = curl_init();
        
    }

    //функция которая поможет создавать запросы, вызывать можно по типк set()->set() etc
    public function set($name, $value){
        curl_setopt($this->ch, $name, $value);
        return $this;
    }

    // в параметре передаем url
    public function exec($url){
        curl_setopt($this->ch, CURLOPT_URL, $url);
        return curl_exec($this->ch);
    }
    
    //в конце работы класса запрос curl будет закрываться 
    public function __destruct(){
        curl_close($this->ch);
    }
     

    

}