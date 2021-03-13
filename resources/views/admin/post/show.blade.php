<h1>Detealhes do post {{$post->title}}</h1>

<ul>
    <li><strong>{{$post->title}}</strong></li>
    <li><strong>{{$post->content}}</strong></li>
</ul>

<form action="{{route('post.destroy', $post->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit">Deletar o Post {{$post->title}}</button>
</form>
