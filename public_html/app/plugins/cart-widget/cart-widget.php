<?php
/**
 * Plugin Name: Cart Widget
 * Description: A simple cart widget for WooCommerce themes.
 * Author: William Weiskopf
 * Author URI: http://william.weiskopf.me
 * Version: 0.1.0
 */


class Cart_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    parent::__construct(
			'cart_widget', // Base ID
			__('Cart Widget', 'text_domain'), // Name
			array( 'description' => __( 'Shows the cart and number of items therein.', 'text_domain' ), ) // Args
		);
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    global $woocommerce;
 		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
    echo $args['before_title']; ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<?php if (!empty($title)) echo $title; ?><span class="cart_count"> <?php echo sprintf('%d', $woocommerce->cart->cart_contents_count);?></span></a>
    <?php echo $args['after_title'];
    echo $args['after_widget'];
 
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
  }
}

add_action( 'widgets_init', function(){
  register_widget( 'Cart_Widget' );
});


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  ob_start(); ?>
  
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<?php if (!empty($title)) echo $title; ?><span class="cart_count"> <?php echo sprintf('%d', $woocommerce->cart->cart_contents_count);?></span></a>
  
  <?php $fragments['a.cart-contents'] = ob_get_clean();
  return $fragments;
}

?>
