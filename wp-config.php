<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'opendesign');

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
define('AUTH_KEY',         'nRh$kF1{6O_DOlK;:vUhM40]Q6i+nQ]MLk8j%Ggv^J>]a[>VU8XLrl,^}@d51~G4');
define('SECURE_AUTH_KEY',  '2pyHrj<~_(N$EmPPu*o<E|z$0OfUj-_p/<J-IxS+)AbV}FdWLD5ZMD+3|uemrxTr');
define('LOGGED_IN_KEY',    '?E^4&S}c^{jKg0<izSb<8XCs__uz=7@ZFMo?/~-hS?QT2e w+}~z}jge0yhFpo)R');
define('NONCE_KEY',        ')^&BoV@2KTOX;Xta?KLusp/Yw>F[ Z>=AT+NE8r6i9#.N{7`=]Vr,|s8H=O^(?<w');
define('AUTH_SALT',        'K^b5r?%xCK)u=zQZF=cT%ax-gCb4kQRo9w*CW`-|E1wijBgI_;u!!kI@*t)gkJ,D');
define('SECURE_AUTH_SALT', '#Zz|Wt2,q;c&g9|(-]s;L[>=N%Qr/qU1Y<rLA9f8U<b7F#M7jQWhkUFK@E%Ox?Cz');
define('LOGGED_IN_SALT',   '}v V`*=5=J2Plfh9=0PB[%+1o`0f+bT/R 4&2Qq@6kM3Szu~O<vu;7A1^?fU+o]e');
define('NONCE_SALT',       'euGwGqXQyK;r}1cD=;5FS!}GZCN3FSN*+=zi/0P=9m8~J=4ASR(x#8&ILlyr fCG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
