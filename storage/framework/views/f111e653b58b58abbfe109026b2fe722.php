


<?php $__env->startSection('content'); ?>
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6 text-right"> 
                    
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewBrand"> Create Brand </a>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <form id="brand-form">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="heading">Create Brand</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="email">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Active</option> 
                                    <option value="0">Block</option> 
                                </select>
                            </div>
                        </div>   
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" id="brandbtn">Save brand</button>
                    </div>
                  </div>
                </form>
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
                <div class="card-body table-responsive p-0">								
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            
            /////////// show Brand ////////////

            var table = $('.data-table').DataTable({
                processing: true,
                // serverSide: true,
                ajax:"<?php echo e(route('brand.index')); ?>",
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name','name':'Name'},
                    {data: 'slug','name':'Slug'},
                    {data: 'status','name':'Status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
            });


            $("#createNewBrand").on("click",function(){
                $(".modal").modal("show");
            });

            $('#brandbtn').on('click',function(e){
                e.preventDefault();
                // var form =  $()
                
                var brad_data = new FormData($("#brand-form")[0]);
                $.ajax({
                    url:"<?php echo e(url('admin/brand')); ?>",
                    type:"post",
                    data:brad_data,
                    dataType:"json", 
                    processData: false,
                    contentType: false, 
                    success:function(response){
                    console.log(response);
                    $(".modal").modal("hide"); 
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    table.draw();
                    }
                })

             
            }); 

            ///    Change Slug name /////

            $("#name").on("change",function(){
                    var slug= $('#name').val();
                    $.ajax({
                        url:"<?php echo e(route('brand.slug')); ?>",
                        type:"get",
                        data:{
                           brand_slug: slug
                        },
                        dataType:"json",
                        success:function(response){
                            // console.json(response.slug_brand);
                            $("#slug").val(response.slug_brand);
                        }
                    });
                });
        });
           

    </script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    brands
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce\resources\views/admin/brands.blade.php ENDPATH**/ ?>