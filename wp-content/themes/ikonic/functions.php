<?php
/**
 * IKONIC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IKONIC
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ikonic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on IKONIC, use a find and replace
		* to change 'ikonic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ikonic', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ikonic' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ikonic_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ikonic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ikonic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ikonic_content_width', 640 );
}
add_action( 'after_setup_theme', 'ikonic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ikonic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ikonic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ikonic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ikonic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ikonic_scripts() {
	wp_enqueue_style( 'ikonic-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ikonic-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ikonic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ikonic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}












/**
* Task #1
* Write a function that will redirect the user away from the site if their IP address starts with 77.29. Use WordPress native hooks and APIs to handle this.
* The reason to use the init hook to execute redirection before page load.
**/


function ik_ip_redirect_range() {

  $userip = $_SERVER['REMOTE_ADDR'];
  
  if(substr($userip, 0, 6) === '77.29') {

    wp_redirect('http://google.com');
    exit;

  }

}


add_action('init', 'ik_ip_redirect_range');




/**
* Task #2
* Register post type called "Projects" and a taxonomy "Project Type" for this post type.
* The reason to use the init hook to execute redirection before page load.
**/

// Register Custom Post Type
function create_projects_cpt() {
  
  $labels = array(
    'name'                  => _x( 'Projects', 'Post Type General Name', 'ikonic' ),
    'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ikonic' ),
    'menu_name'             => __( 'Projects', 'ikonic' ),
    'name_admin_bar'        => __( 'Project', 'ikonic' ),
    'archives'              => __( 'Project Archives', 'ikonic' ),
    'attributes'            => __( 'Project Attributes', 'ikonic' ),
    'parent_item_colon'     => __( 'Parent Project:', 'ikonic' ),
    'all_items'             => __( 'All Projects', 'ikonic' ),
    'add_new_item'          => __( 'Add New Project', 'ikonic' ),
    'add_new'               => __( 'Add New', 'ikonic' ),
    'new_item'              => __( 'New Project', 'ikonic' ),
    'edit_item'             => __( 'Edit Project', 'ikonic' ),
    'update_item'           => __( 'Update Project', 'ikonic' ),
    'view_item'             => __( 'View Project', 'ikonic' ),
    'view_items'            => __( 'View Projects', 'ikonic' ),
    'search_items'          => __( 'Search Project', 'ikonic' ),
    'not_found'             => __( 'Not found', 'ikonic' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'ikonic' ),
    'featured_image'        => __( 'Featured Image', 'ikonic' ),
    'set_featured_image'    => __( 'Set featured image', 'ikonic' ),
    'remove_featured_image' => __( 'Remove featured image', 'ikonic' ),
    'use_featured_image'    => __( 'Use as featured image', 'ikonic' ),
    'insert_into_item'      => __( 'Insert into project', 'ikonic' ),
    'uploaded_to_this_item' => __( 'Uploaded to this project', 'ikonic' ),
    'items_list'            => __( 'Projects list', 'ikonic' ),
    'items_list_navigation' => __( 'Projects list navigation', 'ikonic' ),
    'filter_items_list'     => __( 'Filter projects list', 'ikonic' ),
  );
  
  $args = array(
    'label'                 => __( 'Project', 'ikonic' ),
    'description'           => __( 'Project custom post type', 'ikonic' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'taxonomies'            => array( 'project_types' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-portfolio',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,       
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'projects', $args );
}

add_action( 'init', 'create_projects_cpt', 0 );

// Register Custom Taxonomy
function create_project_types_taxonomy() {
  $labels = array(
    'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'ikonic' ),
    'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'ikonic' ),
    'menu_name'                  => __( 'Project Type', 'ikonic' ),
    'all_items'                  => __( 'All Project Types','ikonic' ),
    'parent_item'               => __( 'Parent Project Type', 'ikonic' ),
    'parent_item_colon'         => __( 'Parent Project Type:', 'ikonic' ),
    'new_item_name'             => __( 'New Project Type Name', 'ikonic' ),
    'add_new_item'              => __( 'Add New Project Type', 'ikonic' ),
    'edit_item'                 => __( 'Edit Project Type', 'ikonic' ),
    'update_item'               => __( 'Update Project Type', 'ikonic' ),
    'view_item'                 => __( 'View Project Type', 'ikonic' ),
    'separate_items_with_commas' => __( 'Separate project types with commas', 'ikonic' ),
    'add_or_remove_items'       => __( 'Add or remove project types', 'ikonic' ),
    'choose_from_most_used'     => __( 'Choose from the most used', 'ikonic' ),
    'popular_items'             => __( 'Popular Project Types', 'ikonic' ),
    'search_items'              => __( 'Search Project Types', 'ikonic' ),
    'not_found'                 => __( 'Not Found', 'ikonic' ),
    'no_terms'                  => __( 'No project types', 'ikonic' ),
    'items_list'                => __( 'Project Types list', 'ikonic' ),
    'items_list_navigation'     => __( 'Project Types list navigation', 'ikonic' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'project_types', array( 'projects' ), $args );
}
add_action( 'init', 'create_project_types_taxonomy', 0 );




/**
* Task #6
*  Create an Ajax endpoint that will output the last three published "Projects" that belong in the "Project Type" called "Architecture" If the user is not logged in. If the user is logged In it should return the last six published "Projects" in the project type call. "Architecture". Results should be returned in the following JSON format {success: true, data: [{object}, {object}, {object}, {object}, {object}]}. The object should contain three properties (id, title, link).
* Step #1 creating Ajax end point
**/

/**
* Ajax request for get Architecture projects
* Right Now the output will dislay in browser console becuase in requirments its not mentioned where we need to display output.
**/

function enqueue_custom_scripts() {
    // Enqueue custom-ajax.js from the theme's js folder
    wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), '1.0', true);

    // Pass the Ajax URL to the JavaScript file
    wp_localize_script('custom-ajax', 'customAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');





function ik_get_projects() {
    $is_logged_in = is_user_logged_in();
    $project_type = 'architecture';
    $num_posts = $is_logged_in ? 6 : 3;

    $args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => $num_posts,
        'tax_query' => array(
            array(
                'taxonomy' => 'project_types',
                'field' => 'slug',
                'terms' => $project_type,
            ),
        ),
    );

    $projects = get_posts($args);

    $data = array();
    foreach ($projects as $project) {
        $data[] = array(
            'id' => $project->ID,
            'title' => $project->post_title,
            'link' => get_permalink($project->ID),
        );
    }

    $response = array(
        'success' => true,
        'data' => $data,
    );

    wp_send_json($response);
}

