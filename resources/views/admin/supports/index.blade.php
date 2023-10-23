<h1>Listagem dos suportes</h1>
<a href="{{ route('supports.create') }}">Nova Duvida</a>
<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descriçao</th>
        <th></th>
    </thead>
    <tbody>
    @foreach($supports as $support)
        <tr>
            <td>{{ $support->subject }}</td>
            <td>{{ $support->status }}</td>
            <td>{{ $support->body }}</td>
            <td>
{{--                <a href="{{ route('supports.show', [$support->id]) }}">ir</a>--}}
                <a href="{{ route('supports.show', $support->id) }}">ir</a>
            </td>
        </tr>
    @endforeach
    </tbody>
{{--    {{ $xss }} Protege de ataques XSS.--}}
{{--    <?=$xss?> Nao protege de ataques XSS--}}


</table>
