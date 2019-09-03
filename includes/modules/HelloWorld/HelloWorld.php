<?php

class DIVEX_HelloWorld extends ET_Builder_Module {

	public $slug       = 'divex_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'neilswart3',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'divex-divi_ex' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'divex-divi_ex' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'divex-divi_ex' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new DIVEX_HelloWorld;
