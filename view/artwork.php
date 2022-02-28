<?php
include('../include/header.php');
include('../include/navbar.php');
?>
<link rel="stylesheet" href="css/artworksPage.css">
<link rel="stylesheet" href="css/style.css">

<div style="flex-grow: 1;">
        <main class="position-relative">
            <div class="container">
                <h1 class="navbar-brand fw-bold text-center my-4">View All Artworks</h1>
                <div class="mb-5 d-flex position-relative">
                    <!-- <%-- Search --%> -->
                        <div class="input-group w-50 mx-auto">
                            <input id="txtSearch" class="form-control py-2" placeholder="Enter your search query here..." />
                            <button id="btnSearch" class="btn btn-secondary text-muted">Search</button>
                        </div>
                        <!-- <%-- Sort By --%> -->
                            <div class="dropdown position-absolute end-0">
                                <select id="ddlSort" class="btn btn-secondary dropdown-toggle text-muted"
                                    data-bs-toggle="dropdown" aria-expanded="false" AutoPostBack="True"
                                    OnSelectedIndexChanged="ddlSort_SelectedIndexChanged">
                                    <option value="asc">A-Z</option>
                                    <option value="desc">Z-A</option>
                                    <option value="low">Lowest Price</option>
                                    <option value="high">Highest Price</option>
                                </select>
                            </div>
                </div>

                <div class="row row-cols-4">


                    <div class="card col ms-5 mb-5 p-0" style="width: 21% !important;">
                        <a href='#'>
                            <img src="artworks/Artwork1.jpg" class="card-img-top">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <a href='Artwork.aspx?id='>
                                    <h5 class="card-title">
                                        Chiam Yee Hang
                                    </h5>
                                </a>
                                <p class="card-text text-muted">
                                    Chiam
                                </p>
                            </div>
                            <div class="mt-5 d-flex justify-content-between">
                                <span class="text-muted">
                                    Chiam
                                </span>
                                <span class="fw-bold">$ </span>
                            </div>
                        </div>
                    </div>


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
    </div>


<?php
include('../include/footer.php');
?>