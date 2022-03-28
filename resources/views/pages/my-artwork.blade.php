@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/my-artwork.css') }}" />

@endsection


@section('content')

<div class="mt-5 mx-auto container position-relative">
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="navbar-brand fw-bold p-0 m-0">My Artwork</h1>
        </div>

        <button type="button" class="float-end btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#UploadArt" onclick="setImageSrc(false);">
            Upload An Artwork
        </button>
    </div>
</div>

<div class="container d-flex justify-content-center" style="flex-wrap:wrap; gap:25px;">
    @foreach($artworks as $art)
    <div class="card col-3 mb-5 p-0 mt-3" style="width:25% !important;">
        <img src="{{ asset('upload/artworks/'.$art->image).'' }}" class="card-img-top" style="height:250px;" />
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <input type="hidden" name="artId" value="{{ $art->id }}">
                <h5 class="card-title" id="name">
                    {{ $art->name }}
                </h5>
                <p class="card-text text-muted">
                    {{ $art->description }}
                </p>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <p class="text-muted">Quantity : {{ $art->quantity }}</p>
                <p class="fw-bold">$ {{ $art->price }}</p>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger py-2 mb-4 px-3 " data-bs-toggle="modal" data-bs-target="#DeleteArtwork">Delete</button>
                <button type="button" class="btn btn-primary py-2 mb-4 px-4 " data-bs-toggle="modal" data-bs-target="#EditArtwork" onclick="setImageSrc();">Edit</button>
            </div>
        </div>
    </div>
    @endforeach

    <!--Modal Edit Artwork-->
    <div class="modal fade" id="EditArtwork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" artwork-image="https://i.pinimg.com/564x/0a/c4/fb/0ac4fb61950219470da3d4eaf555a710.jpg">
        <div class="modal-dialog modal-lg" style="max-width:50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleEdit">Edit An Artwork</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body ">
                        <div class="row">
                            <div class="small-12 medium-2 large-2 columns" id='UploadEditArt'>
                                <div class="square upload-button mx-auto mb-4" id="upload-button2">
                                    <img id="Image2" class="product-pic" src='https://i.pinimg.com/564x/0a/c4/fb/0ac4fb61950219470da3d4eaf555a710.jpg' />
                                </div>
                                <input id="FileUpload2" class="file-upload" type="file" required />
                            </div>
                        </div>

                        <div class=" mb-4" style="text-align:center;">Upload Product Image
                        </div>
                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input id="txtEditName" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input id="txtEditPrice" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                                <textarea id="txtEditDescription" class="form-control" row="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input id="txtEditQuantity" type="number" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="editCategory" id="editCategory" class="form-control">
                                    <option value="1">Paintings</option>
                                    <option value="2">Photography</option>
                                    <option value="3">Drawings</option>
                                    <option value="4">Sculpture</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" id="cancel">Cancel</button>
                        <button ID="Button1" class="btn btn-primary px-4" OnClick="btnSave_Click">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal Delete Artwork-->
    <div class="modal fade" id="DeleteArtwork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleDelete">Delete Artwork Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="lblDeactivate">
                        Are you sure want to delete this artwork?
                    </label>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button id="btnDelete" class="btn btn-primary px-4">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Upload Artwork-->
    <div class="modal fade" id="UploadArt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width:50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload An Artwork</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/store-artwork') }}" method="post" enctype="multipart/form-data" id="uploadArtForm">
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="small-12 medium-2 large-2 columns">
                                <div class="square upload-button mx-auto mb-4" id="upload-button1">
                                    <img id="Image1" class="product-pic" />
                                </div>
                                <input id="FileUpload1" class="file-upload" type="file" name="artworkImage" required/>
                            </div>
                        </div>

                        <div class=" mb-4" style="text-align:center;">Upload Product Image</div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input id="txtName" class="form-control" name="artworkName" type="text" required/>
                            </div>
                        </div>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input id="txtPrice" class="form-control" name="artworkPrice" type="number" min=0 oninput="validity.valid||(value='');" required/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                                <textarea id="txtDescription" class="form-control" row="5" name="artworkDesc" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input id="txtQuantity" type="number" class="form-control" name="artworkQtt" min=0 oninput="validity.valid||(value='');" required/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="artworkCategory" id="addCategory" class="form-control" required>
                                    @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">
                                        {{ $c->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" id="cancel">Cancel</button>
                        <button class="btn btn-primary px-4" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>



<script type="text/javascript">
    @if (count($errors) > 0){
        $('#UploadArt').modal('show');
    }
    @endif
</script>
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.product-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function() {
            readURL(this);
        });
        $("#upload-button1").on('click', function() {
            $("#FileUpload1").click();
        });
        $("#upload-button2").on('click', function() {
            $("#FileUpload2").click();
        });
    });
</script>
<script>
    function setImageSrc(ModalParentId) {
        var isGeneric = (ModalParentId === false);
        var ModalParent = (isGeneric) ? document.getElementById('UploadArt') : (document.getElementById('EditArtwork' + ModalParentId) ?? false);

        if (ModalParent) {
            var ModalImage = ModalParent.getElementsByClassName('product-pic')[0] ?? false;
            var ModalFilePicker = ModalParent.getElementsByClassName('file-upload')[0] ?? false;
            if (ModalImage) {

                if (isGeneric) {
                    ModalImage.setAttribute('src', "");
                } else {
                    ModalImage.setAttribute('src', ModalParent.getAttribute('artwork-image'));
                }
                ModalFilePicker.value = '';
            }
        }
    }
    $(document).ready(function() {
        $('#artForm').validate({
          rules: {
            artworkImage:{
                required: true,
            }
            artworkName: {
              required: true,
            },
            artworkPrice: {
              required: true,
            },
            artworkDesc: {
              required: true,
            },
            artworkQtt: {
              required: true,
            },
          },
          messages: {
            artworkImage:{
              required: "Image is required",
            }
            artworkName: {
              required: "Name is required",
            },
            artworkPrice: {
              required: "Price is required",
            },
            artworkDesc: {
              required: "Description is required",
            },
            artworkQtt: {
              required: "Quantity is required",
            },
          },
          errorElement: 'span',
          errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
</script>

@endsection