<?php
$currentURL= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$parsed = parse_url($currentURL);
$query = $parsed['query'];
parse_str($query, $params);
unset($params['page']);
$string = http_build_query($params);
echo $string;
