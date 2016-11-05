@extends('glitter::layouts.admin')

@section('title', 'Admin')

@section('content')
<header class="header">
    <div class="header-title float-xs-left">Customers</div>
    <div class="btn-toolbar float-xs-right" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Add Customer</button>
      </div>
    </div>
</header>

<div class="p-1">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs float-xs-left">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All Customers</a>
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
                        <th>Name</th>
                        <th>Location</th>
                        <th>Orders</th>
                        <th>Last Order</th>
                        <th>Total Spent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>Keisuke Nemoto</td>
                        <td>Tokyo, JP</td>
                        <td>0</td>
                        <td>-</td>
                        <td>&yen; 0</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>Keisuke Nemoto</td>
                        <td>Tokyo, JP</td>
                        <td>0</td>
                        <td>-</td>
                        <td>&yen; 0</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>Keisuke Nemoto</td>
                        <td>Tokyo, JP</td>
                        <td>0</td>
                        <td>-</td>
                        <td>&yen; 0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
