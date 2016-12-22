<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
    </head>
    <body>
        <a href="uploadimage">Add image</a>
        <table><tr>
        @foreach($images as $image)
            <td>
                <img width="200px" height="200px" src="{{ asset('images/'.$image->url)}}" alt="">
            </td>
        @endforeach
        </tr>
        </table>
    </body>
</html>
