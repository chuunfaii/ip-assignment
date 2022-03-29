@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artists-page.css') }}" />

@endsection

@section('content')

<h1 class="navbar-brand fw-bold text-center my-4">View All Artists</h1>


<div class="mb-5 d-flex position-relative">
    <div class="input-group w-50 mx-auto">
        <input id="txtSearch" class="form-control py-2" placeholder="Enter your search query here..." />
        <button id="btnSearch" class="btn btn-secondary text-muted">Search</button>
    </div>

</div>

<div class="container">
   
<div class="row card-columns">

   
 @foreach($artists as $artist)
    <div class="col ">
        
        <div class="card m-5" style="width: 15rem;min-height:18rem !important;">
            <a href=#'>
                {{-- <img src="https://i.pinimg.com/736x/6a/1b/73/6a1b7352740dfcaf1d8999e347d5b053.jpg" class="card-img-top"> --}}
                <img class="card-img-top" src="{{ asset('upload/artists/'.$artist->image_URL) }}">
            </a>
            <div class="card-body">
                <div class="card-title">
                    <a href='profile.php'>
                        <label class="fw-bold">{{$artist->first_name}}</label>
                        <label class="fw-bold">{{$artist->last_name}}</label>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

</div>


    {{-- <asp:DataList ID="dlArtist" runat="server" RepeatColumns="4" RepeatDirection="Horizontal">
        <ItemTemplate>  
            <div class="card m-5" style="width: 15rem;">
                <a href='ProfilePage.aspx?Id=<%# Eval("Id").ToString() %>'>
                    <asp:Image ID="Image1" runat="server" ImageUrl='<%# Eval("ImageUrl") %>' CssClass="px-3" Width="240" />
                </a>
                <div class="card-body">
                    <div class="card-title">
                        <a href='ProfilePage.aspx?Id=<%# Eval("Id").ToString() %>'>
                            <asp:Label Text='<%# Eval("FirstName") + " " + Eval("LastName") %>' CssClass="fw-bold" runat="server" />
                        </a>
                    </div>
                </div>
            </div>
        </ItemTemplate>
    </asp:DataList> --}}

@endsection