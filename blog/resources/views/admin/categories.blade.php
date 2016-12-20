<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <a href="/admin/posts">Добавить запись</a>
        <div class="container">
            @include('common.errors')
            <h1 class="text-center"></h1><hr>
            <div class="text-left">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <input type="text" name="name" />
                    <input type="submit" value="Add new category">
                </form>
            </div>  
            <hr>
            @if($categories)
            @foreach ($categories as $category)

            <div class="messages">
                <div class="panel panel-default">			
                    <div class="panel-heading">
                        <h3 class="panel-title">			
                            <span>{{$category->name}} ID: {{$category->id}}</span>	</br>		
                            <div class="label label-info">{{$category->created_at}}</div>
                            <div>
                                <form action="categories/delete/{{ $category->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="btn btn-danger">Удалить категорию</button>
                            </form>
                            </div>
                        </h3>
                    </div>

                    
                </div>
                @endforeach      
                @endif
            </div>	

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>