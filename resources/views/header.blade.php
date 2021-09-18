<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" onClick="return onClick()" style="display:none">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="display:block">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="{{ route('blogs') }}">ブログ一覧 <span class="sr-only"></span></a>
    <a class="nav-item nav-link active" href="{{ route('create') }}">ブログ投稿</a>
    <a class="nav-item nav-link active" href="{{ route('userDetail') }}">ユーザー</a>
    <form action="{{ route('logout') }}" method="POST" class="header-form" onSubmit="return checkSubmit()">
        @csrf
        <button class="header-logout">ログアウト</button>
    </form>
    </div>
</div>
</nav>
<script>
function checkSubmit(){
    if(window.confirm('ログアウトしてよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>