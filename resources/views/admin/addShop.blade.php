@extends('admin.adminMasterPage')

@section('content')
<style>
    

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
    #drop-zone{
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
    #preview  { display: none; margin-top: 16px; }

    #preview img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e07a3a44;
    }

    #preview .actions {
      display: flex;
      gap: 8px;
      margin-top: 10px;
      justify-content: center;
    }

    #preview .actions button{ margin: 0; font-size: 12px; padding: 8px 16px; }
    #btn-remove { background: #e05050; }

    #file-name{
      font-size: 11px;
      color: #aaa;
      margin-top: 8px;
    }
  </style>
<div class="pagetitle">
    <h1>Register New Shop</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/uploadPost">Shop</a></li>
        <li class="breadcrumb-item active">Add New Shop</li>
      </ol>
    </nav>
</div>

 <div class="card p-3">
    <div class="row">
        <div class="col-6"><h1>Shop Information</h1></div>
    </div>


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
                                <label ><b>Shop Name:</b></label>
                                <input type="text" class="form-control border-2 border-dark">
                            </div>
                            <div class="col-6 mb-3">
                                <label><b>Shop Cateogry:</b></label>
                                <select name="" id="" class="form-control border-2 border-dark">
                                    <option value="">Fast food</option>
                                    <option value="">Drink</option>
                                    <option value="">Snack</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label><b>Location:</b></label>
                                <input type="text" class="form-control border-2 border-dark">
                            </div>
                            <div class="col-6 mb-3">
                                <label><b>Phone Number:</b></label>
                                <input type="text" class="form-control border-2 border-dark">
                            </div>
                            <div class="col-6 mb-3">
                                <label><b>Telegram:</b></label>
                                <input type="text" placeholder="e.g: https://t.me/name" class="form-control border-2 border-dark">
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100">Register Shop</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
 </div>
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