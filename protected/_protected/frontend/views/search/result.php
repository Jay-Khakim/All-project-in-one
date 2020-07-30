<div class="container">
    <h2 class="font-weight-bold text-center mt-4"><?=t("Results")?></h2>
    <h4  class="font-weight-bold"><?=t("Companies")?></h4>
    <?php if(count($companies) == 0):?>
        <h5><?=t("Companies not found!")?></h5>
        <hr>
    <?php else: ?>
    <div class="row">
        
        <?php foreach($companies as $company):?>
        <div class="col-6 col-md-3 my-3">
            
            <div class="card promoting-card">

                
                <div class="view overlay">
                    <a href="<?=toRoute(['/company/view' , 'type' => $company->type == common\models\Company::TYPE_LOCAL ? 'local' : 'foreign' , 'id' => $company->companyTranslate->url ])?>">
                        <img class="card-img-top rounded-0" src="<?=siteUrl().'uploads/company/thumb/'.$company->image?>" alt="<?=$company->companyTranslate->title?>">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                
                <div class="card-body">

                    <div class="">

                        
                        <p class="card-text mb-1"><?=$company->companyTranslate->title?></p>
                        
                        <a class="btn btn-flat blue-text p-1 my-1 mr-0 " href="<?=toRoute(['/company/view' , 'type' => $company->type == common\models\Company::TYPE_LOCAL ? 'local' : 'foreign' , 'id' => $company->companyTranslate->url ])?>" ><?=t("More")?></a>

                    </div>

                </div>

            </div>
            
        </div>
        <?php endforeach ?>
        
    </div>
    <?php endif?>
    <hr>
    <h4  class="font-weight-bold"><?=t("Products")?></h4>
    <?php if(count($products) == 0):?>
        <h5><?=t("Products not found!")?></h5>
        <hr>
    <?php else: ?>
    <div class="row">
        
        <?php foreach($products as $product):?>
        <div class="col-6 col-md-3 my-3">
            
            <div class="card promoting-card">

                
                <div class="view overlay">
                    <a href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url ])?>">
                        <img class="card-img-top rounded-0" src="<?=siteUrl().'uploads/product/thumb/'.$product->image?>" alt="<?=$product->productTranslate->title?>">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                
                <div class="card-body">

                    <div class="">

                        
                        <p class="card-text mb-1"><?=$product->productTranslate->title?></p>
                        
                        <a class="btn btn-flat blue-text p-1 my-1 mr-0 " href="<?=toRoute(['/product/view' , 'category' => $product->subCategory->category->categoryTranslate->url , 'sub_category' => $product->subCategory->subCategoryTranslate->url , 'id' => $product->productTranslate->url ])?>" ><?=t("More")?></a>

                    </div>

                </div>

            </div>
            
        </div>
        <?php endforeach ?>
        
    </div>
    <?php endif?>
</div>