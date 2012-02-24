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
						//echo $state_list; 
						echo $page_title;
						?>
						</p>
					</div>
				</div><!-- .entry-content -->

			</article>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php //include Kohana::find_file('views', 'sidebar') ?>
<?php include Kohana::find_file('views', 'state_sidebar') ?>

<?php echo $footer; ?>

<!-- #default view>