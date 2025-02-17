<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\Mail\Controller;

use Gm;
use Gm\Helper\Url;
use Gm\Panel\Widget\EditWindow;
use Gm\Backend\Config\Controller\ServiceForm;

/**
 * Контроллер конфигурации службы "Почта".
 * 
 * Cлужба {@see \Gm\Mail\Mail}.
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\Mail\Controller
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * Возвращает элементы панели формы (Gm.view.form.Panel GmJS).
     * 
     * @return array
     */
    protected function getFormItems(): array
    {
        /** @var \Gm\Mail\Mail $service */
        $service = Gm::$app->mail;
        // доступные адаптеры
        $adapterItems = [];
        foreach ($service->getAdapterClasses() as $name => $className) {
            $adapterItems[] = [$name, $name];
        }
        // колонка слева
        $leftSide = [
            [
                'layout' => 'anchor',
                'defaults' => [
                    'labelWidth' => 180,
                    'labelAlign' => 'right'
                ],
                'items'  => [
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Adapter',
                        'name'       => 'defaultAdapter',
                        'value'      => $service->defaultAdapter,
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => $adapterItems
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'defaultAdapter',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => false
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Sending method',
                        'name'       => 'mailer',
                        'value'      => $service->mailer,
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => [
                                ['mail', 'Mail'],
                                ['sendmail', 'Send Mail'],
                                ['smtp', 'SMTP']
                            ]
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'mailer',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => false
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Letter text encoding',
                        'name'       => 'charset',
                        'value'      => $service->charset,
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => [
                                ['us-ascii', 'ASCII'],
                                ['iso-8859-1', 'ISO 8859-1'],
                                ['utf-8', 'UTF-8']
                            ]
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'charset',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => false
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Encryption type',
                        'name'       => 'encoding',
                        'value'      => $service->encoding,
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => [
                                ['8bit', '#8 bit'],
                                ['7bit', '#8 bit'],
                                ['binary', '#binary'],
                                ['base64', 'Base64'],
                                ['quoted-printable', 'Quoted-Printable']
                            ]
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'encoding',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => false
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#X-Mailer header',
                        'name'       => 'xmailer',
                        'tooltip'    => '#A technical heading that refers to the name of the creator of the email',
                        'anchor'     => '100%',
                        'value'      => $service->xmailer ?: $service->getDefaultXMailer()
                    ]
                ]
            ],
            [
                'xtype'    => 'fieldset',
                'title'    => '#Notification address',
                'height'   => 169,
                'defaults' => [
                    'labelWidth' => 180,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Sender`s email',
                        'name'       => 'noreplyAddress',
                        'anchor'     => '100%',
                        'allowBlank' => false,
                        'tooltip'    => '#E-mail address of the sender who sends notifications, but cannot receive messages',
                        'emptyText'  => 'no-reply@' . Url::hostInfo(),
                        'value'      => $service->noreplyAddress
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Defendant`s e-mail',
                        'name'       => 'fromAddress',
                        'anchor'     => '100%',
                        'tooltip'    => '#The respondent`s e-mail address accepts incoming letters and acts as an official mailing address',
                        'allowBlank' => false,
                        'emptyText'  => 'support@' . Url::hostInfo(),
                        'value'      => $service->fromAddress
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Respondent name',
                        'name'       => 'fromName',
                        'anchor'     => '100%',
                        'emptyText'  => '#Technical support',
                        'value'      => $service->fromName
                    ]
                ]
            ]
        ];
        // колонка справа
        $rightSide = [
            [
                'xtype'    => 'fieldset',
                'title'    => '#SMTP connection',
                'height'   => 363,
                'defaults' => [
                    'labelWidth' => 205,
                    'labelAlign' => 'right'
                ],
                'items' => [
                    [
                        'xtype'      => 'textarea',
                        'fieldLabel' => '#Hostname',
                        'tooltip'    => '#Either one hostname or multiple hostnames separated by semicolons',
                        'name'       => 'host',
                        'height'     => 30,
                        'anchor'     => '100%',
                        'value'      => $service->host,
                        'allowBlank' => false
                    ],
                    [
                        'xtype'      => 'numberfield',
                        'fieldLabel' => '#Port',
                        'minValue'   => 0,
                        'name'       => 'port',
                        'width'      => 300,
                        'value'      => $service->port,
                        'allowBlank' => false
                    ],
                    [
                        'xtype'      => 'textfield',
                        'fieldLabel' => '#Username',
                        'name'       => 'username',
                        'anchor'     => '100%',
                        'value'      => $service->username
                    ],
                    [
                        'xtype'      => 'textfield',
                        'inputType'  => 'password',
                        'fieldLabel' => '#Password',
                        'name'       => 'password',
                        'anchor'     => '100%',
                        'value'      => $service->password
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Authentication mechanism',
                        'name'       => 'authType',
                        'value'      => $service->authType ?: 'default',
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => [
                                ['default', '#Default'],
                                ['CRAM-MD5', 'CRAM-MD5'],
                                ['LOGIN', 'LOGIN'],
                                ['PLAIN', 'PLAIN'],
                                ['XOAUTH2', 'XOAUTH2']
                            ]
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'authType',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => true
                    ],
                    [
                        'xtype'      => 'combobox',
                        'fieldLabel' => '#Encryption',
                        'tooltip'    => '#Connection encryption type',
                        'name'       => 'SMTPSecure',
                        'value'      => $service->SMTPSecure ?: 'default',
                        'store'      => [
                            'fields' => ['id', 'name'],
                            'data' => [
                                ['default', '#Default'],
                                ['tls', 'TLS'],
                                ['ssl', 'SSL']
                            ]
                        ],
                        'displayField' => 'name',
                        'valueField'   => 'id',
                        'hiddenField'  => 'SMTPSecure',
                        'anchor'       => '100%',
                        'queryMode'    => 'local',
                        'editable'     => false,
                        'allowBlank'   => true
                    ],
                    [
                        'xtype'      => 'checkbox',
                        'fieldLabel' => '#Automatic TLS encryption',
                        'name'       => 'SMTPAutoTLS',
                        'ui'         => 'switch',
                        'checked'    => $service->SMTPAutoTLS,
                        'inputValue' => 1
                    ]
                ]
            ]
        ];
        return [
            [
                'layout' => 'column',
                'items'  => [
                    [
                        'columnWidth' => 0.5,
                        'items'       => $leftSide,
                        'padding'     => 2,
                        'defaults'    => [
                            'labelWidth' => 220,
                            'labelAlign' => 'right'
                        ]
                    ],
                    [
                        'columnWidth' => 0.5,
                        'items'       => $rightSide,
                        'padding'     => 2
                    ]
                ]
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Enable debugging',
                'boxLabel'   => '#available only when mail profiling is enabled (see Logging)',
                'labelWidth' => 115,
                'name'       => 'debug',
                'ui'         => 'switch',
                'disabled'   => !Gm::$app->logger->enableProfilingMail,
                'checked'    => $service->debug,
                'inputValue' => 1
            ],
            [
                'xtype'  => 'toolbar',
                'dock'   => 'bottom',
                'border' => 0,
                'style'  => ['borderStyle' => 'none'],
                'items'  => [
                    [
                        'xtype'      => 'checkbox',
                        'boxLabel'   => $this->module->t('reset settings'),
                        'name'       => 'reset',
                        'ui'         => 'switch',
                        'padding'    => 3,
                        'inputValue' => 1
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->autoHeight = true;
        $window->width = 900;
        $window->responsiveConfig = [
            'height < 680' => ['height' => '99%'],
        ];

        // панель формы (Gm.view.form.Panel GmJS)
        $window->form->items = $this->getFormItems();
        $window->form->autoScroll = true;
        return $window;
    }
}
