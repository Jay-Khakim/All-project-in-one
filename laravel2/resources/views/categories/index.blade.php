
@extends('layouts.main')

<!-- @section('title') Home  @endsection  -->
@section('title', 'Category')

@section('custom_css')
  <link rel="stylesheet" type="text/css" href="styles/categories.css">
  <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection

@section('content')
<!-- Home -->

<div class="home">
  <div class="home_container">
    <div class="home_background" style="background-image:url('/images/{{$cat->img}}')"></div>
    <div class="home_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="home_content">
              <div class="home_title">{{$cat->title}}<span>.</span></div>
              <div class="home_text"><p>{{$cat->desc}}</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Products -->

<div class="products">
  <div class="container">
    <div class="row">
      <div class="col">

        <!-- Product Sorting -->
        <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
          <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
          <div class="sorting_container ml-md-auto">
            <div class="sorting">
              <ul class="item_sorting">
                <li>
                  <span class="sorting_text">Sort by</span>
                  <i class="fa fa-chevron-down" aria-hidden="true"></i>
                  <ul>
                    <li class="product_sorting_btn" data-order="default" ><span>Default</span></li>
                    <li class="product_sorting_btn" data-order="price-low-high" ><span>Price: Low-High</span></li>
                    <li class="product_sorting_btn" data-order="price-high-low" ><span>Price: High-Low</span></li>
                    <li class="product_sorting_btn" data-order="name-a-z" ><span>Name: A-Z</span></li>
                    <li class="product_sorting_btn" data-order="name-z-a" ><span>Name: Z-A</span></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">

        <div class="product_grid">

          <!-- Product -->
          @foreach($products as $product)
          <!-- Product -->

          @php
            $image = "";
            if(count($product->images)>0){
              $image = $product->images[0]['img'];
            }else{
              $image = 'product_2.jpg';
            }
          @endphp
          <div class="product">
            <div class="product_image"><img src="images/{{$image}}" alt="{{$product->title}}"></div>
            <div class="product_extra product_new"><a href="{{route('showCategory', $product->category['alias'])}}">{{$product->category['title']}}</a></div>
            <div class="product_content">
              <div class="product_title"><a href="{{route('showProduct',['category', $product->id])}}">{{$product->title}}</a></div>
              @if ($product->new_price != null)
                <div class="" style="text-decoration: line-through; color: red;">${{$product->price}}
                </div>
                <div class="product_price">${{$product->new_price}}</div>
              @else
                <div class="product_price">${{$product->price}}</div>
              @endif
            </div>
          </div>
          @endforeach



        </div>
        <div class="product_pagination">
          <ul>
            <li class="active"><a href="#">01.</a></li>
            <li><a href="#">02.</a></li>
            <li><a href="#">03.</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
  <div class="container">
    <div class="row icon_box_row">

      <!-- Icon Box -->
      <div class="col-lg-4 icon_box_col">
        <div class="icon_box">
          <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
          <div class="icon_box_title">Free Shipping Worldwide</div>
          <div class="icon_box_text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
          </div>
        </div>
      </div>

      <!-- Icon Box -->
      <div class="col-lg-4 icon_box_col">
        <div class="icon_box">
          <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
          <div class="icon_box_title">Free Returns</div>
          <div class="icon_box_text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
          </div>
        </div>
      </div>

      <!-- Icon Box -->
      <div class="col-lg-4 icon_box_col">
        <div class="icon_box">
          <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
          <div class="icon_box_title">24h Fast Support</div>
          <div class="icon_box_text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="newsletter_border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="newsletter_content text-center">
          <div class="newsletter_title">Subscribe to our newsletter</div>
          <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
          <div class="newsletter_form_container">
            <form action="#" id="newsletter_form" class="newsletter_form">
              <input type="email" class="newsletter_input" required="required">
              <button class="newsletter_button trans_200"><span>Subscribe</span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->

<div class="footer_overlay"></div>
<footer class="footer">
  <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
          <div class="footer_logo"><a href="#">Sublime.</a></div>
          <div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
          <div class="footer_social ml-lg-auto">
            <ul>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>
@endsection
@section('custom_js')
    <script>
    $(document).ready(function () {
       $('.product_sorting_btn').click(function () {
           let orderBy = $(this).data('order')
           $('.sorting_text').text($(this).find('span').text())
           $.ajax({
               url: "{{route('showCategory',$cat->alias)}}",
               type: "GET",
               data: {
                   orderBy: orderBy
               },
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: (data) => {
                   let positionParameters = location.pathname.indexOf('?');
                   let url = location.pathname.substring(positionParameters,location.pathname.length);
                   let newURL = url + '?'; // http://127.0.0.1:8001/phones?
                   newURL += 'orderBy=' + orderBy; // http://127.0.0.1:8001/phones?orderBy=name-z-a
                   history.pushState({}, '', newURL);
                   $('.product_grid').html(data)
                   $('.product_grid').isotope('destroy')
                   $('.product_grid').imagesLoaded( function() {
                       let grid = $('.product_grid').isotope({
                           itemSelector: '.product',
                           layoutMode: 'fitRows',
                           fitRows:
                               {
                                   gutter: 30
                               }
                       });
                   });
               }
           });
       })
   })
    </script>
@endsection
