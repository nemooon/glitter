@extends('glitter::admin.layouts.admin')

@section('title', 'ホーム')

@section('content')
<div class="area mb-2">
    Chart report
</div>
<div class="row">
    <div class="col-lg-7">
        <div class="lead text-muted mb-1">Timeline</div>
        <div class="card">
            <div class="card-block">
                <p class="card-text"><strong>やったー！🎉</strong><br>1件の新しい受注が入っています。</p>
                <a href="#" class="card-link">確認する</a>
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                もうすぐクリスマスシーズンです。🎄<br>セールの準備をしましょう！⛄
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                ネモトさんが新しいクーポンを登録しました！
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                Event
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="area mb-2">Widgets</div>
        <div class="area mb-2">Widgets</div>
        <div class="area mb-2">Widgets</div>
    </div>
</div>
@endsection
