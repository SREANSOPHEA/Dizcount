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
                @for ($i = 0; $i < 5; $i++)
                <tr class="align-middle">
                    <td>{{$i+1}}</td>
                    <td>Rice Express</td>
                    <td>Fried Rice</td>
                    <td><img src="{{asset('assets/img/rice.jpg')}}" class="rounded" style="height: 75px" alt="food image"></td>
                    <td>$ 2.5</td>
                    <td>10%</td>
                    <td>3-Mar-2026</td>
                    <td>5-Mar-2026</td>
                    <td>
                        <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li><a class="dropdown-item" href="/admin/viewPost/{{$i}}"><i class="bi bi-eye"></i> View Detail</a></li>
                        <li><a class="dropdown-item" href="/admin/EditPost/{{$i}}"><i class="bi bi-pencil-square"></i> Edit</a></li>
                        <li><a class="dropdown-item" href="/admin/DeletePost/{{$i}}"><i class="bi bi-trash"></i> Delete</a></li>
                        </ul>
                    </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>


<script>
    document.getElementById('from_date').addEventListener('change', function() {
        let fromDate = this.value;
        document.getElementById('to_date').min = fromDate;
        document.getElementById('to_date').value = fromDate;

        // If to_date is currently less than from_date, clear it
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