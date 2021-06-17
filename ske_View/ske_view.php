<div class="ske_board_view">
  <dl>
    <dt>제목</dt>
    <dd><?=$subject?></dd>
  </dl>
  <dl>
    <dt>내용</dt>
    <dd><?=nl2br($contents)?></dd>
  </dl>
  <dl>
    <dt>작성자</dt>
    <dd><?=$poster?> / <?=date("Y-m-d H:i:s", strtotime($modDt?$modDt:$regDt))?></dd>
  </dl>
</div>

<div class="btns">
  <a href="?dir=ske_board&file=ske_write">게시글 쓰기</a>
  <a href="?dir=ske_board&file=ske_update&idx=<?=$idx?>">게시글 수정</a>
  <a href="?dir=ske_board&file=ske_indb&mode=delete&idx=<?=$idx?>" target="ifrmHidden" onclick="return confirm('정말 삭제합니까?');">게시글 삭제</a>
  <a href="?dir=ske_board&file=ske_list">게시글 목록</a>
</div>
