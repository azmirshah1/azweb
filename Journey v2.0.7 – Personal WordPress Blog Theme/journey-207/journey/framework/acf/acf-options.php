<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_post-settings',
		'title' => 'Post Settings',
		'fields' => array (
			array (
				'key' => 'field_54b95c7ceff5e',
				'label' => __( 'Featured Image Option', 'ilgelo' ),
				'name' => 'featured_image_post',
				'type' => 'true_false',
				'message' =>  __( 'Display Featured Image at the beginning of the Post', 'ilgelo' ),				'default_value' => 1,
			),
			array (
				'key' => 'field_54b648c2e903e',
				'label' => __( 'Iframe Video / Iframe Music', 'ilgelo' ),
				'name' => 'iframe_video_music',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),


			array (
				'key' => 'field_54b64908c1c5a',
				'label' => __( 'Gallery Post', 'ilgelo' ),
				'name' => 'gallery_post',
				'type' => 'gallery',
				'instructions' => __( 'Upload your images (minimum width 800px for best results).', 'ilgelo' ),

				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b9278bb3ca8',
				'label' => __( 'Parallax Cover Image', 'ilgelo' ),				               'name' => 'header_parallax_post',
				'type' => 'true_false',
				'instructions' => __( 'Here you can configure if you want parallax cover image on top of the article blog page.', 'ilgelo' ),
				'default_value' => 0,
			),
			array (
				'key' => 'field_54b928ad5a2b4',
				'label' => __( 'Upload Cover Image', 'ilgelo' ),
				'name' => 'post_header_image',
				'type' => 'image',
				'instructions' => __( 'Upload your image should be between 1600px x 800px (or more) for best results.', 'ilgelo' ),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54b9278bb3ca8',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54b9299524909',
				'label' => __( 'Blog Post Title Color', 'ilgelo' ),
				'name' => 'color_title',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54b9278bb3ca8',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
			),
			array (
				'key' => 'field_54b928d65a2b5',
				'label' => __( 'Mask Overlay', 'ilgelo' ),
				'name' => 'mask_overlay',
				'type' => 'true_false',
				'instructions' => 'Enable or Disable Overlay Background (Mask).',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54b9278bb3ca8',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_54b928f45a2b6',
				'label' => __( 'Cover Image Mask Color', 'ilgelo' ),
				'name' => 'color_mask',
				'type' => 'color_picker',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54b928d65a2b5',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#333333',
			),
			array (
				'key' => 'field_54b938b017409',
				'label' => __( 'Opacity Mask', 'ilgelo' ),
				'name' => 'opacity_mask',
				'type' => 'text',
				'instructions' => 'From 0.1 to 1',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_54b928d65a2b5',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '0.6',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_post-slide-2',
		'title' => 'Template Options',
		'fields' => array (
				array (
				'key' => 'field_551d782a4473045',
				'label' => __('Do you want activate author field in this page?', 'ilgelo' ),
				'name' => 'activate_big_author',
				'type' => 'true_false',
				'instructions' => 'For layout settings view Indie Panel > Blog Author Settings',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_551d782a44730',
				'label' => __('Do you want Activate Post slider in this page?', 'ilgelo' ),
				'name' => 'activate_post_slide',
				'type' => 'true_false',
				'instructions' => 'For layout settings view Indie Panel > Featured Posts Slide',
				'message' => '',
				'default_value' => 0,
			),



			array (
				'key' => 'field_551d7a094fc3a',
				'label' => __('Select Post', 'ilgelo' ),
				'name' => 'select_post',
				'type' => 'repeater',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_551d782a44730',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => array (
					array (
						'key' => 'field_551d7a204fc3b',
						'label' => __('Choose your post', 'ilgelo' ),
						'name' => 'choose_your_post',
						'type' => 'post_object',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_551d782a44730',
									'operator' => '==',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => 100,
						'post_type' => array (
							0 => 'post',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Post in slide',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-blog-firstpost-sidebar.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-blog-firstpost.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-full.php',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-sider-left.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-sider-right.php',
					'order_no' => 0,
					'group_no' => 4,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-grid-blog-sidebar.php',
					'order_no' => 0,
					'group_no' => 5,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-infinite-post.php',
					'order_no' => 0,
					'group_no' => 6,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-list-blog-full.php',
					'order_no' => 0,
					'group_no' => 7,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-list-blog-sidebar.php',
					'order_no' => 0,
					'group_no' => 8,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-grid-blog-sidebar.php',
					'order_no' => 0,
					'group_no' => 9,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-grid-blog-full.php',
					'order_no' => 0,
					'group_no' => 10,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-parallax-blog.php',
					'order_no' => 0,
					'group_no' => 11,
				),
			),

		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}




if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_number-of-posts',
		'title' => 'Number of Posts',
		'fields' => array (
			array (
				'key' => 'field_561fcc118c9f6',
				'label' => 'Type the number of posts you want to display',
				'name' => 'number_of_posts',
				'type' => 'number',
				'default_value' => 5,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-full.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-sider-left.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-classic-blog-sider-right.php',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-grid-blog-full.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-grid-blog-sidebar.php',
					'order_no' => 0,
					'group_no' => 4,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-blog-firstpost-sidebar.php',
					'order_no' => 0,
					'group_no' => 6,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-blog-firstpost.php',
					'order_no' => 0,
					'group_no' => 7,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-list-blog-full.php',
					'order_no' => 0,
					'group_no' => 8,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-list-blog-sidebar.php',
					'order_no' => 0,
					'group_no' => 9,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-parallax-blog.php',
					'order_no' => 0,
					'group_no' => 11,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>