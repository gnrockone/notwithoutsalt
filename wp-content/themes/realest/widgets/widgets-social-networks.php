<?php

/*
	SOCIAL NETWORKS ICON
*/
class realest_widget_social extends WP_Widget {

	var $sites = array(
            'amazon',
            'apple',
            'behance',
            'bitbucket',
            'delicious', 
            'deviantart', 
            'digg', 
            'dribbble', 
            'dropbox',
            'drupal',
            'envato', 
            'facebook', 
            'flickr', 
            'github', 
            'google', 
            'google-plus', 
            'lastfm', 
            'linkedin',
            'instagram', 
            'pinterest', 
            'reddit', 
            'rss', 
            'skype', 
            'stumbleupon', 
            'tumblr', 
            'twitter', 
            'vimeo', 
            'wordpress', 
            'yahoo', 
            'yelp', 
            'youtube',
            'xing',
            'renren',
            'vk',
            'wechat',
            'weibo',
            'whatsapp',
            'soundcloud'
	);

	var $align = array(

		'left' => array(
			'name'=>'Left',
			'path'=>'left',
		),

		'center' => array(
			'name'=>'Center',
			'path'=>'center',
		),

		'right' => array(
			'name'=>'Right',
			'path'=>'right',
		),

	);


	function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_social_networks', 
			'description' => 'Displays a list of Social Icon icons' 
		);
		parent::__construct(
			'social', //base id
			THEME_SLUG . ' - Social Networks',
			$widget_ops
			);
	}


	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$alt = isset( $instance['alt'] )?$instance['alt']:'';
		$align = isset($instance['align']) ? $instance['align'] : 'left'; 
		$uniqueID = 'social-'.uniqid();
		$icon_style = 'fa fa-';

		$output ='';

		if ( !empty( $instance['enable_sites'] ) ) {
			foreach ( $instance['enable_sites'] as $site ) {
				//$path = $this->size[$size]['path'];
				$link = isset( $instance[strtolower( $site )] )?$instance[strtolower( $site )]:'#';
					$output .= '<a href="'.$link.'" rel="nofollow" class="builtin-icons socialmedias-sidebar-anchor" target="_blank" alt="'.$alt.' '.$site.'" title="'.$alt.' '.$site.'"><i class="'.$icon_style.$site.'"></i></a>';
	
			}
		}

		if ( !empty( $output ) ) {
			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;
				echo '<div id="'.$uniqueID.'" class="text-'.$align.'">';
				echo $output;
				echo '</div>';
				echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['alt'] = strip_tags( $new_instance['alt'] );
		$instance['align'] = $new_instance['align'];
		$instance['enable_sites'] = $new_instance['enable_sites'];
		if ( !empty( $instance['enable_sites'] ) ) {
			foreach ( $instance['enable_sites'] as $site ) {
				$instance[strtolower( $site )] = isset( $new_instance[strtolower( $site )] )?strip_tags( $new_instance[strtolower( $site )] ):'';
			}
		}
		
		return $instance;
	}

	function form( $instance ) {

		
		//Defaults
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$alt = isset( $instance['alt'] ) ? esc_attr( $instance['alt'] ) : 'Follow Us on';
		$align = isset( $instance['align'] ) ? $instance['align'] : 'left';
		$enable_sites = isset( $instance['enable_sites'] ) ? $instance['enable_sites'] : array();
		foreach ( $this->sites as $site ) {
			$$site = isset( $instance[strtolower( $site )] ) ? esc_attr( $instance[strtolower( $site )] ) : '';
		}	
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'alt' ); ?>"><?php _e('Icon Alt Title:', 'mk_framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'alt' ); ?>" name="<?php echo $this->get_field_name( 'alt' ); ?>" type="text" value="<?php echo $alt; ?>" /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e('Align:', 'mk_framework'); ?></label>
			<select name="<?php echo $this->get_field_name( 'align' ); ?>" id="<?php echo $this->get_field_id( 'align' ); ?>" class="widefat">
				<?php foreach ( $this->align as $name => $value ):?>
				<option value="<?php echo $name;?>"<?php selected( $align, $name );?>><?php echo $value['name'];?></option>
				<?php endforeach;?>
			</select>
		</p>

		
		<p class="mk-choose-social-networks">
			<label for="<?php echo $this->get_field_id( 'enable_sites' ); ?>"><?php _e('Choose Sites:', 'mk_framework'); ?></label>
			<select name="<?php echo $this->get_field_name( 'enable_sites' ); ?>[]" id="<?php echo $this->get_field_id( 'enable_sites' ); ?>" style="width:300px" class="social_icon_select_sites mk-chosen widefat" multiple="multiple">
				<?php foreach ( $this->sites as $site ):?>
				<option value="<?php echo strtolower( $site );?>"<?php echo in_array( strtolower( $site ), $enable_sites )? 'selected="selected"':'';?>><?php echo $site;?></option>
				<?php endforeach;?>
			</select>
		</p>

		<p>
			<em><?php echo "Note: Please input FULL URL <br/>(e.g. <code>http://www.facebook.com/username</code>)";?></em>
		</p>

		<div class="social_icon_wrap">
		<?php foreach ( $this->sites as $site ):?>
		<p class="social_icon_<?php echo strtolower( $site );?>" <?php if ( !in_array( strtolower( $site ), $enable_sites ) ):?>style="display:none"<?php endif;?>>
			<label for="<?php echo $this->get_field_id( strtolower( $site ) ); ?>"><?php echo $site.' '.'URL:'?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( strtolower( $site ) ); ?>" name="<?php echo $this->get_field_name( strtolower( $site ) ); ?>" type="text" value="<?php echo $$site; ?>" />
		</p>
		<?php endforeach;?>
		</div>


<?php

	}
}
/***************************************************/
