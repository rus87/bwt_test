<h1>Просмотр отзывов</h1>
<?php foreach($feedbacks as $feedback): ?>
<p><strong><?php echo $feedback[2] ?>: </strong><?php echo $feedback[1] ?></p>
<?php endforeach ?>