<a href="{{route("post.create")}}">Criar um novo post</a>
<hr>
<form action="{{route('post.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="Pesquisar" value="{{$filters ?? ""}}">
    <button type="submit">Filtrar</button>
</form>
<hr>
<h1>Posts</h1>

@foreach ($posts as $post)
    <p>{{$post->title}} - [<a href="{{route('post.show', $post->id)}}">Ver</a>] - [<a href="{{route('post.edit', $post->id)}}">Editar</a>]</p>
@endforeach
<hr>
@if (isset($filters))
    {{$posts->appends($filters)->links()}}
@else
    {{$posts->links()}}
@endif

