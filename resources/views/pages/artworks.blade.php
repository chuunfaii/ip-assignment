@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/artworks.css') }}" />

@endsection

@section('content')

<main class="position-relative">
  <div class="container">
    <h1 class="navbar-brand fw-bold text-center my-4">View All Artworks</h1>
    <form action="{{ route('artworks') }}" method="GET">
      <div class="mb-5 d-flex position-relative">
        <!-- Search -->
        <div class="input-group w-50 mx-auto">
          <input class="form-control py-2" placeholder="Search for artwork" name="query" value="{{ request()->input('query') }}" />
          <button type="submit" class="btn btn-secondary text-muted">Search</button>
        </div>

        <!-- Sort By -->
        <div class="dropdown position-absolute end-0">
          <select id="ddlSort" class="btn btn-secondary dropdown-toggle text-muted" data-bs-toggle="dropdown" aria-expanded="false" name="sort">
            <option value="asc" @if(request()->input('sort') === 'asc') selected @endif>A-Z</option>
            <option value="desc" @if(request()->input('sort') === 'desc') selected @endif>Z-A</option>
            <option value="low" @if(request()->input('sort') === 'low') selected @endif>Lowest Price</option>
            <option value="high" @if(request()->input('sort') === 'high') selected @endif>Highest Price</option>
          </select>
        </div>
      </div>
    </form>

    <div class="row row-cols-3">
      @foreach ($artworks as $artwork)
      <div class="col">
        <div class="card mx-5" style="width: 20rem !important;">
          <a href='/artwork/{{ $artwork->id }}'>
            <img src="upload/artworks/{{ $artwork->image_url }}" class="card-img-top">
          </a>
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <a href='/artwork/{{ $artwork->id }}'>
                <h5 class="card-title">
                  {{ $artwork->name }}
                </h5>
              </a>
              <p class="card-text text-muted">
                {{ $artwork->description }}
              </p>
            </div>
            <div class="mt-5 d-flex justify-content-between">
              <span class="text-muted">
                {{ $artwork->artist->first_name }}
                {{ $artwork->artist->last_name }}
              </span>
              <span class="fw-bold">$ {{ $artwork->price }}</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- <%-- If there is no results --%>
                    <% if (numResults == 0)
                        { %> -->



    <!-- <div class="mt-5 d-flex justify-content-center align-items-center flex-grow-1">
                    <h4 class="display-5">No matched results.</h4>
                </div> -->



    <!-- <% } else { %>
                        <%-- Paging Control --%>
                        <asp:DataList ID="rptPaging" runat="server"
                            OnItemCommand="rptPaging_ItemCommand"
                            OnItemDataBound="rptPaging_ItemDataBound"
                            RepeatDirection="Horizontal"
                            CssClass="table-primary mx-auto mb-4">
                            <ItemTemplate>
                                <asp:LinkButton ID="lbPaging" runat="server"
                                    CommandArgument='<%# Eval("PageIndex") %>'
                                    CommandName="newPage"
                                    Text='<%# Eval("PageText") %>'
                                    CssClass="px-3 text-black-50">
                                </asp:LinkButton>
                            </ItemTemplate>
                        </asp:DataList>
                    <% } %> -->
  </div>

</main>

@endsection

@section('extra-js')

<script>
  $('#ddlSort').on('change', function(e) {
    $(this).closest('form').submit();
  });
</script>

@endsection