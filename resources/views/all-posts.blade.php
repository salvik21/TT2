<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div id="sidebar">
    <h3>50 newest post</h3>
    @foreach ($posts as $post)
        <h4>{{ $post['title'] }}</h4>
        <div class="tags">
            @foreach($post->tags as $tag)
                #{{ $tag->name }}
            @endforeach
        </div>
    @endforeach
</div>

<div id="main-content">
    @auth
        <a class="switch" href="/">Your Posts</a>
            @foreach ($posts as $post)
            <a class="view-post" href="view-post/{{$post->id}}"><div class="post_list">
                    <h3>{{ $post['title'] }}</h3>
                    <p>{{ $post['body'] }}</p>
                </div></a>
            @endforeach
    @endauth
</div>

<div id="user-info">
    @auth
        <p class="username">{{ Auth::user()->name }}</p>
        <p class="role">{{ Auth::user()->userType }}</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="logout" type="submit">Log out</button>
        </form>
        <button class="list-of-#">#-List</button>
        @if(Auth::user()->userType == "admin" || Auth::user()->userType == "creater")<a href="/create_post">Create post</a> @endif

        @if(Auth::user()->userType == "admin")<a href="/admin-users">Admin Section</a> @endif
    @else
        <a href="/registration/">Registration</a>
        <a href="/login/">Login</a>
    @endauth
</div>
</body>
</html>
