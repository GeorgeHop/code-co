@extends('user.layouts.default_user')

@section('content')
    <div id="messages"></div>
    <form id="send-message" action="{{ route('live-chat.send') }}" method="POST">
        @csrf
        <label>
            Message:
            <input type="text" name="message"/>
        </label>
        <button type="submit">Send</button>
    </form>

    <script src="/js/web.js"></script>
@endsection
