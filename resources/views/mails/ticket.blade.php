<table>
    <tr>
        <td>Здравствуйте {{ $ticket->user->name }}, вы создали тикет:</td>
    </tr>
    <tr>
        <th>{{ $ticket->name }}</th>
    </tr>
    <tr>
        <td>{{ $ticket->description }}</td>
    </tr>
    <tr>
        <td>Ответ:</td>
    </tr>
    <tr>
        <td>{{ $answer }}</td>
    </tr>
</table>
