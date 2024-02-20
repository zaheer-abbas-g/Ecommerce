<?php $__env->startSection('content'); ?>

<section class="section-1">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <img src="images/carousel-1.jpg" class="d-block w-100" alt=""> -->

                <picture>
                    <source media="(max-width: 799px)" srcset="<?php echo e(asset('front_assets/images/carousel-1-m.jpg')); ?>" />
                    <source media="(min-width: 800px)" srcset="<?php echo e(asset('front_assets/images/carousel-1.jpg')); ?>" />
                    <img src="<?php echo e(asset('front_assets/images/carousel-1.jpg')); ?>" alt="" />
                </picture>

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Kids Fashion</h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                
                <picture>
                    <source media="(max-width: 799px)" srcset="<?php echo e(asset('front_assets/images/carousel-2-m.jpg')); ?>" />
                    <source media="(min-width: 800px)" srcset="<?php echo e(asset('front_assets/images/carousel-2.jpg')); ?>" />
                    <img src="<?php echo e(asset('front_assets/images/carousel-2.jpg')); ?>" alt="" />
                </picture>

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Womens Fashion</h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <!-- <img src="images/carousel-3.jpg" class="d-block w-100" alt=""> -->

                <picture>
                    <source media="(max-width: 799px)" srcset="<?php echo e(asset('front_assets/images/carousel-3-m.jpg')); ?>" />
                    <source media="(min-width: 800px)" srcset="<?php echo e(asset('front_assets/images/carousel-3.jpg')); ?>" />
                    <img src="<?php echo e(asset('front_assets/images/carousel-2.jpg')); ?>" alt="" />
                </picture>

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Shop Online at Flat 70% off on Branded Clothes</h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                        <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>                    
            </div>
            <div class="col-lg-3 ">
                <div class="box shadow-lg">
                    <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">Free Shipping</h2>
                </div>                    
            </div>
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">14-Day Return</h2>
                </div>                    
            </div>
            <div class="col-lg-3 ">
                <div class="box shadow-lg">
                    <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>                    
            </div>
        </div>
    </div>
</section>
<section class="section-3">
    <div class="container">
        <div class="section-title">
            <h2>Categories</h2>
        </div>           
        
        <div class="row pb-3">
            <?php if($categories->isNotEmpty()): ?>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <div class="col-lg-3">            
                <div class="cat-card" style="height: 50%">
                    <div class="left"  >
                        <?php if($category->image !=""): ?>
                            <img src="<?php echo e(asset('/images/'.$category->image)); ?>" alt=""  class="img-fluid" style="height: 100%">
                        <?php endif; ?>
                    </div>
                    <div class="right" >
                        <div class="cat-data">
                            <h2><?php echo e($category->name); ?></h2>
                            <p>100 Products</p>
                        </div>
                    </div>
                </div>  
            </div>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
                  <?php echo e("Category not Found"); ?>

         <?php endif; ?>
       

        </div>
    </div>
</section>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Featured Products</h2>
        </div>    
        <div class="row pb-3">
            <?php if(count($products)>0): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
            <div class="col-md-3">
                <div class="card product-card">
                    <div class="product-image position-relative">
                        <?php if($product->product_images->isNotEmpty()): ?>
                            <?php $__currentLoopData = $product->product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="" class="product-img"><img class="card-img-top" src="<?php echo e(asset('/productimages/'.$value->image)); ?>" alt=""></a>
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

            <?php else: ?>
                    <?php echo e("NO Featured Products Found"); ?>

        <?php endif; ?>



                
        </div>
    </div>
</section>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Latest Produsts</h2>
        </div>    
        <div class="row pb-3">
            <?php if(count($latestproducts)>0): ?>
                <?php $__currentLoopData = $latestproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <?php if($latestproduct->product_images->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $latestproduct->product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="" class="product-img"><img class="card-img-top" src="<?php echo e(asset('/productimages/'.$value->image)); ?>" alt=""></a>
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
                            <a class="h6 link" href="product.php"><?php echo e($latestproduct->title); ?></a>
                            <div class="price mt-2">
                                <span class="h5"><strong>$<?php echo e($latestproduct->price); ?></strong></span>
                                <span class="h6 text-underline"><del>$<?php echo e($latestproduct->compare_price); ?></del></span>
                            </div>
                        </div>                        
                    </div>                                               
                </div>            
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php echo e("No Latest Produsts Found"); ?>

            <?php endif; ?>
          
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ecommerce\resources\views/front/home.blade.php ENDPATH**/ ?>