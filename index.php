<?php

// توكن البوت
$botToken = '7727388455:AAFze8eR4buCw6w5_pDpNC892Siz-owrQow';
$apiURL = "https://api.telegram.org/bot$botToken";

// استقبال البيانات من تيليغرام
$update = json_decode(file_get_contents('php://input'), true);

// التحقق من وجود ملف
if (isset($update['message']['document'])) {
    $chat_id = $update['message']['chat']['id'];
    $file_id = $update['message']['document']['file_id'];
    $file_name = $update['message']['document']['file_name'];

    // إنشاء مجلد "uploads" إن لم يكن موجودًا
    $uploadDir = __DIR__ . "/uploads";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // جلب رابط الملف من API
    $fileInfo = json_decode(file_get_contents("$apiURL/getFile?file_id=$file_id"), true);
    $filePath = $fileInfo['result']['file_path'];
    $fileUrl = "https://api.telegram.org/file/bot$botToken/$filePath";

    // تحميل الملف وحفظه
    $savePath = "$uploadDir/$file_name";
    file_put_contents($savePath, file_get_contents($fileUrl));

    // إرسال تأكيد للمستخدم
    file_get_contents("$apiURL/sendMessage?chat_id=$chat_id&text=تم حفظ الملف: $file_name");
}