add_action('wp_ajax_nopriv_get_projects', 'ik_get_projects');
add_action('wp_ajax_get_projects', 'ik_get_projects');





/**
* Task #7
* Use the WordPress HTTP API to create a function called hs_give_me_coffee() that will return a direct link to a cup of coffee. for us using the Random Coffee API [JSON].
* We can directly call using $coffee_img = hs_give_me_coffee();<br />
* 
**/


function hs_give_me_coffee() {

  $request = wp_remote_get( 'https://coffee.alexflipnote.dev/random.json' );

  if( is_wp_error( $request ) ) {
    return false; // request failed
  }

  $body = wp_remote_retrieve_body( $request );

  $data = json_decode( $body );

  if( ! empty( $data->file ) ) {
    return $data->file;
  } else {
    return false; 
  }

}


/**
* [get_coffee] shortcode is registered to call the output of hs_give_me_coffee()
**/

function coffee_shortcode() {
    $coffee_link = hs_give_me_coffee();

    if ($coffee_link) {
        return '<a href="' . esc_url($coffee_link) . '">Get a cup of coffee</a>';
    } else {
        return 'Sorry, no coffee link available.';
    }
}
add_shortcode('get_coffee', 'coffee_shortcode');






/**
* Task #8
* Use this API https://api.kanye.rest/ and show 5 quotes on a page.
* 
**/


function ik_get_kanye_quotes() {

  $quotes = array();

  for($i = 0; $i < 5; $i++) {

    $response = wp_remote_get('https://api.kanye.rest');

    if(!is_wp_error($response)) {
      $data = json_decode(wp_remote_retrieve_body($response), true);
      array_push($quotes, $data['quote']);
    }

  }

  return $quotes;

}

/**
* [kanye-quotes] , [kanye-quotes count=3] to retreive the output
**/

function ik_kanye_quotes_shortcode() 
{

  $quotes = ik_get_kanye_quotes(); // defined previously

  $html = '';

  foreach($quotes as $quote) {
    $html .= '<p>' . $quote . '</p>';
  }

  return $html;

}

add_shortcode('kanye-quotes', 'ik_kanye_quotes_shortcode'); 