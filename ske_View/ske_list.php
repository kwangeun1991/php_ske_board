<div class="ske_board_list">
  <ul>
    <?php foreach ($list as $li) : ?>
      <li>
        <a class="subject" href="?dir=ske_board&file=ske_view&idx=<?=$li['idx']?>"><?=$li['subject']?></a>
        <div class="ske_poster_info">
          <?=$li['poster']?> /
          수정일 - <?=date("Y-m-d H:i:s", strtotime($li['modDt']?$li['modDt']:$li['regDt']))?> /
          작성일 - <?=date("Y-m-d H:i:s", strtotime($li['regDt']))?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<div class="btns">
  <a href="?dir=ske_board&file=ske_write">게시글 작성</a>
</div>
