<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $post->post_title; echo ' | ';  bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>

<body>

	<nav>
		<div class="mobile mobile-only">
			<i class="fas fa-bars"></i>
		</div>
		
		<?php
		$nairi_all_pages = get_pages(
			array(
				'post_status' => 'publish',
				'post_type' => 'page',
				'sort_column' => 'menu_order'
			)
		);
		
		$GLOBALS["all_pages"] = $nairi_all_pages;
		
		if ($post->post_parent == 0) {
			$GLOBALS["current_children"] = get_page_children($post->ID, $GLOBALS["all_pages"]);
		} else {
			$GLOBALS["current_children"] = get_page_children($post->post_parent, $GLOBALS["all_pages"]);
		}

		foreach ($nairi_all_pages as $page) {
			$title = $page->post_title;
			$isCurrentPage = false;

			if ($page->post_parent != 0) {
				continue;
			}

			if (get_the_guid() == $page->guid) {
				$isCurrentPage = true;
			}
			
			foreach (get_page_children($page->ID, $GLOBALS["all_pages"]) as $children) {
				if ($children->guid == get_the_guid()) {
					$isCurrentPage = true;
				}
			}
 
			?>
				<a href="<?php echo get_page_link($page->ID); ?>" class="<?php if ($isCurrentPage) { echo 'selected '; } ?>desktop-only"><?php echo $page->post_title; ?></a>
			<?php

		}

		?>
	</nav>
