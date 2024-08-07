<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de desarrollo web - Mundo Web</title>
    <meta property="og:type" content="website" />
    <meta property="og:title "content="Agencia de desarrollo web - Mundo Web" />
    <meta name="description" content="Somos la agencia de desarrollo web en Perú. Especialistas en diseño y desarrollo de páginas web, con enfoque en posicionamiento SEO. ¡Potencia tu presencia digital con nosotros!">
    <meta property="og:image" content="{{ asset('img/logomundoweb.svg') }}" />
    <meta property="og:url" content="https://mundoweb.pe/" />
    <meta name="keywords" content="Agencia de desarrollo web, Agencia de diseño web, Empresa de desarrollo web, Desarrolladores web, Páginas web Perú, Especialistas en diseño web, Creación de sitios web, Posicionamiento SEO, Empresa de posicionamiento web, Agencia de diseño web en Lima"/>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
    <link rel="stylesheet" href="{{asset('build/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Google Tag Manager -->
     <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WKKZ35GL');</script>
      <!-- End Google Tag Manager -->
   
     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-1Q5HR10EMH"></script>
     <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

       gtag('config', 'G-1Q5HR10EMH');
     </script>
     <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7CQ3LKCR4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-N7CQ3LKCR4');
    </script>
</head>


<body class="font-sans bg-azuloscuro " >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKKZ35GL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <!-- Encabezado superpuesto -->
  <!-- <header class=" text-white px-16 xs:absolute xl:fixed w-full z-10 mt-10 h-20 flex justify-between items-center">
    <div class="items-center inline-flex  xs:w-8/12 xl:w-3/12 z-50"> 
      <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-52 xl:w-64 "> </a>
    </div>
    <div class="inline-flex items-center xs:w-0/12 xl:w-6/12"> 
     
    </div>
    <div class="inline-flex items-center xs:w-4/12 xl:w-3/12 justify-end"> 
      <div class="group z-50" id="botonmenu">
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
   -->
  <header class=" text-white xs:px-[5%]  xs:absolute w-full  flex justify-between items-center h-[15%] pt-10">
    <div class="items-center inline-flex xs:w-8/12 xl:w-3/12 z-50 py-7 "> 
      <a href="{{ route('inicio') }}"><img src="{{ asset('img/logomundoweb.svg')}}" class="h-full xs:w-52 xl:w-64 "> </a>
    </div>
  
    <div class="inline-flex items-center xs:w-0/12 xl:w-6/12"> 
        
    </div>
  
    <div class="inline-flex items-center xs:w-4/12 xl:w-3/12 justify-end"> 
     <div class="group z-50" id="botonmenu">
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


  <div id="menu" class="fixed z-90 w-0 h-0 flex justify-center items-center bg-azulanding opacity-0 duration-700">
     
    <div class="flex flex-col text-white text-left text-4xl font-bold space-y-4 font-MontserratMedium tracking-wider">
        <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
        <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
        <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
        <a class="hover:underline duration-300" href="{{ route('posts.index') }}">Blog</a>
        <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
    </div>
  </div>


  <!-- Contenido principal -->
  <div class=" grid  grid-cols-12  w-full bg-azuloscuro   lg:h-screen">

      <!-- Columna 1 (50%) -->
      <div class="xs:col-span-12  lg:col-span-6  xs:h-96 lg:h-full  flex">
         
        <div class="h-full w-full bg-cover bg-center fondoservicios justify-center items-center  ">
          <!-- <div class=" absolute inset-0 bg-black bg-opacity-60 "></div> -->
        </div>
        
      </div>
     



    <!-- Columna 2 (50%) -->
      <div class="xs:col-span-12  lg:col-span-6  p-4  text-left h-full flex flex-col justify-center items-center xl:mx-[10%] mx-[3%]">
        {{-- <div class="h-12"></div> --}}
        <div class="items-center w-full xs:pt-10 xs:pb-8 lg:py-10  xs:px-1 lg:px-0">
          <p class="text-base text-white  font-normal mt-6 mb-2 font-MontserratMedium">¡Descubre Cómo Elevamos tu Presencia en Línea!</p>
          <h1 class="text-4xl text-white w-full font-bold font-RightgroteskMedium tracking-wider ">
            Somos desarrolladores web que transforman tus ideas en realidad digital
          </h1>
          
          <div class="flex flex-row border-b-2 pb-2 group cursor-pointer " onclick="window.location='{{ route('ecommercepage') }}'">
            <div  class="xs:w-[80%] lg:w-[88%]">
                    <p class="text-base text-mwnaranja  font-bold mt-6 font-MontserratRegular">E-commerce</p>
                    <h2 class="text-xl text-white w-full font-RightgroteskMedium tracking-wider"><b>Desarrolladores de webs e-commerce</b> con estrategias SEO para vender tus productos</h2>
            </div>
            <div  class="xs:w-[20%] lg:w-[12%]">
                <a type="button" href="{{ route('ecommercepage') }}" class="float-left text-lg  text-white xs:py-6 lg:py-3 rounded-full w-auto inline-block text-center mt-6" >
                    <img src="{{ asset('img/Goup.svg')}}" alt="Flecha a la derecha" class="h-14 w-14 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
            </div>
          </div>
          
          
          <div class="flex flex-row border-b-2 pb-2 group cursor-pointer" onclick="window.location='{{ route('onepage') }}'">
            <div class="xs:w-[80%] lg:w-[88%]">
                    <p class="text-base text-mwnaranja  font-bold mt-6 font-MontserratRegular text-opacity-100">Website</p>
                    <h2 class="text-xl text-white w-full font-RightgroteskMedium tracking-wider">Somos especialista en <b>diseño</b> web para mejorar la relación entre tus clientes y tu marca</h2>
            </div>
            <div class="xs:w-[20%] lg:w-[12%]">
                <a type="button" href="{{ route('onepage') }}" class="float-left text-lg  text-white xs:py-6 lg:py-3 rounded-full w-auto inline-block text-center mt-6 " >
                    <img src="{{ asset('img/Goup.svg')}}" alt="Flecha a la derecha" class="h-14 w-14 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
            </div>
          </div>


          <div class="flex flex-row border-b-2 pb-2 group cursor-pointer" onclick="window.location='{{ route('landingpage') }}'">
            <div  class="xs:w-[80%] lg:w-[88%]">
                    <p class="text-base text-mwnaranja  font-bold mt-6 font-MontserratRegular">Landing Page</p>
                    <h2 class="text-xl text-white w-full font-RightgroteskMedium tracking-wider">Nuestras <b>estrategias SEO</b> harán de tu historia un éxito en el mundo web</h2>
            </div>
            <div class="xs:w-[20%] lg:w-[12%]">
                <a type="button" href="{{ route('landingpage') }}" class="float-left text-lg  text-white xs:py-6 lg:py-3 rounded-full w-auto inline-block text-center mt-6" >
                    <img src="{{ asset('img/Goup.svg')}}" alt="Flecha a la derecha" class="h-14 w-14 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
            </div>
          </div>

          <div class="flex flex-row border-b-2 pb-2 group cursor-pointer" onclick="window.location='{{ route('aplicativospage') }}'">
            <div  class="xs:w-[80%] lg:w-[88%]">
                    <p class="text-base text-mwnaranja  font-bold mt-6 font-MontserratRegular">Aplicativos Móviles y Web</p>
                    <h2 class="text-xl text-white w-full font-RightgroteskMedium tracking-wider">Somos especialistas en aplicativos móviles y web que harán de tu experiencia inigualable</h2>
            </div>
            <div  class="xs:w-[20%] lg:w-[12%]">
                <a type="button" href="{{ route('aplicativospage') }}" class="float-left text-lg  text-white px-2 xs:py-6 lg:py-3 rounded-full w-auto inline-block text-center mt-6 " >
                    <img src="{{ asset('img/Goup.svg')}}" alt="Flecha a la derecha" class="h-14 w-14 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
            </div>
          </div>


        </div>
      </div>

     
     

  </div>

  <a href="https://api.whatsapp.com/send?phone=51908857558&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none" target="_blank">
    <img src="{{ asset('img/wspf.svg') }}" class="w-16" />
    </a>


  <footer >
      
     
 
       {{-- <div class="grid xs:grid-cols-1 lg:grid-cols-4 px-[5%]   py-10  gap-10 text-white  bg-azulmundoweb">
 
           <div class="flex flex-col items-start">
             <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-40 "> </a>
           </div>
 
           <div>
             <div class="mb-4">
                 <h2 class="font-MontserratSemibold mb-1">Teléfono</h2>
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
 
       </div> --}}
 
 
     </footer>

  <!-- Pie de página -->
  <!-- <footer class=" p-1 h-14 -mt-14 bg-azulmundoweb">
    <div class="carruselfooter ">
      <ul class="flex flex-row gap-4 ">
        <li class="inline-flex  items-center w-1/4 ">
          <img class="rounded-full w-12 float-left" src="img/iconofooter.png">
          <span class="float-left p-3 text-white">Creatividad inspiradora</span>
        </li>
        <li class="inline-flex items-center  w-1/4 ">
          <img class="rounded-full w-12  float-left" src="img/iconofooter.png">
          <span class="float-left p-3 text-white">Colaboración transparente</span>
        </li>
        <li class="inline-flex items-center  w-1/4">
          <img class="rounded-full w-12 float-left" src="img/iconofooter.png">
          <span class="float-left p-3 text-white">Excelencia a medida</span>
        </li>
        <li class="inline-flex items-center  w-1/4">
          <img class="rounded-full w-12 float-left" src="img/iconofooter.png">
          <span class="float-left p-3 text-white">Adaptabilidad digital</span>
        </li>
      </ul>
    </div>
  </footer> -->

  

</body>
</html>

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
              menu.classList.add("w-screen", "h-screen", "opacity-100");
          }
  
          
          estado = !estado;
      });
  
  }); 
  </script>


