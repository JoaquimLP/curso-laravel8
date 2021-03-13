<h1>Detealhes do post {{$post->title}}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route("post.update", $post->id)}}" method="POST">
    @method("PUT")
    @csrf
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{$post->title}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{$post->content}}</textarea>
    <button type="submit">Enviar</button>
</form>
