@extends('admin.layouts.master')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{url('admin/product')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form id='productForm' name="productForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">	
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>	
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                    </div>
                                </div>                                            
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Media</h2>								
                            <div id="image" name="image" class="dropzone dz-clickable">
                                <div class="dz-message needsclick">    
                                    <br>Drop files here or click to upload.<br><br>                                            
                                </div>
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">	
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                        <p class="text-muted mt-3">
                                            To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                        </p>	
                                    </div>
                                </div>                                            
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Inventory</h2>								
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">	
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">	
                                    </div>
                                </div>   
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
                                    </div>
                                </div>                                         
                            </div>
                        </div>	                                                                      
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Product status</h2>
                            <div class="mb-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected disabled>select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="card">
                        <div class="card-body">	
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                   
                                    <option value="" selected disabled>select</option>
                                    @if(!empty($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="" selected disabled>select</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="brand" id="brand" class="form-control">
                                    <option value="" selected disabled>select</option>

                                    @if(!empty($brand))
                                            @foreach ($brand as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>      
                                            @endforeach
                                    @endif
                                    {{-- <option value="">Apple</option>
                                    <option value="">Vivo</option>
                                    <option value="">HP</option>
                                    <option value="">Samsung</option>
                                    <option value="">DELL</option> --}}
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Featured product</h2>
                            <div class="mb-3">
                                <select name="is_featured" id="is_featured" class="form-control">
                                    <option value="" selected disabled>select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>                                                
                                </select>
                            </div>
                        </div>
                    </div>                                 
                </div>
            </div>
            
            <div class="pb-5 pt-3">
                <button type="button" class="btn btn-primary">Create</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
        </form>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('title')
    create products
@endsection



@section('script')
<script>
    Dropzone.autoDiscover = false;    
    // $(function () {
    //     // Summernote
    //     $('.summernote').summernote({
    //         height: '300px'
    //     });
       
    //     // const dropzone = $("#image").dropzone({ 
    //     //     url:  "create-product.html",
    //     //     maxFiles: 5,
    //     //     addRemoveLinks: true,
    //     //     acceptedFiles: "image/jpeg,image/png,image/gif",
    //     //     headers: {
    //     //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //     //     }, success: function(file, response){
    //     //         $("#image_id").val(response.id);
    //     //     }
    //     // });

    // });

    $(document).ready(function(){


          
    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
      
         

        $('.summernote').summernote({
            height: '300px'
        });

        ///////////// change slug /////////
        $('#title').on('change',function(){
            var slug = $('#title').val();
            $.ajax({
                type:"get",
                url:'{{url("admin/product-slug")}}',
                data:{
                    slug_name:slug
                },
                dataType:"json",
                success:function(response){
                    console.log(response);

                    $('#slug').val(response.slug);
                },
                error:function(error){
                    var e = error.responseJSON.errors;
                    console.log(e);
                }
            });
        })

        //////////////// change  sub category ////////////////
        
        $('#category').on('change',function(){

        

            var category_id = $('#category').val();
            alert(category_id);
            $.ajax({
                url:"{{url('admin/product-sub-category')}}",
                type:"get",
                data:{
                    'category_id': category_id
                },
                dataType:"json",
                success:function(response){
                    $('#sub_category').find('option').not(":first").remove();
                    $.each(response.subcategories,function(key,value){
                        $('#sub_category').append(
                            `<option value="${value.id}">${value.name}</option>`
                            );
                            $('#sub_category').val(value.id).trigger('change'); 
                        });
                    
                }
            })
        });


        //////////// Product Form //////////

        $('#productForm').on('click',function(e){
            e.preventDefault();

            var formData = new FormData($('#productForm')[0]);
            $.ajax({
                url:"{{url('admin/product-store')}}",
                type:"post",
                data:formData,
                dataType:"json",
                processData:false,
                contentType:false,
                success:function(response){
                    console.log(response);
                },
                error:function(e){
                    console.log(e);
                }

            })
        });


    });
</script>

@endsection
