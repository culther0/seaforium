<?php header('Content-Type: application/json') ?>

<?php $information_out = array_merge((array)$information, array(
  'thread_id' => (int)$information->thread_id,
  'created' => date(DateTime::ISO8601, strtotime($information->created)),
)) ?>

<?php $comments_out = array() ?>

<?php foreach ($comments as $row): ?>
  <?php $comment_out = array_merge((array)$row, array(
    'created' => date(DateTime::ISO8601, $row->created),
    'comment_id' => (int)$row->comment_id,
    'deleted' => '1' === $row->deleted,
  )) ?>

  <?php $comments_out[] = $comment_out ?>
<?php endforeach ?>

<?php echo json_encode(array(
  'information' => $information_out,
  'comments'    => $comments_out,
  'pagination'  => $pagination,
)) ?>