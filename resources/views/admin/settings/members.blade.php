@extends('glitter::admin.layouts.admin')

@section('title', 'ストア設定')

@section('header')
<h1 class="title">
    <a href="{{ route('glitter.admin.settings.index') }}"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>ストア設定</a>
</h1>
@endsection

@section('nav')
@include('glitter::admin.settings.nav')
@stop

@section('content')
<div class="container ml-0">
    <div class="row">
        <div class="col-lg-3">
            <div class="py-2">
                <h5>メンバー</h5>
                <p>なんとかかんとかでこれをそうします。</p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="area p-1">
                <table class="table table-data mb-0">
                    <thead>
                        <tr>
                            <th colspan="2">メンバー</th>
                            <th>権限</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach ($members as $member)
                        <tr>
                            <td class="media"><img src="https://www.gravatar.com/avatar/{{ md5(strtolower($member->email)) }}?s=32" class="rounded"></td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->activeStoreRole->name }}</td>
                        </tr>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
