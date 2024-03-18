

<?php $__env->startSection('content'); ?>

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
                            
                            <?php if($shop['categories']->isNotEmpty()): ?>
                            <?php $__currentLoopData = $shop['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                               
                            <div class="accordion-item">

                            <?php if($item->subCategories->isNotEmpty()): ?>

                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed <?php echo e(($item->id == $categorySelected) ? 'text-primary' : " "); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo e($key); ?>" aria-expanded="false" aria-controls="collapseOne-<?php echo e($key); ?>">
                                <?php echo e($item->name); ?>

                            </button>
                                    </h2>  
                            <?php else: ?>
                                <a href="<?php echo e(route('front.shop',$item->slug)); ?>" class="nav-item nav-link"><?php echo e($item->name); ?></a>
                            <?php endif; ?>
                            
                            
                            <?php if($item->subCategories->isNotEmpty()): ?>
                                <div id="collapseOne-<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e(($categorySelected == $item->id) ? 'show':''); ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <div class="navbar-nav">
                                            <?php $__currentLoopData = $item->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <a href="<?php echo e(route('front.shop',[$item->slug,$value->slug])); ?>" class="nav-item nav-link <?php echo e(($subCategorySelected == $value->id) ? 'text-primary':' '); ?>"><?php echo e($value->name); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                   
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </div>  

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                 <?php echo e("No Categories Found"); ?>

                           <?php endif; ?>
                                           
                        </div>
                    </div>
                </div>

                <div class="sub-title mt-5">
                    <h2>Brand</h3>
                </div>
                
                <div class="card">
                    <div class="card-body">
                   
                        <?php if($shop['brands']->isNotEmpty()): ?>
                        <?php $__currentLoopData = $shop['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check mb-2">
                               <?php if(!empty($brandsarray)): ?>
                                   
                               <input <?php echo e(in_array($brand->id, $brandsarray) ? 'checked' :' '); ?> class="form-check-input brand-label" type="checkbox" name="brand[]" value="<?php echo e($brand->id); ?>" id="brand-<?php echo e($brand->id); ?>">
                               <?php else: ?>
                               <input  class="form-check-input brand-label" type="checkbox" name="brand[]" value="<?php echo e($brand->id); ?>" id="brand-<?php echo e($brand->id); ?>"> 
                               <?php endif; ?>
                               <label class="form-check-label" for="brand-<?php echo e($brand->id); ?>">
                                <?php echo e($brand->name); ?>

                                </label>
                            </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <?php else: ?>
                            <?php echo e("No Brand Found"); ?>

                        <?php endif; ?>         
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
                                

                                <select name="sort" id="sort" class="dropdown show" >

                                    <option value="" disabled selected>select</option>
                                    <option value="latest" <?php echo e(($sort=='latest')?'selected':''); ?>>latest</option>
                                    <option value="price_desc"  <?php echo e(($sort  =='price_desc')? 'selected':''); ?>>Price High</option>
                                    <option value="price_asc" <?php echo e(($sort =='price_asc')?'selected':''); ?>>Price Low</option>
                                </select>
                            
                            </div>
                        </div>
                    </div>

                 

                    <?php if($shop['products']->isNotEmpty()): ?>
                            <?php $__currentLoopData = $shop['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <?php if($shop['products']->isNotEmpty()): ?>
                                                <?php $__currentLoopData = $product->product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                                    <img class="card-img-top" src="<?php echo e(asset('/productimages/'.$product_image->image)); ?>" alt="">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <a class="whishlist" href="222"><i class="far fa-heart"></i></a>                            
        
                                        <div class="product-action">
                                            <a class="btn btn-dark" href="#">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>                            
                                        </div>
                                    </div>                        
                                    <div class="card-body text-center mt-3">
                                        <a class="h6 link" href="product.php"><?php echo e($product->title); ?></a>
                                        <div class="price mt-2">
                                            <span class="h5"><strong>$<?php echo e($product->price); ?></strong></span>
                                            <?php if($product->compare_price>0): ?>
                                            <span class="h6 text-underline"><del>$<?php echo e($product->compare_price); ?></del></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>                        
                                </div>                                               
                            </div>  
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
        </div>
    </div>
</section>

    
<?php $__env->stopSection(); ?>


<?php $__env->startSection('customjs'); ?>

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

            var url = '<?php echo e(url()->current()); ?>?' ;
            console.log(url);

            url +='&price_min='+slider.result.from+'&price_max='+slider.result.to;


            url +='&sort='+$("#sort").val();

            window.location.href = url+'&brand='+brands.toString();
        }   

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ecommerce\resources\views/front/shop.blade.php ENDPATH**/ ?>