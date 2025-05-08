<?php
header('Content-Type: application/json; charset=utf-8');
$token = "7727388455:AAFze8eR4buCw6w5_pDpNC892Siz-owrQow";
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

function movie($k){
$rr=[
"https://www.fushaar.live/gerne/documentary/","https://www.fushaar.live/gerne/music/","https://www.fushaar.live/gerne/adventure/","https://www.fushaar.live/gerne/comedy/","https://www.fushaar.live/gerne/mystery/","https://www.fushaar.live/gerne/western/","https://www.fushaar.live/gerne/family/","https://www.fushaar.live/gerne/biography/","https://www.fushaar.live/gerne/sport/","https://www.fushaar.live/gerne/romance/","https://www.fushaar.live/gerne/horror/","https://www.fushaar.live/gerne/drama/","https://www.fushaar.live/gerne/sci-fi/","https://www.fushaar.live/gerne/war/","https://www.fushaar.live/gerne/crime/","https://www.fushaar.live/gerne/history/","https://www.fushaar.live/gerne/animation/","https://www.fushaar.live/gerne/action/","https://www.fushaar.live/gerne/thriller/","https://www.fushaar.live/gerne/fantasy/",
];
return $rr[$k];
}
function movie_k($k,$v=0){
$rr=[
"https://www.fushaar.live/gerne/documentary/page/$v/","https://www.fushaar.live/gerne/music/page/$v/","https://www.fushaar.live/gerne/adventure/page/$v/","https://www.fushaar.live/gerne/comedy/page/$v/","https://www.fushaar.live/gerne/mystery/page/$v/","https://www.fushaar.live/gerne/western/page/$v/","https://www.fushaar.live/gerne/family/page/$v/","https://www.fushaar.live/gerne/biography/page/$v/","https://www.fushaar.live/gerne/sport/page/$v/","https://www.fushaar.live/gerne/romance/page/$v/","https://www.fushaar.live/gerne/horror/page/$v/","https://www.fushaar.live/gerne/drama/page/$v/","https://www.fushaar.live/gerne/sci-fi/page/$v/","https://www.fushaar.live/gerne/war/page/$v/","https://www.fushaar.live/gerne/crime/page/$v/","https://www.fushaar.live/gerne/history/page/$v/","https://www.fushaar.live/gerne/animation/page/$v/","https://www.fushaar.live/gerne/action/page/$v/","https://www.fushaar.live/gerne/thriller/page/$v/","https://www.fushaar.live/gerne/fantasy/page/$v/",
];
return $rr[$k];
}
////
if($text == "/start"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://graph.org/file/8267fe8a828dbfa144528.jpg",
'caption'=>"
👋🏼 مرحبا $name

🎟️ في حالة وجود مشاكل اخبر المطور
📚 تجربة مميزة بدون اعلانات مزعجة
📮 نتمنى لك تجربة رائعه في البوت

💡 طريقة الاستخدام كالتالي:-

1 - توجه لقسم الافلام ثم اختر من القائمة
2 - اختر مثل رومانسية، خيال علمي الخ
3 - حدد فلما من بين العديد من الأفلام
4 - اختر نوع الجوده ثم ابدأ بالمشاهدة

📣 القناة الرسمية للبوت: @R7RRN
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"قسم البحث 🔎",'callback_data'=>'search'],['text'=>"قسم الافلام 🎬",'callback_data'=>'movies']],
[['text'=>"حساب المطور ⚙",'url'=>'https://t.me/BlIJJ']],
]
])
]);
}
if($data == "back1"){
bot('editMessageMedia',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'media'=>json_encode([
'type'=>'photo',
'media'=>"https://graph.org/file/8267fe8a828dbfa144528.jpg",
'caption'=>"
👋🏼 مرحبا $name

🎟️ في حالة وجود مشاكل اخبر المطور
📚 تجربة مميزة بدون اعلانات مزعجة
📮 نتمنى لك تجربة رائعه في البوت

💡 طريقة الاستخدام كالتالي:-

1 - توجه لقسم الافلام ثم اختر من القائمة
2 - اختر مثل رومانسية، خيال علمي الخ
3 - حدد فلما من بين العديد من الأفلام
4 - اختر نوع الجوده ثم ابدأ بالمشاهدة

📣 القناة الرسمية للبوت: @R7RRN
",'parse_mode'=>"Markdown",
]),
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"قسم البحث 🔎",'callback_data'=>'search'],['text'=>"قسم الافلام 🎬",'callback_data'=>'movies']],
[['text'=>"حساب المطور ⚙",'url'=>'https://t.me/BlIJJ']],
]
])
]);
}
if($data == "movies"){
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'caption'=>"
*📂 حسنًا يرجى الاختيار من القائمة التالية:*
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"افلام وثائقية",'callback_data'=>'v#0'],['text'=>"افلام موسيقية",'callback_data'=>'v#1']],
[['text'=>"افلام مغامرة",'callback_data'=>'v#2'],['text'=>"افلام كوميديا",'callback_data'=>'v#3']],
[['text'=>"افلام غموض",'callback_data'=>'v#4'],['text'=>"افلام غربية",'callback_data'=>'v#5']],
[['text'=>"افلام عائلية",'callback_data'=>'v#6'],['text'=>"افلام سيرة ذاتية",'callback_data'=>'v#7']],
[['text'=>"افلام رياضة",'callback_data'=>'v#8'],['text'=>"افلام رومانسية",'callback_data'=>'v#9']],
[['text'=>"افلام رعب",'callback_data'=>'v#10'],['text'=>"افلام دراما",'callback_data'=>'v#11']],
[['text'=>"افلام خيال علمي",'callback_data'=>'v#12'],['text'=>"افلام حرب",'callback_data'=>'v#13']],
[['text'=>"افلام جريمة",'callback_data'=>'v#14'],['text'=>"افلام تاريخ",'callback_data'=>'v#15']],
[['text'=>"افلام انيميشن",'callback_data'=>'v#16'],['text'=>"افلام اكشن",'callback_data'=>'v#17']],
[['text'=>"افلام اثارة",'callback_data'=>'v#18'],['text'=>"افلام فانتاسيا",'callback_data'=>'v#19']],
 [['text'=>"القائمة الرئيسية",'callback_data'=>"back1"]],
]])
]);
}
$ex = explode("#",$data);
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=".movie($ex[1])),true);
if ($ex[0] =="v"){
for($i=0;$i<=count($info);$i++){
$l=mb_strimwidth($info[$i]["name"],0,40,"..");
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$ex[1]#$i"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"التالي ",'callback_data'=>"next#$ex[1]#1"]];
$reply_markup['inline_keyboard'][] = [['text'=>"الغاء",'callback_data'=>"back1"]];

$reply_markup = json_encode($reply_markup);
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
*🗃 حدد الفيلم الذي تريد مشاهدته الان:*
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}
if($ex[3]==null){
$url1 = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=".movie($ex[1])),true)[$ex[2]]["url"];
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?d=".$url1),true);
}else{
$url1 = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=".movie_k($ex[1],$ex[2])),true)[$ex[3]]["url"];
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?d=".$url1),true);
}
$name =$info["name"];
$i=$info["info"];
$s=$info["story"];
if ($ex[0]=="l"){
$reply_markup['inline_keyboard'][] = [['text'=>"سيرفرات التحميل ، المشاهدة",'callback_data'=>"hello"]];
for($k=0;$k<count($info["url"]);$k++){
$url= $info["url"][$k]["url"];
$q= $info["url"][$k]["qulity"];
$reply_markup['inline_keyboard'][] = [['text'=>"".$q,'url'=>"https://houda.online/Api/v.php?v=".$url]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"الغاء",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageMedia',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'media'=>json_encode([
'type'=>'photo',
'media'=>$url1,
'caption'=>"
🎬 الاسم : [$name]($url1)

🎞️ القصة : $s

$i
",'parse_mode'=>"Markdown"
]),
'reply_markup'=>$reply_markup
]);
}
if ($ex[0]=="next"){
$k=$ex[2] +1;
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=".movie_k($ex[1],$k)),true);
for($i=0;$i<=count($info)-1;$i++){
$l=mb_strimwidth($info[$i]["name"],0,40,"..");
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$ex[1]#$k#$i"]];
}
if($k==7){
$reply_markup['inline_keyboard'][] = [['text'=>"السابق ",'callback_data'=>"back#$ex[1]#$k"]];
}elseif($l!==null){
$reply_markup['inline_keyboard'][] = [['text'=>"السابق ",'callback_data'=>"back#$ex[1]#$k"],['text'=>"التالي ",'callback_data'=>"next#$ex[1]#$k"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"الغاء",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
*🗃 حدد الفيلم الذي تريد مشاهدته الان:*
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}
if ($ex[0]=="back"){
$k=$ex[2] -1;
if($k<1){$k=1;}
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=".movie_k($ex[1],$k)),true);
for($i=0;$i<=count($info)-1;$i++){
$l=mb_strimwidth($info[$i]["name"],0,40,"..");
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$ex[1]#$k#$i"]];
}
if($k==1){
$reply_markup['inline_keyboard'][] = [['text'=>"التالي ",'callback_data'=>"next#$ex[1]#$k"]];
}
elseif($l!==null){
$reply_markup['inline_keyboard'][] = [['text'=>"السابق ",'callback_data'=>"back#$ex[1]#$k"],['text'=>"التالي ",'callback_data'=>"next#$ex[1]#$k"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"الغاء",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
*🔘 يرجى ارسال الاسم لتنفيذ عملية البحث!*
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=https://www.fushaar.live/?s=".$text),true);
if ($text && $text !=="/start" ){
$count=count($info);
for($i=0;$i<=$count;$i++){
$l=mb_strimwidth($info[$i]["name"],0,40,"..");
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"search#$text#$i"]];
}
if ($count==null){
$reply_markup['inline_keyboard'][] = [['text'=>"عذرا لم اعثر علي نتيجة للبحث",'callback_data'=>"viw"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"القائمة الرئيسية",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://graph.org/file/8267fe8a828dbfa144528.jpg",
'caption'=>"
*🗃 حدد الفيلم الذي تريد مشاهدته الان:*
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}
if ($data=="search"){
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
*🔘 يرجى ارسال الاسم لتنفيذ عملية البحث!*
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"القائمة الرئيسية",'callback_data'=>"back1"]],
]
])
]);
}
if($ex[0]=="search"){
$url1 = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?s=https://www.fushaar.live/?s=".$ex[1]),true)[$ex[2]]["url"];
$info = json_decode(file_get_contents("https://sherifbots.serv00.net/Api/fushaar.php?d=".$url1),true);
$name =$info["name"];
$i=$info["info"];
$s=$info["story"];
$reply_markup['inline_keyboard'][] = [['text'=>"سيرفرات التحميل ، المشاهدة",'callback_data'=>"hello"]];
for($k=0;$k<count($info["down"]);$k++){
$url= $info["down"][$k]["url"];
$q= $info["down"][$k]["qulity"];
$reply_markup['inline_keyboard'][] = [['text'=>"".$q,'url'=>"https://houda.online/Api/v.php?v=".$url]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"الغاء",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageMedia',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'media'=>json_encode([
'type'=>'photo',
'media'=>$url1,
'caption'=>"
🎬 الاسم: [$name]($url1)

🎞️ القصة: $s

$i
",'parse_mode'=>"Markdown"
]),
'reply_markup'=>$reply_markup
]);
}
unlink('error_log');
