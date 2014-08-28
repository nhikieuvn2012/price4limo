<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/** The name of the database for WordPress */
define('DB_NAME', '4limo');

/** MySQL database username */
define('DB_USER', 'thanh');

/** MySQL database password */
define('DB_PASSWORD', 'h5f9p5h4');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's@#fPJ23KUV)ut[b=TbC}a+[l3C=u:ROVy&QXCeyaq#$9%L$u6n0#w]cM>ht/B2o');
define('SECURE_AUTH_KEY',  'W4_n,|8Y+4(x<8VdI ?k2f*%H i>_b3.uL9@(h-ltW0ksQaImv-jmZ*P%C4pdT3(');
define('LOGGED_IN_KEY',    ';D/x`Al<$~:?{d-X[@5$/`t|4Bv.w5<C*$1qJ#6;zuE1ZDQ.0K!NLj/_Y)R24&FH');
define('NONCE_KEY',        'J5s(]#=11=^h}gnH~ ?q-*$,rpCo`=riE|r/FhWN64<;XRZ w~]bHJ{V|5#v^JU1');
define('AUTH_SALT',        'SS-@#6{c=bWhzO <F*&IqtTJI1-OF:HDMUfN2/<m%6lv4K,H8haLZ~Xp<>>](MBd');
define('SECURE_AUTH_SALT', 'Q0B$=e44cyK7V;K0:}bHS^`l6bF=Jy|cgB4N_#&&uIIuars9JP>XSOjNtLA<z{Yq');
define('LOGGED_IN_SALT',   'Z98wFl4Q@gb}q#pX-TPnD}6H3CRTHpssO2SoRnEyiyPnKG.S>/t|)8>D29t4$ddn');
define('NONCE_SALT',       'xy0ZBcyOD#/Gc<E*(yA8M]gs>;=,@2a/B:TL)nq {D(VYGrfE4qij$8,CZ:hapR{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
