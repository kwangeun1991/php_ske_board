<?php

class ske_Board
{
  private $db;
  private $params = [];

  public function __construct()
  {
    global $db;

    $this->db = $db;
  }

  public function data($params = [])
  {
    $this->params = $params;

    return $this;
  }

  public function validator($mode = 'write')
  {
    $required = [
      'poster' => '작성자는 필수입력입니다.',
      'subject' => '제목은 필수입력입니다.',
      'contents' => '내용은 필수입력입니다.',
    ];

    if ($mode == 'update') {
      $required['idx'] = '게시글 번호 확인필요';
    }

    foreach ($required as $col => $msg) {
      if (!isset($this->params[$col]) || !$this->params[$col]) {
        throw new Exception($msg);
      }
    }

    return $this;
  }

  public function write()
  {
    $sql = "INSERT INTO ske_board (poster, subject, contents)
                    VALUES (:poster, :subject, :contents)";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
    $stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
    $stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);

    $result = $stmt->execute();

    if (!$result) {
      return false;
    }

    $idx = $this->db->lastInsertId();

    return $idx;
  }

  public function get($idx)
  {
    $sql = "SELECT * FROM ske_board WHERE idx = :idx";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":idx", $idx, PDO::PARAM_INT);

    $result = $stmt->execute();

    if (!$result) {
      return [];
    }

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data;
  }

  public function getList()
  {
    $sql = "SELECT * FROM ske_board ORDER BY regDt desc";

    $stmt = $this->db->prepare($sql);

    $result = $stmt->execute();

    $list = [];
    if ($result) {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $list[] = $row;
      }
    }

    return $list;
  }

  public function update()
  {
    $sql = "UPDATE ske_board
                SET poster = :poster,
                    subject = :subject,
                    contents = :contents,
                    modDt = :modDt
              WHERE idx = :idx";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":poster", $this->params['poster'], PDO::PARAM_STR);
    $stmt->bindValue(":subject", $this->params['subject'], PDO::PARAM_STR);
    $stmt->bindValue(":contents", $this->params['contents'], PDO::PARAM_STR);
    $stmt->bindValue(":modDt", date("Y-m-d H:i:s"), PDO::PARAM_STR);
    $stmt->bindValue(":idx", $this->params['idx'], PDO::PARAM_INT);

    $result = $stmt->execute();

    return $result;
  }

  public function delete($idx)
  {
    $sql = "DELETE FROM ske_board WHERE idx = :idx";

    $stmt = $this->db->prepare($sql);

    $stmt->bindValue(":idx", $idx, PDO::PARAM_INT);

    $result = $stmt->execute();

    return $result;
  }

}
