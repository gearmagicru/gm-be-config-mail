<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет русской локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Почта',
    '{description}' => 'Настройка почтовой службы на Вашем хостинге',
    '{permissions}' => [
        'any'  => ['Полный доступ', 'Настройка почты']
    ],

    // Form: поля
    'Adapter' => 'Адаптер',
    'Sending method' => 'Метод отправки письма',
    'Letter text encoding' => 'Кодировка текста письма',
    'Encryption type' => 'Тип шифрования письма',
    'X-Mailer header' => 'Заголовок X-Mailer',
    'A technical heading that refers to the name of the creator of the email' => 'Технический заголовок, указывающий на название создателя письма',
    'Notification address' => 'Адрес уведомлений',
    'Sender`s email' => 'E-mail отправителя',
    'E-mail address of the sender who sends notifications, but cannot receive messages' 
        => 'E-mail адрес отправителя, который выполняет рассылку уведомлений, но принимать письма не может',
    'Defendant`s e-mail' => 'E-mail ответчика',
    'The respondent`s e-mail address accepts incoming letters and acts as an official mailing address' 
        => 'E-mail адрес ответчика принимает входящие письма и выполняет функции оффициального почтового адресата. Ответчик должен быть на том же домене, что и адрес отправителя — если домены не будут совпадать, почтовики подумают, что вы мошенник и отправят всю рассылку в спам',
    'Respondent name' => 'Имя ответчика',
    'Technical support' => 'Техническая поддержка',
    'SMTP connection' => 'SMTP-соединение',
    'Hostname' => 'Имя хоста',
    'Either one hostname or multiple hostnames separated by semicolons' => 'Либо одно имя хоста, либо несколько имен хостов, разделенных точкой с запятой',
    'Port' => 'Порт',
    'Username' => 'Имя пользователя',
    'Password' => 'Пароль',
    'Authentication mechanism' => 'Механизм аутентификации',
    'Default' => 'По умолчанию',
    'Encryption' => 'Шифрование',
    '8 bit' => '8-ю битами',
    '7 bit' => '7-ю битами',
    'binary' => 'Двоичное (бинарное)',
    'Connection encryption type' => 'Тип шифрования соединения',
    'Automatic TLS encryption' => 'Автоматическое шифрование TLS',
    'Enable debugging' => 'Включить отладку',
    'available only when mail profiling is enabled (see Logging)' => 'доступна только при включенном профилировании почты (см. Логирование)',
    'reset settings' => 'сбросить настройки',
    // Form: сообщения / заголовки
    'Save settings' => 'Сохранение настроек',
    'Reset settings' => 'Сброс настроек',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'успешное сохранение настроек "<b>{0}</b>"',
    'settings reseted {0} successfully' => 'успешный сброс настроек "<b>{0}</b>"'
];
