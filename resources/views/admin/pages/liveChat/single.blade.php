@extends('admin.layouts.default_admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Чат</h2>
        </div>
    </div>
    <div class="edit-panel">
        <div class="row">
            <div class="col-md-12">
                <div class="chat-container">
                    <div class="row-chat row-chat-end">
                        <div class="message-a">
dsadas
                        </div>
                    </div>
                    <div class="row-chat">
                        <div class="message-b">
dsadsa
                        </div>
                    </div>
                    <div class="row-chat row-chat-end">
                        <div class="message-a">
                            dsadas
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="admin-chat-input"/>
                <button class="admin-chat-button"> > </button>
            </div>
        </div>
    </div>
@endsection
