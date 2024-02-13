

<?php $__env->startSection('content'); ?>


	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="<?php echo e(url('admin/product')); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        
        <form id='productForm' action="<?php echo e(url('create-product')); ?>" name="productForm" method="post" id="myDropzone" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
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
                                        <p id="title_eror" class="text-danger"> </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>	
                                        <p id="slug_eror" class="text-danger"> </p> 
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
                        <div class="card-body" style="height:300px ">
                            <h2 class="h4 mb-3">Media</h2>								
                            <div id="image" name="image" class="dropzone dz-clickable">
                                <div class="dz-message needsclick text-center">    
                                    <br>Drop files here or click to upload.<br><br>                                            
                                </div>
                            </div>
                            <p id="image_eror" class="text-danger"> </p> 
                        </div>	                                                                      
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" id="price" class="form-control" placeholder="Price">	
                                        <p id="price_eror" class="text-danger"> </p> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="number" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
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
                                        <p id="sku_eror" class="text-danger"> </p> 
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
                                            <input  type="hidden" name="track_qty" value="No" >
                                            <input  type="checkbox" class="custom-control-input"  id="track_qty" name="track_qty" value="Yes" checked>
                                            <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">	
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
                                    <?php if(!empty($categories)): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <p id="category_eror" class="text-danger"> </p> 
                            </div>
                            <div class="mb-3">
                                <label for="category" >Sub category</label>
                                <select name="sub_category" id="sub_category" class="form-control" readonly>
                                    <option value="" selected disabled>select</option>
                                    
                                </select>
                            </div>
                            <div class="mb-3" id="pid">
                                
                            </div>
                        </div>
                    </div> 
                    <div class="card mb-3">
                        <div class="card-body">	
                            <h2 class="h4 mb-3">Product brand</h2>
                            <div class="mb-3">
                                <select name="brand" id="brand" class="form-control">
                                    <option value="" selected disabled>select</option>

                                    <?php if(!empty($brand)): ?>
                                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>      
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                                    <option value="Yes">Yes</option>                                                
                                    <option value="No">No</option>
                                </select>
                                <p id="featured_eror" class="text-danger"> </p> 
                            </div>
                        </div>
                    </div>                                 
                </div>
            </div>
            <div id="p"></div>
            
            <div class="pb-5 pt-3">
                <button type="button" id="productbtn" class="btn btn-primary">Create</button>
                <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
        </form>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    create products
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
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
            url:  "<?php echo e(url('admin/create-Productzone')); ?>",
            maxFiles: 1, 
            addRemoveLinks: true,
            autoProcessQueue: false,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            paramName: "image", 
            uploadMultiple: true,
            parallelUploads: 10,
            // maxFilesize: 2, // MB
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            //  success:function(response){
            //       console.log(response);
            //      }
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
                    formData.append("proudctid", $("#proudct_id").val());
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
                url:'<?php echo e(url("admin/product-slug")); ?>',
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
                url:"<?php echo e(url('admin/product-sub-category')); ?>",
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
                url:"<?php echo e(url('admin/product-store')); ?>",
                type:"post",
                data:formData,
                dataType:"json",
                processData:false,
                contentType:false,
                success:function(response){
                    Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                         });
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce\resources\views/admin/product/create_products.blade.php ENDPATH**/ ?>