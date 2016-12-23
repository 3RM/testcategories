<?php

var_dump($category);
?>
<form action="" method="post">
	{{ csrf_field() }}
    <input type="hidden" name="id" value="<?= $category['id'] ?>"/>
    <input type="text" name="name" value="<?= $category['name'] ?>">    
    <input type="submit" value="edit">
</form>