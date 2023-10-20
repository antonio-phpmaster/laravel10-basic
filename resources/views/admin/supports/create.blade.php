<h1>Nova Duvida</h1>

<form action="{{ route('supports.store') }}" method="POST">

{{--    <input type="text" value="{{ csrf_token() }}" name="_token">--}}
    @csrf
    <input type="text" placeholder="Assunto" name="subject">
    <textarea cols="30" rows="5" name="body">Descriçao</textarea>
    <button type="submit">Enviar</button>
</form>
