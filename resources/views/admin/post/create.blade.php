<h1>Cadastrar novo post</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route("post.store")}}" method="POST">
    @csrf
    <input type="text" name="title" id="title" placeholder="Titulo" value="{{old('title')}}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{old('content')}}</textarea>
    <button type="submit">Enviar</button>
</form>

