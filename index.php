<?php


require "html-dom/simple_html_dom.php";


$url = "https://www.ilpen.com.tr/urun/promosyon-tukenmez-ve-roller-kalem-seti_6665";

$html_contents = file_get_contents($url);

preg_match_all('@<h1 class="product_title entry-title text_transform_none">(.*?)</h1>@si', $html_contents, $urun_adi);
$urunAdi = strip_tags($urun_adi[0][0]);
echo "Ürün Adı: " . $urunAdi . "</br></br>";


preg_match_all('@<p class="price">(.*?)<span class="price">(.*?)</span>(.*?)</p>@si', $html_contents, $urun_fiyat);
$urunFiyat = strip_tags($urun_fiyat[0][0]);
echo "Ürün Fiyat: " . $urunFiyat . "</br></br>";


preg_match_all('@<h2 class="product_title entry-title bold"><small>Ürün Kodu:</small>(.*?)</h2>@si', $html_contents, $urun_kodu);
$urunKodu = strip_tags($urun_kodu[1][0]);
echo "Ürün Kodu: " . $urunKodu . "</br></br>";
//print_r($urun_kodu);



$stok_url = "https://webservice.ilpen.com.tr/stock_service/get_stock_special_html_table_by_product_code?productGroupCode=1693";
$urunStok = file_get_html($stok_url);
echo $urunStok;



preg_match_all('@<div class="description">(.*?)<h3>Ürün Özellikleri</h3>(.*?)<p>(.*?)</p>(.*?)</div>@si', $html_contents, $urun_detay);
$urunDetay = $urun_detay[3][0];
echo "Ürün Detay: " . $urunDetay . "</br></br>";
//print_r($urunDetay);


preg_match_all('@<a class="button btn-info border_f1" href="(.*?)" download="(.*?)">(.*?)</a>@si', $html_contents, $urun_foto);
$urunFoto = strip_tags($urun_foto[1][0]);
echo "<img src='" . $urunFoto . "'>";
//print_r($urun_foto);





?>



