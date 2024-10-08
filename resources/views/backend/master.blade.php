<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>S-Mart</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/checkbox-04/css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    @notifyCss


    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



<!-- Header -->



        <header>

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">


                @include('backend.partials.header')


            </nav>

        </header>



<!-- Header -->


<!-- Sidebar -->




        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            @include('backend.partials.sidebar')

        </aside>




<!-- Sidebar -->


<!-- Body -->




        <div class="content-wrapper">

            <section class="content">

            @include('notify::components.notify')

                @yield('content')



            </section>



        </div>




<!-- Body -->


        <!-- @include('backend.partials.footer') -->

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/sparklines/sparkline.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jqvmap/jquery.vmap.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>

    @notifyJs

    <script src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.js?v=3.2.0"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/pages/dashboard.js"></script>

    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/jquery.min.js"></script>

    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/popper.js"></script>

    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/bootstrap.min.js"></script>

    <script src="https://preview.colorlib.com/theme/bootstrap/checkbox-04/js/main.js"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8cf5bc362e7549c0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"version":"2024.8.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>

    <script nonce="1aa74d63-555e-47e6-89b1-c2fe86d2a551">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5808";j.zaraz._n="1aa74d63-555e-47e6-89b1-c2fe86d2a551";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce(((u,v)=>({...u[1],...v[1]})),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter((z=>z.startsWith("_zaraz_"))).forEach((y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async mP=>new Promise((mQ=>{if(mP){mP.e&&mP.e.forEach((mR=>{try{const mS=d.querySelector("script[nonce]"),mT=mS?.nonce||mS?.getAttribute("nonce"),mU=d.createElement("script");mT&&(mU.nonce=mT);mU.innerHTML=mR;mU.onload=()=>{d.head.removeChild(mU)};d.head.appendChild(mU)}catch(mV){console.error(`Error executing script: ${mR}\n`,mV)}}));Promise.allSettled((mP.f||[]).map((mW=>fetch(mW[0],mW[1]))))}mQ()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script>

</body>

</html>
