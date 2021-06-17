<?php

if (!isset($in['idx']) || !$in['idx']) {
  msg("수정 - idx 없음", -1);
}

$ske_board = new ske_Board();

$data = $ske_board->get($in['idx']);

if (!$data) {
  msg("게시글 없음 - 수정", -1);
}

view("ske_form", $data);
