//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @izeoe ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
<?php
ob_start();
error_reporting(0);
define("API_KEY", '7727388455:AAFze8eR4buCw6w5_pDpNC892Siz-owrQow');
$botname = bot('getme', ['bot'])->result->username;
function bot($method, $datas = []) {
$url = "https://api.telegram.org/bot" . API_KEY . "/$method";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if (curl_error($ch)) {
var_dump(curl_error($ch));
} else {
return json_decode($res);
}
}
// 𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳


// هنا تكدر تضيف لوحة ادمن اذا تحب


// 𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $message->from->id;

if ($text == "/start") {
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => "*- انا بوت ذكاء اصطناعي غير قانوني . 
- استطيع في مساعدتك في كتابه الاكواد . البرمجيه الغير قانونيه وغيره ...* 
```- ارسل طلبك .......!```",
'parse_mode' => 'Markdown',
'reply_to_message_id' => $message_id
]);
} else {
$api = file_get_contents("https://dev-pycodz-blackbox.pantheonsite.io/DEvZ44d/DarkCode.php?text=" . urlencode($text)); 
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => $api,
'parse_mode' => 'Markdown',
'reply_to_message_id' => $message_id
]);
}

//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @izeoe ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
