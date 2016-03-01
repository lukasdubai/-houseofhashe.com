
<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$attachment_ids = $product->get_gallery_attachment_ids();
$lux_flip = $attachment_ids;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	
// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

$catalog_mode = ot_get_option('shop_catalog_mode', 'off');
$shop_product_listing = (isset($_GET['shop_product_listing']) ? htmlspecialchars($_GET['shop_product_listing']) : ot_get_option('shop_product_listing', 'style1'));
if (isset($_GET['sidebar'])) { $sidebar = htmlspecialchars($_GET['sidebar']); } else { $sidebar = ot_get_option('shop_sidebar'); }
?>

<?php if($sidebar != 'no') { ?>
    <article itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" <?php post_class("post item small-12 medium-6 large-4 columns " . $shop_product_listing); ?>>
<?php } else { ?>
		<article itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" <?php post_class("post item small-12 medium-4 large-4 columns " . $shop_product_listing); ?>>
<?php } ?>

<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<?php
		$image_html = "";
                $image_html_2 = "";
		if ( has_post_thumbnail() ) {
			$image_html = wp_get_attachment_image( $lux_flip[0], 'shop_catalog flip-front' );
                        $image_html2 = wp_get_attachment_image( $lux_flip[1], 'shop_catalog  flip-back' );
                        
		} else if ( wc_placeholder_img_src() ) {
			$image_html = wc_placeholder_img( 'shop_catalog' );
		}
                
	?>
<!--pic end-->
	<?php if ($shop_product_listing == 'style1') { ?>
		<figure class="fresco">
			<?php do_action( 'thb_product_badge'); ?>
                   
                           <?php echo $image_html; ?>
                            <?php echo $image_html2; ?>
			<div class="overlay"></div>
			<div class="buttons">
				<?php echo thb_wishlist_button(); ?>
				<div class="post-title<?php if ($catalog_mode == 'on') { echo ' catalog-mode'; } ?>">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
				<?php if ($catalog_mode != 'on') { ?>
					<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
				<?php } ?>
			</div>
		</figure>
	<?php } else if ($shop_product_listing == 'style2') { ?>
		<figure class="fresco">
			<?php do_action( 'thb_product_badge'); ?>
			<a href="<?php the_permalink(); ?>">
                         <?php echo $image_html2; ?>
                            <?php echo $image_html; ?>
                         
                        </a>
		</figure>
		<div class="post-title<?php if ($catalog_mode == 'on') { echo ' catalog-mode'; } ?>">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
		<?php if ($catalog_mode != 'on') { ?>
			<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		<?php } ?>
	<?php } ?>
</article><!-- end product -->