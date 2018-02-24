<?php
include ("bd.php");
function ins_adv($text)
{
    $pieces = explode("</p>", $text);
//    print_r($pieces);
    $txt='';$i=0;
    $arr = array(); $arr1 = array();
    foreach ($pieces as $piece) {
        $txt.= $piece;
        if (strlen(strip_tags($txt))>1200)
        {
//            echo "Current value of text more than 1000 is ".strlen($txt)." iteration is ".$i." 250 sibols is ".substr($txt, -250);
            $arr[] = substr($piece, -250)."</p>"; 
            $arr1[] = substr($piece, -250)."</p>".retArticlesTopPosition();
            $txt=''; $i+=1;
//            continue;
        }
        if ($i==2) {break;}
    }
    return retArticlesTopPosition().str_replace($arr, $arr1, $text);
//    foreach ($arr as $piece) {
//        
//    }
}
// Функция предназначена для получения блока верхней рекламы статей
function retArticlesTopPosition()
{   
      $ret = "
        <script type='text/javascript'><!--
        google_ad_client = 'ca-pub-7017401012475874';
        /* БлокСтатейProfcentre 
         468x60, sm создано 19.04.13 */
        google_ad_slot = '8188789768';
        google_ad_width = 468;
        google_ad_height = 60;
        //-->
        </script>
        <script type='text/javascript'
        src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
        </script>
        ";
    return "<div class='adv_div' align='center'>".$ret.'</div>';
}
    
?>
