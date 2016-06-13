 <?php
 class Terme_Options {
	private $terme_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'title_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'title_page_init' ) );
	}

	public function title_add_plugin_page() {
		add_menu_page(
			__('Terme Options', 'terme'), // page_title
			__('Terme Options', 'terme'), // menu_title
			'manage_options', // capability
			'terme-options', // menu_slug
			array( $this, 'title_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			100 // position
		);
	}

	public function title_create_admin_page() {
		$this->title_options = get_option( 'title_option_name' ); ?>

		<div class="wrap">
			<h2>Title</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'title_option_group' );
					do_settings_sections( 'title-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function title_page_init() {
		register_setting(
			'title_option_group', // option_group
			'title_option_name', // option_name
			array( $this, 'title_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'title_setting_section', // id
			'Settings', // title
			array( $this, 'title_section_info' ), // callback
			'title-admin' // page
		);

		add_settings_field(
			'sample_field_0', // id
			'Sample field', // title
			array( $this, 'sample_field_0_callback' ), // callback
			'title-admin', // page
			'title_setting_section' // section
		);
	}

	public function title_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['sample_field_0'] ) ) {
			$sanitary_values['sample_field_0'] = sanitize_text_field( $input['sample_field_0'] );
		}

		return $sanitary_values;
	}

	public function title_section_info() {

	}

	public function sample_field_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="title_option_name[sample_field_0]" id="sample_field_0" value="%s">',
			isset( $this->title_options['sample_field_0'] ) ? esc_attr( $this->title_options['sample_field_0']) : ''
		);
	}

}
if ( is_admin() )
	$terme_options = new Terme_Options();

/*
 * Retrieve this value with:
 * $terme_options = get_option( 'title_option_name' ); // Array of All Options
 * $sample_field_0 = $terme_options['sample_field_0']; // Sample field
 */
