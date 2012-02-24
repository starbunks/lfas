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
/* define('DB_NAME', 'lfas.net'); */
define('DB_NAME', 'lfasnew'); 

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
//define('DB_HOST', 'localhost:8889');
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
define('AUTH_KEY',         'XtBCf;A76-Omafa!DD,vT;74tV`!+N}kW;84+E@1]@I/PsVK`/W_HWEXb~f:Y.S^');
define('SECURE_AUTH_KEY',  'vR~,iV0B[*b9 `I[PF>7D3-`sV2G9`}LxHlUyjG $1FD2=P9q(H3gNMM~hlZ IC,');
define('LOGGED_IN_KEY',    '4p&]^+eRj)PE|p{ S/kcC<#[J%#fA@^b ]<09?9*ihJ%8r_Gl5Vc6ki_)Ww>+061');
define('NONCE_KEY',        '2YMP|]/)F4Rea^9dPnJo7GZsgd1?#e7l1E<h/{ix!BLiCtp|-X<*P.u_3^w`|wsL');
define('AUTH_SALT',        '`gp/Tq;sZ,`kt[7=0A,Y]Z3u*iUwO|>kQrI#1o_=Q>-xp`|m~BljRdnM0f~Q e}1');
define('SECURE_AUTH_SALT', '_gD=>SvyzWX2q`<$&33)`aZIBpY?(7Fci@Rn|?lU*j zBlDoH+SK;zFaC[`zFY8S');
define('LOGGED_IN_SALT',   'R<t(#>X@XPHh}&VW@)wq;y|p~@i^#nxC7Hve?b>n#Ihohf/:-,|6X=29`f 63,G?');
define('NONCE_SALT',       'L!0tAIyDMx|UPBa=[*U;kb(e;$`Y&^qFu2M(1E>F GZ79,0xUF^GcO`iyHs@!~uD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
/* $table_prefix  = 'lfas_'; */
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
