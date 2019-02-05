<?php
class Comments extends DB {
  function get($pid = 0) {
    // get() : get all comments for the given post
    // PARAM $pid : post ID

    $sql = "SELECT * FROM `comments` WHERE `post_id`=? ORDER BY `reply_id`";
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute([$pid]);
    $comments = [];
    while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
      if (is_numeric($row['reply_id'])) {
        $comments[$row['reply_id']]['reply'][$row['comment_id']] = $row;
      } else {
        $comments[$row['comment_id']] = $row;
      }
    }
    return count($comments) > 0 ? $comments : false;
  }

  function add($pid, $name, $message, $rid) {
  // add() : add new comment
  // PARAM $pid : post ID
  //       $name : name
  //       $message : comment message
  //       $rid : reply id

    $fields = "`post_id`, `name`, `message`";
    $values = "?, ?, ?";
    $cond = [$pid, $name, $message];
    if (is_numeric($rid)) {
      $fields .= ", `reply_id`";
      $values .= ", ?";
      $cond[] = $rid;
    }
    $sql = "INSERT INTO `comments` ($fields) VALUES ($values);";
    return $this->exec($sql, $cond);
  }

  function edit($cid, $name, $message) {
  // edit() : update a comment
  // PARAM $cid : comment id
  //       $name : name
  //       $message : comment message

    $sql = "UPDATE `comments` SET `name`=?, `message`=? WHERE `comment_id`=?;";
    return $this->exec($sql, [$name, $message, $cid]);
  }

  function delete($cid) {
  // delete() : delete a comment
  // PARAM $cid : comment ID

    $this->start();
    $pass = $this->exec("DELETE FROM `comments` WHERE `comment_id`=?;", [$cid]);
    if ($pass) {
      $pass = $this->exec("DELETE FROM `comments` WHERE `reply_id`=?;", [$cid]);
    }
    $this->end($pass);
    return $pass;
  }
}
?>