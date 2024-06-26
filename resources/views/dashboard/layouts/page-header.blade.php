<!-- breadcrumb -->
<div class="breadcrumb-header align-items-center justify-content-between">
    <div class="m-0">
        <div class="d-flex">
            <h4 class="content-title m-0">@yield('mainRoute')</h4>
            <span class="text-muted tx-13 mt-1 mr-2 mb-0">/@yield('childRoute')</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-xl-0" style="height: fit-content;">
            <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pr-1 mb-xl-0" style="height: fit-content;">
            <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
        </div>
        <div class="pr-1 mb-xl-0" style="height: fit-content;">
            <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="mb-3 mb-xl-0">
            <div class="btn-group dropdown">
                <button type="button" class="btn btn-primary">14 Aug 2019</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                    data-x-placement="bottom-end">
                    <a class="dropdown-item" href="#">2015</a>
                    <a class="dropdown-item" href="#">2016</a>
                    <a class="dropdown-item" href="#">2017</a>
                    <a class="dropdown-item" href="#">2018</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->