<body>
    <h1>Blade/Foreach</h1>
    <p>foreach </p>
    <ol>
        @foreach($data as $item)
        <li>{{$item}}</li>
        @endforeach
    </ol>
</body>
