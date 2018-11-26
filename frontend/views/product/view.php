<?php
use yii\helpers\Html;
use yii\helpers\Url;
Url::base();
Url::base(true);
Url::base('https');
Url::base('http');
Url::base('');
//$this->title = 'My Yii Application';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                        <?= \frontend\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                </div>
            </div>

            <?php
                $mainImg = $product->getImage();
                $gallery = $product->getImages();
            ?>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
<!--                            --><?//= Html::img($mainImg->getUrl(), ['alt' => $product->name])?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($product->img) ?>" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php $count = count($gallery); $i = 0; foreach ($gallery as $img): ?>

                                    <?php if ($i % 3 == 0): ?>
                                        <div class="item <?php if ($i == 0) echo ' active'?>">
                                    <?php endif; ?>

                                            <a href=""><img src="data:image/jpeg;base64,<?= base64_encode($product->img) ?>" /></a>

                                    <?php $i++; if ($i % 3 == 0 || $i == $count):?>
                                        </div>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <?php if ($product->new): ?>
                                <?= Html::img("@web/images/home/new.png", ['alt' => 'New', 'class' => 'new'])?>
<!--                                <img src="data:image/jpeg;base64,--><?//= base64_encode($product->img) ?><!--" />-->
                            <?php endif; ?>

                            <?php if ($product->sale): ?>
                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Sale', 'class' => 'new'])?>
<!--                                <img src="data:image/jpeg;base64,--><?//= base64_encode($product->img) ?><!--" />-->
                            <?php endif; ?>
                            <h2><?= $product->name ?></h2>
                            <p>Web ID: 1089772</p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span>US $<?= $product->price ?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty">
									<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-fefault add-to-cart cart">
<!--                                        add-to-cart2 - adaugarea produselor neasincron-->
<!--                                        add-to-cart - adaugarea produselor asincron-->
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand: </b><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]) ?>"><?= $product->category->name ?></a></p>
                            <?= $product->content ?>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count = count($hits); $i = 0; foreach ($hits as $hit): ?>
                                <?php if ($i % 3 == 0): ?>
                                    <div class="item <?php if ($i == 0) echo 'active' ?>">
                                <?php endif; ?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
<!--                                                    --><?//= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                                                    <img src="data:image/jpeg;base64,<?= base64_encode($hit->img) ?>" />
                                                    <h2>$<?= $hit->price ?></h2>
                                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name ?></a></p>
                                                    <p><?= $hit->content ?></p>
                                                    <button type="button" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++; if ($i % 3 == 0 || $i == $count): ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>