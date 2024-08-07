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
      
        {{-- <div id="menu" class="fixed z-40 w-0 h-0 flex justify-center items-center bg-azulanding opacity-0 duration-700 ">
       
          <div class="flex flex-col text-white text-left text-4xl font-bold space-y-4 font-RightgroteskMedium tracking-wider">
              <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
              <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
              <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
              <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
          </div>
        </div> --}}
     
     
        <main class="bg-bgAzulFondo py-12 lg:py-24">
            <section class="font-monserrat text-white w-11/12 md:w-10/12 mx-auto">
              <div
                class="flex flex-col gap-10 justify-center items-center border-b-2 border-[#DDDDDD] pb-10"
              >
                <div class="flex flex-col gap-5 justify-center items-center">
                  <h1
                    class="font-medium text-text40 md:text-text48 xl:text-text52 leading-none md:leading-tight text-center"
                  >
                   {{$post->name}}
                  </h1>
                  <div
                    class="font-normal text-text14 xl:text-text18 flex gap-2 md:gap-10 h-full flex-row justify-between md:justify-center w-full"
                  >
                    <p>{{$post->created_at->format('d \d\e F, Y')}}</p>
                    <p class="hidden md:block h-full">|</p>
                    <p>Categoria: <span class="text-[#E15A29]">  {{$post->category->name}} </span></p>
                  </div>
                </div>
      
                <div
                  class="font-normal text-text18 xl:text-text24 flex flex-col gap-10"
                >
                  <p>
                   {{$post->extract}}
                  </p>
                  <div>
                    <img
                      src="{{ asset('storage/'. $post->image->url) }}"
                      alt="blog"
                      class="w-full h-full"
                    />
                  </div>
 
                  <p>
                    <div id="contenidoHTML">{!! $post->body !!}</div>
                  </p>
  
                  <div>
                    <p class="font-bold text-text14 xl:text-text18">
                      Etiquetas @foreach ($post->tags as $tag)
                      <span class="text-[#E15A29]">#{{$tag->name}}</span> 
                      @endforeach
                    
                    </p>
                  </div>
                </div>
              </div>
      
              <div
                class="flex justify-between items-center py-12 border-b-2 border-[#DDDDDD]"
              >
                <div>
                  @if ($postAnterior)

                    <a href="{{ route('posts.show',  $postAnterior) }}" class="flex justify-start items-center gap-2">
                      <div>
                        <img src="{{ asset('img/chevron-left.svg') }}" alt="arrow" />
                      </div>
                      
                      <span class="text-[#E15A29] font-bold text-text16 xl:text-text18 border-b-[1.5px] border-[#E15A29] ">
                        Anterior
                      </span>
                    </a>

                    <p class="font-normal text-text14 xl:text-text16 hidden md:block mt-3 mx-6">
                        {{$postAnterior->name}}
                    </p>

                  @endif
                </div>
      
                <div>

                @if ($postSiguiente)

                  <a href="{{ route('posts.show',  $postSiguiente) }}" class="flex justify-end items-center gap-2">
                      <span class="text-[#E15A29] font-bold text-text16 xl:text-text18 border-b-[1.5px] border-[#E15A29]">
                        Próxima
                      </span>
                      <div>
                        <img src="{{ asset('img/chevron-right.svg') }}" alt="arrow" />
                      </div>
                  </a>
                  <p class="font-normal text-text16 xl:text-text16 hidden md:block mt-3 mx-6">
                        {{$postSiguiente->name}}
                  </p>
                  
                    
                
                @endif
                 
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
