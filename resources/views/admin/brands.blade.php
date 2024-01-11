@extends('admin.layouts.master')


@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6 text-right"> 
                    {{-- <a href="{{url('admin/brand/create')}}" class="btn btn-primary">New Brand</a> --}}
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
                                    <option selected disabled>select</option> 
                                    <option value="1">Active</option> 
                                    <option value="0">Block</option> 
                                </select>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="hidden" name="brand_id" id="brand_id" class="form-control">	
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

            $('.modal').on('hidden.bs.modal',function(){
                $("#status").val('').trigger('change');
                $('#name').val('');
                $('#slug').val('');
                $('#status').val('select');
                $('#heading').html('Create Brand');
                $('#brandbtn').html('Save Brand');
            })

            var table = $('.data-table').DataTable({
                processing: true,
                // serverSide: true,
                ajax:"{{route('brand.index')}}",
                columns:[
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name','name':'Name'},
                    {data: 'slug','name':'Slug'},
                    {data: 'status','name':'status'},
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
                    url:"{{url('admin/brand')}}",
                    type:"post",
                    data:brad_data,
                    dataType:"json", 
                    processData: false,
                    contentType: false, 
                    cache: false,
                    success:function(response){
                        table.draw();
                    console.log(response);
                    $(".modal").modal("hide"); 
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    }
                })

             
            }); 

            ///    Change Slug name /////

            $("#name").on("change",function(){
                    var slug= $('#name').val();
                    $.ajax({
                        url:"{{route('brand.slug')}}",
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



                ///////// Edit Brnad /////////

                $('body').on('click','.editProduct',function(){
                   
                    var brand_id = $(this).data('id');
                    $.ajax({
                        url:"{{url('admin/brand-edit')}}"+'/'+brand_id,
                        type:"get",
                        dataType:"json",
                        success:function(response){
                            console.log(response)
                            $('.modal').modal('show');
                            $('#name').val(response.name);
                            $('#slug').val(response.slug);
                            $('#brand_id').val(response.id);
                            $('#status').val(response.status).trigger('change');
                            $("#heading").html('Edit brnad');
                            $('#brandbtn').html('Edit');
                            table.draw();
                        }
                    });
                })


                ////////// Delete Brand //////

                $('body').on('click','.deleteProduct',function(){

                    var brand_id = $(this).data('id');
                       
                    $.ajax({
                        url:"{{url('admin/brand-destroy')}}"+'/'+brand_id,
                        type:"delete",
                        dataType:"json",
                        cache: false,
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
                            table.draw();
                        }
                    });
                }); 
        });
           

    </script>

@endsection


@section('title')
    brands
@endsection


