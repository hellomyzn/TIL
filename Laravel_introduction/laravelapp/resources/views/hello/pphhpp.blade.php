<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>pphhpp</h1>
    <p>pphhpp</p>
    <ol>
    @php
        $counter=0;
    @endphp
    @while($counter < count($data))
        <li> {{ $data[$counter] }}</li>

    @php
        $counter++;
    @endphp
    @endwhile
    </ol>
</body>
</html>
