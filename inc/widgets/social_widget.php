<?php
class Terme_Socials_Networks extends WP_Widget {

    function __construct() {
        parent::__construct(
                    'terme_social_networks',
                    __('Terme Social Widget', 'terme'),
                    array(
                        'description' => __( 'Terme Theme social networks widget', 'terme' ),
                    )
                );
    }

    public function widget( $args, $instance ) {
        // Facebook Fields
        $facebook_status = (isset($instance['facebook_status']) && !empty($instance['facebook_status'])) ? $instance['facebook_status'] : false;
        $facebook_page_id = (isset($instance['facebook_page_id']) && !empty($instance['facebook_page_id'])) ? $instance['facebook_page_id'] : '';
        $facebook_access_token = (isset($instance['facebook_access_token']) && !empty($instance['facebook_access_token'])) ? $instance['facebook_access_token'] : '';

        // Twitter Fields
        $twitter_status = (isset($instance['twitter_status']) && !empty($instance['twitter_status'])) ? $instance['twitter_status'] : false;
        $twitter_user = (isset($instance['twitter_user']) && !empty($instance['twitter_user'])) ? $instance['twitter_user'] : '';
        $twitter_consumer_key = (isset($instance['twitter_consumer_key']) && !empty($instance['twitter_consumer_key'])) ? $instance['twitter_consumer_key'] : '';
        $twitter_consumer_secret = (isset($instance['twitter_consumer_secret']) && !empty($instance['twitter_consumer_secret'])) ? $instance['twitter_consumer_secret'] : '';
        $twitter_oauth_access_token = (isset($instance['twitter_oauth_access_token']) && !empty($instance['twitter_oauth_access_token'])) ? $instance['twitter_oauth_access_token'] : '';
        $twitter_oauth_access_token_secret = (isset($instance['twitter_oauth_access_token_secret']) && !empty($instance['twitter_oauth_access_token_secret'])) ? $instance['twitter_oauth_access_token_secret'] : '';

        // Twitter Fields
        $google_status = (isset($instance['google_status']) && !empty($instance['google_status'])) ? $instance['google_status'] : false;
        $google_id = (isset($instance['google_id']) && !empty($instance['google_id'])) ? $instance['google_id'] : '';
        $google_api = (isset($instance['google_api']) && !empty($instance['google_api'])) ? $instance['google_api'] : '';

        // RSS Feed Fields
        $rss_status = (isset($instance['rss_status']) && !empty($instance['rss_status'])) ? $instance['rss_status'] : false;
        $rss_url = (isset($instance['rss_url']) && !empty($instance['rss_url'])) ? $instance['rss_url'] : '';

        // Instagram Fields
        $insta_status = (isset($instance['insta_status']) && !empty($instance['insta_status'])) ? $instance['insta_status'] : false;
        $insta_userid = (isset($instance['insta_userid']) && !empty($instance['insta_userid'])) ? $instance['insta_userid'] : '';
        $insta_username = (isset($instance['insta_username']) && !empty($instance['insta_username'])) ? $instance['insta_username'] : '';
        $insta_access_token = (isset($instance['insta_access_token']) && !empty($instance['insta_access_token'])) ? $instance['insta_access_token'] : '';

        // Youtube Fields
        $youtube_status = (isset($instance['youtube_status']) && !empty($instance['youtube_status'])) ? $instance['youtube_status'] : false;
        $youtube_chanel = (isset($instance['youtube_chanel']) && !empty($instance['youtube_chanel'])) ? $instance['youtube_chanel'] : '';
        $youtube_api = (isset($instance['youtube_api']) && !empty($instance['youtube_api'])) ? $instance['youtube_api'] : '';

        // Github Fields
        $github_status = (isset($instance['github_status']) && !empty($instance['github_status'])) ? $instance['github_status'] : false;
        $github_username = (isset($instance['github_username']) && !empty($instance['github_username'])) ? $instance['github_username'] : '';

        // Dribble Fields
        $dribbble_status = (isset($instance['dribbble_status']) && !empty($instance['dribbble_status'])) ? $instance['dribbble_status'] : false;
        $dribbble_username = (isset($instance['dribbble_username']) && !empty($instance['dribbble_username'])) ? $instance['dribbble_username'] : '';
        $dribbble_access_token = (isset($instance['dribbble_access_token']) && !empty($instance['dribbble_access_token'])) ? $instance['dribbble_access_token'] : '';

        $networks  = array(
                        'facebook' => $facebook_status,
                        'twitter' => $twitter_status,
                        'google' => $google_status,
                        'rss' => $rss_status,
                        'insta' => $insta_status,
                        'youtube' => $youtube_status,
                        'github' => $github_status,
                        'dribbble' => $dribbble_status,
                    );
            echo '<section class="social_widget"><ul>';
            foreach ($networks as $key => $network_status) {
                if ($network_status) {

                    switch ($key) {
                        case 'facebook':
                        echo '<li class="facebook">
                                <a target="_blank" href="https://facebook.com/'.$facebook_page_id.'/" data-termehover="true">
                                <span class="icon"><i class="fa fa-facebook"></i></span>
                                <span class="name">'.__('Facebook', 'terme').'</span>
                                <span class="number">'.$this->fbLikeCount($facebook_page_id, $facebook_access_token).'</span>
                                </a>
                              </li>';
                            break;

                        case 'twitter':
                        echo '<li class="twitter">
                                <a target="_blank" href="https://twitter.com/'.$twitter_user.'/" data-termehover="true">
                                <span class="icon"><i class="fa fa-twitter"></i></span>
                                <span class="name">'.__('Twitter', 'terme').'</span>
                                <span class="number">'.$this->twFollowers( $twitter_user, $twitter_consumer_key, $twitter_consumer_secret, $twitter_oauth_access_token, $twitter_oauth_access_token_secret).'</span>
                                </a>
                              </li>';
                            break;

                        case 'google':
                        echo '<li class="google">
                                <a target="_blank" href="https://plus.google.com/u/0/'.$google_id.'/" data-termehover="true">
                                <span class="icon"><i class="fa fa-google"></i></span>
                                <span class="name">'.__('Google+', 'terme').'</span>
                                <span class="number">'.$this->googleplus_count( $google_id, $google_api ).'</span>
                                </a>
                              </li>';
                            break;

                        case 'rss':
                        echo '<li class="rss">
                                <a target="_blank" href="'.$rss_url.'" data-termehover="true">
                                <span class="icon"><i class="fa fa-rss"></i></span>
                                <span class="name">'.__('RSS', 'terme').'</span>
                                <span class="number">'.__('RSS', 'terme').'</span>
                                </a>
                              </li>';
                            break;

                        case 'insta':
                        echo '<li class="insta">
                                <a target="_blank" href="https://www.instagram.com/'.$insta_username.'" data-termehover="true">
                                <span class="icon"><i class="fa fa-instagram"></i></span>
                                <span class="name">'.__('Instagram', 'terme').'</span>
                                <span class="number">'.$this->instaFollowers( $insta_userid, $insta_access_token ).'</span>
                                </a>
                              </li>';
                            break;

                        case 'youtube':
                        echo '<li class="youtube">
                                <a target="_blank" href="https://www.youtube.com/channel/'.$youtube_chanel.'" data-termehover="true">
                                <span class="icon"><i class="fa fa-youtube"></i></span>
                                <span class="name">'.__('Youtube', 'terme').'</span>
                                <span class="number">'.$this->youtube_followers( $youtube_chanel, $youtube_api ).'</span>
                                </a>
                              </li>';
                            break;

                        case 'github':
                        echo '<li class="github">
                                <a target="_blank" href="https://github.com/'.$github_username.'" data-termehover="true">
                                <span class="icon"><i class="fa fa-github"></i></span>
                                <span class="name">'.__('Github', 'terme').'</span>
                                <span class="number">'.$this->github_followers( $github_username ).'</span>
                                </a>
                              </li>';
                            break;

                        case 'dribbble':
                        echo '<li class="dribbble">
                                <a target="_blank" href="https://dribbble.com/'.$dribbble_username.'" data-termehover="true">
                                <span class="icon"><i class="fa fa-dribbble"></i></span>
                                <span class="name">'.__('Dribbble', 'terme').'</span>
                                <span class="number">'.$this->dribbble_followers( $dribbble_username, $dribbble_access_token ).'</span>
                                </a>
                              </li>';
                            break;

                    }

                }
            }
            echo '</ul></section>';

    }

