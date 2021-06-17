<?php

$ske_board = new ske_Board();

try {
  switch ($in['mode']) {
    case "write" :
      $idx = $ske_board->data($in)->validator()->write();

      if ($idx === false) {
        throw new Exception("글 생성 안됨 - idx");
      }

      go("?dir=ske_board&file=ske_view&idx={$idx}", "parent");

      break;

    case "update" :
      $result = $ske_board->data($in)->validator('update')->update();

      if (!$result) {
        throw new Exception("게시글 수정 안됨");
      }

      go("?dir=ske_board&file=ske_view&idx={$in['idx']}", "parent");

      break;

    case "delete" :
      if (!isset($in['idx']) || !$in['idx']) {
        throw new Exception("해당 게시글이 없음 - 삭제");
      }

      $result = $ske_board->delete($in['idx']);

      if (!$result) {
        throw new Exception("게시글 삭제 안됨");
      }

      go("?dir=ske_board&file=ske_list", "parent");

      break;
  }
} catch (Exception $e) {
  msg($e->getMessage());
}
