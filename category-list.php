<?php


require "html-dom/simple_html_dom.php";


$url = "https://www.ilpen.com.tr";

$html_contents = file_get_contents($url . "/kategoriler");

$cagetory_titles = '@<div class="leka-banner-text banner-style1">(.*?)<a href="(.*?)">(.*?)<span(.*?)>(.*?)</span>(.*?)</a>(.*?)</div>@si';
    preg_match_all($cagetory_titles,$html_contents,$content);





//print_r($content);

echo "<ul>";

foreach ($content[0] as $key => $value) {
    

    $get_urls = '@<a href="(.*?)">(.*?)</a>@si';
preg_match_all($get_urls,$value,$category_url);

//print_r($category_url[1][0]);// category linkini almak için

$category_url = $category_url[1][0];




$get_category_titles = '@<span class="title-banner text-uppercase">(.*?)</span>@si';
preg_match_all($get_category_titles,$value,$category_title);

//print_r($category_title[0][0]);// category başlığını almak için

$category_title = $category_title[0][0];

echo "<li><a target='_blank' href='" . $category_url . "'>" . $category_title . "</a></li>";

}

echo "</ul>";


?>

