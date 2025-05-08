FROM php:8.2-apache

# نسخ ملفات المشروع
COPY . /var/www/html/

# تعيين صلاحيات للمجلد
RUN chmod -R 777 /var/www/html

# تمكين عرض الملفات النصية
RUN a2enmod rewrite
