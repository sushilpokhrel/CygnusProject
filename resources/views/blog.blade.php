<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Cygnus Nepal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{URL::TO('css/style.css')}}">
</head>

<body>
{{--Articles--}}
    <div class="container">
        <h1>Articles List</h1>
        @foreach($posts as $post)
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{URL::TO('photos/thumbnail/'.$post->picture)}}" alt="">
                        <div class="caption">
                            <h3>Post</h3>
                            <p>{!! $post -> post !!}</p>
                            <h4 class="pull-right">Posted by <br>{!! $post->name !!}</h4>
                            {{--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>



            @endforeach

    </div>

    {{--Post Form--}}
    <div class="container">
        <h2>Write Your Comment</h2>
        <hr>
        {!! Form::open(['files' => true,'action' => 'BlogController@store', 'method' => 'post']) !!}
            <div class="form-group">
                {!!  Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class' => 'form-control']) !!}
            </div>
        <div class="form-group">
            {!!  Form::label('picture','Profile Picture:') !!}
            {!! Form::file('picture',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!!  Form::label('post','Your Message:') !!}
            {!! Form::textarea('post',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add',null,['class' => 'form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <script src = {{URL::TO('js/tinymce/js/tinymce/tinymce.min.js')}}></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
</body>
</html>