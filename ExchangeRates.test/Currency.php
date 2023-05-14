<?php


function CBR_XML_Daily_Ru() {
    static $rates;
    
    if ($rates === null) {
        $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
    }
    
    return $rates;
}
$bank = CBR_XML_Daily_Ru();
$usd_n = $bank->Valute->USD->Value;
$evro_n=$bank->Valute->EUR->Value;
$byn_n=$bank->Valute->BYN->Value;
$cny_n=$bank->Valute->CNY->Value;
$kzt_n=$bank->Valute->KZT->Value;
$chf_n=$bank->Valute->CHF->Value;

if (($handle = fopen("Currency.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        list($time, $usd, $evro, $byn, $cny, $kzt, $chf) = $data;
    }    
    fclose($handle);
}

$now = date('d.m.Y H:i:s');
$seconds=abs(strtotime($now) - strtotime($time));
$interval=$seconds/3600; 
$now_n = $now;
if($interval>1)
{
    addCsv($now_n, $usd_n, $evro_n, $byn_n, $cny_n, $kzt_n, $chf_n);
}

$usd_dif=$usd-$bank->Valute->USD->Previous;
$evro_dif=$evro-$bank->Valute->EUR->Previous;
$byn_dif=$byn-$bank->Valute->BYN->Previous;
$cny_dif=$cny-$bank->Valute->CNY->Previous;
$kzt_dif=$kzt-$bank->Valute->KZT->Previous;
$chf_dif=$chf-$bank->Valute->CHF->Previous;

function addCsv($now_n, $usd_n, $evro_n, $byn_n, $cny_n, $kzt_n, $chf_n) {
    $list = array ($now_n, $usd_n, $evro_n, $byn_n, $cny_n, $kzt_n, $chf_n);
    $fp = fopen('Currency.csv', 'a');
    fputcsv($fp, $list, ';', '"');
    fclose($fp);
  }
?>