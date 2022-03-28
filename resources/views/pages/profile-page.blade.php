@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/profile-page.css') }}" />

@endsection


@section('content')

<div id="content" class="content content-full-width">
    <div class="profile">
        <div class="profile-header">
            <div class="profile-header-cover"></div>
            <div class="profile-header-content container">
                <img id="Image1" class="profile-header-img"/>

                <div class="profile-header-info">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-4 fw-bold">
                                <Label id="TxtFName">FirstName</Label>
                                <Label id="TxtLName">LastName</Label>
                            </h4>
                            <p class="mb-5">
                                <Label id="TxtEmail">Email</Label>
                            </p>
                        </div>
                        <div class="w-50">
                            <h5 class="mb-4 fw-bold">Bio</h5>
                            <p>
                                <label id="TxtBio">Bio Content</label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="d-flex justify-content-center align-items-center mb-4">
        <h1 class="navbar-brand fw-bold p-0 m-0">All Artwork</h1>
    </div>

<hr />

<div class="row row-cols-4">
    <div class="card col ms-5 mb-5 p-0 mt-3" style="width:21% !important;">
        <a href="">
            <img src="" class="card-img-top" style="height:250px;"/>
        </a>
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <a href="">
                    <h5 class="card-title" >Handsome KG</h5>
                </a>    
                <p class="card-text text-muted">KG The Most Handsome</p>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <p class="text-muted">Quantity : 1</p>
                <p class="fw-bold">RM1000000000</p>
            </div>
        </div>
    </div>
</div>


@endsection