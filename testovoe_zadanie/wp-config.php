<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test_wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tK2_Y]p~XW2R%nU4H}IvDel=NDnXd(%Lu7~_|B)HJk].GmivDktT3(K+8_43VkI5' );
define( 'SECURE_AUTH_KEY',  '<Q8&pIBLDWMBJ]*?6<Q2Sj;&KuyoLO= K_^`2?y` [.^BAdqK)P0[N[|i6,W<=e2' );
define( 'LOGGED_IN_KEY',    'zbc`e$EX kiR}X<W_|.UyIMqiu_5(i: BP~Oc6id5dd*?%< Q*R!0YlFuti7!Fn%' );
define( 'NONCE_KEY',        ')tL#si7F0ikyQB;%Z|-bhViAuD}kqvqDI:bC!K !WlEr%kt`rPi2 ~VWzc:P;]r:' );
define( 'AUTH_SALT',        '6l8UVN4w`GHe~:a&Y};wWEEsrk!D*r;:Mv?:W88t3rHUeWAt,=Rq[d0((GGPCkXZ' );
define( 'SECURE_AUTH_SALT', 'wSRu!ODHe:]K*QYf3oT!=YX$}=1tv$]<!ITrb_Biw{e!2MOqof[LYHt>6cpn^&QE' );
define( 'LOGGED_IN_SALT',   'Y1BC4M` qM>JKHI3ZWb$(xp1R-DQ_s~rd[}a*p7-!/aiGy1:3v2KMimq3{=+f56~' );
define( 'NONCE_SALT',       '73>6I|qP=!O,I+hcIF&4t6jZv@*|NO(>JP!]`1pbXV#9IJ-xn.KxlqalLA562bgi' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
