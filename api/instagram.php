<?php

const CLIENT_ID = "256c1703563c4d4bb309e35557263e68";
const CLIENT_SECRET = "6d0740e212ee4f5788b62658bb2826ff";
const REDIRECT_URI = "http://yadahrobotics.com.br/percepter/auth.php";

function ig_generate_sig($endpoint, $params) {
    $sig = $endpoint;
    ksort($params);
    foreach ($params as $key => $val) {
        $sig .= "|$key=$val";
    }
    return hash_hmac("sha256", $sig, CLIENT_SECRET, false);
}

function ig_get_token($code) {
    $endpoint = "https://api.instagram.com/oauth/access_token";

    $curlPost = "client_id=". CLIENT_ID . "&redirect_uri=" . REDIRECT_URI . "&client_secret=" . CLIENT_SECRET . "&code=". $code . "&grant_type=authorization_code";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = json_decode(curl_exec($ch), true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($http_code != "200") {
        // echo "Error : Failed to receieve access token" . json_encode($data);
        return false;
    }

    return $data["access_token"];
}

function ig_get_profile($access_token) {
    $endpoint = "https://api.instagram.com/v1/users/self/";
    $params = array(
        "access_token" => $access_token,
    );

    $url = $endpoint  . "?access_token=" . $access_token . "&sig=" . ig_generate_sig($endpoint, $params);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $data = json_decode(curl_exec($ch), true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($data["meta"]["code"] != 200 || $http_code != 200) {
        // echo "Error : Failed to get user information. " . json_encode($data);
        return false;
    }

    return $data["data"];
}

function ig_get_media($access_token) {
    $endpoint = "https://api.instagram.com/v1/users/self/media/recent/";

    $url = $endpoint  . "?access_token=" . $access_token . "&count=9";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $data = json_decode(curl_exec($ch), true);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($data["meta"]["code"] != 200 || $http_code != 200) {
        // echo "Error : Failed to get user posts. " . json_encode($data);
        return false;
    }

    return $data["data"];
}