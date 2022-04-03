@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/my-artwork.css') }}" />

@endsection


@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="mt-5 mx-auto container position-relative">

    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="navbar-brand fw-bold p-0 m-0">My Artworks</h1>
        </div>
        <button type="button" class="float-end btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#UploadArt" onclick="setImageSrc(false);">
            Upload An Artwork
        </button>
    </div>
</div>

<div class="container">
    @if($artworks -> count() > 0)
        <div class="row row-cols-4 mb-5 mt-3">
            @foreach($artworks as $artwork)
                <div class="card col ms-5 p-0 mt-5" style="width: 21% !important; min-height: 18rem !important;">
                    <div>
                        <img src="{{ asset('upload/artworks/' . $artwork->image_url) }}" class="card-img-top" style="height: 250px;" />
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <span class="card-text h5">
                                <label class="fw-bold">{{ $artwork->name }}</label>
                            </span>
                            <div class="mt-3 d-flex justify-content-between">
                                <p class="text-muted">{{ $artwork->artist->presentFullName() }}</p>
                                <p class="fw-bold">{{ $artwork->presentPrice() }}</p>
                            </div>
                            <div class="mt-2 d-flex justify-content-between">
                                <button class="btn btn-outline-danger py-2 px-3 deleteBtn" data-id="{{ $artwork->id }}" data-bs-toggle="modal" data-bs-target="#DeleteArtwork">Delete</buton>
                                <button type="button" class="btn btn-primary py-2 px-4 editBtn" id="{{ $artwork->id }}">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
            <h1 class="display-6 mb-5">Your artwork is empty right now.</h1>
        </div>
    @endif
    </div>
</div>

    <!--Modal Edit Artwork-->
    <div class="modal fade" id="EditArtwork" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" artwork-image="https://i.pinimg.com/564x/0a/c4/fb/0ac4fb61950219470da3d4eaf555a710.jpg">
        <div class="modal-dialog" style="max-width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Artwork</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="Close"></button>
                </div>
                <form action="{{ url('/update-artwork') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="small-12 medium-2 large-2 columns" id='UploadEditArt'>
                                <div class="square upload-button mx-auto mb-4" id="upload-button2">
                                    <div id="productImg"></div>
                                </div>
                                <input id="FileUpload2" class="file-upload" type="file" name="editImage" />
                            </div>
                        </div>

                        <div class=" mb-4" style="text-align:center;">Upload Product Image
                        </div>
                        <input type="hidden" name="artworkId" id="artworkId">
                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input id="editName" class="form-control" name="editName" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input id="editPrice" class="form-control" name="editPrice" type="number" min=0 max=999999 step="any" oninput="validity.valid||(value='');" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                                <textarea id="editDesc" class="form-control" row="5" name="editDesc" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input id="editQtt" type="number" class="form-control" name="editQtt" type="number" min=0 max=99 oninput="validity.valid||(value='');" required />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="editCategory" id="editCategory" class="form-control" required>
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
                        <button class="btn btn-primary px-4 saveBtn" type="submit">Update</button>
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
                    <form action="{{ url('/delete-artwork') }}" method="POST">
                        @csrf
                        <input type="hidden" name="deleteid" id="deleteid" />
                        <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-primary px-4">Delete</button>
                    </form>
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
                <form action="{{ url('/store-artwork') }}" method="post" id="artForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="small-12 medium-2 large-2 columns">
                                <div class="square upload-button mx-auto mb-4" id="upload-button1">
                                    <img id="Image1" class="product-pic" />
                                </div>
                                <input id="FileUpload1" class="file-upload" type="file" name="artworkImage" required />
                            </div>
                        </div>

                        <div class="mb-2" style="text-align:center;"><span class="text-danger error-text image-error"></span></div>
                        <div class=" mb-4" style="text-align:center;">Upload Product Image</div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="artworkName" id="artworkName" type="text" required />
                                <span class="text-danger error-text name-error"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="artworkPrice" id="artworkPrice" type="number" min=0 max=999999 step="any" oninput="validity.valid||(value='');" required />
                                <span class="text-danger error-text price-error"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                                <textarea id="artworkDesc" class="form-control" row="5" name="artworkDesc" required></textarea>
                                <span class="text-danger error-text description-error"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="artworkQtt" id="artworkQtt" min=0 max=99 oninput="validity.valid||(value='');" required />
                                <span class="text-danger error-text quantity-error"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="artworkCategory" class="form-control" id="artworkCategory" required>
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
                        <button class="btn btn-primary px-4 btnAdd" type="submit" name="btnAdd" id="btnAdd">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')

<script>
    function success() {
        var name = document.getElementById('artworkName');
        var price = document.getElementById$('artworkPrice');
        var quantity = document.getElementById('artworkQtt');
        var desc = document.getElementById('artworkDesc');
        var image = document.getElementById('FileUpload2');

        if (image == "" || name == "" || price == "" || desc == "" || quantity == "") {
            document.getElementById('btnAdd').disabled = true;
        } else {
            document.getElementById('btnAdd').disabled = false;
        }
    }
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

        //AJAX code
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.editBtn', function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ url('/fetch-artwork') }}",
                enctype: 'multipart/form-data',
                method: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {

                    $('.saveBtn').attr("id", data.id);
                    $('#artworkId').val(data.id);
                    $('#editName').val(data.name)
                    $('#editPrice').val(data.price);
                    $('#editQtt').val(data.quantity);
                    $('#editDesc').val(data.description);
                    $('#editCategory').val(data.category_id);

                    var baseUrl = "{{ asset('upload/artworks') }}";
                    var imagePath = baseUrl + '/' + data.image_url;
                    $('#productImg').html("<img id='Image2' class='product-pic' src='" + imagePath + "' />");

                    $("#EditArtwork").modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });
    });

    //Pass artwork id to modal
    $(document).on('click', '.deleteBtn', function() {
        let id = $(this).attr('data-id');
        $('#deleteid').val(id);
    });
</script>

@endsection