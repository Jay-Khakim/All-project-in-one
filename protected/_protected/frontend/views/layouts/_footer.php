<?php

use common\models\Banners;

$footerBanner = Banners::findOne(['page' => Banners::PAGE_ALL_PAGE , 'position' => Banners::POSITION_FOOTER]);

?>
<!-- Subscribe -->
<div class="subscribe py-1 py-4">
    <div class="container my-4">
        <p><?=t("Subscribe")?></p>
        <div class="input-form d-flex justify-content-center">
            <input type="text" placeholder="<?=t("Enter your email")?>">
            <input type="button" value="<?=t("Subscribe")?>">
        </div>
    </div>
</div>
<!-- banner fourth -->
<div class="banner-fourth my-2">
    <div class="container">
        <div class="text-image">
            <a href="<?=$footerBanner->link?>">
                <img src="<?=siteUrl().'uploads/banners/'.$footerBanner->image?>">
            </a>
        </div>
    </div>
</div>
<footer class="page-footer font-small unique-color-dark pt-2">
    <div class="container text-center text-md-left">
        <div class="row mt-3">

            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">UzbekMart.com</h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p >
                <?=t("The first in Uzbekistan online showroom of the Association of Exporters of Uzbekistan")?>
<a href="<?=toRoute(['/site/about'])?>" style="color:blue"><?=t("More")?></a>
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold"><?=t("Pages")?></h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><a href="<?=toRoute(['/blog/index'])?>"><?=t("Blogs")?></a></p>
                <p><a href="<?=toRoute(['/product/index'])?>"><?=t("All Products")?></a></p>
                <p><a href="<?=toRoute(['/site/about'])?>"><?=t("About")?></a></p>
                <p><a href="<?=toRoute(['/service/index'])?>"><?=t("Services")?></a></p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold"><?=t("Companies")?></h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><a href="<?=toRoute(['/company/local'])?>"><?=t("Local companies")?></a></p>
                <p><a href="<?=toRoute(['/company/foreign'])?>"><?=t("Foreign companies")?></a></p>
                <p><a href="<?=toRoute(['/site/contact'])?>"><?=t("Contact")?></a></p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <h6 class="text-uppercase font-weight-bold"><?=t("Contact")?></h6>
                <hr class="deep-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><i class="fa fa-home mr-3"></i> <?=t("Republic of Uzbekistan, Tashkent city, Almazar district, Korakamish street, 8A")?></p>
                <p><i class="fa fa-envelope mr-3"></i> info@uzbekmart.com</p>
                <p><i class="fa fa-phone mr-3"></i> +99895 145 45 02 <br> 
                <!-- <i class="fa fa-phone mr-3"></i> +998 95 145 45 10 -->
                </p>
                <a href="#" class="fa-lg p-2 m-2 fb-ic">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a href="#" class=" fa-lg p-2 m-2 tw-ic">
                    <i class="fa fa-telegram"></i>
                </a>
                <a href="#" class="fa-lg p-2 m-2 ins-ic">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>

        </div>
    </div>

    <div class="footer-copyright text-center py-3">© 2020 <?=t("All rights reserved")?> -
        <a href="http://uzbekmart.com/"> UzbekMart.com</a>
    </div>

</footer>