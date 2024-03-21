<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{errors}}</li>
        @endforeach
    </ul>
    @endif
    </div>
    <h1>edit post</h1>
    <form action="/edit-post/{{$post->id}}", method="put">
    @csrf
    @method('put')
    <input type="text" name="title" value="{{$post->title}}"><br>
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
</form>
</body>
</html>