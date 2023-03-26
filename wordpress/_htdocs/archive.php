<?php get_header(); ?>

  <div class="breadcrumb">
    <ol class="breadcrumb__list">
      <li class="breadcrumb__list__item"><a href="https://www.wwarehouse.jp/" class="p-breadcrumb__text" data-nodal=""><span class="icon-home"> TOP</span></a></li>
      <li class="breadcrumb__list__item"><a href="https://www.wwarehouse.jp/category/web/" class="p-breadcrumb__text" data-nodal=""><span>WEB</span></a></li>
      <li class="breadcrumb__list__item"><a href="https://www.wwarehouse.jp/category/web/wordpress/" class="p-breadcrumb__text" data-nodal=""><span>WORDPRESS</span></a></li>
      <li class="breadcrumb__list__item"><span class="p-breadcrumb__text">ブログリンクカードが作成できる無料サービス</span></li>
    </ol>
  </div>

	<?php if( have_posts() ) : ?>

		<?php
			while( have_posts() ):
			the_post();
		?>
    <h2 class="section__page__h2">
      <?php single_term_title(); ?>
    </h2>



  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
