@extends('layouts.admin')
@section('title')
Edit Product
@endsection
<style>
    input.larger {
      width: 50px;
      height: 50px;
    }
  </style>
@section('content')


   <div class="container mt-5">
     <div class="row">
         <div class="col-md-12">
             <div class="card ">
                 <div class="card-body">
                    <a href="">Collection</a> / <span>Category Create</span>
                    <a href="{{url('product')}}"class="btn btn-primary float-right py-2 btn-sm">Back</a>

                </div>
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-md-12 mt-4">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       {{session('status')}}
                  </div>
                @endif
                {{-- @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       {{session('error')}}
                  </div>
                @endif --}}
             <div class="card">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"role="presentation">
                        <a class="nav-link active " id="product-tab" data-toggle="tab"  role="tab"href="#product">Product</a>
                    </li>
                    <li class="nav-item "role="presentation">
                        <a class="nav-link  text-color" id="description-tab" data-toggle="tab"  role="tab" href="#description">Description</a>
                    </li>
                    <li class="nav-item"role="presentation">
                        <a class="nav-link  text-color" id="seo-tab" data-toggle="tab" role="tab" href="#seo">SEO</a>
                    </li>

                    <li class="nav-item"role="presentation">
                        <a class="nav-link  text-color" id="product_status-tab" data-toggle="tab" role="tab" href="#product_status">Product status</a>
                    </li>
                  </ul>
                 <div class="card-body">
                    <form action="{{url('store-product/'.$product_edit_view->id)}}"method="POST"enctype="multipart/form-data">

                        @csrf
                        <div class="tab-content">

                        <div class="tab-pane fade show active"id="product">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="Name">Select Sub-Category(Eg:Brands):</label>
                                      <select class="form-control" name="sub_category_id" required>
                                          <option value="{{$product_edit_view->sub_category_id}}">{{$product_edit_view->subcategory->name}}</option>
                                            @foreach($subcategory  as $item)

                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Name"class="text-color">Product Name:</label>
                                    <input type="text" class="form-control"name="name" placeholder="Enter Product Name" value="{{$product_edit_view->name}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Name">small_description:</label>
                                  <textarea class="form-control" name="small_description">{{$product_edit_view->small_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Name">Custom URL (Slug)</label>
                                  <input type="text" class="form-control"name="url"value="{{$product_edit_view->url}}">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Name">Sale Tag:</label>
                                  <input type="text" class="form-control"name="sale_tag"value="{{$product_edit_view->sale_tag}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">Product Image</label>
                                  <input type="file" class=" form-control"name="product_img">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                  <label for="Name">Image:</label>
                                   <img src="{{asset('upload/product/'.$product_edit_view->image)}}"style="width:30px;height:40px;">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                  <label for="Name">Original Price:</label>
                                  <input type="number" class="form-control"name="original_price"value="{{$product_edit_view->original_price}}">
                                </div>
                            </div>



                            <div class="col-md-2">
                                <div class="form-group">
                                  <label for="Name">Offer Price:</label>
                                  <input type="number" class="form-control"name="offer_price"value="{{$product_edit_view->offer_price}}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                  <label for="Name">Quantity:</label>
                                  <input type="number" class="form-control"name="quantity"value="{{$product_edit_view->quantity}}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                  <label for="Name">Priority:</label>
                                  <input type="number" class="form-control"name="priority"value="{{$product_edit_view->priority}}">
                                </div>
                            </div>


                        </div>
                        </div>

                        <div class="tab-pane fade  show "id="description"role="tabpanel">
                            <div class="row">


                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Name"class="text-color">High Lights:</label>
                                    <input type="text" class="form-control"name="p_highlight_heading" placeholder="Enter High Lights"value="{{$product_edit_view->p_highlight_heading}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                  {{-- <label for="Name">Description:</label> --}}
                                  <textarea class="form-control" name="p_highlights">{{$product_edit_view->p_highlights}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Name"class="text-color">Product Description:</label>
                                    <input type="text" class="form-control"name="p_description_heading" placeholder="Enter Product Description"value="{{$product_edit_view->p_description_heading}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                  {{-- <label for="Name">Description:</label> --}}
                                  <textarea class="form-control" name="p_description">{{$product_edit_view->p_description}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Name"class="text-color">Product Details/Specification:</label>
                                    <input type="text" class="form-control"name="p_details_heading" placeholder="Enter Name"value="{{$product_edit_view->p_details_heading}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                  {{-- <label for="Name">Description:</label> --}}
                                  <textarea class="form-control" name="p_details" id="summernote">{{$product_edit_view->p_details}}</textarea>
                                </div>
                            </div>



                        </div>
                        </div>

                        <div class="tab-pane fade  show "id="seo"role="tabpanel">
                            <div class="row">


                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Name">Meta Title:</label>
                                  <textarea class="form-control" name="meta_title">{{$product_edit_view->meta_title}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Name">Meta Description:</label>
                                  <textarea class="form-control" name="meta_description">{{$product_edit_view->meta_description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label for="Name">Meta Keywords:</label>
                                  <textarea class="form-control" name="meta_keyword">{{$product_edit_view->meta_keyword}}</textarea>
                                </div>
                            </div>



                        </div>
                        </div>

                        <div class="tab-pane fade  show "id="product_status"role="tabpanel">
                            <div class="row">


                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">New Arrivals:</label>
                                  <input type="checkbox" class="larger"name="new_arrival_products"style="width:100%; hight:100%;"{{$product_edit_view->new_arrival_products == '1' ? 'checked' : ''}}>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">Featured Proucts:</label>
                                  <input type="checkbox" class="larger"name="feature_products"style="width:100%; hight:100%;"{{$product_edit_view->feature_products == '1' ? 'checked' : ''}}>
                            </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">Popular Products:</label>
                                 <input type="checkbox" class="larger"name="popular_products" style="width:100%; hight:100%;"{{$product_edit_view->popular_products == '1' ? 'checked' : ''}}>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">Offer Products:</label>
                                  <input type="checkbox" class="larger"name="offers_products" style="width:100%; hight:100%;"{{$product_edit_view->offers_products == '1' ? 'checked' : ''}}>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="Name">Show Hide:</label>
                                  <input type="checkbox" class="larger"name="status" style="width:100%; hight:100%;"{{$product_edit_view->status == '1' ? 'checked' : ''}}>
                                </div>
                            </div>


                        </div>
                        </div>



                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                          <input type="submit" class="form-control btn btn-primary btn-sm "value="Update">

                          </div>
                    </div>


                      </form>
                 </div>


            </div>
         </div>
     </div>
   </div>

   <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection


