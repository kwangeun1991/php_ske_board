<?php

function view($fileName, $params = [])
{
  extract($params);

  include __DIR__ . "/../ske_View/ske_header.php";
  include __DIR__ . "/../ske_View/".$fileName . ".php";
  include __DIR__ . "/../ske_View/ske_footer.php";
}

function msg($msg, $action = 0, $target = 'self')
{
  echo "<script>alert('{$msg}');</script>";

  if ($action) {
    if (is_numeric($action)) {
      echo "<script>{$target}.history.go({$action});</script>";
    } else {
      echo "<script>{$target}.location.href='{$url}';</script>";
    }
  }
  exit;
}

function go($url, $target = 'self')
{
  echo "<script>{$target}.location.href='{$url}';</script>";
  exit;
}

function debug($v)
{
  echo "<xmp>";
  print_r($v);
  echo "</xmp>";
}
