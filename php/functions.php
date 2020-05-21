<?php
function getDomainName() {
  return $_SERVER['HTTP_HOST'];
}

function getPageTitle() {
  $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $currentPageTitle = basename($url);

  if ($currentPageTitle == getDomainName()) {
    $currentPageTitle = 'home';
  }

  return $currentPageTitle;
}
