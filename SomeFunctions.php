<?php
require_once 'files.php';

class SomeFunctions {

    //создание запроса товаров в ozon
    public function TakeGetStringOzon($url, $data){ 
    $url = $url . "search/?text=$data&from_global=true&page_changed=true";
    return $url;

    }
    //функция для перевода в верхний регистр
    public function mb_ucfirst($str, $encoding='UTF-8'){
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
               mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;

    }

    public function GetHeaders(){
        $headers = [    //желательно вставить свои
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'accept-encoding: gzip, deflate, br',
            'accept-language: ru-RU,ru;q=0.9,sv-RU;q=0.8,sv;q=0.7,en-US;q=0.6,en;q=0.5',
            'cache-control: max-age=0',
            'cookie: visid_incap_1101384=VeTmLlTwTz2AJO4P/t0QmhcBfV4AAAAAQUIPAAAAAADAJmsvpuSaibfKBH0AcDdI; _ga=GA1.2.1257023196.1585250597; flocktory-uuid=f1c6e4c3-c090-4e22-bd0a-1bc745fff790-0; tmr_lvid=6819766a4296b7d68f8c02bca532eb2d; tmr_lvidTS=1563294026528; __exponea_etc__=42ec5458-6f97-11ea-ab13-aaca38549e64; cnt_of_orders=0; isBuyer=0; abGroup=60; SessionID=nJxWeOU9RoOb+GY/wBF6Ag; __Secure-ab-group=60; __Secure-ext_xcid=43d85635c1363d4f87e315ecfe420971; _gcl_au=1.1.525033796.1610668134; __Secure-user-id=0; _gcl_aw=GCL.1611841757.Cj0KCQiA3smABhCjARIsAKtrg6LO0ajRphHC_wEQuc05ceYWNlBBwOocd2T8gZa6ticwuR3_KBy7sCEaAhhUEALw_wcB; _gac_UA-37420525-1=1.1611841758.Cj0KCQiA3smABhCjARIsAKtrg6LO0ajRphHC_wEQuc05ceYWNlBBwOocd2T8gZa6ticwuR3_KBy7sCEaAhhUEALw_wcB; xcid=c1c53ee54a9d1160c543ec85490a019f; nlbi_1101384=WHVNd5znIhyTnMubyZtWRQAAAAAdLXntTYtUvZknIo+Y12ZC; _gid=GA1.2.412745417.1612469086; __Secure-access-token=3.0.nJxWeOU9RoOb+GY/wBF6Ag.60.l8cMBQAAAABfz73JEKNVj6N3ZWKgAICQoA..20210205182857.KiF0o6_uibQkkQY7qcAkReDe-DkxSWUnaDeFZ_beU6g; __Secure-refresh-token=3.0.nJxWeOU9RoOb+GY/wBF6Ag.60.l8cMBQAAAABfz73JEKNVj6N3ZWKgAICQoA..20210205182857.RcDgwyS9JDqNMlhPWuxnQF03zjfWfcIH0n8F3fK79MA; access_token=3.0.nJxWeOU9RoOb+GY/wBF6Ag.60.l8cMBQAAAABfz73JEKNVj6N3ZWKgAICQoA..20210205182857.KiF0o6_uibQkkQY7qcAkReDe-DkxSWUnaDeFZ_beU6g; refresh_token=3.0.nJxWeOU9RoOb+GY/wBF6Ag.60.l8cMBQAAAABfz73JEKNVj6N3ZWKgAICQoA..20210205182857.RcDgwyS9JDqNMlhPWuxnQF03zjfWfcIH0n8F3fK79MA; token_expiration=2021-02-05T21:28:57.2980405+03:00; incap_ses_377_1101384=MJRJOC9dJhNj2GziyF87BUlyHWAAAAAA+RB6sLIkHAIndhcJoah21g==; tmr_detect=1%7C1612542563930; RT="z=1&dm=ozon.ru&si=a44df941-2067-4531-a6b1-2c07a35a8df2&ss=kksi6xia&sl=0&tt=0&bcn=%2F%2F6852bd13.akstat.io%2F&ul=2teef"; tmr_reqNum=176',
            'referer: https://www.ozon.ru/category/manga-32576/?from_global=true&text=%D0%BC%D0%B0%D0%BD%D0%B3%D0%B0',
            'sec-ch-ua: "Chromium";v="88", "Google Chrome";v="88", ";Not A Brand";v="99"',
            'sec-ch-ua-mobile: ?0',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: same-origin',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36'
        ];

        return $headers;
    }

}