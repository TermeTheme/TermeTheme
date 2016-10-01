<?php
class Terme_Socials_Networks extends WP_Widget {

    function __construct() {
        parent::__construct(
                    'terme_social_networks',
                    __('Terme - Social Networks', 'terme'),
                    array(
                        'description' => __( 'Show the Social Networks', 'terme' ),
                    )
                );
    }


    public function widget( $args, $instance ) {

        $networks = (!empty($instance['terme_social'])) ? $instance['terme_social'] : array();
        echo '<section class="social_widget"><ul>';
        foreach ($networks as $network_key => $network) {
            // $status = $network['status'];
            $status = ( array_key_exists('status', $network) ) ? $network['status'] : false ;
            if ($status=='true') {
                switch ($network_key) {
                    case 'facebook':
                        $url = 'https://facebook.com/'.$network['fields']['page_id']['value'].'/';
                        $icon = 'fa-facebook';
                        $name = __('Facebook', 'terme');
                        $number = number_format($this->fbLikeCount($network['fields']['page_id']['value'], $network['fields']['access_token']['value']));
                        break;

                    case 'twitter':
                        $url = 'https://twitter.com/'.$network['fields']['user']['value'].'/';
                        $icon = 'fa-twitter';
                        $name = __('Twitter', 'terme');
                        $number = number_format($this->twFollowers( $network['fields']['user']['value'], $network['fields']['consumer_key']['value'], $network['fields']['consumer_secret']['value'], $network['fields']['oauth_access_token']['value'], $network['fields']['oauth_access_token_secret']['value']));
                        break;

                    case 'google':
                        $url = 'https://plus.google.com/u/0/'.$network['fields']['id']['value'].'/';
                        $icon = 'fa-google';
                        $name = __('Google', 'terme');
                        $number = number_format($this->googleplus_count( $network['fields']['id']['value'], $network['fields']['api']['value']));
                        break;

                    case 'rss':
                        $url = $network['fields']['url']['value'];
                        $icon = 'fa-rss';
                        $name = __('RSS Feed', 'terme');
                        $number = __('RSS Feed', 'terme');
                        break;

                    case 'insta':
                        $url = 'https://www.instagram.com/'.$network['fields']['username']['value'];
                        $icon = 'fa-instagram';
                        $name = __('Instagram', 'terme');
                        $number = number_format($this->instaFollowers( $network['fields']['userid']['value'], $network['fields']['access_token']['value'] ));
                        break;

                    case 'youtube':
                        $url = 'https://www.youtube.com/channel/'.$network['fields']['channel']['value'];
                        $icon = 'fa-youtube';
                        $name = __('Youtube', 'terme');
                        $number = number_format($this->youtube_followers( $network['fields']['channel']['value'], $network['fields']['api']['value'] ));
                        break;

                    case 'github':
                        $url = 'https://github.com/'.$network['fields']['username']['value'];
                        $icon = 'fa-github-alt';
                        $name = __('Github', 'terme');
                        $number = number_format($this->github_followers( $network['fields']['username']['value'] ));
                        break;

                    case 'dribbble':
                        $url = 'https://dribbble.com/'.$network['fields']['username']['value'];
                        $icon = 'fa-dribbble';
                        $name = __('Dribbble', 'terme');
                        $number = number_format($this->dribbble_followers( $network['fields']['username']['value'], $network['fields']['access_token']['value'] ));
                        break;


                }
                echo '<li class="'.$network_key.'">
                        <a target="_blank" href="'.$url.'" data-termehover="true">
                        <span class="icon"><i class="fa '.$icon.'"></i></span>
                        <span class="name">'.$name.'</span>
                        <span class="number">'.$number.'</span>
                        </a>
                      </li>';
            }

        }
        echo '</ul></section>';

    }

