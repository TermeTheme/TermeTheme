<?php
/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Rational_Meta_Box {
	private $screens = array(
		'post',
		'page',
	);
	private $fields = array();

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );

		$this->fields = array(
			array(
				'id' => 'date',
				'label' =>  __('Show Post Date', 'terme'),
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'category',
				'label' => 'Show Post Category',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'viewcount',
				'label' =>  __('Show Post View Count', 'terme'),
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'commentcount',
				'label' => 'Show Comment View Count',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'dateformat',
				'label' => 'Date Format',
				'type' => 'text',
			),
			array(
				'id' => 'relatedpost-display',
				'label' => 'Show Related Post',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'relatedpost-by',
				'label' => 'Related Post By',
				'type' => 'checkbox',
				'options' => array(
					'tag',
					'category',
				),
			),
			array(
				'id' => 'relatedpost-count',
				'label' => 'Related Post Number',
				'type' => 'text',
			),
			array(
				'id' => 'comment-display',
				'label' => 'Show Comment Box',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'author-display',
				'label' => 'Show Author Box',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'share-display',
				'label' => 'Show Share Icon',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			),
			array(
				'id' => 'breadcrumb',
				'label' => 'Show Breadcrumb',
				'type' => 'checkbox',
	      'options' => array(
					'Disabeled',
					'Enabeled',
				),
			)
		);
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'terme_page_option',
				__( 'Terme Page Option', 'terme' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 *
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'terme_data', 'terme_nonce' );
		$this->generate_fields( $post );
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $terme_postmeta = (get_post_meta( $post->ID, 'terme_postmeta', true )) ? get_post_meta( $post->ID, 'terme_postmeta', true ) : array() ;
      $db_value = (array_key_exists($field['id'],$terme_postmeta)) ?  $terme_postmeta[$field['id']] : '' ;
			switch ( $field['type'] ) {
				case 'checkbox':
					$input = sprintf(
						'<input %s id="%s" name="%s" type="checkbox" value="1">
						<label for="%s" data-text-true="Yes" data-text-false="No"><i></i></label>',
						$db_value === '1' ? 'checked' : '',
						$field['id'],
						$field['id'],
						$field['id']
					);
					break;
				case 'radio':
					$input = '<fieldset>';
					$input .= '<legend class="screen-reader-text">' . $field['label'] . '</legend>';
					$i = 0;
					foreach ( $field['options'] as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<label><input %s id="%s" name="%s" type="radio" value="%s"> %s</label>%s',
							$db_value === $field_value ? 'checked' : '',
							$field['id'],
							$field['id'],
							$field_value,
							$value,
							$i < count( $field['options'] ) - 1 ? '<br>' : ''
						);
						$i++;
					}
					$input .= '</fieldset>';
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    // echo $db_value;
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['terme_nonce'] ) )
			return $post_id;

		$nonce = $_POST['terme_nonce'];
		if ( !wp_verify_nonce( $nonce, 'terme_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
  $arrayName = array();
		foreach ( $this->fields as $field ) {

			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;

				}
        $arrayName[$field['id']] = $_POST[ $field['id']];
        update_post_meta( $post_id, 'terme_postmeta' ,$arrayName );
			} elseif ( $field['type'] === 'checkbox' ) {
		    update_post_meta( $post_id, 'terme_postmeta' ,$arrayName );
			}
		}
	}
}
new Rational_Meta_Box;
