@extends('admin.adminMasterPage')
@section('content')
<div class="pagetitle">
    <h1>View All Posts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/viewPost">Admin</a></li>
        <li class="breadcrumb-item active">Post Records</li>
      </ol>
    </nav>
</div>

<div class="card p-4">
    <div class="row">
        <div class="col-12 text-end ">
            <label class="form-label" for="filter-shop">Filter by shop</label>
            <select name="filter-by-shop">
                <option value="all-shop">All Shop</option>
                <option value="Rice express">Rice Express</option>
                <option value="Heekcaa">Heekcaa</option>
            </select>
        </div>
        <div class="col-12 text-end">
            <label class="form-label" for="filter-shop">From</label>
            <input type="date" name="start-date" value="{{date('Y-m-d')}}" id="from_date">
            <label class="form-label" for="filter-shop">To</label>
            <input type="date" name="end-date" value="{{date('Y-m-d')}}" id="to_date">
        </div>
        <div class="col-6 mb-3"></div>
        <div class="col-6 mb-3">
            <input type="text" class="form-control  border-dark" placeholder="Search.....">
        </div>
    </div>

    <div style="overflow-y: auto; ">
        <table class="table w-100 table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>N<sup>o</sup></th>
                    <th>Shop</th>
                    <th>Food</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($datas as $data)
                <tr class="align-middle">
                    <td>{{$data[0]}}</td>
                    <td>{{$data[1]}}</td>
                    <td>Fried Rice</td>
                    <td><img src="{{asset("assets/img/$data[3]")}}" class="rounded" style="height: 75px" alt="food image"></td>
                    <td>$ {{$data[4]}}</td>
                    <td>{{$data[5]}}</td>
                    <td>{{$data[6]}}</td>
                    <td>{{$data[7]}}</td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="/admin/viewPost/{{$data[0]}}"><i class="bi bi-eye"></i> View Detail</a></li>
                        <li><a class="dropdown-item" href="/admin/EditPost/{{$data[0]}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="/admin/DeletePost/{{$data[0]}}"><i class="bi bi-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


<script>

    // Use to control Date (start date can not smaller than end date)
    document.getElementById('from_date').addEventListener('change', function() {
        let fromDate = this.value;
        document.getElementById('to_date').min = fromDate;
        document.getElementById('to_date').value = fromDate;

        let toDate = document.getElementById('to_date').value;
        if (toDate < fromDate) {
            document.getElementById('to_date').value = '';
        }
    });

    // Set initial min value if from_date already has a value
    window.onload = function() {
        let fromDate = document.getElementById('from_date').value;
        if (fromDate) {
            document.getElementById('to_date').min = fromDate;
        }
    };
</script>

@endsection