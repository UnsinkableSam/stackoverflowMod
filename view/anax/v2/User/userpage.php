<?php if ($res): ?>

<?php print_r($res); ?>
<?php print_r("<h1>" . $res[0]->email . "</h1>" ?? "<br><h3> No logged in </h3>"); ?>
<?php print_r("<h1>" . $res[0]->points . "</h1>"); ?>
<img src="<?php echo $avatar ?>" alt="Avatar">
<br>
<?php
  print_r($totalPoints);
  print_r($content); ?>

<?php endif ?>