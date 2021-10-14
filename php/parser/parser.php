<?php

$url = 'https://www.citilink.ru/catalog/komplektuyuschie-dlya-pk/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$content = curl_exec($ch);
curl_close($ch);

$catLinkRegex = '/<a class="CatalogCategoryCard__link".*?href="(.*?)"/s';
$catNameCountRegex = '/js--Subcategory__title">(.*?)\<.*?">(.*?)</s';

preg_match_all($catLinkRegex, $content, $catLinks);

echo '<ul>';

for ($i = 0; $i < count($catLinks[1]); $i++) {

    curl_setopt($ch, CURLOPT_URL, $catLinks[1][$i]);
    $content = curl_exec($ch);
    preg_match($catNameCountRegex, $content, $catNameCount);

    echo '<li>' . $catNameCount[1] . ' - '. $catNameCount[2] . '</li>';
}

curl_close($ch);

echo '</ul>';
