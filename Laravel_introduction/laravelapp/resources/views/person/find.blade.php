<form action="/person/find" method="post">
{{csrf_field() }}
<input type="text" name="input" value="{{ $input }}">
<input type="submit" value="find">
</form>
@if (isset($item))
<table>
    <tr>
        <th>Data</th>
    </tr>
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
</table>
    
@endif
