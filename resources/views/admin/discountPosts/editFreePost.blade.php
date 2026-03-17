@extends('admin.adminMasterPage')
@section('content')
  <style>

    .get-free-text{
        /* width: 80%; */
        /* border: 3px solid black; */
        background-color: rgba(38, 38, 44, 0.5);
        margin: 20px 0;
    }
    .get-free-text h3{
        color: white;
    }
    .box {
      background: #fff;
      border-radius: 16px;
      padding: 30px;
      width: 100%;
      border: 2px solid black;
      /* box-shadow: 0 4px 20px rgba(0,0,0,0.1); */
      text-align: center;
    }

    h3 { margin: 0 0 16px; color: #222; }

    /* Drop zone */
    #drop-zone1,#drop-zone2 {
      border: 2px dashed #ccc;
      border-radius: 12px;
      padding: 30px 16px;
      cursor: pointer;
      transition: all 0.2s;
      color: #888;
      font-size: 14px;
    }

    #drop-zone1:hover,,#drop-zone2:hover,
    #drop-zone1.drag-over,#drop-zone2.drag-over {
      border-color: #e07a3a;
      background: #fff7f3;
      color: #e07a3a;
    }

    #drop-zone1 .icon,#drop-zone2 .icon { font-size: 36px; margin-bottom: 8px; }

    /* Select button */
    button {
      margin-top: 14px;
      padding: 10px 24px;
      background: #e07a3a;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s;
    }
    button:hover { opacity: 0.85; }

    /* Preview */
    #preview1,#preview2  { display: none; margin-top: 16px; }

    #preview1 img,#preview2 img  {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e07a3a44;
    }

    #preview1 .actions,#preview2 .actions {
      display: flex;
      gap: 8px;
      margin-top: 10px;
      justify-content: center;
    }

    #preview1 .actions button,#preview2 .actions button { margin: 0; font-size: 12px; padding: 8px 16px; }
    #btn-remove1, #btn-remove2 { background: #e05050; }

    #file-name1,#file-name2 {
      font-size: 11px;
      color: #aaa;
      margin-top: 8px;
    }
  </style>

<div class="pagetitle">
    <h1>Upload Post</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/uploadPost/">Post</a></li>
        <li class="breadcrumb-item active">Upload Post</li>
      </ol>
    </nav>
</div>


