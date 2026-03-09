@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Category</a></li>
        <li class="breadcrumb-item active">View All Categoies</li>
      </ol>
    </nav>
</div>


<div class="card p-4">
    <div class="row mb-3">
        <div class="col-6"></div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                + Add a new Category
            </button>
        </div>
    </div>
    <div style="overflow-y: auto; ">
        <table class="table w-100 table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 5; $i++)
                <tr class="align-middle">
                    <td>{{$i+1}}</td>
                    <td>Fast food</td>
                    <td>.......................................</td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="/admin/categoryEdit/{{$i}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteCategory"><i class="bi bi-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>



{{-- Add New Category Modal --}}
<div class="modal fade" id="addCategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create a new Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
            <div class="col-12">
                <label>Name</label>
                <input type="text" class="form-control border-2 border-dark">
            </div>
            <div class="col-12">
                <label>Description</label>
                <textarea class="form-control border-2 border-dark" id="" ></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
</div>


{{-- Delete Modal --}}
<div class="modal fade" id="deleteCategory" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Are you sure to delete this Category?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
</div>
@endsection