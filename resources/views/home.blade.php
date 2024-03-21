<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth 
    <p>YOu are loggined in</p>
    <form action="/logout" method="post">
    @csrf
    <button>logout</button>
    </form>
    <div style="border: 1px solid blue;">
   
    <form action="/create-post" method="post">
    @csrf
        <input type="text" name="title" placeholder="post title">
        <br>
        <textarea name="body" placeholder="write your thoughts.."></textarea>
        <button>Upload</button>
    </form>
</div>
<div style="border: 2px solid blue;">
<h2> All Post</h2>
@foreach($posts as $post)
<div style="background-color: grey; padding:10px; margin:10px;">
    <h3>{{$post['title']}}</h3>
{{$post['body']}}
    <p><a href="/edit-post/{{$post->id}}">edit</a></p>
    <form action="/delete-post/{{$post->id}}" method="post">
    @csrf
    @method('DELETE')
    <buttton>Delete</buttton>
</form>


</div>
@endforeach
</div>
    
    @else
    <h1> Hello, welcome to ThoughtBook<h1>
    
    <div style="border: 1px blue solid;">
    <form action="/register" method="post">
    @csrf
    <h2>Register</h2>
    <input name="name" type="text" placeholder="name"> 
    <input name="email" type="text" placeholder="email">
    <input name="password" type="password" placeholder="password">
    <button class="btn-primary">Register</button>
    </form>
    
    </div>
<br> 
    <div style="border: 1px green solid;">
    <form action="/login" method="post">
    @csrf
    <h2>Log in</h2>
    <input name="loginname" type="text" placeholder="name"> 
    <input name="loginpassword" type="password" placeholder="password">
    <button>Log in</button>
    </form>

  
</div>
    
    
    @endauth

    
</body>
</html>