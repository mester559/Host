//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
<?php
ob_start();
error_reporting(E_ALL);

$TOKEN = '7727388455:AAFze8eR4buCw6w5_pDpNC892Siz-owrQow';

//------ ( هنا المفاتيح لا تلعب ) -----
$image_url_key  = '6190eacfca126618a0458d4327715041';
$Text_extraction_key = 'AIzaSyA5MInkpSbdSbmozCQSuBY3pylSTgmLlaM';
$background_removal_key = '5Gv5DVmbqagQkKRziaMbY8em';
//------ ( هنا المفاتيح لا تلعب ) -----

function bot($method, $datas = []) {
global $TOKEN;
$url = "https://api.telegram.org/bot" . $TOKEN . "/$method";
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

function base64EncodeImage($filePath) {
$imageData = file_get_contents($filePath);
return base64_encode($imageData);
}
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
function uploadImageToIbb($imagePath) {
global $image_url_key ;
$url = 'https://api.imgbb.com/1/upload';
$image = base64_encode(file_get_contents($imagePath));
$data = array(
'key' => $image_url_key ,
'image' => $image
);
$options = array(
'http' => array(
'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
'method'  => 'POST',
'content' => http_build_query($data),
),
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
return false;
}
$response = json_decode($result, true);
return $response['data']['url'] ?? false;
}

function callGoogleVisionAPI($encodedImage) {
global $Text_extraction_key;
$url = 'https://vision.googleapis.com/v1/images:annotate?key=' . $Text_extraction_key;
$headers = [
'User-Agent: Google-API-Java-Client Google-HTTP-Java-Client/1.43.3 (gzip)',
'x-android-package: image.to.text.ocr',
'x-android-cert: ad32d34755bb3b369a2ea8dfe9e0c385d73f80f0',
'Content-Type: application/json; charset=UTF-8',
'Host: vision.googleapis.com',
'Connection: Keep-Alive'
];
$body = json_encode([
'requests' => [
[
'features' => [['type' => 'TEXT_DETECTION', 'maxResults' => 10]],
'image' => ['content' => $encodedImage]
]
]
]);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
return json_decode($result, true);
}

function removeBackground($imageUrl) {
global $background_removal_key;
$curl = curl_init();
curl_setopt_array($curl, [
CURLOPT_URL => 'https://api.remove.bg/v1.0/removebg',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => [
'image_url' => $imageUrl,
'size' => 'auto'
],
CURLOPT_HTTPHEADER => [
'X-Api-Key: '.$background_removal_key,
],
]);
$response = curl_exec($curl);
curl_close($curl);
return $response;
}
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
function get_image_description($image_base64) {
$headers = [
'authority: www.blackbox.ai',
'accept: */*',
'accept-language: ar-EG,ar;q=0.9,en-US;q=0.8,en;q=0.7',
'content-type: application/json',
'origin: https://www.blackbox.ai',
'referer: https://www.blackbox.ai/',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36',
];
$json_data = [
'messages' => [[
'role' => 'user',
'content' => 'وصف الصورة باللغة العربية اذا كانت اسئله عربيه او انكليزيه قم بحلها مع شرح بسيط واذا كان سؤال رياضياً او اي سؤال مهما كان او مجموعه اسئله قم بحلها كاملا مع الشرح', 
'data' => [
'imageBase64' => $image_base64,
'fileText' => 'وصف الصورة باللغة العربية اذا كانت اسئله عربيه او انكليزيه قم بحلها مع شرح بسيط واذا كان سؤال رياضياً او اي سؤال مهما كان او مجموعه اسئله قم بحلها كاملا مع الشرح'],
'id' => 'b4RPFiR',
],],
'id' => 'nBwAQyq',
'maxTokens' => 1024,
];
$options = [
'http' => [
'header' => implode("\r\n", $headers),
'method' => 'POST',
'content' => json_encode($json_data),
],
];
$context = stream_context_create($options);
$response = file_get_contents('https://www.blackbox.ai/api/chat', false, $context);
return $response;
}
// 𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳

// هنا تكدر تضيف لوحة ادمن

// 𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
$update = json_decode(file_get_contents('php://input'), true);
$message = $update['message'] ?? $update['edited_message'] ?? null;
$chat_id = $message['chat']['id'] ?? null;
$from_id = $message['from']['id'] ?? null;
$name = $message['from']['first_name'] ?? 'User';
$messageId = $message['message_id'] ?? null;
$photo = $message['photo'] ?? null;
$text = $message['text'] ?? null;

if ($text == "/start") {
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => '*- مرحبا بك :* [' . $name . '](tg://user?id=' . $from_id . ')
*- في بوت  
📝 - استخراج النص من الصور 
✂️ - ازالة خلفية من الصور 
🔍 - تحليل الصور
🖼️ - تحسين جودة الصور 4K
☁️ - رفع الصور برابط مباشر لاستخدامه

🤍 - فقط ارسل الصور واختر ما تريد من الازرار *',
'parse_mode' => "Markdown",
'reply_to_message_id' => $messageId,
'disable_web_page_preview' => true,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => " مطور البوت ", 'url' => "https://t.me/T_0_M0"], ['text' => " قناة البوت ", 'url' => "https://t.me/+_wM_eDKDTgM3ZjUy"]],
]
])
]);
}
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
if (isset($photo)) {
$file_id = end($photo)['file_id'];
$fileResponse = bot('getFile', ['file_id' => $file_id]);
$file_path = $fileResponse->result->file_path;
$file_url = "https://api.telegram.org/file/bot" . $TOKEN . "/$file_path";
file_put_contents("user_$chat_id.txt", $file_url);
$file_content = file_get_contents($file_url);
file_put_contents('temp_image.jpg', $file_content);
bot('sendMessage', [
'chat_id' => $chat_id,
'text' => '*- اختر ماذا تريد من الازرار 🖼*',
'parse_mode' => 'Markdown',
'reply_to_message_id' => $messageId,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '🔍 تحليل الصورة', 'callback_data' => 'analyze_image'],
['text' => '✂️ إزالة الخلفية', 'callback_data' => 'remove_bg']],
[['text' => '🖼️ تحسين الجودة', 'callback_data' => 'enhance_image'],
['text' => '📝 استخراج النص', 'callback_data' => 'extract_text']],
[['text' => '☁️ رفع الصورة', 'callback_data' => 'upload_image']]
]
])
]);
unlink('temp_image.jpg');
}

