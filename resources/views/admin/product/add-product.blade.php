@extends('admin.master')

@section('title')
Add Product
@endsection
@section('body')




     <div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="text-center text-success">Add Product Form</h4>

        </div>
        <div class="pannel-body">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
            <form action="{{route('new-product')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                {{csrf_field()}}

                <div class="form-group">
                    <label class="control-label col-md-4">Category Name</label>
                    <div class="col-md-8">
                        <select class="form-control" name="category_id">
                            <option>-----Select Category Name-----</option>
                            @foreach ($categories as $category)
                                
                            <option value="{{ $category->id}}"> {{ $category->category_name}} </option>
                            @endforeach

                        </select>
                        <span class="text-danger"> {{ $errors-> has('brand_name') ? $errors->first('brand_name'): ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Brand Name</label>
                    <div class="col-md-8">
                        <select class="form-control" name="brand_id">
                            <option>-----Select Brand Name-----</option>
                            @foreach ($brands as $brand)
                                
                            <option value="{{ $brand->id}}"> {{ $brand->brand_name}} </option>
                            @endforeach
                        </select>
                        <span class="text-danger"> {{ $errors-> has('brand_name') ? $errors->first('brand_name'): ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Product name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="product_name"/> 
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Product price</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="product_price"/> 
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Product Quantity</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="product_quantity"/> 
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Short descriptiopn</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="short_description"> </textarea>
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-4">Long descriptiopn</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="editor" name="long_description"> </textarea>
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-4">Product Image</label>
                    <div class="col-md-8">
                        <input type="file"  name="product_image" accept="image/*"/>
                        <span class="text-danger"> {{ $errors-> has('brand_description') ? $errors->first('brand_description'): ' '}}</span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Publication status</label>
                    <div class="col-md-8 radio">
                       <label>  <input type="radio"  name="publication_status" value="1"/>Published</label>
                       <label>  <input type="radio"  name="publication_status" value="0"/>Unpublished</label>
                       <span class="text-danger"> {{ $errors-> has('publication_status') ? $errors->first('publication_status'): ' '}}</span>

                    </div>
                </div>

                <div class="form-group">
                   
                    <div class="col-md-8 col-md-offset-4">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info"/>
                        
                    </div>
                
            </form>
        </div>   
    </div>
    </div>

     </div> 
    
@endsection