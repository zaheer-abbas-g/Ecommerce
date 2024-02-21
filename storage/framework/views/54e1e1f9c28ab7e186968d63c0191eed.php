

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
                                <input class="form-check-input" type="checkbox" name="brand[]" value="<?php echo e($brand->id); ?>" id="brand-<?php echo e($brand->id); ?>">
                                <label class="form-check-label" for="flexCheckDefault">
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
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                $0-$100
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                $100-$200
                            </label>
                        </div>                 
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                $200-$500
                            </label>
                        </div> 
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                $500+
                            </label>
                        </div>                 
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Price High</a>
                                        <a class="dropdown-item" href="#">Price Low</a>
                                    </div>
                                </div>                                    
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
<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ecommerce\resources\views/front/shop.blade.php ENDPATH**/ ?>