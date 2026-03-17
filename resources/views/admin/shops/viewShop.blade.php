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
                    <td><a href="https://www.google.com/maps/dir/?api=1&destination={{$data['location']}}" target="_blank">View Location</a></td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#socialMediaModal" onclick="socialMediaShop({{$data['id']}})"><i class="bi bi-plus-lg"></i> Social Media</button></li>
                            <li><a class="dropdown-item" href="/admin/viewShop/{{$data['id']}}"><i class="bi bi-eye"></i> View Detail</a></li>
                            <li><a class="dropdown-item" href="/admin/editShop/{{$data['id']}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deleteShop({{$data['id']}})"><i class="bi bi-trash"></i> Delete</button></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure to delete this Shop?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-footer">
        <form action="/admin/deleteShop" method="post">
            @csrf
            <input type="hidden" name="id" id="deleteModelID">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="socialMediaModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Socail Media to the Shop</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/admin/addShopSocial" method="post">
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <label>Platform</label>
                    <select name="platform" class="form-control border-2 border-dark">
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="TikTok">TikTok</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-12">
                    <label>Socail Media Link:</label>
                    <input type="text" name="link" class="form-control border-2 border-dark" placeholder="Link">
                    <input type="hidden" name="id" id="ShopSocialMediaID">
                </div>
            </div>
    </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function deleteShop(id){
        document.getElementById('deleteModelID').value = id;
    }
    function socialMediaShop(id){
        document.getElementById('ShopSocialMediaID').value = id;
    }
</script>

@endsection