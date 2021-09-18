@extends('layout')
@section('title', 'ブログ一覧')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>ブログ記事一覧</h2>
        @if(session('err_msg'))
          <p class="text-danger">{{ session('err_msg') }}</p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>投稿者</th>
                <th>タイトル</th>
                <th>日付</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($blogs as $blog)
                <td>{{ $user[$blog->user_id-1]->name }}</td>
                <td><a href="./blog/{{ $blog->id }}">{{ $blog->title }}</a></td>
                <td>{{ $blog->updated_at }}</td>

                @if(Auth::user()->id == $blog->user_id)
                    <td><button type="button" class="btn-primary" onclick="location.href='./blog/edit/{{ $blog->id }}'">編集</button></td>

                    <form method="POST" action="{{ route('delete', $blog->id) }}" onSubmit="return checkDelete()">
                        @csrf
                        <td><button type="submit" class="btn-primary" onclick=>削除</button></td>
                    </form>
                @else
                   <td></td>
                   <td></td>
                @endif

            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection