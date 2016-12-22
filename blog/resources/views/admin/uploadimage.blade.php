<!DOCTYPE html>
<html>
    <head>
        <title>Upload Image</title>
    </head>
    <body>
        <a href="gallery">Gallery</a><br/><br/>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="image" >
            <input type="submit" value="Upload image"/>
        </form>
    </body>
</html>
