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
    #drop-zone {
      border: 2px dashed #ccc;
      border-radius: 12px;
      padding: 30px 16px;
      cursor: pointer;
      transition: all 0.2s;
      color: #888;
      font-size: 14px;
    }

    #drop-zone:hover,
    #drop-zone.drag-over {
      border-color: #e07a3a;
      background: #fff7f3;
      color: #e07a3a;
    }

    #drop-zone .icon { font-size: 36px; margin-bottom: 8px; }

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
    #preview { display: none; margin-top: 16px; }

    #preview img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e07a3a44;
    }

    #preview .actions{
      display: flex;
      gap: 8px;
      margin-top: 10px;
      justify-content: center;
    }

    #preview .actions button { margin: 0; font-size: 12px; padding: 8px 16px; }
    #btn-remove{ background: #e05050; }

    #file-name {
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
    <form action="/admin/edit/discountPost/percentage/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="row">

                    <div class="col-lg-4 col-12 mb-3">
                        <label><b>Food Image:</b></label>
                        <center>
                            <div class="box">
                                <input type="checkbox" name="isDelete" id="isDeleteImage" hidden name="isDelete">
                               <div id="drop-zone" style="display: none">
                                   <div class="icon"><i class="bi bi-image"></i></div>
                                   <div>Drag & drop an image here</div>
                               </div>
                               <!-- Select Button -->
                               <button type="button" style="display: none" id="select-btn">Select Image</button>
                               <input type="file" name="image" id="file-input" accept="image/*" hidden />
                               <!-- Preview -->
                               <div id="preview" style="display: block">
                                    <input type="hidden"  name="old_image" value="{{$data->purchase_img}}">
                                   <img id="preview-img" src="{{asset('assets/img/'.$data->purchase_img)}}" alt="Preview" />
                                   <div id="file-name">{{$data->purchase_img}}</div>
                                   <div class="actions">
                                   <button type="button" id="btn-change"><i class="bi bi-arrow-repeat"></i> Change</button>
                                   <button type="button" id="btn-remove"><i class="bi bi-trash"></i> Remove</button>
                                   </div>
                               </div>
                           </div>
                        </center>
                    </div>

                    <div class="col-lg-8 col-12 ">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <label for="shop1"><b>Shop:</b></label>
                                <select name="shop" class="form-select border-2 border-dark select2" id="shop1">
                                    @foreach ($shops as $shop)
                                        <option value="{{$shop['id']}}"  {{$shop['id']==$data['shop_id']?'selected':''}}>{{$shop['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Item Name:</b></label>
                                <input type="text" name="name" value="{{$data['purchase_item']}}" placeholder="Food Name" class="form-control border-2 border-dark" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Original Price:</b></label>
                                <div class="input-group">
                                    <input type="number" name="price" value="{{$data->price}}" placeholder="E.g. 00.00" class="form-control border-2 border-dark" required>
                                    <select name="currency" class=" border-2 border-dark">
                                        <option value="dollar" {{$data['currency'] == 'dollar'? 'selected':''}}>USD ($)</option>
                                        <option value="riel" {{$data['currency'] == 'riel'? 'selected':''}}>KHR (៛)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Discount (%):</b></label>
                                <input type="number" name="discount" value="{{$data['discount_percentage']['discount']}}" placeholder="E.g. 10" class="form-control border-2 border-dark" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Quantity:</b></label>
                                <input type="number" name="qty" value="{{$data['purchase_quantity']}}" class="form-control border-2 border-dark" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Title:</b></label>
                                <input type="text" name="title" value="{{$data['title']}}" placeholder="E.g. Deal of the day" class="form-control border-2 border-dark" >
                            </div>

                            <div class="col-6 mb-3">
                                <label><b>Description:</b></label>
                                <input type="text" name="description" value="{{$data['description']}}" placeholder="Description" class="form-control border-2 border-dark" >
                            </div>

                            <div class="col-6 mb-3">
                                <label for="from_date1"><b>Start Date:</b></label>
                                <input type="date" value="{{ \Carbon\Carbon::parse($data->start_date)->format('Y-m-d') }}" name="start" class="form-control border-2 border-dark"  id="from_date1" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label for="to_date1"><b>End Date:</b></label>
                                <input type="date" value="{{ \Carbon\Carbon::parse($data->end_date)->format('Y-m-d') }}" name="end" class="form-control border-2 border-dark" id="to_date1" required>
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


{{-- Use for control date (From date can not bigger than To date) --}}
<script>
    document.getElementById('from_date1').addEventListener('change', function() {
        let fromDate = this.value;
        document.getElementById('to_date1').min = fromDate;
        document.getElementById('to_date1').value = fromDate;

        // If to_date is currently less than from_date, clear it
        let toDate = document.getElementById('to_date1').value;
        if (toDate < fromDate) {
            document.getElementById('to_date1').value = '';
        }
    });


</script>


{{-- Use with Image Picker --}}

    <script>
        (function() {

            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('file-input');
            const preview = document.getElementById('preview');
            const img = document.getElementById('preview-img');
            const fileName = document.getElementById('file-name');
            const selectBtn = document.getElementById('select-btn');
            const changeBtn = document.getElementById('btn-change');
            const removeBtn = document.getElementById('btn-remove');

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
                document.getElementById('isDeleteImage').checked = true;
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

@endsection