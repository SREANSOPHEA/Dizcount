@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>Admins</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewAdmin">Admins</a></li>
        <li class="breadcrumb-item active">View all Admins</li>
      </ol>
    </nav>
</div>


<div class="card p-4">
    <div class="text-end mb-3">
        <a href="/admin/addAdmin" class="btn btn-primary">+ Create a new Admin</a>
    </div>
    <div style="overflow-y: auto; ">
        <table class="table w-100 table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Phone</th>
                    <th>Telegram</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($items as $data)
                    <tr class="align-middle">
                        <td>{{$i++}}</td>
                        <td>{{$data['username']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>{{$data['password']}}</td>
                        <td><a href="tel:{{$data['phone']}}">{{$data['phone']}}</a></td>
                        <td><a href="{{$data['telegram']}}" target="_blank">{{$data['telegram']}}</a></td>
                        <td>
                            <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><a class="dropdown-item" href="/admin/editAdmin/{{$data['id']}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteAdmin({{$data['id']}})"><i class="bi bi-trash"></i> Delete</button></li>
                            </ul>
                        </div>
                        </td>
                    </tr>
                @endforeach
                {{-- @for ($i = 0; $i < 5; $i++)
                <tr class="align-middle">
                    <td>{{$i+1}}</td>
                    <td>Admin</td>
                    <td>Admin@gamil.com</td>
                    <td>123</td>
                    <td><a href="tel:0123456789">0123456789</a></td>
                    <td><a href="https://t.me/admin" target="_blank">https://t.me/admin</a></td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li><a class="dropdown-item" href="/admin/editAdmin/{{$i}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteAdmin({{$i}})"><i class="bi bi-trash"></i> Delete</button></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endfor --}}
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure to delete this admin?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-footer">
        <form action="/admin/deleteAdmin" method="post">
            @csrf
            <input type="text" name="id" class="invisible" id="deleteModelID">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function deleteAdmin(id){
        document.getElementById('deleteModelID').value = id;
    }
</script>
@endsection