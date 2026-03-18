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
            <select name="filter-by-shop" id="filterShop">
                <option value="all">All Shop</option>
                @foreach ($shops as $data)
                    <option value="{{$data['name']}}">{{$data['name']}}</option>
                @endforeach
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
            <input type="text" id="searchFoodName" class="form-control  border-dark" placeholder="Search by Food.....">
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
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Discount Detail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($posts as $data)
                <tr class="align-middle postData" data-shop="{{ $data->shop->name }}" data-food="{{ $data->purchase_item }}" data-start="{{ $data->start_date }}" data-end="{{ $data->end_date }}">
                    <td class="fw-semibold text-muted">{{ $i++ }}</td>
                    <td class="fw-semibold">{{ $data->shop->name }}</td>
                    <td>{{ $data->purchase_item }}</td>
                    <td>
                        <img src="{{ asset('assets/img/'.$data->purchase_img) }}" class="rounded shadow-sm" style="height:65px;width:65px;object-fit:cover" alt="{{ $data->purchase_item }}">
                    </td>
                    <td class="fw-semibold text-success">{{$data->currency == "dollar"?"$":'៛'}} {{ number_format($data->price, $data->currency=='dollar'?'2':'0') }}</td>
                    <td><span class="badge bg-dark">{{ $data->purchase_quantity }}</span></td>

                    <td>
                        @if ($data->discount_type == 'percentage')
                            <span class="badge bg-success px-3 py-2">% Discount</span>
                        @else
                            <span class="badge bg-primary px-3 py-2">Free Item</span>
                        @endif
                    </td>

                    <td>{{ \Carbon\Carbon::parse($data->start_date)->format('d-M-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->end_date)->format('d-M-Y') }}</td>

                    <td>
                        @if($data->discount_type == 'percentage')

                            @php
                                $total = floatval($data->price) * intval($data->purchase_quantity);
                                $discount = $data->discount_percentage->discount;
                                $finalPrice = $total - ($total * $discount / 100);
                            @endphp

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success px-2 py-2">
                                    {{ $discount }}% OFF
                                </span>

                                <span class="fw-semibold text-danger">
                                    →   {{$data->currency == "dollar"?"$":'៛'}} {{ number_format($finalPrice, $data->currency=='dollar'?'2':'0') }}
                                </span>
                            </div>

                        @else

                            <div class="d-flex align-items-center p-2 border rounded bg-light">

                                <img src="{{ asset('assets/img/'.$data->discount_free->free_img) }}" class="rounded me-3" style="height:55px;width:55px;object-fit:cover" alt="{{ $data->discount_free->free_item }}">

                                <div>
                                    <div class="fw-semibold">
                                        {{ $data->discount_free->free_item }}
                                    </div>

                                    <small class="text-muted">
                                        QTY: {{ $data->discount_free->free_quantity }}
                                    </small>
                                </div>

                            </div>

                        @endif

                    </td>

                    <td>
                        <div class="filter">
                            <a class="icon text-dark" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots fs-5"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">

                                <li>
                                    <a class="dropdown-item" href="/admin/view/{{$data->discount_type == "percentage"?'Percentage':'FreeItem'}}Discount/{{ $data->id }}">
                                        <i class="bi bi-eye me-2 text-primary"></i> View Detail
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="/admin/Edit/discountPost/{{ $data->id }}">
                                        <i class="bi bi-pencil-square me-2 text-warning"></i> Edit
                                    </a>
                                </li>

                                <li>
                                    <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="deletePost({{$data['id']}})">
                                        <i class="bi bi-trash me-2"></i> Delete
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
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
        <form action="/admin/delete/discountPost" method="post">
            @csrf
            <input type="hidden" name="id" id="deleteModelID">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger"  >Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function deletePost(id){
        document.getElementById('deleteModelID').value = id;
    }

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $("#filterShop").change(function(){
            var shopValue = $("#filterShop").val();

            // First hide all rows
            $('.postData').hide();

            if (shopValue != 'all'){
                // Show rows where data-shop matches the selected value
                $('.postData').each(function() {
                    if ($(this).data('shop') == shopValue) {
                        $(this).show();
                    }
                });
            } else {
                // Show all rows
                $('.postData').show();
            }
        });


        $("#searchFoodName").on("keyup", function () {

            var search = $(this).val().toLowerCase().trim();

            $(".postData").each(function () {
                var food = $(this).data("food").toLowerCase();

                if (food.includes(search)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

        });

        $("#from_date, #to_date").on("change", function () {

            var from = $("#from_date").val();
            var to = $("#to_date").val();

            $(".postData").each(function () {

                var start = $(this).data("start");
                var end = $(this).data("end");

                if (start >= from && end <= to) {
                    $(this).show();
                } else {
                    $(this).hide();
                }

            });

        });
    });
</script>

@endsection