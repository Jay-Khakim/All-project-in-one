<!DOCTYPE html>
<html  xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>O'zbekiston eksportchilar uyushmasi</title>
    <meta name="author" content="Mahmudjon Utkurov">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/colors/color5.css" id="colors">
    <link rel="stylesheet" type="text/css" href="stylesheets/animate.css">
    <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>                                 
<body class="header-sticky page-loading">   
    <div class="loading-overlay">
    </div>
    
    <!-- Boxed -->
    <div class="boxed">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="flat-address">  
                            <div class="social-links">
                                <a href="https://t.me/Eksportchilar_uyushmasi" target="_blank">
                                    <i class="fa fa-paper-plane-o"></i>
                                </a>
                                <a href="https://www.facebook.com/uzex.uyushma" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://www.youtube.com/channel/UCqknB-bdjhBK10uZVyjuUnQ" target="_blank">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </div>       
                            <div class="custom-info">
                                <span>Ijtimoiy tarmoqlar</span> 
                                <i class="fa fa-reply"></i>info@exportuz.com 
                                <i class="fa fa-phone"></i>(+998)71 207 00 98        
                            </div>
                        </div><!-- /.flat-address -->
                    </div><!-- /.col-md-8 -->   
                    <div class="col-md-4">
                        <div class="top-navigator">        
                            <ul>
                                <li>
                                    <a href="javascript:void(0)"><img src="images/icon/1.jpg" alt="JB's Language Icon"><span>En</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="images/icon/2.jpg" alt="JB's Language Icon"><span>Ru</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="images/icon/3.jpg" alt="JB's Language Icon"><span>Uz</span></a>
                                </li>
                            </ul>
                        </div><!-- /.top-navigator -->
                    </div><!-- /.col-md-4 -->              
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->

        <?php
            include 'header.php';
        ?>

        <!-- Page title -->
        <div class="page-title style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <div class="breadcrumbs">
                                <ul class="trail-items">
                                    <li>Сиз ушбу манзилдасиз:</li>
                                    <li class="trail-item"><a href="index.php">Асосий</a></li>
                                    <li class="trail-item"><a href="data.php">Маълумотлар</a></li>
                                    <li class="trail-end">Статистик маълумотлар</li>
                                </ul>                   
                            </div>
                        </div><!-- /.page-title-captions -->                        
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /.page-title -->
        
        <div class="blog">
            <div class="container">
            <div class="row">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <p align="center">Экспорт ва импорт қилиш кўрсаткичлари</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-body">
                        <p align="center">Экспорт ва импорт қилиш кўрсаткичлари</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div><br>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p align="center">Экспорт ва импорт қилиш кўрсаткичлари</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>


        

       
        <?php
            include 'footer.php';
        ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Ўзбекистон', 'Россия', 'Америка', 'Қозоқистон', 'Германия', 'Япония'],
        datasets: [{
            label: 'Экспорт',
            backgroundColor: ['#6699FF', '#3AE2CE','#00FFA9','yellow','pink','#FF9437'],
            borderColor: 'lightblue',
            data: [20, 30, 50, 20, 40, 30, 85]
        }]
    },

    // Configuration options go here
    options: {}
});
      var ctx = document.getElementById('myChart1').getContext('2d');
      var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Январ', 'Феврал', 'Март', 'Апрел', 'Май', 'Июн', 'Июл'],
        datasets: [{
            label: 'Экспорт',
            backgroundColor: '#6699FF',
            borderColor: 'blue',
            data: [20, 30, 50, 20, 40, 30, 85]
        },
        {
            label: 'Импорт',
            backgroundColor: 'Red',
            // borderColor: 'pink',
            data: [2, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {
      tooltips: {
        mode: 'index',
      }
    }
});
       var ctx = document.getElementById('myChart2').getContext('2d');
      var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Январ', 'Феврал', 'Март', 'Апрел', 'Май', 'Июн', 'Июл'],
        datasets: [{
            label: 'Экспорт',
            backgroundColor: '#6699FF',
            borderColor: 'blue',
            data: [20, 30, 50, 20, 40, 30, 85]
        },
        {
            label: 'Импорт',
            backgroundColor: 'Red',
            // borderColor: 'pink',
            data: [2, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {
      tooltips: {
        mode: 'index',
      }
    }
});
    </script>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script> 
    <script type="text/javascript" src="javascript/owl.carousel.js"></script> 
    <script type="text/javascript" src="javascript/jquery-waypoints.js"></script>
    <script type="text/javascript" src="javascript/jquery.fancybox.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIm1AxfRgiI_w36PonGqb_uNNMsVGndKo&v=3.7"></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="javascript/parallax.js"></script>
    <!-- <script type="text/javascript" src="javascript/switcher.js"></script> -->
    <script type="text/javascript" src="javascript/smoothscroll.js"></script>
    <script type="text/javascript" src="javascript/jquery-validate.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="javascript/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="javascript/slider.js"></script>
</body>
</html>