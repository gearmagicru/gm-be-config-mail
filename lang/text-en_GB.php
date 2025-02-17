<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * Пакет английской (британской) локализации.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

return [
    '{name}'        => 'Mail',
    '{description}' => 'Sending mail on your hosting',
    '{permissions}' => [
        'any'  => ['Full access', 'Configuring Mail']
    ],

    // Form: поля
    'Adapter' => 'Adapter',
    'Sending method' => 'Sending method',
    'Letter text encoding' => 'Letter text encoding',
    'Encryption type' => 'Encryption type',
    'X-Mailer header' => 'X-Mailer header',
    'A technical heading that refers to the name of the creator of the email' => 'A technical heading that refers to the name of the creator of the email',
    'Notification address' => 'Notification address',
    'Sender`s email' => 'Sender`s email',
    'E-mail address of the sender who sends notifications, but cannot receive messages' 
        => 'E-mail address of the sender who sends notifications, but cannot receive messages',
    'Defendant`s e-mail' => 'Defendant`s e-mail',
    'The respondent`s e-mail address accepts incoming letters and acts as an official mailing address' 
        => 'The respondent`s e-mail address receives incoming letters and acts as the official mailing address. The responder must be on the same domain as the sender`s address - if the domains do not match, mailers will think that you are a scammer and send the entire mailing list to spam',
    'Respondent name' => 'Respondent name',
    'Technical support' => 'Technical support',
    'SMTP connection' => 'SMTP connection',
    'Hostname' => 'Hostname',
    'Either one hostname or multiple hostnames separated by semicolons' => 'Either one hostname or multiple hostnames separated by semicolons',
    'Port' => 'Port',
    'Username' => 'Username',
    'Password' => 'Password',
    'Authentication mechanism' => 'Authentication mechanism',
    'Default' => 'Default',
    'Encryption' => 'Encryption',
    '8 bit' => '8 bit',
    '7 bit' => '7 bit',
    'binary' => 'Binary',
    'Connection encryption type' => 'Connection encryption type',
    'Automatic TLS encryption' => 'Automatic TLS encryption',
    'Enable debugging' => 'Enable debugging',
    'available only when mail profiling is enabled (see Logging)' => 'available only when mail profiling is enabled (see Logging)',
    'reset settings' => 'reset settings',
    // Form: сообщения / заголовки
    'Save settings' => 'Save settings',
    'Reset settings' => 'Reset settings',
    // Form: сообщения / текст
    'settings saved {0} successfully' => 'settings saved "<b>{0}</b>" successfully',
    'settings reseted {0} successfully' => 'settings reseted "<b>{0}</b>" successfully'
];
