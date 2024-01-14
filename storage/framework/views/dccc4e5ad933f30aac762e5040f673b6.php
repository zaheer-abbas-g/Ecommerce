

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
                            <div id="image" class="dropzone dz-clickable">
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
                                    <?php if(!empty($categories)): ?>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                                <select name="status" id="status" class="form-control">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    create products
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
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
            alert(category_id);
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

        $('#productForm').on('click',function(e){
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
                    console.log(response);
                },
                error:function(e){
                    console.log(e);
                }

            })
        });


    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce\resources\views/admin/product/create_products.blade.php ENDPATH**/ ?>