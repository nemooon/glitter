<ul class="nav">
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">ストア</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/members*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.members') }}">メンバー</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/authorization*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">権限</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/channels*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">チャネル</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/mails*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">メール</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/payments*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">支払</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/delivery*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">配送</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/tax*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">税率</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/tradelaw*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">特定商取引法</a></li>
    <li class="nav-item"><a class="nav-link{{ Request::is('admin/settings/audit-log*') ? ' active' : '' }}" href="{{ route('glitter.admin.settings.index') }}">監査ログ</a></li>
</ul>
