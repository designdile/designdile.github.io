<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'designdile' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!~]U#e#z2>XQAp*HI$zi<=zu6_HCIK;u]6)>o.>W.hz_u!a5M@uJ()`iG.N)DQT.' );
define( 'SECURE_AUTH_KEY',  '?$-*G&KEgIzKnYE/xCCNvS_08f&/~C[M0VI|cUm<gTxZw{/=@D8rdHq 9*DXhmZ5' );
define( 'LOGGED_IN_KEY',    'y3>f~3EKdtl4OiWL}*JXo{jzEA&[v)1T@5y22w#u&ZSo~5$t690k%$PaVnGGwq2C' );
define( 'NONCE_KEY',        'Y.AmacT[??C5svATa+ujYz7B[yu!pJu]?^m9G]bC?&)i:6C?zKJ_LB?~yG4`;:Q?' );
define( 'AUTH_SALT',        '$~`r#7cir-PXT(&1SH|m{dD2`X#3jwYkJ,7i9Q>b|X=A(nj`e_Mw #,U01h<w>9=' );
define( 'SECURE_AUTH_SALT', '#y{*$Cf0a%6^;4iq<6bK/LbfhcDc+PW1z6W+^/K@ 5a@Xw_}9QX*D#&i&U4 Pt#t' );
define( 'LOGGED_IN_SALT',   'Eho;Wd)+[{PED=jHhR3C{$ NA3Q}prb{sp7lc=}8Zale__2:4cw@4H-HPX /F:H~' );
define( 'NONCE_SALT',       'lAf0.x<cU%x:Vh~.F+qI-/[|T<;EMo%e}l%HyfJl+zUDL{/Pz5Geg>h}7m=2>j>u' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
