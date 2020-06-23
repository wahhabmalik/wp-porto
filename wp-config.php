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
define('DB_NAME', 'oppoiuzn_demoellip');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         '/)5@,iFcy<~yA.Dr{kd?+&b#p>TV:~cZb>?<^>*P!riS*:#NXevEg_l#<$FD3P.r');
define('SECURE_AUTH_KEY',  '~(>rJcMq?P;hU%m1qlfQ)+ZI6q^6`S<q{pv;w#_VRDP.v^=dc_drEf2`nS99S&mt');
define('LOGGED_IN_KEY',    'XWCgAMc%pUGX`aFr_Y G:C>/|_I3ubsW32itRqtoi+d_T=93NOKN|~]:zh:)S5:a');
define('NONCE_KEY',        'T#Qrp4:IEx_Mj/Eigr&EpFQLv;zpdTg4=?O~+_HPbtVoV{KOK!5NKy7Z-,FT(6ip');
define('AUTH_SALT',        'VN&22{N+lO@wlM 30I>TJ4b2~K0Q)Wex#VrabgbHr1^KN}^XJ7Cl?:-6u>5fP&Ms');
define('SECURE_AUTH_SALT', 'H-E~hr@P,=xJF9/as h<ebI7^0}{bcu@=5zJ3G%a(WD@t5)=TX%>PD4QlOx4griv');
define('LOGGED_IN_SALT',   'Q^!LhpA4?q.Fco}Aj8fV8PdiIe=YjRh!o;UMjv>m>YKk4{3,0jOB</{O+N1ws5*e');
define('NONCE_SALT',       'CS_ ^IUJPucb~2H[sVWZ&3M!|LBByVqq:L6LleFFA.Uq2}lTq9Q>|/pxRIeniYKW');

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
