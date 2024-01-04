@extends('admin.layouts.master')


@section('content')



<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Category</h1>
                </div>
                {{-- <div class="col-sm-6 text-right">
                    <a href="{{url('admin/create-subcategory')}}" class="btn btn-primary">New Sub Category</a>
                </div> --}}
<!-- Button trigger modal -->
                <div class="col-sm-6 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    Create Sub Category
                </button>
                </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" >
          <h5  id="exampleModalLongTitle" class="text-center">Create sub category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">	
            <form action="" id="subCategory">					
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name">Category</label>
                                <select name="select_category" id="select_category" class="form-control">
                                    <option value="" selected disabled>select category</option>
                                </select>
                            </div>
                        </div>
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
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected disabled>select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>									
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="subbtn">Save</button>
                    </div>
                </form>	
                </div>
           
      </div>
    </div>
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
                                <th>Category</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>									
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section> 
    <!-- /.content -->

    <script>
        $(document).ready(function(){


            //// show category function call //////
            show_category();

            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });



           $("#subCategory").on("submit",function(e){
            e.preventDefault();

            var formData = new FormData($('#subCategory')[0]);
                $.ajax({
                    url:"{{url('admin/sub-category')}}",
                    type:"post",
                    data:formData,
                    dataType:"json",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success:function(response){
                        $('#exampleModalLong').modal('hide');
                        table.draw();
                    },
                });
           });  


            function show_category(){
                $.ajax({
                    url:"{{url('admin/show-category')}}",
                    type:"get",
                    dataType:"json",
                    success:function(response){
                        console.log(response.category);
                        $.each(response.category,function(key,value){
                            $('#select_category').append(`
                                 <option value="${value.id}">${value.name}</option>
                            `)
                        });
                    }
                });
           }


           
           /////////// Slug ///////////
           $('#name').on('change',function(){
               var value_slug = $('#name').val();
                $.ajax({
                    url:"{{route('sub.slug')}}",
                    type:"get",
                    data: {
                        sub_category:value_slug
                    },
                    dataType:"json",
                    success:function(response){
                        console.log(response);
                        $('#slug').val(response.sub);
                       }
                });
           });

            /**
                * @author Zaheer 
                * @description  Show Sub Category  
                * 
                */
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'slug', name: 'slug'},
                {data: 'categories', name: 'Category'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
      

   
                $('body').on('click', '.editProduct', function () {
                var category_id = $(this).data('id');
                $.ajax({
                    type:"get",
                    url:"{{url('/admin/category-sub-edit')}}"+"/"+category_id,
                    dataType:"json",
                    success:function(response){
                        // console.log(response);
                        $('#exampleModalLong').modal('show');
                        var subcategories_id = response.subcategory.category_id
                        console.log(subcategories_id);
                        
                       
                        $.each(response.categories,function(key,value){
                            var slected = "selected";
                            
                            if(subcategories_id==value.id){
                                $('#select_category').append(
                                `<option value="${value.id}" "selected">${value.id}</option>`
                             );
                            }
                           
                        });

                      

                    }
                });
                });



                $('body').on('click', '.deleteProduct', function () {
                var category_id = $(this).data('id');
                $.ajax({
                    type:"get",
                    url:"{{url('/admin/category-sub-delete')}}"+"/"+category_id,
                    dataType:"json",
                    success:function(response){
                        // console.log(response);
                        table.draw();
                    }
                });
            
                });


}); 
    </script>


@endsection


@section('title')
    sub category
@endsection


