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

    <section class="section section__page" id="post-<?php the_ID(); ?>"<?php post_class(); ?>>

      <div class="section__page__content">

        <time class="section__page__time" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>

        <p class="section__page__tag"><?php the_category( ', ' ); ?></p>
        <h2 class="section__page__h2">
	        <?php the_title(); ?>
        </h2>
				<?php if ( has_post_thumbnail() ) : ?>
	        <figure>
	          <?php the_post_thumbnail( 'page_eyecatch' ); ?>
	        </figure>
				<?php endif; ?>
        <nav class="section__page__nav--sns">
          <ul>
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fab fa-square-pinterest"></i></a></li>
            <li><a href="#"><i class="fab fa-line"></i></a></li>
          </ul>
        </nav>

				<?php the_content(); ?>

        <div class="btn-wrap">
          <a href="">ALL ARTICLES</a>
        </div>

      </div>
      <div class="section__page__side-menu">
        <div class="">
        </div>
      </div>

    </section>

	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>