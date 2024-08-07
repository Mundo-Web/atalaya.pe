<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de desarrollo web - Mundo Web</title>
  <meta property="og:type" content="website" />
  <meta property="og:title "content="Agencia de desarrollo web - Mundo Web" />
  <meta name="description" content="Somos la agencia de desarrollo web en Perú. Especialistas en diseño y desarrollo de páginas web, con enfoque en posicionamiento SEO. ¡Potencia tu presencia digital con nosotros!">
  <meta property="og:image" content="{{ asset('img/logomundoweb.svg') }}" />
  <meta property="og:url" content="https://mundoweb.pe/" />
  <meta name="keywords" content="Agencia de desarrollo web, Agencia de diseño web, Empresa de desarrollo web, Desarrolladores web, Páginas web Perú, Especialistas en diseño web, Creación de sitios web, Posicionamiento SEO, Empresa de posicionamiento web, Agencia de diseño web en Lima"/>

  @livewireStyles
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
  <link rel="stylesheet" href="{{asset('build/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/slick.min.js')}}"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script  src="https://code.jquery.com/jquery-3.7.1.js"  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WV7GZ2TK');</script>
        <!-- End Google Tag Manager -->

     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-1Q5HR10EMH"></script>
     <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

       gtag('config', 'G-1Q5HR10EMH');
     </script>

     
</head>


