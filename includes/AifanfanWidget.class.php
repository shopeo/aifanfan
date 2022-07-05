<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AifanfanWidget extends WP_Widget {
	public $args = array(
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
			'before_widget' => '<div class="widget-wrap">',
			'after_widget'  => '</div>'
	);

	function __construct() {
		parent::__construct( 'aifanfan_widget', __( 'Aifanfan Widget', 'aifanfan' ) );
		add_action( 'widgets_init', function () {
			register_widget( 'AifanfanWidget' );
		} );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo '<div class="textwidget subscribe-widget">';
		if ( ! empty( $instance['text'] ) ) {
			echo '<a target="_blank" href="' . get_option( 'aifanfan_option_name' )['aifanfan_link'] . '">' . $instance['text'] . '</a>';
		}
		echo '</div>';
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'aifanfan' );
		$text  = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'aifanfan' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'aifanfan' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				   value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php echo esc_html__( 'Text:', 'aifanfan' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
				   name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
				   value="<?php echo esc_attr( $text ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

		return $instance;
	}
}

$aifanfanWidget = new AifanfanWidget();
