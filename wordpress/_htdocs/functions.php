<?php 
	function test_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_image_size( 'page_eyecatch', 1100, 610, true );
	}
	add_action('after_setup_theme','test_theme_setup');
	function test_enqueue_scripts(){
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery-js', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
		wp_enqueue_script('fontawesome', '//kit.fontawesome.com/30d835c4fc.js' );
		wp_enqueue_style('googleapis', '//fonts.googleapis.com' );
		wp_enqueue_style('gstatic', '//fonts.gstatic.com' );
		wp_enqueue_style('Titillium', '//fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,400;1,200&display=swap' );
		wp_enqueue_style('NotoSansJP', '//fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Titillium+Web:ital,wght@0,400;1,200&display=swapp' );
		
		wp_enqueue_script(
			't-js',
			get_template_directory_uri() . '/assets/js/t.min.js',
			array(),
			'1.0.0',
		);
		wp_enqueue_style(
			'swiper-bundle-css',
			get_template_directory_uri() . '/assets/css/swiper-bundle.min.css',
			array(),
			'1.0.0',
		);
		wp_enqueue_style(
			'common-css',
			get_template_directory_uri() . '/assets/css/common.css',
			array(),
			'1.0.0',
		);
		wp_enqueue_script(
			'swiper-bundle-js',
			get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
			array(),
			'1.0.0',
			true
		);
		wp_enqueue_script(
			'page-js',
			get_template_directory_uri() . '/assets/js/page.js',
			array(),
			'1.0.0',
			true
		);
	}
	add_action('wp_enqueue_scripts','test_enqueue_scripts');