<?php
function get_domain_name() {
  return $_SERVER['HTTP_HOST'];
}

function get_page_title() {
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $current_page_title = basename($url);

  if ($current_page_title == get_domain_name()) {
    $current_page_title = 'home';
  }

  return ' - ' . $current_page_title;
}
