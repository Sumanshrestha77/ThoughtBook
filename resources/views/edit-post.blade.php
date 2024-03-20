<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>edit post</h1>
    <form action="/edit-post/{{$post->id}}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{$post->title}}"><br>
    <textarea name="body">{{$post->body}}</textarea>
    <button>Save Changes</button>
</form>
</body>
</html>