<?php

//input your token here
$botToken = "YOUR-BOT-TOKEN-HERE";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

switch($message) {
    //change the username_bot with your bot username
    case "/status@username_bot":
        $output = shell_exec ("git status");    
        sendMessage($chatId,$output);
        break;
    //change the username_bot with your bot username
    case "/pull@username_bot":
        $output = shell_exec ("git pull https://username:password@gitdomain/username/project.git");
        sendMessage($chatId,$output);
        break;
}


function sendMessage ($chatId, $message) {
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode$
    url_get_contents($url);
}

function url_get_contents($Url) {
    if(!function_exists('curl_init')) {
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

?>
