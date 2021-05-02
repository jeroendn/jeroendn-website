<?php
function get_file_dir($doc_name) {
  $file_dir = '../uploads/' . str_replace(' ', '_', $_SESSION['user_name']) . $_SESSION['user_id'] . '/' . $doc_name;
  return $file_dir;
}

function get_shared_file_dir($username, $user_id, $doc_name) {
  $file_dir = '../uploads/' . str_replace(' ', '_', $username) . $user_id . '/' . $doc_name;
  return $file_dir;
}

function file_size_calc($file_dir) {
  if(!file_exists($file_dir)) {
    echo 'No file found';
    return;
  }

  $file_size = filesize($file_dir);
  echo file_size_format($file_size);
}

function file_size_format($bytes) {
  if ($bytes >= 1073741824)
  {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  }
  elseif ($bytes >= 1048576)
  {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  }
  elseif ($bytes >= 1024)
  {
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  }
  elseif ($bytes > 1)
  {
    $bytes = $bytes . ' bytes';
  }
  elseif ($bytes == 1)
  {
    $bytes = $bytes . ' byte';
  }
  else
  {
    $bytes = ' bytes';
  }
  return $bytes;
}


// function get_shared_file($file_name, $shared_user_name, $shared_user_id) {
//   // session_start();
//   $dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
//   $file = $file_name;
//   $user = str_replace(' ', '_', $shared_user_name) . $shared_user_id;
//
//   $file_dir = $dir . $user . '/' . $file;
//
//   // echo $file_dir;
//   // echo $dir . $user . '/';
//
//   if(file_exists($file_dir)) {
//     // header('Content-Type: ' . mime_content_type($file_dir));
//     // header('Content-Type: image/png');
//     readfile($file_dir);
//     // imagepng($file_dir);
//
//
//     // file_get_contents($file_dir);
//     // echo file($file_dir);
//
//     // echo fopen($file,'r');
//     exit;
//   }
//   header("HTTP/1.0 404 Not Found");
// }
