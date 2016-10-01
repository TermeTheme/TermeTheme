<?php
/* template name: test */
$username = 'iMojtaba';
$url = 'https://api.github.com/users/'.$username;
$response = wp_remote_get($url);
$github_data = json_decode($response['body']);
print_r($github_data);
