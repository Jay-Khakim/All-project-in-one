<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=toRoute('/')?>" class="site_title"><i class="fa fa-code"></i></a>
        </div>
        <?php if (!Yii::$app->user->isGuest):?>
            <?php $user = \common\models\User::findOne(Yii::$app->user->id);?>
            <!-- menu prile quick info -->
            <div class="profile">
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?= $user->user_profile ? $user->user_profile->full : 'admin'?></h2>
                </div>
            </div>
        <?php endif;?>
        <!-- /menu prile quick info -->
        <div class="clearfix"></div>
        <br />
        <?php
            $langs = \common\models\Lang::find()->where('id != :current_id', [':current_id' => \common\models\Lang::getCurrent()->id])->all();
            foreach ($langs as $lang){
                echo \yii\helpers\Html::a($lang->name, '/admin/'.$lang->url.'/'.Yii::$app->getRequest()->pathInfo, ['style' => 'margin-right: 10px; margin-left: 15px; color: white']);
            }
        ?>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-user"></i> Users<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/user/index')?>">Users</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-bookmark"></i> Language<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/lang/index')?>">languages</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-list"></i> Category<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/category/index')?>">all categories</a>
                            <li><a href="<?=toRoute('/sub-category/index')?>">all sub categories</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-building-o"></i> Company<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/company/index')?>">all companies</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-product-hunt"></i> Product<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/product/index')?>">all products</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cogs"></i> Service<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/service/index')?>">all services</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-newspaper-o"></i> Blog<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/blog/index')?>">all blogs</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-sliders"></i> Carousel<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/carousel/index')?>">all carouseles</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-picture-o"></i> Banners<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/banners/index')?>">all banners for ads</a>
                            </li>
                            <!-- <li><a href="<?=toRoute('/page/index')?>">all pages for ads</a>
                            </li>
                            <li><a href="<?=toRoute('/position/index')?>">all positions for ads</a>
                            </li>
                            <li><a href="<?=toRoute('/banner-page-position/index')?>">insert banners to page</a>
                            </li> -->
                        </ul>
                    </li>
                    <li><a><i class="fa fa-info-circle"></i> About<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?=toRoute('/about/index')?>">about us</a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href="<?=toRoute('/site/logout')?>" data-method="post" class="pull-right" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>