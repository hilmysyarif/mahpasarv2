<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style-responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/products.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/product-responsive.css') }}">
    <link
      rel="shortcut icon"
      href="{{ asset('images/logo/favicon.png') }}"
      type="image/x-icon"
    />

    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-XHlJVH4gl3QmFBOc"></script>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/2baad1d54e.js"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="{{ asset('icofont/icofont.min.css') }}">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
    <link rel="stylesheet" href="{{ asset('select2-4.0.6-rc.1/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('lightbox2-2.11.1/dist/css/lightbox.css') }}">

    <title>
        @if(!empty($__env->yieldContent('title')))
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }} 
        @endif
    </title>
  </head>
  <body>

  <div class="loading-animation-screen">
    <div class="overlay-screen"></div>
    <img src="{{ asset('images/icon/loading.gif') }}" alt="loading.." class="img-loading">
  </div>
    @include('templates.fe.header')
    @yield('content')
    @include('templates.fe.footer')

        <div class="copyright">
            <p>Copyright &copy; <span id="footer-cr-years"></span> {{ config('app.name') }}. All Right Reserved.</p>
        </div>
        </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('lightbox2-2.11.1/dist/js/lightbox.js') }}"></script>
    <script src="{{ asset('select2-4.0.6-rc.1/dist/js/select2.min.js') }}"></script>
    <script>
        $('.recent-product').slick({
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 1
        });

        $("div.product-wrapper div.main-product button.slick-prev").html("<i class='fa fa-chevron-left'></i>")
        $("div.product-wrapper div.main-product button.slick-next").html("<i class='fa fa-chevron-right'></i>")

        const years = new Date().getFullYear();
        $("#footer-cr-years").text(years);


        //loading screen
        $(window).ready(function(){
            $(".loading-animation-screen").fadeOut("slow");
        })


        // detail
        $("#detailBtnPlusJml").click(function(){
            var val = parseInt($(this).prev('input').val());
            $(this).prev('input').val(val + 1).change();
            return false;
        })

        $("#detailBtnMinusJml").click(function(){
            var val = parseInt($(this).next('input').val());
            if (val !== 1) {
                $(this).next('input').val(val - 1).change();
            }
            return false;
        })

        $("#paymentSelectProvinces").select2({
            placeholder: 'Pilih Provinsi',
            language: 'id'
        })

        $("#paymentSelectRegencies").select2({
            placeholder: 'Pilih Kabupaten/Kota',
            language: 'id'
        })

        $("#paymentSelectKurir").select2({
            placeholder: 'Pilih Salah Satu',
            language: 'id'
        })

        $("#paymentSelectService").select2({
            placeholder: 'Pilih Service',
            language: 'id'
        })

        $("#paymentSelectProvinces").change(paymentSelectKurir);

        $("#paymentSelectRegencies").change(paymentSelectKurir);

        function paymentSelectKurir(){
            $("#paymentSelectKurir").select2({
                placeholder: 'Loading..',
                language: 'id'
            })
            $("#paymentSendingPrice").text("Rp0");
            const destination = $("#paymentSelectRegencies").val();
            if(destination === ""){
                $("#paymentTextErrorAboveSelectKurir").show();
            }else{
                $("#paymentTextErrorAboveSelectKurir").hide();

            }
        }

        $("#paymentSelectKurir").change(paymentSelectService);

        function paymentSelectService(){
            let id = $("#paymentSelectKurir").val();
            id = id.split('-');
            id = id[0];
            if(id === ""){
                id = 0;
            }
            $("#paymentSendingPrice").text("Rp"+number_format(id).split(",").join("."));
            const price = $("#paymentPriceTotalAll").val();
            const total = parseInt(price) + parseInt(id);
            $("#paymentTotalAll").text("Rp"+number_format(total).split(",").join("."));
        }

        function number_format (number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

            var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
            }

            // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        }

    </script>
</html>
