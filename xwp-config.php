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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'looking4asitter');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'XSvFgm}}Z?8fp&G[y>rx5H?+k u@}~VA,y5{?i,X3Ao#[tQ.R-NEPJ6SH/|uPPZ^');
define('SECURE_AUTH_KEY',  'I<yJp+,yNKZ^ZT$o(0y#%_al6kiE_LIX0LIo5C`TA9B_>N6G9c:b#$NU}%QVBi?&');
define('LOGGED_IN_KEY',    '-o&[Maaj<E~*n+G1&<W,_j@Vd{-e4~yuUazH:~_?}D9-]pMVD tZ;ydTJgFxXE%N');
define('NONCE_KEY',        'Mi%+S.q1+4L;*_z31EwZJ.bC$wuEE/Cm1u|G#&ErIx8[u._OvZ+r|;*Do+#|$YEM');
define('AUTH_SALT',        'sc<BGHq$gpq.0rgPP++|NL4//J|J?WSi/(0#)Jd!_0>V@N>^!c)K Gmhj}f&b}<Y');
define('SECURE_AUTH_SALT', 'fw*~0C1hP8reZsDNPZ!tgE0 kss0]3CBBF9BWCd-im(QY&&9|s|1Jb8m2$gk2 M@');
define('LOGGED_IN_SALT',   '_f9l}96`o3_=H^O%`s(qr/qH0^SFIJPaFxW._j@crs()<bLv7QLq6(K]+eK*Ss)2');
define('NONCE_SALT',       ' cFh2)G^nkw?$;!8z#SnM=&k;9S[`QSR3tGN%Xg&~L4JNac^8r?Z%e>Azd0=OlSU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lfas_';

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