    public function fbLikeCount($id,$appsecret){
    	$json_url ='https://graph.facebook.com/'.$id.'?access_token='.$appsecret;
    	$json = file_get_contents($json_url);
    	$json_output = json_decode($json);
    	if($json_output->likes){
    		return $likes = $json_output->likes;
    	}else{
    		return 0;
    	}
    }
    public function twFollowers($user, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret){

        require_once TEMPLATEPATH.'/inc/libraries/twitter_api/vendor/autoload.php';
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
        $google = file_get_contents( 'https://www.googleapis.com/plus/v1/people/' . $user . '?key=' . $apikey );
        $decode = json_decode( $google );
        if ($decode->circledByCount) {
            return $decode->circledByCount;
        } else {
            return 0;
        }
    }
    public function instaFollowers($user_id,$access_token){
        $url = 'https://api.instagram.com/v1/users/'.$user_id.'?access_token='.$access_token;
        $api_response = file_get_contents($url);
        $record = json_decode($api_response);

    	if($record->data->counts->followed_by){
    		return $likes = $record->data->counts->followed_by;
    	}else{
    		return 0;
    	}
    }
    public function youtube_followers( $chanel_id, $apikey ) {
        $url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$chanel_id.'&key='.$apikey;
        $api_response = file_get_contents($url);
        $record = json_decode($api_response);
        // return $record;
    	if($record->items['0']->statistics->subscriberCount){
    		return $record->items['0']->statistics->subscriberCount;
    	}else{
    		return 0;
    	}
    }
    public function curl_get_contents($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    public function github_followers( $username ) {
        $github_data = json_decode($this->curl_get_contents('https://api.github.com/users/'.$username), true);
        $github_followers_count = $github_data['followers'];
    	if($github_followers_count){
    		return $github_followers_count;
    	}else{
    		return 0;
    	}
    }
    public function dribbble_followers( $username, $apikey ) {
        $url = 'https://api.dribbble.com/v1/users/'.$username.'/?access_token='.$apikey;
        $api_response = file_get_contents($url);
        $record = json_decode($api_response);
        // return $record;
    	if($record->followers_count){
    		return $record->followers_count;
    	}else{
    		return 0;
    	}
    }

    public function form( $instance ) {

        // Facebook Fields
        $facebook_status = (isset($instance['facebook_status']) && !empty($instance['facebook_status'])) ? $instance['facebook_status'] : false;
        $facebook_page_id = (isset($instance['facebook_page_id']) && !empty($instance['facebook_page_id'])) ? $instance['facebook_page_id'] : '';
        $facebook_access_token = (isset($instance['facebook_access_token']) && !empty($instance['facebook_access_token'])) ? $instance['facebook_access_token'] : '';

        // Twitter Fields
        $twitter_status = (isset($instance['twitter_status']) && !empty($instance['twitter_status'])) ? $instance['twitter_status'] : false;
        $twitter_user = (isset($instance['twitter_user']) && !empty($instance['twitter_user'])) ? $instance['twitter_user'] : '';
        $twitter_consumer_key = (isset($instance['twitter_consumer_key']) && !empty($instance['twitter_consumer_key'])) ? $instance['twitter_consumer_key'] : '';
        $twitter_consumer_secret = (isset($instance['twitter_consumer_secret']) && !empty($instance['twitter_consumer_secret'])) ? $instance['twitter_consumer_secret'] : '';
        $twitter_oauth_access_token = (isset($instance['twitter_oauth_access_token']) && !empty($instance['twitter_oauth_access_token'])) ? $instance['twitter_oauth_access_token'] : '';
        $twitter_oauth_access_token_secret = (isset($instance['twitter_oauth_access_token_secret']) && !empty($instance['twitter_oauth_access_token_secret'])) ? $instance['twitter_oauth_access_token_secret'] : '';

        // Twitter Fields
        $google_status = (isset($instance['google_status']) && !empty($instance['google_status'])) ? $instance['google_status'] : false;
        $google_id = (isset($instance['google_id']) && !empty($instance['google_id'])) ? $instance['google_id'] : '';
        $google_api = (isset($instance['google_api']) && !empty($instance['google_api'])) ? $instance['google_api'] : '';

        // RSS Feed Fields
        $rss_status = (isset($instance['rss_status']) && !empty($instance['rss_status'])) ? $instance['rss_status'] : false;
        $rss_url = (isset($instance['rss_url']) && !empty($instance['rss_url'])) ? $instance['rss_url'] : '';

        // Instagram Fields
        $insta_status = (isset($instance['insta_status']) && !empty($instance['insta_status'])) ? $instance['insta_status'] : false;
        $insta_userid = (isset($instance['insta_userid']) && !empty($instance['insta_userid'])) ? $instance['insta_userid'] : '';
        $insta_username = (isset($instance['insta_username']) && !empty($instance['insta_username'])) ? $instance['insta_username'] : '';
        $insta_access_token = (isset($instance['insta_access_token']) && !empty($instance['insta_access_token'])) ? $instance['insta_access_token'] : '';

        // Youtube Fields
        $youtube_status = (isset($instance['youtube_status']) && !empty($instance['youtube_status'])) ? $instance['youtube_status'] : false;
        $youtube_chanel = (isset($instance['youtube_chanel']) && !empty($instance['youtube_chanel'])) ? $instance['youtube_chanel'] : '';
        $youtube_api = (isset($instance['youtube_api']) && !empty($instance['youtube_api'])) ? $instance['youtube_api'] : '';

        // Github Fields
        $github_status = (isset($instance['github_status']) && !empty($instance['github_status'])) ? $instance['github_status'] : false;
        $github_username = (isset($instance['github_username']) && !empty($instance['github_username'])) ? $instance['github_username'] : '';

        // Dribble Fields
        $dribbble_status = (isset($instance['dribbble_status']) && !empty($instance['dribbble_status'])) ? $instance['dribbble_status'] : false;
        $dribbble_username = (isset($instance['dribbble_username']) && !empty($instance['dribbble_username'])) ? $instance['dribbble_username'] : '';
        $dribbble_access_token = (isset($instance['dribbble_access_token']) && !empty($instance['dribbble_access_token'])) ? $instance['dribbble_access_token'] : '';

        ?>
        <ul class="terme_social_widgets">

            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'facebook_status' ); ?>" name="<?php echo $this->get_field_name( 'facebook_status' ); ?>" type="checkbox" value="true" <?php checked( $facebook_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'facebook_status' ); ?>"><?php _e( 'Facebook Page Like Counter', 'terme' ); ?></label>
                <ul <?php if ($facebook_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'facebook_page_id' ); ?>"><?php _e( 'Facebook Page ID:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_page_id' ); ?>" name="<?php echo $this->get_field_name( 'facebook_page_id' ); ?>" type="text" value="<?php echo $facebook_page_id ?>">
                        <span><?php _e('Example: TermeTheme') ?></span>
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'facebook_access_token' ); ?>"><?php _e( 'Facebook Page Access Token:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook_access_token' ); ?>" name="<?php echo $this->get_field_name( 'facebook_access_token' ); ?>" type="text" value="<?php echo $facebook_access_token ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'twitter_status' ); ?>" name="<?php echo $this->get_field_name( 'twitter_status' ); ?>" type="checkbox" value="true" <?php checked( $twitter_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'twitter_status' ); ?>"><?php _e( 'Twitter Followers Counter', 'terme' ); ?></label>
                <ul <?php if ($twitter_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'twitter_user' ); ?>"><?php _e( 'Twitter Username:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_user' ); ?>" name="<?php echo $this->get_field_name( 'twitter_user' ); ?>" type="text" value="<?php echo $twitter_user ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'twitter_consumer_key' ); ?>"><?php _e( 'Twitter Consumer key:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_consumer_key' ); ?>" name="<?php echo $this->get_field_name( 'twitter_consumer_key' ); ?>" type="text" value="<?php echo $twitter_consumer_key ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'twitter_consumer_secret' ); ?>"><?php _e( 'Twitter Consumer secret:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_consumer_secret' ); ?>" name="<?php echo $this->get_field_name( 'twitter_consumer_secret' ); ?>" type="text" value="<?php echo $twitter_consumer_secret ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'twitter_oauth_access_token' ); ?>"><?php _e( 'Twitter Access token:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_oauth_access_token' ); ?>" name="<?php echo $this->get_field_name( 'twitter_oauth_access_token' ); ?>" type="text" value="<?php echo $twitter_oauth_access_token ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'twitter_oauth_access_token_secret' ); ?>"><?php _e( 'Twitter Access token secret:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter_oauth_access_token_secret' ); ?>" name="<?php echo $this->get_field_name( 'twitter_oauth_access_token_secret' ); ?>" type="text" value="<?php echo $twitter_oauth_access_token_secret ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'google_status' ); ?>" name="<?php echo $this->get_field_name( 'google_status' ); ?>" type="checkbox" value="true" <?php checked( $google_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'google_status' ); ?>"><?php _e( 'Google+ Followers Counter', 'terme' ); ?></label>
                <ul <?php if ($google_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'google_id' ); ?>"><?php _e( 'Google+ Username OR ID:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'google_id' ); ?>" name="<?php echo $this->get_field_name( 'google_id' ); ?>" type="text" value="<?php echo $google_id; ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'google_api' ); ?>"><?php _e( 'Google+ API key:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'google_api' ); ?>" name="<?php echo $this->get_field_name( 'google_api' ); ?>" type="text" value="<?php echo $google_api; ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'rss_status' ); ?>" name="<?php echo $this->get_field_name( 'rss_status' ); ?>" type="checkbox" value="true" <?php checked( $rss_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'rss_status' ); ?>"><?php _e( 'RSS Feed', 'terme' ); ?></label>
                <ul <?php if ($rss_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'rss_url' ); ?>"><?php _e( 'RSS Feed Url:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'rss_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" type="text" value="<?php echo $rss_url; ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'insta_status' ); ?>" name="<?php echo $this->get_field_name( 'insta_status' ); ?>" type="checkbox" value="true" <?php checked( $insta_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'insta_status' ); ?>"><?php _e( 'Instagram Followers', 'terme' ); ?></label>
                <ul <?php if ($insta_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'insta_userid' ); ?>"><?php _e( 'Instagram User ID:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'insta_userid' ); ?>" name="<?php echo $this->get_field_name( 'insta_userid' ); ?>" type="text" value="<?php echo $insta_userid; ?>">
                        <span>Example: 2929498049</span>
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'insta_username' ); ?>"><?php _e( 'Instagram User Name:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'insta_username' ); ?>" name="<?php echo $this->get_field_name( 'insta_username' ); ?>" type="text" value="<?php echo $insta_username; ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'insta_access_token' ); ?>"><?php _e( 'Instagram Access Token:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'insta_access_token' ); ?>" name="<?php echo $this->get_field_name( 'insta_access_token' ); ?>" type="text" value="<?php echo $insta_access_token; ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'youtube_status' ); ?>" name="<?php echo $this->get_field_name( 'youtube_status' ); ?>" type="checkbox" value="true" <?php checked( $youtube_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'youtube_status' ); ?>"><?php _e( 'Youtube Chanel', 'terme' ); ?></label>
                <ul <?php if ($youtube_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'youtube_chanel' ); ?>"><?php _e( 'Youtube Chanel ID:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'youtube_chanel' ); ?>" name="<?php echo $this->get_field_name( 'youtube_chanel' ); ?>" type="text" value="<?php echo $youtube_chanel; ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'youtube_api' ); ?>"><?php _e( 'Youtube Chanel API Key:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'youtube_api' ); ?>" name="<?php echo $this->get_field_name( 'youtube_api' ); ?>" type="text" value="<?php echo $youtube_api; ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'github_status' ); ?>" name="<?php echo $this->get_field_name( 'github_status' ); ?>" type="checkbox" value="true" <?php checked( $github_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'github_status' ); ?>"><?php _e( 'Github Account', 'terme' ); ?></label>
                <ul <?php if ($github_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'github_username' ); ?>"><?php _e( 'Github Username:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'github_username' ); ?>" name="<?php echo $this->get_field_name( 'github_username' ); ?>" type="text" value="<?php echo $github_username; ?>">
                    </li>
                </ul>
            </li>
            <li>
                <input class="widefat network_status" id="<?php echo $this->get_field_id( 'dribbble_status' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_status' ); ?>" type="checkbox" value="true" <?php checked( $dribbble_status, 'true', true ) ?>>
                <label for="<?php echo $this->get_field_id( 'dribbble_status' ); ?>"><?php _e( 'Dribbble Account', 'terme' ); ?></label>
                <ul <?php if ($dribbble_status=='true') { echo 'style="display:block"; '; } ?>>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'dribbble_username' ); ?>"><?php _e( 'Dribbble Username:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_username' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_username' ); ?>" type="text" value="<?php echo $dribbble_username; ?>">
                    </li>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'dribbble_access_token' ); ?>"><?php _e( 'Dribbble Access Token:', 'terme' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble_access_token' ); ?>" name="<?php echo $this->get_field_name( 'dribbble_access_token' ); ?>" type="text" value="<?php echo $dribbble_access_token; ?>">
                    </li>
                </ul>
            </li>

        </ul>

    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();

        // Facebook
        $instance['facebook_status'] = ( !empty( $new_instance['facebook_status'] ) ) ? strip_tags( $new_instance['facebook_status'] ) : '';
        $instance['facebook_page_id'] = ( !empty( $new_instance['facebook_page_id'] ) ) ? strip_tags( $new_instance['facebook_page_id'] ) : '';
        $instance['facebook_access_token'] = ( !empty( $new_instance['facebook_access_token'] ) ) ? strip_tags( $new_instance['facebook_access_token'] ) : '';

        // Twitter
        $instance['twitter_status'] = ( !empty( $new_instance['twitter_status'] ) ) ? strip_tags( $new_instance['twitter_status'] ) : '';
        $instance['twitter_user'] = ( !empty( $new_instance['twitter_user'] ) ) ? strip_tags( $new_instance['twitter_user'] ) : '';
        $instance['twitter_consumer_key'] = ( !empty( $new_instance['twitter_consumer_key'] ) ) ? strip_tags( $new_instance['twitter_consumer_key'] ) : '';
        $instance['twitter_consumer_secret'] = ( !empty( $new_instance['twitter_consumer_secret'] ) ) ? strip_tags( $new_instance['twitter_consumer_secret'] ) : '';
        $instance['twitter_oauth_access_token'] = ( !empty( $new_instance['twitter_oauth_access_token'] ) ) ? strip_tags( $new_instance['twitter_oauth_access_token'] ) : '';
        $instance['twitter_oauth_access_token_secret'] = ( !empty( $new_instance['twitter_oauth_access_token_secret'] ) ) ? strip_tags( $new_instance['twitter_oauth_access_token_secret'] ) : '';

        // Google+
        $instance['google_status'] = ( !empty( $new_instance['google_status'] ) ) ? strip_tags( $new_instance['google_status'] ) : '';
        $instance['google_id'] = ( !empty( $new_instance['google_id'] ) ) ? strip_tags( $new_instance['google_id'] ) : '';
        $instance['google_api'] = ( !empty( $new_instance['google_api'] ) ) ? strip_tags( $new_instance['google_api'] ) : '';

        // RSS Feed
        $instance['rss_status'] = ( !empty( $new_instance['rss_status'] ) ) ? strip_tags( $new_instance['rss_status'] ) : '';
        $instance['rss_url'] = ( !empty( $new_instance['rss_url'] ) ) ? strip_tags( $new_instance['rss_url'] ) : '';

        // Instagram
        $instance['insta_status'] = ( !empty( $new_instance['insta_status'] ) ) ? strip_tags( $new_instance['insta_status'] ) : '';
        $instance['insta_userid'] = ( !empty( $new_instance['insta_userid'] ) ) ? strip_tags( $new_instance['insta_userid'] ) : '';
        $instance['insta_username'] = ( !empty( $new_instance['insta_username'] ) ) ? strip_tags( $new_instance['insta_username'] ) : '';
        $instance['insta_access_token'] = ( !empty( $new_instance['insta_access_token'] ) ) ? strip_tags( $new_instance['insta_access_token'] ) : '';

        // Youtube
        $instance['youtube_status'] = ( !empty( $new_instance['youtube_status'] ) ) ? strip_tags( $new_instance['youtube_status'] ) : '';
        $instance['youtube_chanel'] = ( !empty( $new_instance['youtube_chanel'] ) ) ? strip_tags( $new_instance['youtube_chanel'] ) : '';
        $instance['youtube_api'] = ( !empty( $new_instance['youtube_api'] ) ) ? strip_tags( $new_instance['youtube_api'] ) : '';

        // Github
        $instance['github_status'] = ( !empty( $new_instance['github_status'] ) ) ? strip_tags( $new_instance['github_status'] ) : '';
        $instance['github_username'] = ( !empty( $new_instance['github_username'] ) ) ? strip_tags( $new_instance['github_username'] ) : '';

        // Dribbble
        $instance['dribbble_status'] = ( !empty( $new_instance['dribbble_status'] ) ) ? strip_tags( $new_instance['dribbble_status'] ) : '';
        $instance['dribbble_username'] = ( !empty( $new_instance['dribbble_username'] ) ) ? strip_tags( $new_instance['dribbble_username'] ) : '';
        $instance['dribbble_access_token'] = ( !empty( $new_instance['dribbble_access_token'] ) ) ? strip_tags( $new_instance['dribbble_access_token'] ) : '';

        return $instance;
    }
}

function terme_social_network_widget_load() {
	register_widget( 'Terme_Socials_Networks' );
}
add_action( 'widgets_init', 'terme_social_network_widget_load' );
