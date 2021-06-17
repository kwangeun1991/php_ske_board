<?php

if (!isset($in['idx']) || !$in['idx']) {
  msg("idx 없음", -1);
}

$ske_board = new ske_Board();

$data = $ske_board->get($in['idx']);

if (!$data) {
  msg("존재하지 않는 글", -1);
}


view("ske_view", $data);
