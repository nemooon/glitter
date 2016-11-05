@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-xs-left">Orders</div>
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Create Order</button>
      </div>
    </div>
</header>

<div class="p-1">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs float-xs-left">
                <li class="nav-item">
                    <a class="nav-link active" href="#">すべて</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">オープン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">未発送</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">未払い</a>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <div class="mb-1">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Filter">
            </div>
            </div>
            <table class="table table-hover small mb-0">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Payment status</th>
                        <th>Fulfillment status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>#1001</td>
                        <td>2 minites ago</td>
                        <td>Keisuke Nemoto</td>
                        <td>Paid</td>
                        <td>Unfulfilled</td>
                        <td>&yen; 3,624</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>#1001</td>
                        <td>2 minites ago</td>
                        <td>Keisuke Nemoto</td>
                        <td>Paid</td>
                        <td>Unfulfilled</td>
                        <td>&yen; 3,624</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>#1001</td>
                        <td>2 minites ago</td>
                        <td>Keisuke Nemoto</td>
                        <td>Paid</td>
                        <td>Unfulfilled</td>
                        <td>&yen; 3,624</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
