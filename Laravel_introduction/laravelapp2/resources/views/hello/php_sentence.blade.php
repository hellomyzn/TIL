<body>
    <h1>Blade/php_sentence</h1>
    <p>php</p>
    <ol>
    @php
        $counter = 0;
    @endphp

    @while($counter < count($data))
        <li>{{$data[$counter]}}</li>
    @php
        $counter++;
    @endphp
    @endwhile
        <li>from here</li>
    </ol>
</body>
