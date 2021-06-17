<?php

foreach(glob("ske_Core/*") as $file) {
  include_once $file;
}

foreach(glob("ske_Model/*") as $file) {
  include_once $file;
}

$db = new ske_DB();
