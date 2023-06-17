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
define( 'DB_NAME', 'assignment' );

/** Database username */
define( 'DB_USER', 'assignment' );

/** Database password */
define( 'DB_PASSWORD', '25251325' );

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
define( 'AUTH_KEY',         'K8rE(7g4sj71v*QUU.Krp D(Gv9y3P_uFi_4m64ux1:rOu4ZX3Qr$oI9Oz>3mlA%' );
define( 'SECURE_AUTH_KEY',  'N0;[Ud^8s]SP^uV#`U1`v@*E-aWuYO&SM8M+%vfn+L$|n&JbD7)Yl[@Ykc/|Cf{-' );
define( 'LOGGED_IN_KEY',    ':0`vm2&-c q]xEi^6u#J+k:IB$Tq ;}`q)$FS`Cl%aXQ]6BhuMQR3v=zSFRw1a9l' );
define( 'NONCE_KEY',        '{<5I-,rK~T7ZKT8EbK1,`?OsCUPL2,AL&k8LKeReaKWs0<)%tQ.U[(KKR>)_a-y4' );
define( 'AUTH_SALT',        '#.!XwW6s/.scPUAQ,7S1I!ReD8|Sj~=YqA`,SwS+U&WxN]U#r#xY}eOo^jOW]sfX' );
define( 'SECURE_AUTH_SALT', '0Cxd$25MQfsG,IZjJA]}}3&p:ri>EENm&k%TL_`vivEkDc}56?ZPX9|Sb2o8]J=9' );
define( 'LOGGED_IN_SALT',   '>`izm@Rgr}(0*F-ZxZOM^=7{n18m}zh++7wv;<1[S!m@#>4AS[U?1H*4tg[ vnKB' );
define( 'NONCE_SALT',       'F6^_5#]DoW>j_CTfEn4u+37L=|pnC`>$0klRYoaLGE{9`ubM#Sf},C+ o%fpB2bZ' );

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
