@extends($extends)

@section('title', 'ページが見つかりません')

@section('content')
<div class="error-screen">
    <div class="notfound">
        <h1 class="display-4"><i class="fa fa-exclamation-triangle fa-2x text-muted mb-2" aria-hidden="true"></i><br>404</h1>
        <hr class="my-2">
        <div class="lead px-1">ページが見つかりません</div>
    </div>
</div>
@endsection
