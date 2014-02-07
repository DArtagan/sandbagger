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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'yeopress');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'yeopress');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'yeopress');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y-h)D~}15Orq6}IY?#e.dl,{&IGPT6z;*g 3+:OuJ;jY1P4=d&gjlagNtk (,;@3');
define('SECURE_AUTH_KEY',  'mYj^JTHneT,V@}Q0@8Ru%OAo<vo%*iH-~p7>d3CXA:Q[y,JvTYpX.8$fA(F^s1J#');
define('LOGGED_IN_KEY',    'o+?4QBq>cIDy5J4X.r?~VIw7lIT@Sw`uhdPR)RD8-__6t1Qc/_,cA<Lf,>c8<|=1');
define('NONCE_KEY',        'rb4/fF?f Ss:<t#zXKi|} XGagc4M5+^W`V}K>8_;jHcU$2u-K#NH`y:mt.G$Pgp');
define('AUTH_SALT',        '^7^M}F0qv2KtT&W|?a}6-}5> xsl?]LnxwxWS_TR3Xx#qti+,21n3$Wway]|*SS+');
define('SECURE_AUTH_SALT', 'P()l}JXulKM+c=xi-[Ay_pZMg*}J52=N|tnAd(rUq^oB+ /`mqGkG>?pdguWdScn');
define('LOGGED_IN_SALT',   'kYrcgewK*iu%y(N4J^-k&tC)xW$hZhp#o[3!0$q?fXsH_>C,TYp3}SBj}8xab)H%');
define('NONCE_SALT',       '}gl.D<C9TMZ(u<~)JJ $(O=429_wKn]/h?{EX,85x.z}9d:!Ts-M0PyA+ysKzf.o');

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
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
