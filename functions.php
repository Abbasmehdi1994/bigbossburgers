<?php
/**
 * bigbossburgers functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bigbossburgers
 */

if ( ! function_exists( 'bigbossburgers_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bigbossburgers_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bigbossburgers, use a find and replace
	 * to change 'bigbossburgers' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bigbossburgers', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bigbossburgers' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bigbossburgers_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bigbossburgers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bigbossburgers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bigbossburgers_content_width', 640 );
}
add_action( 'after_setup_theme', 'bigbossburgers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bigbossburgers_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bigbossburgers' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bigbossburgers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bigbossburgers_scripts() {
	wp_enqueue_style( 'bigbossburgers-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bigbossburgers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bigbossburgers-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bigbossburgers_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action( 'admin_menu', 'BBB_add_admin_menu' );
add_action( 'admin_init', 'BBB_settings_init' );


// Big Boss Burgers Customizaton Page
class BigBossBurgersCustomization {
	private $big_boss_burgers_customization_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'big_boss_burgers_customization_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'big_boss_burgers_customization_page_init' ) );
	}

	public function big_boss_burgers_customization_add_plugin_page() {
		add_menu_page(
			'Big Boss Burgers Customization', // page_title
			'Big Boss Burgers Customization', // menu_title
			'manage_options', // capability
			'big-boss-burgers-customization', // menu_slug
			array( $this, 'big_boss_burgers_customization_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			81 // position
		);
	}

	public function big_boss_burgers_customization_create_admin_page() {
		$this->big_boss_burgers_customization_options = get_option( 'big_boss_burgers_customization_option_name' ); ?>

		<div class="wrap">
			<h2>Big Boss Burgers Customization</h2>
			<p>Customzation page for Big Boss Burgers Theme</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'big_boss_burgers_customization_option_group' );
					do_settings_sections( 'big-boss-burgers-customization-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function big_boss_burgers_customization_page_init() {
		register_setting(
			'big_boss_burgers_customization_option_group', // option_group
			'big_boss_burgers_customization_option_name', // option_name
			array( $this, 'big_boss_burgers_customization_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'big_boss_burgers_customization_setting_section', // id
			'Settings', // title
			array( $this, 'big_boss_burgers_customization_section_info' ), // callback
			'big-boss-burgers-customization-admin' // page
		);

		add_settings_field(
			'nightmode_0', // id
			'Nightmode?', // title
			array( $this, 'nightmode_0_callback' ), // callback
			'big-boss-burgers-customization-admin', // page
			'big_boss_burgers_customization_setting_section' // section
		);

		add_settings_field(
			'theme_variants_1', // id
			'Theme Variants', // title
			array( $this, 'theme_variants_1_callback' ), // callback
			'big-boss-burgers-customization-admin', // page
			'big_boss_burgers_customization_setting_section' // section
		);

		add_settings_field(
			'css_modifiers_2', // id
			'CSS Modifiers', // title
			array( $this, 'css_modifiers_2_callback' ), // callback
			'big-boss-burgers-customization-admin', // page
			'big_boss_burgers_customization_setting_section' // section
		);

		add_settings_field(
			'like_our_theme_3', // id
			'Like our theme?', // title
			array( $this, 'like_our_theme_3_callback' ), // callback
			'big-boss-burgers-customization-admin', // page
			'big_boss_burgers_customization_setting_section' // section
		);
	}

	public function big_boss_burgers_customization_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['nightmode_0'] ) ) {
			$sanitary_values['nightmode_0'] = $input['nightmode_0'];
		}

		if ( isset( $input['theme_variants_1'] ) ) {
			$sanitary_values['theme_variants_1'] = $input['theme_variants_1'];
		}

		if ( isset( $input['css_modifiers_2'] ) ) {
			$sanitary_values['css_modifiers_2'] = esc_textarea( $input['css_modifiers_2'] );
		}

		if ( isset( $input['like_our_theme_3'] ) ) {
			$sanitary_values['like_our_theme_3'] = $input['like_our_theme_3'];
		}

		return $sanitary_values;
	}

	public function big_boss_burgers_customization_section_info() {
		
	}

	public function nightmode_0_callback() {
		printf(
			'<input type="checkbox" name="big_boss_burgers_customization_option_name[nightmode_0]" id="nightmode_0" value="nightmode_0" %s> <label for="nightmode_0">Invert Colors (coming soon)</label>',
			( isset( $this->big_boss_burgers_customization_options['nightmode_0'] ) && $this->big_boss_burgers_customization_options['nightmode_0'] === 'nightmode_0' ) ? 'checked' : ''
		);
	}

	public function theme_variants_1_callback() {
		?> <select name="big_boss_burgers_customization_option_name[theme_variants_1]" id="theme_variants_1">
			<?php $selected = (isset( $this->big_boss_burgers_customization_options['theme_variants_1'] ) && $this->big_boss_burgers_customization_options['theme_variants_1'] === 'Variant 1 ') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Variant 1 </option>
			<?php $selected = (isset( $this->big_boss_burgers_customization_options['theme_variants_1'] ) && $this->big_boss_burgers_customization_options['theme_variants_1'] === 'Variant 2') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Variant 2</option>
			<?php $selected = (isset( $this->big_boss_burgers_customization_options['theme_variants_1'] ) && $this->big_boss_burgers_customization_options['theme_variants_1'] === 'Variant 3') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Variant 3</option>
			<?php $selected = (isset( $this->big_boss_burgers_customization_options['theme_variants_1'] ) && $this->big_boss_burgers_customization_options['theme_variants_1'] === 'Variant 4') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Variant 4</option>
		</select> <?php
	}

	public function css_modifiers_2_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="big_boss_burgers_customization_option_name[css_modifiers_2]" id="css_modifiers_2">%s</textarea>',
			isset( $this->big_boss_burgers_customization_options['css_modifiers_2'] ) ? esc_attr( $this->big_boss_burgers_customization_options['css_modifiers_2']) : ''
		);
	}

	public function like_our_theme_3_callback() {
		printf(
			'<input type="checkbox" name="big_boss_burgers_customization_option_name[like_our_theme_3]" id="like_our_theme_3" value="like_our_theme_3" %s> <label for="like_our_theme_3">Please give us a high grade, Laurie.</label>',
			( isset( $this->big_boss_burgers_customization_options['like_our_theme_3'] ) && $this->big_boss_burgers_customization_options['like_our_theme_3'] === 'like_our_theme_3' ) ? 'checked' : ''
		);
	}

}
if ( is_admin() )
	$big_boss_burgers_customization = new BigBossBurgersCustomization();

/* 
 * Retrieve this value with:
 * $big_boss_burgers_customization_options = get_option( 'big_boss_burgers_customization_option_name' ); // Array of All Options
 * $nightmode_0 = $big_boss_burgers_customization_options['nightmode_0']; // Nightmode?
 * $theme_variants_1 = $big_boss_burgers_customization_options['theme_variants_1']; // Theme Variants
 * $css_modifiers_2 = $big_boss_burgers_customization_options['css_modifiers_2']; // CSS Modifiers
 * $like_our_theme_3 = $big_boss_burgers_customization_options['like_our_theme_3']; // Like our theme?
 */