<div class="card p-3">
    <form action="/admin/edit/discountPost/free/{{$data->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-12 mb-3">
                    <label><b>Food Image:</b></label>
                    <center>
                        <div class="box" >
                            <input type="checkbox" name="isDeletePurchase" id="isDeleteImage1" hidden  name="isDeletePurchase">
                           <div id="drop-zone1" style="display: none">
                               <div class="icon"><i class="bi bi-image"></i></div>
                               <div>Drag & drop an image here</div>
                           </div>

                            <!-- Select Button -->
                            <button type="button" style="display: none" id="select-btn1">Select Image</button>
                            <input type="file" name="image" id="file-input1" accept="image/*" hidden />

                            <!-- Preview -->
                            <div id="preview1" style="display: block">
                                <input type="hidden" value="{{$data->purchase_img}}" name="old_image_purchase">
                                <img id="preview-img1" src="{{asset('assets/img/'.$data->purchase_img)}}" alt="Preview" />
                                <div id="file-name1">{{$data->purchase_img}}</div>
                                <div class="actions">
                                <button type="button" id="btn-change1"><i class="bi bi-arrow-repeat"></i> Change</button>
                                <button type="button" id="btn-remove1"><i class="bi bi-trash"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col-lg-8 col-12 ">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label ><b>Shop:</b></label>
                            <select name="shop" class="form-select border-2 border-dark select2" >
                                @foreach ($shops as $shop)
                                    <option value="{{$shop['id']}}" {{$shop['id']==$data['shop_id']?'selected':''}}>{{$shop['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6 mb-3">
                            <label><b>Item Name:</b></label>
                            <input type="text" name="name" value="{{$data->purchase_item}}" placeholder="Food Name" class="form-control border-2 border-dark">
                        </div>

                        <div class="col-6 mb-3">
                            <label><b>Original Price:</b></label>
                            <div class="input-group">
                                <input type="number" name="price" value="{{$data->price}}" placeholder="E.g. 00.00" class="form-control border-2 border-dark" required>
                                <select name="currency" class=" border-2 border-dark">
                                    <option value="dollar" {{$data['currency']=='dollar'?'selected':''}}>USD ($)</option>
                                    <option value="riel" {{$data['currency']=='riel'?'selected':''}}>KHR (៛)</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label><b>Quantity:</b></label>
                            <input type="number" value="{{$data->purchase_quantity}}" name="qty" class="form-control border-2 border-dark">
                        </div>

                        <div class="col-6 mb-3">
                            <label><b>Title:</b></label>
                            <input type="text" name="title" value="{{$data->title}}" placeholder="E.g. Deal of the day" class="form-control border-2 border-dark" >
                        </div>

                        <div class="col-12 mb-3">
                            <label><b>Description:</b></label>
                            <input type="text" name="description" value="{{$data->description}}" placeholder="Description" class="form-control border-2 border-dark" >
                        </div>

                    </div>
                </div>

                {{-- Get Free session --}}

                <div class="col-12">
                    <div class="get-free-text">
                        <h3 class="text-center"><b>Gets Free</b></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mb-3">
                    <label><b>Food Image:</b></label>
                    <center>
                        <div class="box">
                            <input type="checkbox" name="isDeleteFree" id="isDeleteImage2" hidden name="isDeleteFree">
                           <div id="drop-zone2" style="display: none">
                               <div class="icon"><i class="bi bi-image"></i></div>
                               <div>Drag & drop an image here</div>
                           </div>

                            <!-- Select Button -->
                            <button type="button"  style="display: none" id="select-btn2">Select Image</button>
                            <input type="file" name="image_free" id="file-input2" accept="image/*" hidden />

                           <!-- Preview -->
                           <div id="preview2" style="display: block">
                                <input type="hidden" value="{{$data->discount_free->free_img}}" name="old_image_free">
                               <img id="preview-img2" src="{{asset('assets/img/'.$data->discount_free->free_img)}}" alt="Preview" />
                               <div id="file-name2">{{$data->discount_free->free_img}}</div>
                               <div class="actions">
                               <button type="button" id="btn-change2"><i class="bi bi-arrow-repeat"></i> Change</button>
                               <button type="button" id="btn-remove2"><i class="bi bi-trash"></i> Remove</button>
                               </div>
                           </div>
                       </div>
                    </center>
                </div>
                <div class="col-lg-8 col-12 ">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label><b>Free Item Name:</b></label>
                            <input type="text" value="{{$data->discount_free->free_item}}" name="name_free" class="form-control border-2 border-dark">
                        </div>

                        <div class="col-6 mb-3">
                            <label><b>Free Quantity:</b></label>
                            <input type="number" value="{{$data->discount_free->free_quantity}}" name="qty_free" class="form-control border-2 border-dark">
                        </div>

                        <div class="col-6 mb-3">
                            <label for="from_date2"><b>Start Date:</b></label>
                            <input type="date" name="start" class="form-control border-2 border-dark" value="{{ \Carbon\Carbon::parse($data->start_date)->format('Y-m-d') }}" id="from_date2">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="to_date2"><b>End Date:</b></label>
                            <input type="date" name="end" class="form-control border-2 border-dark" value="{{ \Carbon\Carbon::parse($data->end_date)->format('Y-m-d') }}" id="to_date2">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100">Edit the Post</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    document.getElementById('from_date2').addEventListener('change', function() {
        let fromDate = this.value;
        document.getElementById('to_date2').min = fromDate;
        document.getElementById('to_date2').value = fromDate;

        let toDate = document.getElementById('to_date2').value;
        if (toDate < fromDate) {
            document.getElementById('to_date2').value = '';
        }
    });



</script>


{{-- Use with Image Picker --}}
@for ($i = 1; $i < 3; $i++)
    @php
        $suffix =  $i;
    @endphp
    <script>
        (function() {
            const suffix = '{{$suffix}}';

            const dropZone = document.getElementById('drop-zone' + suffix);
            const fileInput = document.getElementById('file-input' + suffix);
            const preview = document.getElementById('preview' + suffix);
            const img = document.getElementById('preview-img' + suffix);
            const fileName = document.getElementById('file-name' + suffix);
            const selectBtn = document.getElementById('select-btn' + suffix);
            const changeBtn = document.getElementById('btn-change' + suffix);
            const removeBtn = document.getElementById('btn-remove' + suffix);

            // Show image preview
            function showImage(file) {
                if (!file || !file.type.startsWith('image/')) return;
                const reader = new FileReader();
                reader.onload = e => {
                    img.src = e.target.result;
                    fileName.textContent = file.name;
                    dropZone.style.display = 'none';
                    selectBtn.style.display = 'none';
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }

            // Reset back to drop zone
            function reset() {
                img.src = '';
                fileInput.value = '';
                preview.style.display = 'none';
                dropZone.style.display = 'block';
                selectBtn.style.display = 'inline-block';
                document.getElementById('isDeleteImage'+suffix).checked = true;
            }

            // Select button
            selectBtn.onclick = () => fileInput.click();

            // File chosen via dialog
            fileInput.onchange = e => showImage(e.target.files[0]);

            // Click drop zone
            dropZone.onclick = () => fileInput.click();

            // Drag & Drop
            dropZone.ondragover = e => {
                e.preventDefault();
                dropZone.classList.add('drag-over');
            };
            dropZone.ondragleave = () => dropZone.classList.remove('drag-over');
            dropZone.ondrop = e => {
                e.preventDefault();
                dropZone.classList.remove('drag-over');
                showImage(e.dataTransfer.files[0]);
            };

            // Change / Remove buttons
            changeBtn.onclick = () => fileInput.click();
            removeBtn.onclick = reset;
        })();
    </script>
@endfor


@endsection