<?php

// use MoonShine\Exceptions\MoonShineNotFoundException;
// use MoonShine\Models\MoonshineUser;

// return [
//     'dir' => 'app/MoonShine',
//     'namespace' => 'App\MoonShine',

//     'title' => env('MOONSHINE_TITLE', 'MoonShine'),
//     'logo' => env('MOONSHINE_LOGO'),
//     'logo_small' => env('MOONSHINE_LOGO_SMALL'),

//     'route' => [
//         'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'moonshine'),
//         'middleware' => ['moonshine'],
//         'custom_page_slug' => 'custom_page',
//         'notFoundHandler' => MoonShineNotFoundException::class,
//     ],
//     'use_migrations' => true,
//     'use_notifications' => true,
//     'auth' => [
//         'enable' => true,
//         'fields' => [
//             'username' => 'email',
//             'password' => 'password',
//             'name' => 'name',
//             'avatar' => 'avatar',
//         ],
//         'guard' => 'moonshine',
//         'guards' => [
//             'moonshine' => [
//                 'driver' => 'session',
//                 'provider' => 'moonshine',
//             ],
//         ],
//         'providers' => [
//             'moonshine' => [
//                 'driver' => 'eloquent',
//                 'model' => MoonshineUser::class,
//             ],
//         ],
//         'footer' => '',
//     ],
//     'locales' => [
//         'en',
//         'ru',
//     ],
//     'middlewares' => [],
//     'tinymce' => [
//         'file_manager' => false, // or 'laravel-filemanager' prefix for lfm
//         'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
//         'version' => env('MOONSHINE_TINYMCE_VERSION', '6'),
//     ],
//     'socialite' => [
//         // 'driver' => 'path_to_image_for_button'
//     ],
//     'header' => null, // blade path
//     'footer' => [
//         'copyright' => 'Made with ❤️ by <a href="https://cutcode.dev" class="font-semibold text-purple hover:text-pink" target="_blank">CutCode</a>',
//         'nav' => [
//             'https://github.com/moonshine-software/moonshine/blob/1.5.x/LICENSE.md' => 'License',
//             'https://moonshine.cutcode.dev' => 'Documentation',
//             'https://github.com/moonshine-software/moonshine' => 'GitHub',
//         ],
//     ],
// ];
use MoonShine\Exceptions\MoonShineNotFoundException;
use MoonShine\Models\MoonshineUser;
 
return [
    # Директория, где располагаются ресурсы
    'dir' => 'app/MoonShine',
    # При изменении директории необходимо поменять и namespace согласно psr-4
    'namespace' => 'App\MoonShine',
 
    # Заголовок админ-панели
    'title' => env('MOONSHINE_TITLE', 'Админ панель'),
    # Вы можете изменить логотип, указав путь (пример - /images/logo.svg)
    'logo' => env('MOONSHINE_LOGO', '/images/logo.svg'),
    'logo_small' => env('MOONSHINE_LOGO_SMALL', '/images/logo-icon.svg'),
 
    'route' => [
        # По какому url будет доступна панель управления (как правило admin)
        # Если оставить значение пустым, то панель будет доступна от /
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'admin'),
        # Группы middlewares в панеле
        'middleware' => ['moonshine'],
        # Slug формирования url для кастомных страниц
        'custom_page_slug' => 'custom_page',
        # Можно поменять исключение для 404 (для ModelNotFound нужно реализовать самостоятельно)
        'notFoundHandler' => MoonShineNotFoundException::class
    ],
 
    # Если вы хотите заменить MoonshineUser на свою модель, то можно отключить дефолтные миграции
    'use_migrations' => true,
    # Вкл/Выкл уведомления
    'use_notifications' => true,
 
    'auth' => [
        # Вкл/Выкл аутентификацию. Если false, то панель будет доступна всем
        'enable' => true,
        # Если используете собственный guard, provider
        'guard' => 'moonshine',
        'guards' => [
            'moonshine' => [
                'driver' => 'session',
                'provider' => 'moonshine',
            ],
        ],
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent',
                'model' => MoonshineUser::class,
            ],
        ],
        # Текст под кнопкой войти. Как пример, можно добавить кнопку регистрации
        'footer' => ''
    ],
    # Возможные варианты переводов
    'locales' => [
        'en', 'ru'
    ],
    # Дополнительные middlewares
    'middlewares' => [],
    'tinymce' => [
        # Роут файлового менеджера, подробности в разделе Поля
        'file_manager' => false, // or 'laravel-filemanager' prefix for lfm
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '6')
    ],
    # Аутентификация через соц. сети и socialite, перечисляем драйверы и указываем логотип
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
    # Кастомизация шаблона
    'header' => null, // blade path
    'footer' => [
        'copyright' => 'Made with ❤️ by <a href="https://cutcode.dev" class="font-semibold text-purple hover:text-pink" target="_blank">CutCode</a>',
        'nav' => [
            'https://github.com/moonshine/moonshine/blob/1.x/LICENSE.md' => 'License',
            'https://moonshine.cutcode.dev' => 'Documentation',
            'https://github.com/moonshine/moonshine' => 'GitHub',
        ],
    ]
];