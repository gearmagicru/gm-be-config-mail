<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Mail\Model;

use Gm;
use Gm\Backend\Config\Model\ServiceForm;

/**
 * Модель данных конфигурации службы "Почта".
 * 
 * Cлужба {@see \Gm\Mail\Mail}.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Mail\Model
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this->unifiedName = Gm::$app->mail->getObjectName();
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'defaultAdapter' => 'defaultAdapter', // адаптер
            'mailer'         => 'mailer', // метод отправки письма
            'charset'        => 'charset', // кодировка текста письма
            'encoding'       => 'encoding', // тип шифрования письма
            'xmailer'        => 'xmailer', // заголовок X-Mailer
            // SMTP-соединение
            'host'        => 'host', // имя хоста (SMTP)
            'port'        => 'port', // порт (SMTP)
            'username'    => 'username', // имя пользователя (SMTP)
            'password'    => 'password', // пароль (SMTP)
            'authType'    => 'authType', // механизм аутентификации (SMTP)
            'SMTPSecure'  => 'SMTPSecure', // тип шифрования соединения (SMTP)
            'SMTPAutoTLS' => 'SMTPAutoTLS', // автоматическое шифрование TLS (SMTP)
            'debug'       => 'debug', // включить отладку
            // Адрес уведомлений
            'noreplyAddress' => 'noreplyAddress', // e-mail отправителя
            'fromAddress'    => 'fromAddress', // e-mail ответчика
            'fromName'       => 'fromName', // имя ответчика
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function formatterRules(): array
    {
        return [
            [['xmailer', 'host', 'username', 'noreplyAddress', 'fromAddress', 'fromName'], 'safe'],
            [['debug', 'SMTPAutoTLS'], 'logic' => [true, false]],
            [['port'], 'type' => ['int']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function validationRules(): array
    {
        return [
            [
                ['defaultAdapter', 'mailer', 'charset', 'encoding'], 
                'notEmpty'
            ],
            // порт
            [
                'port', 
                'between',
                'min' => 0, 'max' => PHP_INT_MAX
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeLoad(array &$data): void
    {
        // механизм аутентификации (SMTP)
        if (isset($data['authType']) && $data['authType'] === 'default') {
            $data['authType'] = '';
        }
        // тип шифрования соединения (SMTP)
        if (isset($data['SMTPSecure']) && $data['SMTPSecure'] === 'default') {
            $data['SMTPSecure'] = '';
        }
    }
}
