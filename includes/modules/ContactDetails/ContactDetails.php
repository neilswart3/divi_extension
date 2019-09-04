<?php

class DIVEX_ContactDetails extends ET_Builder_Module {

	public $slug       = 'divex_contactdetails';
	public $vb_support = 'on';
	public $text_domain = 'divex-divi_ex';
	public $child_slug = 'divex_contactdetails_item';

	protected $module_credits = [
		'module_uri' => 'https://github.com/neilswart3/divi_extension',
		'author'     => 'neilswart3',
		'author_uri' => 'https://github.com/neilswart3',
	];

	/**
	 * Module properties initialization
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$this->name = esc_html__( 'Contact Details', $text_domain );

		$this->settings_modal_toggles = [
			'general'  => [
				'toggles' => [
					'main_content' => esc_html__( 'Text', $text_domain ),
				],
			],
			'advanced' => [
				'toggles' => [
					'header' => [
						'title'    => esc_html__( 'Heading Text', $text_domain ),
						'priority' => 49,
					],
					'width' => [
						'title'    => esc_html__( 'Sizing', $text_domain ),
						'priority' => 65,
					],
				],
			],
		];

		$this->main_css_element = '%%order_class%%';

		$this->advanced_fields = [
			'fonts'	=> [
				'header'   => [
					'label'    => esc_html__( 'Heading', $text_domain ),
					'css'      => [
						'main' => "{$this->main_css_element} h2, {$this->main_css_element} h1.et_pb_module_header, {$this->main_css_element} h3.et_pb_module_header, {$this->main_css_element} h4.et_pb_module_header, {$this->main_css_element} h5.et_pb_module_header, {$this->main_css_element} h6.et_pb_module_header",
						'important' => 'all',
					],
					'header_level' => [
						'default' => 'h2',
					],
				],
			],
		];

	}

	/**
	 * Module's specific fields
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_fields() {
		
		return [
			'heading'	=> [
				'label'           => esc_html__( 'Title', $text_domain ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your value to action title here.', $text_domain ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			],
		];
	}

	/**
	 * Remove wrapper
	 *
	 * @param string $output
	 * @param string $render_slug
	 * @return string $output
	 */
	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}

	/**
	 * Render module output
	 *
	 * @since 1.0.0
	 *
	 * @param array  $attrs       List of unprocessed attributes
	 * @param string $content     Content being processed
	 * @param string $render_slug Slug of module that is used for rendering output
	 *
	 * @return string module's rendered output
	 */
	public function render( $attrs, $content = null, $render_slug ) {

		$multi_view	= et_pb_multi_view_options( $this );
		$heading 	= $multi_view->render_element([
			'tag'     => et_pb_process_header_level( $this->props['header_level'], 'h2' ),
			'content' => '{{heading}}',
			'attrs'   => [
				'class' => 'et_pb_module_header',
			],
		]);

		return sprintf( '
			<div %2$s class="%3$s">
				%1$s
				<ul class="%4$s">%5$s</ul>
			</div>',
			$heading,
			$this->module_id(),
			$this->module_classname(),
			$this->slug . '_inner',
			et_sanitized_previously( $this->content )
		);
	}
}

new DIVEX_ContactDetails;
