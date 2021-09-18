@extends('layout')
@section('title', 'ブログ詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{ $blog->title }}</h2><br>
        <p>{{ $blog->content }}</p><br>
        <span>投稿者：{{ $user[$blog->user_id-1]->name }}</span><br>
        <span>作成日：{{ $blog->created_at }}</span><br>
        <span>更新日：{{ $blog->updated_at }}</span>
    </div>
</div>
@endsection