if (isset($update['callback_query'])) {
$callback = $update['callback_query'];
$data = $callback['data'];
$chat_id = $callback['message']['chat']['id'];
$message_id = $callback['message']['message_id'];
$original_message_id = $callback['message']['reply_to_message_id'];
    
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '*- يتم معالجة طلبك ☁️*',
'parse_mode' => 'Markdown'
]);   

$file_url = file_get_contents("user_$chat_id.txt");
$file_content = file_get_contents($file_url);
file_put_contents('processing_image.jpg', $file_content);
$image_base64 = base64EncodeImage('processing_image.jpg');
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳   
if ($data == 'analyze_image') {
$description = get_image_description('data:image/jpeg;base64,'.$image_base64);
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "*- نتيجة تحليل الصورة 🔍*"
 . $description,
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']],
]
])
]);
}

if ($data == 'extract_text') {
$visionResponse = callGoogleVisionAPI($image_base64);
if (isset($visionResponse['responses'][0]['textAnnotations'][0]['description'])) {
$text = $visionResponse['responses'][0]['textAnnotations'][0]['description'];
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "```النص
$text```",
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']]
]
])
]);
} else {           
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '*- لم يتم العثور على نص في الصورة ❗*',
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']]
]
])
]);
}
}
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳    
if ($data == 'enhance_image') {
$api = json_decode(file_get_contents("http://167.235.240.118/api/4k_resolution/?link=$file_url"), true);
if ($api['status'] == 200) {
bot('deleteMessage', [
'chat_id' => $chat_id,
'message_id' => $message_id
]);            
bot('sendPhoto', [
'chat_id' => $chat_id,
'photo' => $api['result'],
'caption' => "*- تم تحسين جودة الصورة بنجاح 🖼*",
'parse_mode' => 'Markdown',
'reply_to_message_id' => $original_message_id,
]);          
bot('sendDocument', [
'chat_id' => $chat_id,
'document' => $api['result'],
'caption' => "*- نسخة عالية الجودة 🖼*",
'parse_mode' => 'Markdown',
'reply_to_message_id' => $original_message_id,
]);
} else {
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '*- حدث خطأ أثناء تحسين الجودة ❗*',
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']]
]
])
]);
}
}
    
if ($data == 'remove_bg') {
$response = removeBackground($file_url);
if (isset(json_decode($response, true)["errors"])) {
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '❌ '.json_decode($response, true)["errors"][0]["title"],
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']]
]
])
]);
} else {
file_put_contents('no_bg.png', $response);
bot('deleteMessage', [
'chat_id' => $chat_id,
'message_id' => $message_id
]);
bot('sendDocument', [
"chat_id" => $chat_id,
"document" => new CURLFile('no_bg.png'),
'caption' => "*- تمت إزالة الخلفية بنجاح ✂️*",
'parse_mode' => 'Markdown',
'reply_to_message_id' => $original_message_id,
]);
unlink('no_bg.png');
}
}
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳    
if ($data == 'upload_image') {
$image_url = uploadImageToIbb('processing_image.jpg');
if ($image_url) {
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => "*- تم رفع الصورة بنجاح ☁️ .*
*- رابط الصورة:* [اضغط هنا]($image_url) 🧚🏻‍♀️.",
'parse_mode' => 'Markdown',
'disable_web_page_preview' => false,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']],
]
])
]);
} else {
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '*- حدث خطأ أثناء رفع الصورة ❗*',
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '↩️', 'callback_data' => 'back_to_menu']]
]
])
]);
}
}

if ($data == 'back_to_menu') {
bot('editMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => '*- اختر ماذا تريد من الازرار 🖼*',
'parse_mode' => 'Markdown',
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => '🔍 تحليل الصورة', 'callback_data' => 'analyze_image'],['text' => '✂️ إزالة الخلفية', 'callback_data' => 'remove_bg']],
[['text' => '🖼️ تحسين الجودة', 'callback_data' => 'enhance_image'],['text' => '📝 استخراج النص', 'callback_data' => 'extract_text']],
[['text' => '☁️ رفع الصورة', 'callback_data' => 'upload_image']]
]
])
]);
}
unlink('processing_image.jpg');
}

//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
//• لا تنسى ذكر حقوق المطور توم
//• المطور ↦ @T_0_M0 ↤
//• قناة المطور ↦ @tomy_php ↤
//𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳𓏳
