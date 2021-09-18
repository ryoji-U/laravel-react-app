@extends('layout')
@section('title', 'ユーザー')
@section('content')
    <div class="container">
        <div class="mt-5">
        <!--ログイン-->
        <x-alert type="success" :session="session('login_success')"/>
            <h3>プロフィール</h3>
            <ul>
                <li>名前：{{ Auth::user()->name }}</li>
                <li>メールアドレス：{{ Auth::user()->email }}</li>
            </ul>
        </div>
    </div>
@endsection