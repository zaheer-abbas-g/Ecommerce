@extends('front.layouts.app')

@section('content')

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Shop</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-6 pt-5">
    <div class="container">
        <div class="row">            
            <div class="col-md-3 sidebar">
                <div class="sub-title">
                    <h2>Categories</h3>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="accordion accordion-flush" id="accordionExample">
                            {{-- @dd($categorySelected); --}}
                            @if ($shop['categories']->isNotEmpty())
                            @foreach ($shop['categories'] as $key=>$item)
                            {{-- @dd($item->id); --}}
                               
                            <div class="accordion-item">

                            @if($item->subCategories->isNotEmpty())

                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed {{ ($item->id == $categorySelected) ? 'text-primary' : " " }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$key}}" aria-expanded="false" aria-controls="collapseOne-{{$key}}">
                                {{$item->name}}
                            </button>
                                    </h2>  
                            @else
                                <a href="{{route('front.shop',$item->slug)}}" class="nav-item nav-link">{{$item->name}}</a>
                            @endif
                            
                            
                            @if($item->subCategories->isNotEmpty())
                                <div id="collapseOne-{{$key}}" class="accordion-collapse collapse {{ ($categorySelected == $item->id) ? 'show':'' }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <div class="navbar-nav">
                                            @foreach ($item->subCategories as $value)
                                                 <a href="{{route('front.shop',[$item->slug,$value->slug])}}" class="nav-item nav-link {{ ($subCategorySelected == $value->id) ? 'text-primary':' ' }}">{{$value->name}}</a>
                                            @endforeach                                   
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>  

                            @endforeach
                            @else
                                 {{"No Categories Found"}}
                           @endif
                                           
                        </div>
                    </div>
                </div>

                <div class="sub-title mt-5">
                    <h2>Brand</h3>
                </div>
                
                <div class="card">
                    <div class="card-body">
                   
                        @if($shop['brands']->isNotEmpty())
                        @foreach ($shop['brands'] as $brand)
                            <div class="form-check mb-2">
                               @if (!empty($brandsarray))
                                   
                               <input {{in_array($brand->id, $brandsarray) ? 'checked' :' ' }} class="form-check-input brand-label" type="checkbox" name="brand[]" value="{{$brand->id}}" id="brand-{{$brand->id}}">
                               @else
                               <input  class="form-check-input brand-label" type="checkbox" name="brand[]" value="{{$brand->id}}" id="brand-{{$brand->id}}"> 
                               @endif
                               <label class="form-check-label" for="brand-{{$brand->id}}">
                                {{$brand->name}}
                                </label>
                            </div> 
                        @endforeach 
                        @else
                            {{"No Brand Found"}}
                        @endif         
                    </div>
                </div>

                <div class="sub-title mt-5">
                    <h2>Price</h3>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <input type="text" id="my_range" class="js-range-slider" name="my_range" value="" />             
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <div class="ml-2">
                                {{-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Price High</a>
                                        <a class="dropdown-item" href="#">Price Low</a>
                                    </div>
                                </div>                                     --}}

                                <select name="sort" id="sort" class="dropdown show" >

                                    <option value="" disabled selected>select</option>
                                    <option value="latest" {{($sort=='latest')?'selected':''}}>latest</option>
                                    <option value="price_desc"  {{($sort  =='price_desc')? 'selected':''}}>Price High</option>
                                    <option value="price_asc" {{($sort =='price_asc')?'selected':''}}>Price Low</option>
                                </select>
                            
                            </div>
                        </div>
                    </div>

                 

                    @if ($shop['products']->isNotEmpty())
                            @foreach ($shop['products'] as $product)     
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        @if ($shop['products']->isNotEmpty())
                                                @foreach ($product->product_images as $product_image)   
                                                    <img class="card-img-top" src="{{asset('/productimages/'.$product_image->image)}}" alt="">
                                                @endforeach
                                        @endif
                                        <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            
        
                                        <div class="product-action">
                                            <a class="btn btn-dark" href="#">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>                            
                                        </div>
                                    </div>                        
                                    <div class="card-body text-center mt-3">
                                        <a class="h6 link" href="product.php">{{$product->title}}</a>
                                        <div class="price mt-2">
                                            <span class="h5"><strong>${{$product->price}}</strong></span>
                                            @if ($product->compare_price>0)
                                            <span class="h6 text-underline"><del>${{$product->compare_price}}</del></span>
                                            @endif
                                        </div>
                                    </div>                        
                                </div>                                               
                            </div>  
                            @endforeach
                            @endif
                            
                        </div>
                    </div>
        </div>
    </div>
</section>

    
@endsection


@section('customjs')

<script>

rangeSlider = $(".js-range-slider").ionRangeSlider({
            type : "double",
            min  : 0,
            max  : 1000,
            from : 0,
            step : 3,
            to   : 500,
            skin : "round",
            max_postfix : "+",
            prefix : "$",
            onFinish:function(){
                apply_filters()
            }
});



///// proce rage
var slider = $(".js-range-slider").data("ionRangeSlider");

            $(".brand-label").change(function(){
                    apply_filters();
            });

///////// Sortings
            $("#sort").change(function(){
                apply_filters();
            });



////////////// brands filter            
       function apply_filters(){
            
            var brands = [];
            $('.brand-label').each(function(){
                if($(this).is(':checked') == true){
                    brands.push($(this).val());
                }

            });
            console.log(brands.toString());

            var url = '{{url()->current() }}?' ;
            console.log(url);

            url +='&price_min='+slider.result.from+'&price_max='+slider.result.to;


            url +='&sort='+$("#sort").val();

            window.location.href = url+'&brand='+brands.toString();
        }   

</script>

@endsection