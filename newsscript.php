function newsscript(){
	    function curl_get($url, $referer = 'http://www.google.com')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64;rv:38.0) Gecko/20100101 Firefox/38.0");
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;

    }

    $html = curl_get('http://www.insur-info.ru/_export/news/iframe.php?issue_num=12&font_size=14');

    $dom_html = str_get_html($html);

    $news = $dom_html->find('#issue');

    foreach ($news as $value) {

        echo "<p>" . $value->innertext . "</p>";

    }
	
	
}
