<body>
    <h1>Hello/is_set</h1>
    @isset($msg)
    <p> Hello, {{$msg}} san</p>
    @else
    <p>Write something</p>
    @endisset
    <form action="POST" action="/isset">
    {{ csrf_field()  }}
    <input type="text" name="msg">
    <input type="submit">
    </form>
</body>
