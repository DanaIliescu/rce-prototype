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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define( 'DB_NAME', 'rce' );

// /** MySQL database username */
// define( 'DB_USER', 'root' );

// /** MySQL database password */
// define( 'DB_PASSWORD', '' );

// /** MySQL hostname */
// define( 'DB_HOST', '127.0.0.1' );

// /** Database Charset to use in creating database tables. */
// define( 'DB_CHARSET', 'utf8mb4' );

// /** The Database Collate type. Don't change this if in doubt. */
// define( 'DB_COLLATE', '' );

define( 'DB_NAME', 'heroku_df1561290ec0957' );

/** MySQL database username */
define( 'DB_USER', 'b4a22bee4e9cfd' );

/** MySQL database password */
define( 'DB_PASSWORD', 'b343af23' );

/** MySQL hostname */
define( 'DB_HOST', 'eu-cdbr-west-02.cleardb.net' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1gbuyndQIj_ZK!I+{Gv<bYG~#[Hf:8x3O!0[l851]~H_[AFd}Zx.yr,7TpT*&p T' );
define( 'SECURE_AUTH_KEY',  '(*Q3M@z.;?_$IsT8KWZetT*te=DU>mB}KrY>RGXTac+~_=1,==ZP^@*F~1p8.ZvA' );
define( 'LOGGED_IN_KEY',    '5o2& wpZUc*u2bc]]qs@]#4:9k$d {*n#|zC~4yq(nwo<XKce%Q_!t,HCWQ8Fpz<' );
define( 'NONCE_KEY',        'S41@J?S7V?kedgI;zXw  Af]TZcCF;2(EU<*@a;vN|u}3vI*%@M:b.Vi-9349`:7' );
define( 'AUTH_SALT',        '*NV~cI{c0xqZuIBv y^F02s&`@f^Apc*1-u^-oMo9b:4T9A?qET`f*T6`7dI*yT_' );
define( 'SECURE_AUTH_SALT', ':?pDx$@H<#V4Wr069S09mLn.4tDo|zc%34G-ltioA2SI.85H0jT5/1UvPA?9v:B3' );
define( 'LOGGED_IN_SALT',   '#2t.aa:)G3+ f7yvh>a4Fw>xv8oz()ZxGH_O%|+mH*_-skwIVf`9OpgN}:xpm$mN' );
define( 'NONCE_SALT',       '%}:jNzW{bibA8,`x+^8WMt6C+EX6:&p>s5LlX)g?GxOn?pMT.)Mme0/chp}K+BU7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
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
