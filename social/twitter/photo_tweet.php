<?php
$tmhOAuth = new tmhOAuthExample();

$image = 'photo.jpg';
$name  = basename($image);
$status = "Picture time";

$code = $tmhOAuth->user_request(array(
  'method' => 'POST',
  'url' => $tmhOAuth->url('1.1/statuses/update_with_media'),
  'params' => array(
    'media[]'  => "@{$image};type=image/jpeg;filename={$name}",
    'status'   => $status,
  ),
  'multipart' => true,
));

$tmhOAuth->render_response();