    public function fbLikeCount($id,$appsecret){
    	$json_url ='https://graph.facebook.com/'.$id.'?access_token='.$appsecret;
        wp_nonce_field("filesystem-nonce");
        $url = wp_nonce_url('widgets.php', 'filesystem-nonce');
        $creds = request_filesystem_credentials($url, '', false, false, null);
        if ( ! WP_Filesystem($creds) ) {
            request_filesystem_credentials($url, '', true, false, null);
            return;
        } else {
            global $wp_filesystem;
        }
        wp_nonce_field("filesystem-nonce");
        $url = wp_nonce_url('widgets.php', 'filesystem-nonce');
        $creds = request_filesystem_credentials($url, '', false, false, null);
        if ( ! WP_Filesystem($creds) ) {
            request_filesystem_credentials($url, '', true, false, null);
            return;
        } else {
            global $wp_filesystem;
        }

    	$json = $wp_filesystem->get_contents($json_url);
    	$json_output = json_decode($json);
    	if($json_output->likes){
    		return $likes = $json_output->likes;
    	}else{
    		return 0;
    	}
    }
    public function twFollowers($user, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret){

        require_once get_template_directory().'/inc/libraries/twitter_api/vendor/autoload.php';
        $settings = array(
            'oauth_access_token'        => $oauth_access_token,
            'oauth_access_token_secret' => $oauth_access_token_secret,
            'consumer_key'              => $consumer_key,
            'consumer_secret'           => $consumer_secret
        );

        $url = 'https://api.twitter.com/1.1/users/show.json';
        $getfield = '?screen_name=' . $user;
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange( $settings );
        $follow_count = $twitter->setGetfield( $getfield )
                        ->buildOauth( $url, $requestMethod )
                        ->performRequest();
        $get_count = json_decode( $follow_count, true );
        if ($get_count['followers_count']) {
            return $get_count['followers_count'];
        } else {
            return 0;
        }
    }
    public function googleplus_count( $user, $apikey ) {
        wp_nonce_field("filesystem-nonce");
        $url = wp_nonce_url('widgets.php', 'filesystem-nonce');
        $creds = request_filesystem_credentials($url, '', false, false, null);
        if ( ! WP_Filesystem($creds) ) {
            request_filesystem_credentials($url, '', true, false, null);
            return;
        } else {
            global $wp_filesystem;
        }

        $google = $wp_filesystem->get_contents( 'https://www.googleapis.com/plus/v1/people/' . $user . '?key=' . $apikey );
        $decode = json_decode( $google );
        if ($decode->circledByCount) {
            return $decode->circledByCount;
        } else {
            return 0;
        }
    }
    public function instaFollowers($user_id,$access_token){
        $url = 'https://api.instagram.com/v1/users/'.$user_id.'?access_token='.$access_token;
        wp_nonce_field("filesystem-nonce");
        $url = wp_nonce_url('widgets.php', 'filesystem-nonce');
        $creds = request_filesystem_credentials($url, '', false, false, null);
        if ( ! WP_Filesystem($creds) ) {
            request_filesystem_credentials($url, '', true, false, null);
            return;
        } else {
            global $wp_filesystem;
        }

        $api_response = $wp_filesystem->get_contents($url);
        $record = json_decode($api_response);

    	if($record->data->counts->followed_by){
    		return $record->data->counts->followed_by;
    	}else{
    		return 0;
    	}
    }
    public function youtube_followers( $channel_id, $apikey ) {
        $url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&key='.$apikey;
        wp_nonce_field("filesystem-nonce");
        $url = wp_nonce_url('widgets.php', 'filesystem-nonce');
        $creds = request_filesystem_credentials($url, '', false, false, null);
        if ( ! WP_Filesystem($creds) ) {
            request_filesystem_credentials($url, '', true, false, null);
            return;
        } else {
            global $wp_filesystem;
        }
        $api_response = $wp_filesystem->get_contents($url);
        $record = json_decode($api_response);
        // return $record;
    	if($record->items['0']->statistics->subscriberCount){
    		return $record->items['0']->statistics->subscriberCount;
    	}else{
    		return 0;
    	}
    }
    // public function curl_get_contents($url) {
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //     curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    //     $data = curl_exec($ch);
    //     curl_close($ch);
    //     return $data;
    // }
    public function github_followers( $username ) {
        $response = wp_remote_get( 'https://api.github.com/users/'.$username );
        $github_data = json_decode($response['body']);
        $github_followers_count = $github_data->followers;
    	if($github_followers_count){
    		return $github_followers_count;
    	}else{
    		return 0;
    	}
    }
    public function dribbble_followers( $username, $apikey ) {
        $url = 'https://api.dribbble.com/v1/users/'.$username.'/?access_token='.$apikey;
        $api_response = $wp_filesystem->get_contents($url);
        $record = json_decode($api_response);
        // return $record;
    	if($record->followers_count){
    		return $record->followers_count;
    	}else{
    		return 0;
    	}
    }

