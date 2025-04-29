<?php  if (count($errors) > 0) : ?>
  <!--
 * File:   messages.php
 * Author: Iuri Gonçalves
 * Date:   2018
 -->
  <div class="msg">
  	<?php foreach ($errors as $error) : ?>
  	  <span><?php echo $error ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
