@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>Register a new Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewAdmin">Admins</a></li>
        <li class="breadcrumb-item active">Create a new Admin</li>
      </ol>
    </nav>
</div>


<div class="card p-4">
    <form action="/admin/addAdmin-submit" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-12 mb-3">
                <label>Name</label>
                <input type="text" placeholder="Username" name="name" class="form-control border-2 border-dark" autocomplete="off">
            </div>

            <div class="col-lg-6 col-12 mb-3">
                <label>Email</label>
                <input type="text" placeholder="E.g. test@gamil.com" name="email" class="form-control border-2 border-dark" autocomplete="off">
            </div>

            <div class="col-lg-6 col-12 mb-3">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control border-2 border-dark" autocomplete="off">
            </div>

            <div class="col-lg-6 col-12 mb-3">
                <label>Phone</label>
                <input type="text" placeholder="E.g. 0123456789" name="phone" class="form-control border-2 border-dark" autocomplete="off">
            </div>
            <div class="col-lg-6 col-12 mb-3">
                <label>Telegram</label>
                <input type="text" placeholder="E.g. https://t.me/@name" name="telegram" class="form-control border-2 border-dark" autocomplete="off">
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary w-100">Register Admin</button>
            </div>
        </div>
    </form>
</div>



@endsection