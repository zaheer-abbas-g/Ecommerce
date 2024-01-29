@extends('admin.layouts.master')

@section('content')


	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
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
        
        <form id='productForm' name="productForm" method="post" id="myDropzone" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                     
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"  value="{{$product->title}}" placeholder="Title">	
                                        <p id="title_eror" class="text-danger"> </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" value="{{$product->slug}}" placeholder="Slug" readonly>	
                                        <p id="slug_eror" class="text-danger"> </p> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{$product->description}}</textarea>
                                    </div>
                                </div>                                            
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3" style="height:400px ">
                        <div class="card-body" >
                           
                            <h2 class="h4 mb-3">Media</h2>								
                            <div id="image" name="image" class="dropzone dz-clickable" >
                                <div class="dz-message needsclick text-center" >    
                                    <br>Drop files here or click to upload.<br><br>                                            
                                </div>
                            </div>
                            <p id="image_eror" class="text-danger"> </p> 

                        </div>	                                                                      
                    </div>

                    <div class="card mb-3" style="height:400px ">
                        <div class="card-body">
                           
                            <table>
                                <tr>
                                    @if(!empty($productImage))
                                        @foreach ($productImage as $item)
                                        <td>
                                            <div class="card" style="height:150px; width:200px;margin:5px">
                                                <div >
                                                    <img src="{{asset('productimages/'.$item->image)}}" style="height:150px; width:200px;margin:5px">
                                                    <input type="hidden"  name="productid" value="{{$item->product_id}}">
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                    @endif
                                </tr>
                            </table>
                           

                        </div>	                                                                      
                    </div>


                
                          	                                                                      
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            <input type="text" value="{{$product->id}}" name="pr_id" id="pr_id">							
                            <h2 class="h4 mb-3">Pricing</h2>	
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}" placeholder="Price">	
                                        <p id="price_eror" class="text-danger"> </p> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="number" name="compare_price" id="compare_price" class="form-control" value="{{$product->compare_price}}" placeholder="Compare Price">
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
                                        <input type="text" name="sku" id="sku" class="form-control" value="{{$product->sku}}" placeholder="sku">	
                                        <p id="sku_eror" class="text-danger"> </p> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" value="{{$product->barcode}}" placeholder="Barcode">	
                                    </div>
                                </div>   
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input  type="hidden" name="track_qty" value="No" >
                                            <input  type="checkbox" class="custom-control-input"  id="track_qty" name="track_qty" value="Yes"
                                            {{($product->track_quantity == 'Yes')? 'chacked' : ''}} checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" value="{{$product->quantity}}" placeholder="Qty">	
                                        <p id="qty_eror" class="text-danger"> </p> 
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
                                        <option value="1" {{($product->status == 1) ? 'selected':''}}>Active</option>
                                        <option value="0" {{($product->status == 0) ? 'selected' : ''}}>Block</option>
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
                                                <option value="{{$category->id}}" {{($product->category_id == $category->id)?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    @endif 
                                </select>
                                <p id="category_eror" class="text-danger"> </p> 
                            </div>
                            <div class="mb-3">
                                <label for="category" >Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control" readonly>
                                    <option value="" selected disabled>select</option>
                                @if(!empty($subCategories_edit))
                                    @foreach ($subCategories_edit as $subCategories)
                                    <option value="{{$subCategories->id}}" {{($subCategories->id==$product->category_id)? 'selected':''}}>{{$subCategories->name}}</option>   
                                    @endforeach
                                @endif 
                                    </select>
                            </div>
                            <div class="mb-3" id="pid">
                                {{-- <input type="text" name="productid" id="proudct_id" class="form-control" value="3"> --}}
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
                                        @foreach ($brand as $brnd)
                                                <option value="{{$brnd->id}}" {{($product->brand_id== $brnd->id)? 'selected' : ''}}>{{$brnd->name}}</option>
                                        @endforeach
                                    @endif                                
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
                                    <option value="Yes" {{($product->is_featured == 'Yes')? 'selected' :''}}>Yes</option>                                                
                                    <option value="No" {{($product->is_featured == 'No')? 'selected' : ''}}>No</option>
                                </select>
                                <p id="featured_eror" class="text-danger"> </p> 
                            </div>
                        </div>
                    </div>                                 
                </div>
            </div>
            <div id="p"></div>
            
            <div class="pb-5 pt-3">
                <button type="button" id="productbtn" class="btn btn-primary">Update</button>
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

    $(document).ready(function(){
          
    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
    // $.ajaxSetup({
    //       headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       }
    // });
      
         

  
    var currentFile = null;
     const dropzone = $("#image").dropzone({ 
            url:  "{{url('admin/update-Productzone')}}",
            maxFiles: 10, 
            addRemoveLinks: true,
            autoProcessQueue: false,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            paramName: "image", 
            uploadMultiple: true,
            parallelUploads: 10,
            // maxFilesize: 2, // MB
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
             success:function(response){
                  console.log(response);
                 },
            init: function() {
                
                var myDropzone = this;
       
                $("#p").click(function (e) {
                    // alert(12);
                    // return;
                    e.preventDefault();
                    myDropzone.processQueue();
                  
                });

               
                
                  
                this.on("sending", function (file, xhr, formData) {
                    // Add custom data to the formData
                    formData.append("proudctid", $("#pr_id").val());
                    // Add any other custom data you want to send
                });
                this.on("processing", function() {
                    this.options.autoProcessQueue = true;
                });


                this.on("success", function(file, response) {
                //   myDropzone.removeFile(file);
                     myDropzone.removeAllFiles(true);
                });
            
                
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

        $('#productbtn').on('click',function(e){
            e.preventDefault();
            
            var formData = new FormData($('#productForm')[0]);
            
            $.ajax({
                url:"{{url('admin/product-update')}}",
                type:"post",
                data:formData,
                dataType:"json",
                processData:false,
                contentType:false,
                success:function(response){
                    // alert("kokok");
                    // $('#proudct_id').val(response.proudct_id);
                     $('#pid').append(`<input type="text" name="productid" id="proudct_id" class="form-control" value="${response.product_id}">`);
                    
                  var hangoutButton = document.getElementById("p");
                      hangoutButton.click(); // this will trigger the click event

                    console.log(response);
                    // console.log(response.product_id);

                    $('#productForm')[0].reset();
                    // $('#productbtn').prop('disabled','true');
                    $('#title_eror').html('');  
                    $('#slug_eror').html('');
                    $('#price_eror').html('');
                    $('#sku_eror').html('');
                    $('#category_eror').html('');
                    $('#featured_eror').html('');
                    $('#prouduct_id').html('');
                    $('#pid').html('');
                    
                    window.location.href="/admin/product";
                },
                error:function(e){
                    var error = e.responseJSON.errors;
                    console.log(error);
                    $('#title_eror').html(error.title);
                    $('#slug_eror').html(error.slug);
                    $('#price_eror').html(error.price);
                    $('#sku_eror').html(error.sku);
                    $('#category_eror').html(error.category);
                    $('#featured_eror').html(error.is_featured);
                    $('#sku_eror').html(error.sku);


                }

            })
        });


    });
</script>
<style>
    .dropzone {
    width: 300%;
    height: 80%;
    min-height: 0px !important;
    }   
    </style>
@endsection
