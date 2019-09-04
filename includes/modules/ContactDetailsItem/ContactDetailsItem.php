<?php

class DIVEX_ContactDetailsItem extends ET_Builder_Module {

	public $slug       = 'divex_contactdetails_item';
	public $vb_support = 'on';
	public $text_domain = 'divex-divi_ex';

	protected $module_credits = [
		'module_uri' => 'https://github.com/neilswart3/divi_extension',
		'author'     => 'neilswart3',
		'author_uri' => 'https://github.com/neilswart3',
	];

	public function init() {

		$this->name 						= esc_html__( 'Contact Details Items', $text_domain );
		$this->type                        	= 'child';
		$this->child_title_var             	= 'admin_title';
		$this->child_title_fallback_var    	= 'text';
		$this->advanced_setting_title_text 	= esc_html__( 'New Contact Item', $text_domain );
		$this->settings_text               	= esc_html__( 'Contact Item Settings', $text_domain );
		$this->main_css_element 			= '%%order_class%%';

		$this->settings_modal_toggles = [
			'general'  => [
				'toggles' => [
					'main_content' => esc_html__( 'Text', $text_domain ),
					'image'        => esc_html__( 'Icon', $text_domain ),
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

	}

	public function get_fields() {
		
		$color_accent = et_builder_accent_color();

		return [
			'text'	=> [
				'label'           => esc_html__( 'Text', $text_domain ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your value to action title here.', $text_domain ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
			],
			'font_icon'	=> [
				'label'               => esc_html__( 'Icon', $text_domain ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => ['et-pb-font-icon'],
				'toggle_slug'         => 'image',
				'description'         => esc_html__( 'Choose an icon to display with your contact Item.', $text_domain ),
				'depends_show_if'     => 'on',
				'mobile_options'      => true,
				'hover'               => 'tabs',
			],
			'icon_color' => [
				'default'           => $color_accent,
				'label'             => esc_html__( 'Icon Color', $text_domain ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icon.', $text_domain ),
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon_settings',
				'hover'             => 'tabs',
				'mobile_options'    => true,
			],
			'url' => [
				'label'           => esc_html__( 'Link URL', $text_domain ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'If you would like to make your item a link, input your destination URL here.', $text_domain ),
				'toggle_slug'     => 'link_options',
				'dynamic_content' => 'url',
			],
			'url_new_window' => [
				'label'           => esc_html__( 'Link Target', $text_domain ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => [
					'off' => esc_html__( 'In The Same Window', $text_domain ),
					'on'  => esc_html__( 'In The New Tab', $text_domain ),
				],
				'toggle_slug'     => 'link_options',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', $text_domain ),
				'default_on_front'=> 'off',
			],
			
		];
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$text 		= $this->props['text'];
		$font_icon 	= $this->props['font_icon'];
		$icon_color = $this->props['icon_color'];
		$url 		= $this->props['url'];
		$url_target = $this->props['url_new_window'];

		return sprintf( '
			<li %2$s class="%3$s">
				<a href="%6$s" %7$s>
					<span class="et-pb-icon" %4$s>%5$s</span>
					<span>%1$s</span>
				</a>
			</li>',
			$text,
			$this->module_id(),
			$this->module_classname(),
			isset($icon_color) ? 'style="color:' . $icon_color . '"' : '',
			esc_attr( et_pb_process_font_icon( $font_icon ) ),
			$url,
			'on' === $url_target ? 'target="_blank"' : ''
		);
	}
}

new DIVEX_ContactDetailsItem;
