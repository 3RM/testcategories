<?php
//var_dump($post);
?>
<form action="" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$post->id}}"/>
    <input type="text" name="title" value="{{$post->title}}"/>
    <input type="text" name="content" value="{{$post->content}}"/>
    <input type="text" name="category_id" value="{{$post->category_id}}"/>    
    <input type="submit" value="edit"/>
</form>