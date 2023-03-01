@extends('frontend.layouts.app')

@section('title', 'Category')

@section('content')

<h1>Category Page</h1>

<!-- Display message from server on success -->
@if ( Session::has('success') )
  <div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
  </div>
@endif

<!-- Display message from server on error -->
@if ( Session::has('error') )
  <div class="alert alert-warning">
    {{ Session::get('error') }}
    @php
        Session::forget('error');
    @endphp
  </div>
@endif

<!-- Add Category functionality -->
<button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-category-modal-md">
        Add Category
</button>

<!-- Add Subcategory functionality -->
<button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-subcategory-modal-md">
        Add Subcategory
</button>

<!-- Add Product functionality -->
<button type="button" class="btn btn-warning" data-toggle="modal"
        data-target=".bd-product-modal-md">
        Add Product
</button>

<!-- modal to hold the add-category form -->
<div class="modal bd-category-modal-md" tabindex="-1" role="dialog"
     aria-labelledby="myCategoryModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="myCategoryModalTitle">
                    Add Category form
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div><!-- modal-header -->

            <div class="modal-body">

                <form method="POST" action="{{ route('adda.category') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="category-item">
                            Category name
                        </label>
                        <input type="text" class="form-control" id="category-item" name="name"
                               placeholder="Enter a name for the category" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div><!-- valid-feedback -->

                    </div><!-- form-group -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-warning">
                            Submit
                        </button>
                    </div><!-- modal-footer -->

                </form>

            </div><!-- modal-body -->



        </div><!-- modal-content -->

     </div><!-- modal-dialog modal-lg -->
</div><!-- modal fade bd-example-modal-lg -->

<!-- modal to hold the add-subcategory form -->
<div class="modal bd-subcategory-modal-md" tabindex="-1" role="dialog"
     aria-labelledby="mySubCategoryModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mySubCategoryModalTitle">
                    Add Subcategory form
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div><!-- modal-header -->

            <div class="modal-body">

                <form method="POST" action="{{ route('adda.subcategory') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="subcategory-item">
                            Subcategory name
                        </label>
                        <input type="text" class="form-control" id="subcategory-item" name="name"
                               placeholder="Enter a name for subcategory" required style="height: 40px;">
                        <div class="valid-feedback">
                            Looks good!
                        </div><!-- valid-feedback -->

                    </div><!-- form-group -->

                    <div class="form-group" style="padding-bottom: 8px;">
                        <label for="category-list">
                            Choose a category
                        </label>
                        <select name="category" id="category-list" class="form-control" style="height: 40px;" required>
                            <option value="">Pick your category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option value="">None</option>
                            @endforelse

                        </select>

                    </div><!-- form-group -->
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-warning">
                            Submit
                        </button>
                    </div><!-- modal-footer -->

                </form>

            </div><!-- modal-body -->



        </div><!-- modal-content -->

     </div><!-- modal-dialog modal-lg -->
</div><!-- modal fade bd-subcategory-modal-md -->

<!-- modal to hold the add-product form modal-dialog-centered modal-md  -->
<div class="modal bd-product-modal-md" tabindex="-1" role="dialog"
     aria-labelledby="productModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="productModalTitle">
                    Add Product form
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div><!-- modal-header -->

            <div class="modal-body">

                <form method="POST" action="{{ route('adda.product') }}" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="product-name" style="padding-bottom: 0px; height: 0px">
                            Product name
                        </label>
                        <input type="text" class="form-control" id="product-name" name="name"
                               placeholder="Enter a name for the product" required style="height: 40px;" />
                        <p class="valid-feedback">
                            Looks good!
                        </p><!-- valid-feedback -->
                    </div><!-- form-group -->

                    <div class="form-group">
                        <label for="product_price" style="padding-bottom: 0px; height: 0px">
                            Product price
                        </label>
                        <input type="number" id="product_price" name="price" class="form-control" min="0.00" style="height: 40px;">
                    </div><!-- form-group -->

                    <div class="form-group" style="padding-bottom: 8px;">
                        <label for="category-list">
                            Choose a category
                        </label>
                        <select name="category" id="category" class="form-control" style="height: 40px;" required>
                            <option value="">Pick a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div><!-- form-group -->

                    <div class="form-group" style="padding-bottom: 8px;">
                        <label for="subcategory">
                            Choose a subcategory
                        </label>
                        <select name="subcategory" id="subcategory" class="form-control" style="height: 40px;" required>
                            <option value="">Pick a subcategory</option>
                        </select>
                    </div><!-- form-group style="height: 40px;" -->

                    <div class="form-group">
                        <label for="description" style="padding-bottom: 0px; height: 0px">
                            Describe this product
                        </label>
                        <textarea class="form-control" name="description" id="description" ></textarea>
                    </div>

                    <div class="form-group" >
                        <label for="imageFile" style="padding-bottom: 0px; height: 0px">
                            Upload product image
                            <input class="form-control" type="file" id="imageFile" name="imageFile"  />
                        </label>
                    </div><!-- form-group -->


                    {{-- <br> cols="30" rows="10" --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-warning">
                            Submit
                        </button>
                    </div><!-- modal-footer -->

                </form>

            </div><!-- modal-body -->



        </div><!-- modal-content -->

     </div><!-- modal-dialog modal-lg -->
</div><!-- modal to hold the add-product form -->

@endsection

