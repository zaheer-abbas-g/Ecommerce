@extends('admin.layouts.master')


@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{url('admin/create-product')}}" class="btn btn-primary">New Product</a>
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
                                <th>ID</th>
                                <th>image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SKU</th>
                                <th>Status</th>
                                <th>Action</th>
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

        $(function(){
          
                /**
                 * 
                 *  Pass Header token
                 */

            $.ajaxSetup({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
            });


                /**
                 * 
                 *  Render Datatable
                */

                var table = $('.data-table').DataTable({
                    processing:true,
                    serverSide:true,
                    ajax:"{{url('admin/product')}}",
                    columns:[
                        {data:'DT_RowIndex',name:'DT_RowIndex'},
                        {data:'image',name:'image'},
                        {data:'title',name:'Title'},
                        {data:'price',name:'Price'},
                        {data:'sku',name:'Sku'},
                        {data:'quantity',name:'Quantity'},
                        {data:'status',name:"Status"},
                        {data:'action',name:'action',orderable:false, searchable:false}
                    ]
                });

        });
    </script>
@endsection


@section('title')
    products
@endsection