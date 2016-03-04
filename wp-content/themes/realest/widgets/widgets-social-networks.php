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
	var $title_align = array(
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
		)
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
		$title_align = isset($instance['title_align']) ? $instance['title_align'] : 'left';
		$alt = isset( $instance['alt'] )?$instance['alt']:'';
		$align = isset($instance['align']) ? $instance['align'] : 'left';
		$size = isset($instance['size']) ? $instance['size'] : '16';
		$margin = isset($instance['margin']) ? $instance['margin'] : '0';
		$icon_color = isset($instance['icon_color']) ? $instance['icon_color'] : '#337ab7';
		$uniqueID = 'social-'.uniqid();
		$icon_style = 'fa fa-';

		$output ='';

		if ( !empty( $instance['enable_sites'] ) ) {
			foreach ( $instance['enable_sites'] as $site ) {
				//$path = $this->size[$size]['path'];
				$link = isset( $instance[strtolower( $site )] )?$instance[strtolower( $site )]:'#';
					$output .= '<a href="'.$link.'" rel="nofollow" class="builtin-icons socialmedias-sidebar-anchor" target="_blank" alt="'.$alt.' '.$site.'" title="'.$alt.' '.$site.'" style="font-size:'.$size.'px; margin:0 '.$margin.'px; color:'.$icon_color.';"><i class="'.$icon_style.$site.'"></i></a>';
	
			}
		}
		$before_title = '<h4 class="widget-title text-'.$title_align.'">';
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
		$instance['title_align'] = strip_tags( $new_instance['title_align'] );
		$instance['alt'] = strip_tags( $new_instance['alt'] );
		$instance['align'] = $new_instance['align'];
		$instance['size'] = $new_instance['size'];
		$instance['margin'] = $new_instance['margin'];
		$instance['icon_color'] = $new_instance['icon_color'];
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
		$title_align = isset( $instance['title_align'] ) ? $instance['title_align'] : 'left';
		$size = isset( $instance['size'] ) ? $instance['size'] : '16';
		$margin = isset( $instance['margin'] ) ? $instance['margin'] : '0';
		$icon_color = isset( $instance['icon_color'] ) ? $instance['icon_color'] : '#337ab7';
		$enable_sites = isset( $instance['enable_sites'] ) ? $instance['enable_sites'] : array();
		foreach ( $this->sites as $site ) {
			$$site = isset( $instance[strtolower( $site )] ) ? esc_attr( $instance[strtolower( $site )] ) : '';
		}	
		?>
		<!--widget title-->
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mk_framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<!--alt, this shows on hover-->
		<p><label for="<?php echo $this->get_field_id( 'alt' ); ?>"><?php _e('Icon Alt Title:', 'mk_framework'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'alt' ); ?>" name="<?php echo $this->get_field_name( 'alt' ); ?>" type="text" value="<?php echo $alt; ?>" /></p>

		<!--Title align-->
		<p><label for="<?php echo $this->get_field_id( 'title_align' ); ?>">Title Align</label>
			<select name="<?php echo $this->get_field_name( 'title_align' ); ?>" id="<?php echo $this->get_field_id( 'title_align' ); ?>" class="widefat">
				<?php foreach ( $this->title_align as $name => $value ):?>
				<option value="<?php echo $name;?>"<?php selected( $title_align, $name );?>><?php echo $value['name'];?></option>
				<?php endforeach;?>
			</select>
		</p>

		<!--social media align-->
		<p><label for="<?php echo $this->get_field_id( 'align' ); ?>">Social Media Align:</label>
			<select name="<?php echo $this->get_field_name( 'align' ); ?>" id="<?php echo $this->get_field_id( 'align' ); ?>" class="widefat">
				<?php foreach ( $this->align as $name => $value ):?>
				<option value="<?php echo $name;?>"<?php selected( $align, $name );?>><?php echo $value['name'];?></option>
				<?php endforeach;?>
			</select>
		</p>

		<!--social media size in px-->
		<p><label for="<?php echo $this->get_field_id( 'size' ); ?>">Social Media Size(px):</label><input type="number" class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php echo $size; ?>">
		</p>

		<!--social media margin left right-->
		<p><label for="<?php echo $this->get_field_id( 'margin' ); ?>">Social Media Margin(px):<em>This is margin left and right</em></label><input type="number" class="widefat" id="<?php echo $this->get_field_id('margin'); ?>" name="<?php echo $this->get_field_name('margin'); ?>" value="<?php echo $margin; ?>">
		</p>

		<!--social media color-->
		<p><label for="<?php echo $this->get_field_id( 'icon_color' ); ?>"><?php _e('Icon Color:', 'mk_framework'); ?><em>Sample: #fff or #123efa</em></label> <input class="widefat" id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" value="<?php echo $icon_color; ?>" /></p>

		<!--social networks-->
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
