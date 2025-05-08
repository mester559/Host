<?php
// استلام البيانات القادمة من Telegram (WebHook)
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// سجل البيانات في log.txt
file_put_contents("log.txt", print_r($data, true) . PHP_EOL, FILE_APPEND);

// استخراج معرف الشات والنص من الرسالة
$chat_id = $data["message"]["chat"]["id"] ?? null;
$text = $data["message"]["text"] ?? null;

// إذا كان النص هو "/start"، رد برسالة ترحيب
if ($chat_id && $text == "/start") {
    $reply = "مرحبًا بك في البوت، كيف يمكنني مساعدتك؟";
    
    // توكن البوت الخاص بك
    $token = "7732261407:AAHdnSXGVq70NWgoGarbBQzMZe0VIdQPCkM";
    $url = "https://api.telegram.org/bot$token/sendMessage";

    // بيانات الطلب
    $post_fields = [
        'chat_id' => $chat_id,
        'text' => $reply
    ];

    // إرسال الطلب إلى API الخاصة بـ Telegram
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

http_response_code(200); // تأكيد استلام الطلب
echo "Done";
?>
