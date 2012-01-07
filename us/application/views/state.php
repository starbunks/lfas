<?php include Kohana::find_file('views', 'header') ?>


<div id="main">
	<div id="primary">
		<div id="content" role="main">
			<article id="default" class="default post type-post status-publish format-standard hentry category-uncategorized">

				<header class="entry-header">
					<h1 class="entry-title">
					<?php echo $page_h1; ?>
					</h1>
					<div class="entry-meta">
						<span class="sep"><?php echo $page_breadcrumb; ?></span>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div>
						<p>
						<?php 
							foreach($page_body as $i => $a_state_list)
							{
								echo '<ul id="state-list">';
								foreach($a_state_list as $state_list)
								{
									echo '<li><a href="' . $state_list['state_url'] . '">' . $state_list['state_name'] . '</a></li>';
								}
								echo '</ul>';
							}
						?>
						</p>
					</div>
				</div><!-- .entry-content -->

			</article>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php include Kohana::find_file('views', 'sidebar') ?>

<?php include Kohana::find_file('views', 'footer') ?>