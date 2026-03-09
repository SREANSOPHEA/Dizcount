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
    #drop-zone,#drop-zone1,#drop-zone2 {
      border: 2px dashed #ccc;
      border-radius: 12px;
      padding: 30px 16px;
      cursor: pointer;
      transition: all 0.2s;
      color: #888;
      font-size: 14px;
    }

    #drop-zone:hover,#drop-zone1:hover,,#drop-zone2:hover,
    #drop-zone.drag-over,#drop-zone1.drag-over,#drop-zone2.drag-over {
      border-color: #e07a3a;
      background: #fff7f3;
      color: #e07a3a;
    }

    #drop-zone .icon,#drop-zone1 .icon,#drop-zone2 .icon { font-size: 36px; margin-bottom: 8px; }

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
    #preview,#preview1,#preview2  { display: none; margin-top: 16px; }

    #preview img,#preview1 img,#preview2 img  {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e07a3a44;
    }

    #preview .actions,#preview1 .actions,#preview2 .actions {
      display: flex;
      gap: 8px;
      margin-top: 10px;
      justify-content: center;
    }

    #preview .actions button,#preview1 .actions button,#preview2 .actions button { margin: 0; font-size: 12px; padding: 8px 16px; }
    #btn-remove, #btn-remove1, #btn-remove2 { background: #e05050; }

    #file-name,#file-name1,#file-name2 {
      font-size: 11px;
      color: #aaa;
      margin-top: 8px;
    }
  </style>

<div class="pagetitle">
    <h1>Upload Post</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/uploadPost">Post</a></li>
        <li class="breadcrumb-item active">Upload Post</li>
      </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">
                        <i class="fas fa-home"></i> Percentage Discount
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">
                        <i class="fas fa-user"></i> Free Item Discount
                    </button>
                </li>

            </ul>

            <!-- Tab Content -->
            <div class="tab-content p-3 border card border-top-0" id="myTabContent">

                {{-- Discount by Percentage (%) --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel"
                     aria-labelledby="home-tab">

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <label><b>Food Image:</b></label>
                                        <center>
                                            <div class="box">
                                               <div id="drop-zone">
                                                   <div class="icon"><i class="bi bi-image"></i></div>
                                                   <div>Drag & drop an image here</div>
                                               </div>

                                               <!-- Select Button -->
                                               <button type="button" id="select-btn">Select Image</button>
                                               <input type="file" id="file-input" accept="image/*" hidden />

                                               <!-- Preview -->
                                               <div id="preview">
                                                   <img id="preview-img" alt="Preview" />
                                                   <div id="file-name"></div>
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
                                                    <option value="Rice Express">Rice Express</option>
                                                    <option value="Tube Cafe">Tube Cafe</option>
                                                </select>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label><b>Item Name:</b></label>
                                                <input type="text" class="form-control border-2 border-dark">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label><b>Original Price ($):</b></label>
                                                <input type="number" placeholder="0.00" class="form-control border-2 border-dark">
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label><b>Discount (%):</b></label>
                                                <input type="number" class="form-control border-2 border-dark">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label><b>Quantity:</b></label>
                                                <input type="number" class="form-control border-2 border-dark">
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="from_date1"><b>Start Date:</b></label>
                                                <input type="date" class="form-control border-2 border-dark" value="{{date('Y-m-d')}}" id="from_date1">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="to_date1"><b>End Date:</b></label>
                                                <input type="date" class="form-control border-2 border-dark" value="{{date('Y-m-d')}}" id="to_date1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100">Submit the Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>

                {{-- Discount by Free item --}}
                <div class="tab-pane fade" id="profile" role="tabpanel"
                     aria-labelledby="profile-tab">

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-4 col-12 mb-3">
                                        <label><b>Food Image:</b></label>
                                        <center>
                                            <div class="box">
                                               <div id="drop-zone1">
                                                   <div class="icon"><i class="bi bi-image"></i></div>
                                                   <div>Drag & drop an image here</div>
                                               </div>

                                               <!-- Select Button -->
                                               <button type="button" id="select-btn1">Select Image</button>
                                               <input type="file" id="file-input1" accept="image/*" hidden />

                                               <!-- Preview -->
                                               <div id="preview1">
                                                   <img id="preview-img1" alt="Preview" />
                                                   <div id="file-name1"></div>
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
                                                    <option value="Rice Express">Rice Express</option>
                                                    <option value="Tube Cafe">Tube Cafe</option>
                                                </select>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label><b>Item Name:</b></label>
                                                <input type="text" class="form-control border-2 border-dark">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label><b>Price ($):</b></label>
                                                <input type="number" placeholder="0.00" class="form-control border-2 border-dark">
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label><b>Quantity:</b></label>
                                                <input type="number" class="form-control border-2 border-dark">
                                            </div>

                                        </div>
                                    </div>

                                    {{-- Get Free session --}}

                                    {{-- <hr style="width: 80%;height:3px;color:black;margin:0 auto;background-color:black"> --}}
                                    <div class="col-12">
                                        <div class="get-free-text">
                                            <h3 class="text-center"><b>Gets Free</b></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12 mb-3">
                                        <label><b>Food Image:</b></label>
                                        <center>
                                            <div class="box">
                                               <div id="drop-zone2">
                                                   <div class="icon"><i class="bi bi-image"></i></div>
                                                   <div>Drag & drop an image here</div>
                                               </div>

                                               <!-- Select Button -->
                                               <button type="button" id="select-btn2">Select Image</button>
                                               <input type="file" id="file-input2" accept="image/*" hidden />

                                               <!-- Preview -->
                                               <div id="preview2">
                                                   <img id="preview-img2" alt="Preview" />
                                                   <div id="file-name2"></div>
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
                                                <input type="text" class="form-control border-2 border-dark">
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label><b>Free Quantity:</b></label>
                                                <input type="number" class="form-control border-2 border-dark">
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="from_date2"><b>Start Date:</b></label>
                                                <input type="date" class="form-control border-2 border-dark" value="{{date('Y-m-d')}}" id="from_date2">
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="to_date2"><b>End Date:</b></label>
                                                <input type="date" class="form-control border-2 border-dark" value="{{date('Y-m-d')}}" id="to_date2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100">Submit the Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script> --}}
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
    document.getElementById('from_date2').addEventListener('change', function() {
        let fromDate = this.value;
        document.getElementById('to_date2').min = fromDate;
        document.getElementById('to_date2').value = fromDate;

        // If to_date is currently less than from_date, clear it
        let toDate = document.getElementById('to_date2').value;
        if (toDate < fromDate) {
            document.getElementById('to_date2').value = '';
        }
    });

    // Set initial min value if from_date already has a value
    window.onload = function() {
        let fromDate = document.getElementById('from_date1').value;
        if (fromDate) {
            document.getElementById('to_date1').min = fromDate;
        }
        let fromDate2 = document.getElementById('from_date2').value;
        if (fromDate2) {
            document.getElementById('to_date2').min = fromDate;
        }
    };

</script>

@for ($i = 0; $i < 3; $i++)
    @php
        $suffix = $i == 0 ? '' : $i;
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