    public function form( $instance ) {
        ?>
            <ul class="terme_social_widgets">
            <?php
            $defaults = array(
                            'facebook' => array(
                                            'title'     => __( 'Facebook Page Like Counter', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'page_id' => array(
                                                                                    'title' => __( 'Facebook Page ID:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'access_token' => array(
                                                                                        'title' => __( 'Facebook Page Access Token:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                )
                                        ),
                            'google' => array(
                                            'title'     => __( 'Google+ Followers Counter', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'id' => array(
                                                                                    'title' => __( 'Google+ Username OR ID:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'api' => array(
                                                                                        'title' => __( 'Google+ API key:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                )
                                        ),
                            'twitter' => array(
                                            'title'     => __( 'Twitter Followers Counter', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'user' => array(
                                                                                    'title' => __( 'Twitter Username:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'consumer_key' => array(
                                                                                        'title' => __( 'Twitter Consumer key:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                'consumer_secret' => array(
                                                                                        'title' => __( 'Twitter Consumer secret:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                'oauth_access_token' => array(
                                                                                        'title' => __( 'Twitter Access token:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                'oauth_access_token_secret' => array(
                                                                                        'title' => __( 'Twitter Access token secret:', 'terme' ),
                                                                                        'value' => ''
                                                                                    ),
                                                                )
                                        ),
                            'rss' => array(
                                            'title'     => __( 'RSS Feed', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'url' => array(
                                                                                    'title' => __( 'RSS Feed Url:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                )
                                        ),
                            'insta' => array(
                                            'title'     => __( 'Instagram Followers', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'userid' => array(
                                                                                    'title' => __( 'Instagram User ID:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'username' => array(
                                                                                    'title' => __( 'Instagram User Name:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'access_token' => array(
                                                                                    'title' => __( 'Instagram Access Token:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                )
                                        ),
                            'youtube' => array(
                                            'title'     => __( 'Youtube channel', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'channel' => array(
                                                                                    'title' => __( 'Youtube channel ID:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'api' => array(
                                                                                    'title' => __( 'Youtube channel API Key:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                )
                                        ),
                            'github' => array(
                                            'title'     => __( 'Github Account', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'username' => array(
                                                                                    'title' => __( 'Github Username:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                )
                                        ),
                            'dribbble' => array(
                                            'title'     => __( 'Dribbble Account', 'terme' ),
                                            'status'    => false,
                                            'fields'    => array (
                                                                'username' => array(
                                                                                    'title' => __( 'Dribbble Username:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                'access_token' => array(
                                                                                    'title' => __( 'Dribbble Access Token:', 'terme' ),
                                                                                    'value' => '',
                                                                                ),
                                                                )
                                        ),

                        );
            $networks = ( array_key_exists('terme_social', $instance) ) ? $instance['terme_social'] : $defaults ;
            foreach ($networks as $network_name => $network):
                $title = ( isset($network['title']) && !empty($network['title']) ) ? $network['title'] : '' ;
                $status = ( isset($network['status']) && !empty($network['status']) ) ? $network['status'] : false ;
            ?>
                <li>
                    <input class="widefat network_status" id="<?php echo $this->get_field_id( 'terme_social['.$network_name.'][status]' ); ?>" name="<?php echo $this->get_field_name( 'terme_social['.$network_name.'][status]' ); ?>" type="checkbox" value="true" <?php checked( $status, 'true', true ) ?>>
                    <label for="<?php echo $this->get_field_id( 'terme_social['.$network_name.'][status]' ); ?>"><?php echo $title ?></label>
                    <ul <?php if ($status=='true') { echo 'style="display:block"; '; } ?>>
                            <?php foreach ($network['fields'] as $field_id => $field): ?>
                                <li>
                                    <label for="<?php echo $this->get_field_id( 'terme_social['.$network_name.'][fields]['.$field_id.']' ); ?>"><?php echo $field['title'] ?></label>
                                    <input class="widefat" id="<?php echo $this->get_field_id( 'terme_social['.$network_name.'][fields]['.$field_id.'][value]' ); ?>" name="<?php echo $this->get_field_name( 'terme_social['.$network_name.'][fields]['.$field_id.'][value]' ); ?>" type="text" value="<?php echo $field['value'] ?>">
                                    <input name="<?php echo $this->get_field_name( 'terme_social['.$network_name.'][fields]['.$field_id.'][title]' ); ?>" type="hidden" value="<?php echo $field['title'] ?>">
                                </li>
                            <?php endforeach; ?>
                    </ul>
                    <span class="handle"></span>
                    <input type="hidden" value="<?php echo $title ?>" name="<?php echo $this->get_field_name( 'terme_social['.$network_name.'][title]' ); ?>" />
                </li>
            <?php endforeach; ?>


        </ul>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                jQuery('.terme_social_widgets').sortable({
                                                  placeholder: "ui-state-highlight",
                                                  handle: '.handle'
                                                });
            });
        </script>

    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();

        // Facebook
        // $instance['facebook_status'] = ( !empty( $new_instance['facebook_status'] ) ) ? strip_tags( $new_instance['facebook_status'] ) : '';
        // $instance['facebook_page_id'] = ( !empty( $new_instance['facebook_page_id'] ) ) ? strip_tags( $new_instance['facebook_page_id'] ) : '';
        // $instance['facebook_access_token'] = ( !empty( $new_instance['facebook_access_token'] ) ) ? strip_tags( $new_instance['facebook_access_token'] ) : '';

        // Twitter
        // $instance['twitter_status'] = ( !empty( $new_instance['twitter_status'] ) ) ? strip_tags( $new_instance['twitter_status'] ) : '';
        // $instance['twitter_user'] = ( !empty( $new_instance['twitter_user'] ) ) ? strip_tags( $new_instance['twitter_user'] ) : '';
        // $instance['twitter_consumer_key'] = ( !empty( $new_instance['twitter_consumer_key'] ) ) ? strip_tags( $new_instance['twitter_consumer_key'] ) : '';
        // $instance['twitter_consumer_secret'] = ( !empty( $new_instance['twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['twitter_consumer_secret'] ) : '';
        // $instance['twitter_oauth_access_token'] = ( !empty( $new_instance['twitter_oauth_access_token'] ) ) ? strip_tags( $new_instance['twitter_oauth_access_token'] ) : '';
        // $instance['twitter_oauth_access_token_secret'] = ( !empty( $new_instance['twitter_oauth_access_token_secret'] ) ) ? strip_tags( $new_instance['twitter_oauth_access_token_secret'] ) : '';

        // Google+
        // $instance['google_status'] = ( !empty( $new_instance['google_status'] ) ) ? strip_tags( $new_instance['google_status'] ) : '';
        // $instance['google_id'] = ( !empty( $new_instance['google_id'] ) ) ? strip_tags( $new_instance['google_id'] ) : '';
        // $instance['google_api'] = ( !empty( $new_instance['google_api'] ) ) ? strip_tags( $new_instance['google_api'] ) : '';

        // RSS Feed
        // $instance['rss_status'] = ( !empty( $new_instance['rss_status'] ) ) ? strip_tags( $new_instance['rss_status'] ) : '';
        // $instance['rss_url'] = ( !empty( $new_instance['rss_url'] ) ) ? strip_tags( $new_instance['rss_url'] ) : '';

        // Instagram
        // $instance['insta_status'] = ( !empty( $new_instance['insta_status'] ) ) ? strip_tags( $new_instance['insta_status'] ) : '';
        // $instance['insta_userid'] = ( !empty( $new_instance['insta_userid'] ) ) ? strip_tags( $new_instance['insta_userid'] ) : '';
        // $instance['insta_username'] = ( !empty( $new_instance['insta_username'] ) ) ? strip_tags( $new_instance['insta_username'] ) : '';
        // $instance['insta_access_token'] = ( !empty( $new_instance['insta_access_token'] ) ) ? strip_tags( $new_instance['insta_access_token'] ) : '';

        // Youtube
        // $instance['youtube_status'] = ( !empty( $new_instance['youtube_status'] ) ) ? strip_tags( $new_instance['youtube_status'] ) : '';
        // $instance['youtube_channel'] = ( !empty( $new_instance['youtube_channel'] ) ) ? strip_tags( $new_instance['youtube_channel'] ) : '';
        // $instance['youtube_api'] = ( !empty( $new_instance['youtube_api'] ) ) ? strip_tags( $new_instance['youtube_api'] ) : '';

        // Github
        // $instance['github_status'] = ( !empty( $new_instance['github_status'] ) ) ? strip_tags( $new_instance['github_status'] ) : '';
        // $instance['github_username'] = ( !empty( $new_instance['github_username'] ) ) ? strip_tags( $new_instance['github_username'] ) : '';

        // Dribbble
        // $instance['dribbble_status'] = ( !empty( $new_instance['dribbble_status'] ) ) ? strip_tags( $new_instance['dribbble_status'] ) : '';
        // $instance['dribbble_username'] = ( !empty( $new_instance['dribbble_username'] ) ) ? strip_tags( $new_instance['dribbble_username'] ) : '';
        // $instance['dribbble_access_token'] = ( !empty( $new_instance['dribbble_access_token'] ) ) ? strip_tags( $new_instance['dribbble_access_token'] ) : '';

        $instance['terme_social'] = $new_instance['terme_social'];
        return $instance;
    }
}

function terme_social_network_widget_load() {
	register_widget( 'Terme_Socials_Networks' );
}
add_action( 'widgets_init', 'terme_social_network_widget_load' );
