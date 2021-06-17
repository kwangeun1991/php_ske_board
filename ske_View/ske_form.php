<form action="?dir=ske_board&file=ske_indb" method="post" target="ifrmHidden" autocomplete="off" class="ske_board_form">
  <input type="hidden" name="mode" value="<?=isset($idx)?'update':'write'?>">
  <?php if (isset($idx)) : ?>
    <input type="hidden" name="idx" value="<?=$idx?>">
  <?php endif; ?>
  <dl>
    <dt><작성자><br>
      (글쓴이)</dt>
    <dd>
      <input type="text" name="poster" value="<?=isset($poster)?$poster:''?>">
    </dd>
  </dl>
  <dl>
    <dt>제목</dt>
    <dd>
      <input type="text" name="subject" value="<?=isset($subject)?$subject:''?>">
    </dd>
  </dl>
  <dl>
    <dt>내용</dt>
    <dd>
      <textarea name="contents"><?=isset($contents)?$contents:''?></textarea>
    </dd>
  </dl>
  <input type="submit" value="<?=isset($idx)?'글수정':'글작성'?>완료">
</form>
