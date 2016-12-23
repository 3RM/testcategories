<?php

//var_dump($post);
?>
<form action="" method="post">
	{{ csrf_field() }}
    <input type="hidden" name="id" value="<?= $post['id'] ?>"/>
	<input type="hidden" name="category_id" value="<?= $post['category_id'] ?>"/>
    <input type="text" name="name" value="<?= $post['title'] ?>">
	<input type="text" name="name" value="<?= $post['content'] ?>">    
    <input type="submit" value="edit">
</form>