<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>middle</h1>
    <p>middle ware</p>
    <table>
    @foreach($data as $item)


        <tr>
            <th>{{ $item['name'] }}</th>
            <td>{{ $item['mail'] }}</td>
        </tr>
    @endforeach
    </table>

</body>
</html>
