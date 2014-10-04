<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/var/www/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', '3');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '15935745a');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');


/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p[E]x,$$i9,arVHP+~rUqK6J+^|-X0TZv~sAD}J?b^>9*S.3xRs3<B<l1%.i^-._');
define('SECURE_AUTH_KEY',  'n,rcG-5Qic~QdiK<A$pSr<CF3G+6FmeOqdYX-W9mvZu#a|J_U+g0L4Co^nR*n>Xc');
define('LOGGED_IN_KEY',    'mzv$|*rwzDHL|)n^~Bect<JZgH3#?mw~10f9kK4qNF.G+TVjGG++HOC@L+5$hkX<');
define('NONCE_KEY',        '+t>tjX.f@9!x*&f^9C9FMBOd=O&p=P$GnC-$^CSAOj<!z<1HkX(ra[1GdIc,$DhO');
define('AUTH_SALT',        'H7_UtS!-qe29.kK)=wH$$fY|Ls`+<M3k-J+,KS;o].1+j>Gca83hCL Z)|ENKd?f');
define('SECURE_AUTH_SALT', '36`}4;,ES`)Q[dh(-|{OCwEto;!}m:I-hm+g|voO+oQPX~O{):=m0@qZmCR*BwXS');
define('LOGGED_IN_SALT',   '~E1P7dh[W~cyR8S~^X/s,K1RiI/SbLuFO@Aq.A#*>_N%{Yu*NH6u%zx`xQ-qO&G=');
define('NONCE_SALT',       'I*^kc3yG^]~/G2+5~f44fYdn<*Womi@L%yk)Pfsra1=9^4Xc;ii`PZUX?xbde2S!');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wtpi_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
