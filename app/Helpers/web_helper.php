<?php

use Config\App;
use Config\Services;
use Hashids\Hashids;
use CodeIgniter\HTTP\URI;
use CodeIgniter\I18n\Time;


function isLogin(){
    $login = false;
    $session = Services::session();
    $user = $session->get('user');
    if (is_array($user)) {
        $login= $user['logged_in'];
    }
    return $login;
}

function isRole($role): bool
{
    $result = false;
    $session = session();
    $user = $session->get('user');
    if (is_array($user)) {
        $result = ($user['roleName']==$role);
    }
    return $result;
}

function admin_url($uri = '', string $protocol = null): string
{
    if (is_array($uri)) {
        $uri = implode('/', $uri);
    }

    // Access the App configuration directly
    $config = new App();
    $baseUrl = !empty($config->baseURL) && $config->baseURL !== '/'
        ? rtrim($config->baseURL, '/ ') . '/'
        : $config->baseURL;

    // Create a URI object with the base URL
    $url = new URI($baseUrl);

    // Define the panel URL
    $panelUrl = 'admin/';

    // Resolve the URL
    if (!empty($uri)) {
        $url = $url->resolveRelativeURI($panelUrl . $uri);
    } else {
        $url = $url->resolveRelativeURI($panelUrl);
    }

    // Get the request instance and check if it is secure
    $request = Services::request();
    if (empty($protocol)) {
        $protocol = $request->isSecure() ? 'https' : 'http';
    }

    if (!empty($protocol)) {
        $url->setScheme($protocol);
    }

    return rtrim((string) $url, '/ ');
}




function getFormatDateTime($dateTime){
    return  Time::parse($dateTime)->format('d M Y h:i A');
}

function getFormatDate($date){
    return Time::parse($date)->format('d M Y');
}

function selectMixMax($min,$max){
    $item=[];
    for ($i = $min; $i <= $max; $i++){
        $item[]= $i;
    }
    return $item;
}

function encodeId($id): string
{
    $hashids = new Hashids(env('encryption.key'),8,'abcdefghijklmnopqrstuvwxyz');
    return $hashids->encode($id);
}

function decodeId($id){
    $hashids = new Hashids(env('encryption.key'),8,'abcdefghijklmnopqrstuvwxyz');
    return $hashids->decode($id)[0];
}