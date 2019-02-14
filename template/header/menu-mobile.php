<?php wp_nav_menu(array(
					'container' => 'ul',
					'theme_location' => 'mobile_menu',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'menu_class'      => 'nav-mobile',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'depth'           => 4,
					'walker'          => ''
     )
  );
?>