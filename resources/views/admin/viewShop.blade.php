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
    <div class="row">
        <div class="col-6 mb-3"></div>
        <div class="col-6 mb-3">
            <input type="text" class="form-control border-2 border-dark" placeholder="Search...">
        </div>
    </div>

    <div style="overflow-y: auto; ">
        <table class="table w-100 table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Shop</th>
                    <th>Image</th>
                    <th>Total Post</th>
                    <th>Active Post</th>
                    <th>Pending Post</th>
                    <th>Expire Post</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 5; $i++)
                <tr class="align-middle">
                    <td>{{$i+1}}</td>
                    <td>Rice Express</td>
                    <td><img src="{{asset('assets/img/rice.jpg')}}" class="rounded" style="height: 75px" alt="food image"></td>
                    <td>10</td>
                    <td>3</td>
                    <td>1</td>
                    <td>6</td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="/admin/viewShop/{{$i}}"><i class="bi bi-eye"></i> View Detail</a></li>
                        <li><a class="dropdown-item" href="/admin/EditShop/{{$i}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="/admin/DeleteShop/{{$i}}"><i class="bi bi-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>



@endsection