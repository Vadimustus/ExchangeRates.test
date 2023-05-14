
<!DOCTYPE HTML> 
<html lang="ru"> 
  <head> 
  <link rel='stylesheet' href='style.css' />
  </head> 
  <body>
  <?php
    require 'Currency.php';
    function difference($a){
        if ($a>0) {
            print "<p><font color=green>$a</font>";
        }
        else print "<p><font color=red>$a</font>";
    }
    ?>
    <script>
        setInterval(() => {
            location.reload();
        }, 3600000);
    </script>

    <div class="wrap"> 
        <div class="p-block"> 
            <h1>Курсы валют</h1>             
        </div> 
    </div>
     
      
    <div class="container">
        <div class="box-1">
            <div class="title">Доллар США</div>
            <div class="value"><?= $usd?></div>
            <div class="dif_value"><?= difference($usd_dif)?></div>
        </div>
        <div class="box-2">
            <div class="title">Евро</div>
            <div class="value"><?= $evro?></div>
            <div class="dif_value"><?= difference($evro_dif)?></div>
        </div>
        <div class="box-3">
            <div class="title">Белорусский рубль</div>
            <div class="value"><?= $byn?></div>
            <div class="dif_value"><?= difference($byn_dif)?></div>
        </div>
        <div class="box-4">
            <div class="title">Китайский юань</div>
            <div class="value"><?= $cny?></div>
            <div class="dif_value"><?= difference($cny_dif)?></div>
        </div>
        <div class="box-5">
            <div class="title">Казахстанских тенге</div>
            <div class="value"><?= $kzt?></div>
            <div class="dif_value"><?= difference($kzt_dif)?></div>
        </div>
        <div class="box-6">
            <div class="title">Швейцарский франк</div>
            <div class="value"><?= $chf?></div>
            <div class="dif_value"><?= difference($chf_dif)?></div>
        </div>
   </body> 
</html> 