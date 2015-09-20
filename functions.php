<?php
/* All the third-party functions used with links to their sources.*/

function fetchuri($url) {
        $crl = curl_init();
        $timeout = 5;
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}

function resize_img($path, $width, $height) {
	header("Content-type: image/jpeg");
	echo fetchuri("http://".$path);
}
?>