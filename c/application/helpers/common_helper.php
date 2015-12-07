<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//check valid file upload format
function is_valid_file_format($array_type, $filename)
{
    $allowed =  $array_type;
    $filename = $_FILES['video_file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo 'error';
    } 
}

function remove_vietnamese_accents($string) {
    $trans = array(
        '�'=>'a','�'=>'a','?'=>'a','�'=>'a','?'=>'a',
        'A'=>'a','�'=>'a','�'=>'a','?'=>'a','�'=>'a','?'=>'a',
        '�'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a',
        '�'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a',
        'a'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a',
        'A'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a','?'=>'a',
        'D'=>'d','�'=>'d','d'=>'d',
        '�'=>'e','�'=>'e','?'=>'e','?'=>'e','?'=>'e',
        'E'=>'e','�'=>'e','�'=>'e','?'=>'e','?'=>'e','?'=>'e',
        '�'=>'e','?'=>'e','?'=>'e','?'=>'e','?'=>'e','?'=>'e',
        '�'=>'e','?'=>'e','?'=>'e','?'=>'e','?'=>'e','?'=>'e',
        '�'=>'i','�'=>'i','?'=>'i','i'=>'i','?'=>'i',
        'I'=>'i','�'=>'i','�'=>'i','?'=>'i','I'=>'i','?'=>'i',
        '�'=>'o','�'=>'o','?'=>'o','�'=>'o','?'=>'o',
        'O'=>'o','�'=>'o','�'=>'o','?'=>'o','�'=>'o','?'=>'o',
        '�'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o',
        '�'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o',
        'o'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o',
        'O'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o','?'=>'o',
        '�'=>'u','�'=>'u','?'=>'u','u'=>'u','?'=>'u',
        'U'=>'u','�'=>'u','�'=>'u','?'=>'u','U'=>'u','?'=>'u',
        'u'=>'u','?'=>'u','?'=>'u','?'=>'u','?'=>'u','?'=>'u',
        'U'=>'u','?'=>'u','?'=>'u','?'=>'u','?'=>'u','?'=>'u',
        '?'=>'y','�'=>'y','?'=>'y','?'=>'y','?'=>'y',
        'Y'=>'y','?'=>'y','�'=>'y','?'=>'y','?'=>'y','?'=>'y',
        'B'=>'b','C'=>'c','F'=>'f','G'=>'g','H'=>'h','K'=>'k',
        'L'=>'L','M'=>'m','N'=>'n','P'=>'p','Q'=>'q','R'=>'r',
        'S'=>'s','T'=>'t','V'=>'v','X'=>'x',' '=>'-',':'=>'-',"'"=>''
    );
    return strtr($string, $trans);
}

 function makeHttpCall($host, $param = array(), $type, $headerParam = array()){
    $url = $host;
    $fields_string = '';
    foreach($param as $key=>$value) {
        $fields_string .= $key.'='.$value.'&';
    }
    rtrim($fields_string, '&');
    //open connection
    $ch = curl_init();

    if(count($headerParam)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerParam);
    }
    //set the url, number of POST vars, POST data
    if($type === 'POST'){
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($param));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    }else if($type === 'GET'){
        curl_setopt($ch,CURLOPT_URL, $url .'?'. $fields_string);
    }
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}

function fetchBasicProfile($access_token){
    return fetchLinkinProfile('', '', array(), $access_token);
}

function fetchLinkinProfile($method, $resource = '', $params = array(), $access_token) {
    if(empty($method)) $method = 'GET';
    if(empty($resource)){
        $resource = '/v1/people/~:(id,first-name,last-name,maiden-name,specialties,num-connections,picture-url,email-address,location:(name))';
    }

    $opts = array(
        'http' => array(
            'method' => $method,
            'header' => "Authorization: Bearer " .$access_token . "\r\n" ."x-li-format: json\r\n"
        )
    );
    $url = 'https://api.linkedin.com' . $resource;
    if (count($params)) {
        $url .= '?' . http_build_query($params);
    }
    $context = stream_context_create($opts);
    $response = file_get_contents($url, false, $context);
    return json_decode($response);
}