<body class="font-sans bg-azuloscuro lg:h-screen" >
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV7GZ2TK"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <!-- Encabezado superpuesto -->
    <header class=" text-white px-[5%]  w-full z-10 h-[15%]  flex justify-between items-center ">
      <div class="items-center inline-flex xs:w-6/12 xl:w-3/12 z-50 py-7 "> 
        <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-64 xl:w-64 "> </a>
      </div>
    
      <nav class="inline-flex items-center xs:w-0/12 xl:w-6/12 xs:hidden xl:block py-7"> 
        <ul class="flex space-x-6 font-MontserratSemibold font-normal">
          <li class="hover:text-mwnaranja"><a href="{{ route('inicio') }}" >Inicio</a></li>
          <li class="hover:text-mwnaranja"><a href="{{ route('servicios') }}" >Servicios</a></li>
          <li class="hover:text-mwnaranja"><a href="{{ route('proyectos') }}" >Proyectos</a></li>
          <li class="hover:text-mwnaranja"><a href="{{ route('posts.index') }}" >Blog</a></li>
          <li class="hover:text-mwnaranja"><a href="{{ route('contacto') }}" >Contacto</a></li>
        </ul>
      </nav>
    
      <div class="flex flex-row items-end justify-end  xs:w-6/12 xl:w-3/12  xs:hidden xl:block py-7"> 
       <div class="group flex flex-row items-end justify-end mr-5">
        <a type="button" href="{{ route('contacto') }}" class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500" >
          <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold text-base">Quiero mi web </span><img src="{{ asset('img/iconbutton.svg') }}" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a> 
        </div>   
      </div>
    

      <div class="inline-flex items-center xs:w-4/12 xl:w-3/12 justify-end xs:block xl:hidden z-50 py-7"> 
        <div class="group " id="botonmenu">
            <a type="button"  href="javascript:void(0)"   class=" float-right text-lg bg-fondoboton text-white w-16 h-16 rounded-full  inline-flex items-center justify-center" >
              
                <div class="menu-icon w-8 h-8" id="menuIcon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </a>  
            </div>   
      </div>


    </header>

    <div id="menu" class="fixed z-40 w-0 h-0 flex justify-center items-center bg-azulanding opacity-0 duration-700 ">
     
        <nav class="flex flex-col text-white text-left text-4xl font-bold space-y-4 font-RightgroteskMedium tracking-wider">
            <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
            <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
            <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
            <a class="hover:underline duration-300" href="{{ route('posts.index') }}">Blog</a>
            <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
        </nav>
      </div>


      <a href="https://api.whatsapp.com/send?phone=51908857558&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none" target="_blank">
        <img src="{{ asset('img/wspf.svg') }}" class="w-16" />
        </a>
    
     
        <main class="bg-bgAzulFondo py-12 lg:py-10">
          
          {{-- <section class="font-monserrat text-white w-11/12 mx-auto flex flex-col gap-10">
            <div class="w-full md:w-[80%] flex flex-col gap-5">
              <h3 class="text-text16 xl:text-text20 font-semibold">Blog</h3>
              <h2
                class="font-medium text-text56 xl:text-text60 leading-none md:leading-tight"
              >
                Un Viaje por el Desarrollo Web Moderno
              </h2>
              <p class="font-normal text-text16 xl:text-text20">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
              </p>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-2">
             
              <div class="flex justify-center items-center">
                <img
                  src="{{ asset('img/blog_1.png') }}"
                  alt="blog"
                  class="w-full h-full"
                />
              </div>
    
              <div class="flex flex-col gap-5 justify-center items-start px-12 py-10" >

                <div class="flex gap-5 items-center">
                  <p
                    class="bg-[#E15A29] px-2 font-semibold text-text14 xl:text-text18 py-2"
                  >
                    Categorías
                  </p>
                  <p class="px-2 font-semibold text-text14 xl:text-text18">
                    5 minutos de lectura
                  </p>
                </div>
    
                <div class="flex flex-col gap-5">
                  <h1
                    class="font-medium text-text32 xl:text-text36 leading-none md:leading-tight"
                  >
                    Mejores práticas de SEO (Optimización de Motores de Búsqueda)
                    para sitios web
                  </h1>
                  <p class="font-normal text-text16 xl:text-text20">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Consectetur corporis dolorem numquam dolor maxime quae deleniti.
                  </p>
    
                  <div class="flex">
                    <a
                      href="#"
                      class="flex justify-center items-center font-normal text-text16 xl:text-text20 gap-3"
                    >
                      <span> Leer más </span>
    
                      <div>
                        <img src="{{ asset('img/arrow_left.svg') }}" alt="arrow" />
                      </div>
                    </a>
                  </div>
                
                </div>
             
              </div>
            </div>
          </section> --}}
    

          <section class="mt-5">
            <div class="w-11/12 mx-auto text-white">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

              @foreach ($posts as $post)
                  
              
                <article class="flex flex-col gap-3 
                  {{-- @if ($loop->first)
                      col-span-3
                  @endif --}}
                  ">

                  <div class="flex justify-center items-center">
                    <figure>
                      <a href="{{route('posts.show', $post)}}" >
                      <img
                        src="{{ asset('storage/'. $post->image->url) }}"
                        {{-- {{Storage::url($post->image->url)}} --}}
                        alt="blog"
                        class="w-full h-full"
                      />
                      </a>
                    </figure>
                  </div>
                  <div class="flex flex-col gap-3 justify-center items-start">
                    <div class="flex gap-5 items-center">
                      <p
                        class="bg-[#E15A29] px-2 font-semibold text-text14 xl:text-text18 py-2"
                      >
                        {{$post->category->name}}
                      </p>
                      <p class="px-2 font-semibold text-text14 xl:text-text18">
                        5 minutos de lectura
                      </p>
                    </div>
    
                    <div class="flex flex-col gap-5">
                      <h2
                        class="font-medium text-text24 xl:text-text28 leading-none md:leading-tight"
                      >
                      {{$post->name}}
                      </h2>
                      <p class="font-normal text-text16 xl:text-text20">
                        {{$post->extract}}
                      </p>
    
                      <div class="flex">
                        <a
                          href="{{route('posts.show', $post)}}"
                          class="flex justify-center items-center font-normal text-text16 xl:text-text20 gap-3"
                        >
                          <span> Leer más </span>
    
                          <div>
                            <img src="{{ asset('img/arrow_left.svg') }}" alt="arrow" />
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </article>
    
              @endforeach  

            
              </div>
            </div>
          </section>
        
        
        
        </main>
     
     
        <!-- Pie de página -->
      <footer >
        <div class="grid grid-cols-12  text-right items-center justify-between px-[5%] ">
        <div class="xs:col-span-12 lg:col-span-4 ">
    
    
        </div>
    
        <div  class="xs:col-span-12 lg:col-span-4">
    
        </div>
    
        <div  class="xs:col-span-12 lg:col-span-4 ">
    
           
        
        </div>
        </div>
    
        <div class="grid xs:grid-cols-1 lg:grid-cols-4 px-[5%]   py-10  gap-10 text-white  bg-fondofooter">
     
          <div class="flex flex-col items-start">
            <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-40 "> </a>
          </div>
      
          <div>
            <div class="mb-4">
                <h2 class="font-MontserratSemibold mb-1 ">Teléfono</h2>
                <p class="font-MontserratRegular text-sm"> +51 999 999 999</p>
            </div>
            <div>
                <h2 class="font-MontserratSemibold">Email</h2>
                <p class="font-MontserratRegular text-sm">hola@mundoweb.pe</p>
            </div>
          </div>
      
          <div>
          <div class="mb-4">
                <h2 class="font-MontserratSemibold mb-1">Dirección</h2>
                <p class="font-MontserratRegular text-sm">Centro Empresarial Peruano - Suizo Av. Aramburú 166 - Miraflores, Oficina 4B, Lima, Lima 51, PE</p>
            </div>
            <div>
                <h2 class="font-MontserratSemibold">Horario</h2>
                <p class="font-MontserratRegular text-sm">9am — 6pm</p>
            </div>
          </div>
      
          <div class="flex flex-col xs:items-start lg:items-end xs:justify-start lg:justify-end">
                <p class="font-MontserratRegular text-xs ">Copyright © 2023 Mundo Web. Reservados todos los derechos.</p>
          </div>
      
      </div>
      
      </footer>
    

       @livewireScripts
    </body>
    </html>


       <script type="text/javascript">         
    
        $(document).ready(function(){
            
          $('.carruselfooter ul ').slick({
                autoplay: true, 
                autoplaySpeed: 1000, 
                speed: 4000,
                slidesToShow: 3,
                centerMode: true,
                slidesToScroll: 1,
                arrows: false,
                adaptivew: true,
                responsive: [
                  {
                    breakpoint: 650,  // Tamaño de pantalla md (ejemplo, puedes ajustar según tus necesidades)
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                ]
            });
      
            
            
        });
      </script>
      
    
      
    <script>
    
    
    document.getElementById("menuIcon").addEventListener("click", function() {
        var menuIcon = document.getElementById("menuIcon");
        menuIcon.classList.toggle("change");
    });
    
    
    document.addEventListener("DOMContentLoaded", function() {
            var menu = document.getElementById("menu");
            var miBoton = document.getElementById("botonmenu");
            var estado = false;
            
            miBoton.addEventListener("click", function() {
               
            if (estado) {
                menu.classList.remove("w-screen", "h-screen", "opacity-100");
                menu.classList.add("w-0", "h-0", "opacity-0");
               
            } else {
                menu.classList.remove("w-0", "h-0", "opacity-0");
                menu.classList.add("w-screen", "h-screen", "opacity-100", "-mt-30");
            }
    
            
            estado = !estado;
      });
    
    }); 
    
    </script>