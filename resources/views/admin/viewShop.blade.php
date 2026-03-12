@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>View All Shops</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewShop">Shops</a></li>
        <li class="breadcrumb-item active">View all Shops</li>
      </ol>
    </nav>
</div>


<div class="card p-4">
    <div class="text-end mb-3">
        <a href="/admin/addShop" class="btn btn-primary">+ Register a new Shop</a>
    </div>
    <div style="overflow-y: auto; ">
        <table class="table w-100 table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Shop</th>
                    <th>Image</th>
                    <th>Phone</th>
                    <th>Telegram</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($items as $data)
                    <tr class="align-middle">
                    <td>{{$i++}}</td>
                    <td>{{$data['name']}}</td>
                    <td><img src="{{asset('assets/img/'.$data['logo_url'])}}" class="rounded" style="height: 75px" alt="food image"></td>
                    <td><a href="tel:{{$data['phone']}}">{{$data['phone']}}</a></td>
                    <td><a href="{{$data['telegram']}}">{{$data['telegram']}}</a></td>
                    <td><a href="{{$data['location']}}">Location</a></td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="/admin/viewShop/{{$data['id']}}"><i class="bi bi-eye"></i> View Detail</a></li>
                        <li><a class="dropdown-item" href="/admin/editShop/{{$data['id']}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="/admin/DeleteShop/{{$data['id']}}"><i class="bi bi-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection