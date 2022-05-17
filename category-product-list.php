<?php


require "html-dom/simple_html_dom.php";


$url = "https://www.ilpen.com.tr/kategori/promosyon-kristal-ve-odul-urunleri_22";

$html_contents = file_get_contents($url);

$cagetory_titles = '@<ul class="products row">(.*?)</ul>@si';
    preg_match_all($cagetory_titles,$html_contents,$content);


//print_r($content[0]);


foreach ($content[0] as $key => $value) {
    

$get_kode = '@<div class="product-info">(.*?)<h3 class="h_50"><a href="(.*?)">(.*?)</a></h3>(.*?)</div>@si';
preg_match_all($get_kode,$value,$product_code);

print_r($product_code);

echo "<br>===========================<br>";


foreach ($product_code[1] as $key => $values) {

echo " + " .$values . " - " . $product_code[2][$key] . "+<br><br><br>";



}
}


?>



