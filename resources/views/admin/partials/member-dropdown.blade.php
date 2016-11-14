<h4 class="dropdown-header">
    <div class="user-banner clearfix">
        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::guard('member')->user()->email)) }}?s=64" class="rounded float-xs-left" style="width: 32px; margin-right: 0.5rem;">
        <div class="user-name">{{ Auth::guard('member')->user()->name }}</div>
        <div class="user-role">{{ Auth::guard('member')->user()->activeStoreRole->name }}</div>
    </div>
</h4>
<a class="dropdown-item" href="{{ route('glitter.admin.account.profile') }}">プロフィール</a>
<a class="dropdown-item" href="{{ route('glitter.admin.account.security') }}">セキュリティ</a>
<div class="dropdown-divider"></div>
@if(!Auth::guard('member')->user()->switchable_stores->isEmpty())
<h6 class="dropdown-header">ストアの切り替え</h6>
@foreach(Auth::guard('member')->user()->switchable_stores as $store)
<a class="dropdown-item" href="{{ route('glitter.admin.store_switch', $store) }}">{{ $store->name }} へ切り替える</a>
@endforeach
<div class="dropdown-divider"></div>
@endif
<a class="dropdown-item" href="#logout">ログアウト</a>
