<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 id="heading">Create Category</h1>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">								
                <form id="form_data" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2"> </div>
                        <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            <span id="name_error" class="text-danger"> </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="email">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" readonly>	
                            <span id="slug_error" class="text-danger"> </span>
                        </div>
                    </div>
                </div>
            <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="email">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                        </div>
                        <span id="status_error" class="text-danger"> </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="field" >
                            <label for="Upload">Upload</label>
                            <input type='file' id='input1' name="input1" class="mb-3">
                           
                            <img src="<?php echo e(asset('admin_assets/img/demo.png')); ?>" id='imagepreview1' />
                           
                            <div id="cancel"></div>
                            </div>
                        </div>
                        <span id="status_error" class="text-danger"> </span>
                        
                        <div class="mb-3"> 
                            <input type="text" id="category_id" name="category_id">
                        </div>
                    </div>
                </div>
                    	
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-success btn sm" id="savebtn">Save</button>
                        <button class="btn btn-warning btn-outline-dark ml-3" id="cancel_btn">Cancel</button>
                    </div>
                </div>  
            </div>
            </form>
    </div>							
</div>
</div>
    <!-- /.card -->
</section>
<!-- /.content -->



<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
               
            <div class="card-body table-responsive p-0">								
                <table id="example" class="table .data-table table-bordered" style="width:100%">
                    <thead class="bg-secondary">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>status</th>
                            <th>image</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody id="body_data">

                    </tbody>
                    </table>										
            </div>
            
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->


<script>

$(document).ready(function(){
        // new DataTable('#example')
        var t = $('#example').DataTable();


        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    ////////// this function load data ////////
        index();

       
    ////////// this function get data ////////
         function index(){
            $.ajax({
                url:"<?php echo e(route('category.index')); ?>",
                type:"post",
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $.each(response,function(key,value){
                        t.row.add([value.id,value.name,value.slug,
                        `<span>${(value.status==true)?"<p class='btn btn-success btn-sm' style='width:80px; height:30px'>active</p>":"<p class='btn btn-warning btn-sm' style='width:80px; height:30px'>block </p>"}</span>`,
                            `<img src='/images/${value.image}'  width="70px" height="80px"/>`,
                             `<td><a href="javascript:void(0);" class="editRecord" data-id="${value.id}">
                                <i class="fas fa-edit" style="font-size:36px;color:success"></i> 
                            </a></td> &nbsp`+
                            ` <a href="javascript:void(0)" class="deleteRecord" data-id="${value.id}">
                                 <i class="far fa-trash-alt" style="font-size:36px;color:red"></i>
                            </a>`
                            ])
                    });
                    t.draw();
                }
            })
         }




        $("#savebtn").on("click",function(event)
        {   
            event.preventDefault();
                var formdata = new FormData($('#form_data')[0]);
                $.ajax({
                    url:"<?php echo e(route('category.store')); ?>",
                    type:"post",
                    data:formdata,
                    contentType: false,
                    processData: false,
                    processing: true,
                    enctype: 'multipart/form-data',
                    cache: false,        
                    success:function(response){
                        console.log(response);
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                         });
                         $("#savebtn").html("Save");
                         $("#heading").html("Create Category");
                         $("#name_error").html('');
                         $('#slug_error').html('');
                         $('#status_error').html('');
                         $('#imagepreview1').attr('src',"");
                         $("#form_data")[0].reset();
                         window.scrollTo(300, 600);
                         t.rows().remove().draw();
                         index();
                         
                       
                    },
                    error:function(error){
                        var e = error.responseJSON.errors;
                        $("#name_error").html(e.name);
                        $('#slug_error').html(e.slug);
                        $('#status_error').html(e.status);
                        // $('#imagepreview1').attr('src',"");

                    }
                });  
        });

        /////// change slug value //////
            $('#name').on('change',function(){
                var slug =   $('#name').val();
                    $.ajax({
                        url:"<?php echo e(route('change.slug')); ?>",
                        type:"get",
                        data:{
                            title:slug,
                        },
                        dataType:"json",
                        success:function(response){
                            $('#slug').val(response.slug);
                        },
                        error:function(xhr){
                            console.log(xhr.responseJSON().errors);
                        }
                    });
            });

                $('#cancel_btn').on('click',function(e){
                    e.preventDefault();
                    $("#form_data")[0].reset();
                });

          ///////////// Edit Category ////////////////

                $('body').on("click",'.editRecord',function(){
                    var category_id = $(this).data('id');   
                    $.ajax({
                            type:"get",
                            url:"<?php echo e(url('admin/category-edit')); ?>"+"/"+category_id,
                            dataType:"json",
                            success:function(response){
                                console.log(response);
                             $("#name").val(response.name);
                             $('#slug').val(response.slug);
                             $('#status').val(response.status);
                            //  $("imagepreview1").attr("src","");
                             $("#imagepreview1").attr("src","/images/"+response.image);
                             $(window).scrollTop(0);
                             $("#savebtn").html("Edit");
                             $("#heading").html("Edit Category");
                             $('#category_id').val(response.id);
                        
                              t.draw();
                            }
                    });

                });


                $("body").on("click",'.deleteRecord',function(){
                    var category_id = $(this).data('id');
                    
               
                            Swal.fire({
                            text: "Are you sure you want to delete this item?",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "<span>Delete</span>"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url:"<?php echo e(url('admin/category-delete')); ?>"+"/"+category_id,
                                    type:"get",
                                    dataType:"json",
                                    success:function(response){
                                        console.log(response);
                                        Swal.fire({
                                            title: "Deleted",
                                            text: response.message,
                                            icon: "success",
                                            timer: 1500,
                                            customClass: 'swal-height',
                                            showConfirmButton: false,
                                            
                                        });
                                        t.rows().remove().draw();
                                        index();
                                    }
                                });
                            }
                        });
                });




             ////////  Image Preview ////////
                function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                    $('#imagepreview1').prop('src', e.target.result).show();
                    }
                    reader.readAsDataURL(input.files[0]);
                    }
                    }
                    $("#input1").change(function () {
                    readURL(this);
                    $('#imagepreview1').show();
                    });

                    $("#input1").click(function () {  
                    $('#imagepreview1').attr('src','');
                    });

                    $('#imagepreview1').click(function(){
                    $('#input1').replaceWith($('#input1').clone(true));
                    $('#imagepreview1').hide();
                    });

                    $('#cancel').click(function(e)
                        {
                        var f = $('#imagepreview1').attr('src',true);   
                            $('#input1').val("");
                            $('#imagepreview1').attr("src","");
                    })

});
</script>
<?php $__env->stopSection(); ?>







<?php $__env->startSection('title'); ?>
    category
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\YahooEcommerce\Ecommerce\resources\views/admin/categories.blade.php ENDPATH**/ ?>