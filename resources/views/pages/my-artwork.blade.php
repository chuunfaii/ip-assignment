@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/my-artwork.css') }}" />

@endsection


@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

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
    <div class="card col-3 mb-5 p-0 mt-3" style="width:25% !important;" id="artCard">
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
                <button class="btn btn-outline-danger py-2 mb-4 px-3 deleteBtn" data-id="{{ $art->id }}" data-bs-toggle="modal" data-bs-target="#DeleteArtwork">Delete</buton>
                <button type="button" class="btn btn-primary py-2 mb-4 px-4 editBtn" id="{{ $art->id }}">Edit</button>
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
                <form action="{{ url('/update-artwork') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body ">
                        <div class="row">
                            <div class="small-12 medium-2 large-2 columns" id='UploadEditArt'>
                                <div class="square upload-button mx-auto mb-4" id="upload-button2">
                                    <div id="productImg"></div>
                                </div>
                                <input id="FileUpload2" class="file-upload" type="file" />
                            </div>
                        </div>

                        <div class=" mb-4" style="text-align:center;">Upload Product Image
                        </div>
                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input id="editName" class="form-control" required name="editName"/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input id="editPrice" class="form-control" required name="editPrice"/>
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
                                <input id="editQtt" type="number" class="form-control" required name="editQtt"/>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="editCategory" id="editCategory" class="form-control" name="editCat" id="editCat">
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
                        <button class="btn btn-primary px-4 saveBtn" >Save</button>
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
                        <input type="hidden" name="deleteid" id="deleteid"/>
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
                                <input id="FileUpload1" class="file-upload" type="file" name="artworkImage" id="artworkImage" />
                            </div>
                        </div>

                        <div class=" mb-4" style="text-align:center;">Upload Product Image</div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="artworkName" id="artworkName" type="text" />

                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="artworkPrice" id="artworkPrice" type="number" min=0 oninput="validity.valid||(value='');" />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                                <textarea id="artworkDesc" class="form-control" row="5" name="artworkDesc"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="artworkQtt" id="artworkQtt" min=0 oninput="validity.valid||(value='');" />
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label id="Label6" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="artworkCategory" class="form-control" id="artworkCategory" >
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


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

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

        //For validation
        $('.btnAdd').click(function(){
            var name = $('#artworkName').val()
            var price = $('#artworkPrice').val();
            var quantity = $('#artworkQtt').val();
            var desc = $('#artworkDesc').val();
            var image=$('#artworkImage').val();

            var array = array[name, price, quantity, desc, image];

            for (var i = 0; i < array.length; i++){
                if(array[i] == ""){
                    alert(array[i] + 'is required');
                }
            }

        });

        /*$(document).ready(function() {
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
            error.addClass('error-message');
            element.closest('.form-group').append(error);
          },
        });
      });*/

        //AJAX code
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.editBtn', function(){
            var id = $(this).attr("id");
            $.ajax({
                url: "{{ url('/fetch-artwork') }}",
                enctype: 'multipart/form-data',
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function(data){

                    $('.saveBtn').attr("id", data.id);
                    $('#editName').val(data.name)
                    $('#editPrice').val(data.price);
                    $('#editQtt').val(data.quantity);
                    $('#editDesc').val(data.description);
                    $('#editCategory').val(data.categoryId);

                    var baseUrl = "{{ asset('upload/artworks') }}";
                    var imagePath = baseUrl + '/' +data.image;
                    $('#productImg').html("<img id='Image2' class='product-pic' src='"+imagePath+"' />");

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
    $(document).on('click','.deleteBtn',function(){
         let id = $(this).attr('data-id');
         $('#deleteid').val(id);
    });
</script>


@endsection