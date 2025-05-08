# استخدم صورة PHP الرسمية مع Apache
FROM php:8.2-apache

# نسخ جميع الملفات من مجلد المشروع إلى مجلد الويب الافتراضي في Apache
COPY . /var/www/html/

# فتح المنفذ 80
EXPOSE 80