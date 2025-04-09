<?php

$mustache = new Mustache_Engine([
    'loader' => new Mustache_Loader_FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/local/assets/mustache/')
]);

return [
    'ajax_component_id' => 'excursion-form',
    'action' => '',
    'title' => 'Запишитесь на экскурсию по объекту',
    'sub_title' => 'Заполните форму и наш менеджер <strong>согласует с вами удобную дату и время экскурсии</strong> по интересующему <strong>объекту</strong>.',
    'submit_text' => 'Записаться на экскурсию',
    'peculiarities' => collect([
        [
            'number' => '01',
            'desc' => '<b>Увидеть всё своими глазами,</b> посмотреть разные планировки ',
            'active' => true
        ],
        [
            'number' => '02',
            'desc' => 'Возможность на месте обсудить допустимые проектные изменения'
        ],
        [
            'number' => '03',
            'desc' => 'Получить подробную <b>консультацию по объекту</b>'
        ],
    ]),
    'html_fields' => [
        [
            'html' => $mustache->render('form__control_type_text', [
                'placeholder' => 'Ваше имя',
                'code' => 'name',
                'required' => true,
                'requiredCssClass' => 'form__control_required',
                'additionalCssClass' => 'form__control_valid-text-ru-en',
                'inputmode' => 'text',
                'showErrorMessage' => true,
            ])
        ],
        [
            'html' => $mustache->render('form__control_type_text', [
                'placeholder' => 'Телефон',
                'code' => 'phone',
                'required' => true,
                'requiredCssClass' => 'form__control_required',
                'additionalCssClass' => 'form__control_valid-tel',
                'maskCssClass' => 'form__control_tel',
                'inputmode' => 'tel',
                'showErrorMessage' => true,
            ])
        ],
//        [
//            'html' => $mustache->render('form__control_type_text', [
//                'placeholder' => 'Желаемая дата для экскурсии',
//                'code' => 'date',
//                'required' => true,
//                'requiredCssClass' => '',
//                'additionalCssClass' => '',
//                'inputmode' => 'date',
//                'showErrorMessage' => true,
//            ])
//        ],
    ],
    'user_consent' => 'Отправляя заявку, Вы соглашаетесь на <a href="/privacy-policy/" rel="nofollow" target="_blank">персональных данных</a>.',
];