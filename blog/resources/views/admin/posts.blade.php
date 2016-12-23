<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>

        <a href="/admin/categories">Добавить категорию</a>

        <div class="container">
            @include('common.errors')
            <h1 class="text-center"></h1><hr>
            <div class="text-center">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <b>Title:</b><input type="text" name="title" />
                    <b>Content:</b><input type="text" name="content" />
                    <b>Category:</b><select size="1" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Добавить запись">
                </form>
            </div>     
            <hr>
            @if($posts)
            @foreach ($posts as $post)

            <div class="messages">
                <div class="panel panel-default">			
                    <div class="panel-heading">
                        <h3 class="panel-title">			
                            <span>{{$post->title}}</span>			
                            <span class="pull-right label label-info">{{$post->created_at}}</span>			
                        </h3>
                    </div>

                    <div class="panel-body">
                        Category: {{$post->category_id}}
                        <hr/>
                        {{$post->content}}
                        <div class="pull-right">
						<div><a href="posts/editpost/{{ $post->id }}">Редактировать</a></div>
                            <form action="posts/delete/{{ $post->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-danger">Удалить запись</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach      
                @endif
            </div>    


            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>