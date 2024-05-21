<?php
/**
 * Unsplash images search Block.
 *
 * @param  array  $block  The block settings and attributes.
 */

// Load values and assign defaults.
$title        = get_field( 'title' );
$description  = get_field( 'description' );
$search_query = get_field( 'search_query' );
$image_count  = get_field( 'image_count' );
$orientation  = get_field( 'orientation' );


// Create class attribute allowing for custom "className"
$class_name = 'unsplash-images-search';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<section id="<?php
echo $class_name ?>" class="<?php
echo esc_attr( $class_name ); ?>">
    <h2><?php
		echo $title ?></h2>
    <p><?php
		echo $description ?></p>
	<?php
	$images = \App\UnsplashHandler\UnsplashHandler::get_images( $search_query, $image_count, $orientation, $block['id'] );

	if ( $images ) {
		?>

        <div class="swiper-container">
            <div class="swiper-wrapper">
				<?php
				foreach ( $images as $image ) {
					?>
                    <div class="swiper-slide"><img src="<?php
						echo $image['url'] ?>" alt="<?php
						echo $image['alt'] ?>"></div>
					<?php
				}
				?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
		<?php
	}
	?>
    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

        const swiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            loop: true,

            autoplay: {
                delay: 5000,
            },

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</section>