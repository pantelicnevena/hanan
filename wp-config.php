<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hanan');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Q@~4ra5|+Fl* O3qfoLb@RP!B)`|%RCs-P~3*#xYk-M9Mf@>`|UAdY9rptqv0C|m');
define('SECURE_AUTH_KEY',  'k2a-aqBk+hrI/NZLk-je]rQ,o_T.+ZjHSCAmOA^5|7CpI]n|DTmP] of+Wg!=~c#');
define('LOGGED_IN_KEY',    ')sfDwCKkr1C&|wn@2t`b]efT/.Z[P81!8XNc_ zYwFNP,;O_t)w&+Fr8NGQMCgt9');
define('NONCE_KEY',        'CEg-;:APO)-dvXKO4sE|apWA6;zreq5&Ca+7ZvbK^Rx6zlN$8*?8(7;|)x!&W;XK');
define('AUTH_SALT',        '<KX$+7/kmJKR,ARHBj?)p+:&A##|(q1(!4.g`ae]mt;+&KLSz!Y|zpB8YLj4R+~V');
define('SECURE_AUTH_SALT', '(>f|ewi|]*zF3&f-cd<d{EWSb#-e-ybE*D1Y[_gi_d?KDT5=.}W-(u=Xf +J+9~O');
define('LOGGED_IN_SALT',   ',*r%72A<;s<!QC^D8HafeRs{iI{.ch`+9A!{XdBU+%#w~B0ty_ymbQK)CI7T[Rnk');
define('NONCE_SALT',       'N0[d=S,Iy(NeNG;y_;xVFs4$R5Y|dOvRvP_<^x5g44Uz|s).{!HoP1_)IB86M$1?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

