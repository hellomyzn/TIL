@section('content')
    <p>This is contents</p>
    <p>You can write here</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            displying the messages
        @endslot
    @endcomponent
@endsection

