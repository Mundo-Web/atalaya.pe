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
    <meta name="keywords" content="Agencia de desarrollo web, Agencia de diseño web, Empresa de desarrollo web, Desarrolladores web, Páginas web Perú, Especialistas en diseño web, Creación de sitios web, Posicionamiento SEO, Empresa de posicionamiento web, Agencia de diseño web en Lima"/>
    <meta property="og:url" content="https://mundoweb.pe/" />
    <link rel="stylesheet" href="{{asset('build/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WKKZ35GL');</script>
        <!-- End Google Tag Manager -->
        
        <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7CQ3LKCR4"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-N7CQ3LKCR4');
      </script>
</head>


<body class="font-sans  bg-azulmoviles textura lg:h-screen " >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKKZ35GL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class=" inset-0 bg-azulmoviles bg-opacity-30  ">
  <!-- Encabezado superpuesto -->
  <header class=" text-white xs:px-[5%]  w-full  xs:pt-10 lg:pt-20 h-20 flex justify-between items-center">
    <div class="items-center inline-flex xs:w-8/12 xl:w-3/12 z-50"> 
      <a href="{{ route('inicio') }}"><img src="{{ asset('img/logomundoweb.svg')}}" class="h-full xs:w-52 xl:w-64 "> </a>
    </div>
  
    <div class="inline-flex items-center xs:w-0/12 xl:w-6/12"> 
        
    </div>
  
    <div class="inline-flex items-center xs:w-4/12 xl:w-3/12 justify-end"> 

      <div class="group mr-5 hidden md:block z-30">   
        <a type="button" href="{{ route('servicios') }}" class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center  transition-all  duration-500" >
          <img src="{{ asset('img/iconoleftup.svg') }}" alt="Flecha a la derecha" class="h-8 w-8 mr-2  inline-block  group-hover:-rotate-45 transition-all duration-500"><span class=" transition-all  duration-500 font-MontserratSemibold text-base ">Volver</span></a>  
      </div>


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
     
    <div class="flex flex-col text-white text-left text-4xl font-bold space-y-4 font-RightgroteskMedium tracking-wider">
        <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
        <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
        <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
        <a class="hover:underline duration-300" href="{{ route('posts.index') }}">Blog</a>
        <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
    </div>
  </div>


  <!-- Contenido principal -->
  <div class=" grid  grid-cols-12 xs:min-w-96  xs:h-full  ">

      <!-- Columna 1 (60%) -->
      <div class="xs:col-span-12  lg:col-span-5 w-full h-full  p-4  text-left  flex flex-col justify-center items-center mx-auto">
       
        <div class="items-center  xs:py-[5%] md:py-[8%] lg:py-[27%]  xs:px-[2%] md:px-[8%] ">
          @if(Session::has('mensaje'))
          <span class="text-yellow-300 text-2xl animate-fade-down">Gracias, nos contactaremos contigo </span>
          <br>  <span class="text-yellow-300 text-2xl animate-fade-down">{{session()->get('name')}}</span>
          @endif
          <h1 class="xs:text-4xl xl:text-6xl  text-white w-full  font-RightgroteskMedium tracking-wide ">
            Aplicativos Móviles y Web:<br> Lleva tu negocio a donde va tu audiencia
          </h1>
          <h2 class="xs:text-base xl:text-lg text-white  font-normal mt-10 font-MontserratRegular">Desarrollamos aplicativos móviles y web a medida. 
            Te brindamos experiencias intuitivas y funcionalidades que cautivarán a tus clientes. ¡Da el siguiente paso en la era digital!
          </h2>
          <div class="group  mt-8 inline-block">   
            <a type="button" href="{{ route('contacto') }}" class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center mt-6  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500" >
             <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold text-base">Quiero mi App</span><img src="{{ asset('img/iconbutton.svg') }}" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
          </div>
          

        </div>
      </div>

      <!-- Columna 2 (40%) -->
      <div class="xs:col-span-12 lg:col-span-7  flex ">
         
        <div class="xs:w-[100%] lg:w-[100%] min-h-96 md:h-[100%]  justify-center items-center  ">
            <img class="w-full h-full object-cover self-start" src="{{ asset('img/fondomovil.png') }}">
          </div>
      </div>

  </div>

  
  <a href="https://api.whatsapp.com/send?phone=51908857558&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none" target="_blank">
    <img src="{{ asset('img/wspf.svg') }}" class="w-16" />
    </a>

  <!-- Pie de página -->
  <footer >
   <div class="grid grid-cols-12 h-20 -mt-20 text-right items-center justify-between px-[5%] pb-[3%] pt-[1%]">
    <div class="xs:col-span-12 lg:col-span-4 ">

       {{-- <div class="flex justify-start -mt-16"> 
          <div class="group">
            <a type="button" href="{{ route('servicios') }}" class="rounded-full w-auto inline-block" >
                <img src="{{ asset('img/arrowleftup.svg') }}" alt="Flecha a la derecha" class="h-16 w-16  inline-block group-hover:-rotate-45 transition-all duration-500"></a>  
          </div>  
        </div> --}}

    </div>

    <div  class="xs:col-span-12 lg:col-span-4">

    </div>

    <div  class="xs:col-span-12 lg:col-span-4 ">

       
    
    </div>
   </div>

   {{-- <div class="grid xs:grid-cols-1 lg:grid-cols-4 px-[5%]   py-10  gap-10 text-white  bg-azulmoviles">
 
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

  
  @if(Session::has('mensaje'))

  @else
  <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative xs:top-8 md:top-10 lg:top-20 mx-auto shadow-xl rounded-md bg-azulform opacity-95 max-w-2xl animate-jump">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('modelConfirm')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-12 pt-0 text-left">
         <form method="POST" action="{{ route('guardarpopup4') }}">
         @csrf
         <h2 class=" text-base md:text-lg font-normal text-white  font-MontserratRegular tracking-wide ">
           ¿Quieres que te hagamos un análisis a tu web, y ademas que podamos hacerte una propuesta con un 15% de descuento?<br>
           Entonces déjanos tus datos:
          </h2>

         <div class="grid grid-cols-12  mb-2 mt-4">
         
                 <div class="w-full xs:col-span-12 lg:col-span-12  "> 
                   <input class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight "  name="nombre" type="text" placeholder="Nombre completo">
                   @error('nombre')
                         <span class="text-red-500 text-base ">{{ $message }}</span>
                   @enderror  
                 </div>
                 <div> 
                  <input class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight "  name="source" type="hidden" value="Aplicativo móvil">  
                </div>

         </div>

         <div class="grid grid-cols-12  mb-2 mt-4 gap-3">

               <div class="w-full xs:col-span-12 lg:col-span-6 ">
                   <input class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight " name="email" type="email" placeholder="Correo electrónico">
                   @error('email')
                       <span class="text-red-500 text-base ">{{ $message }}</span>
                   @enderror
               </div>

               <div class="w-full xs:col-span-12 lg:col-span-6 ">
                   <input class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight " name="telefono"  type="number" placeholder="Número de teléfono">
                   @error('telefono')
                       <span class="text-red-500 text-base ">{{ $message }}</span>
                   @enderror
               </div>

          </div> 

           <div class="grid grid-cols-12  mb-6 mt-4">
             
               <div class="w-full xs:col-span-12 lg:col-span-12  "> 
                 <input class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight "  name="urlweb" type="text" placeholder="https://tu-web.com (opcional)">
               </div>

           </div>

           {{-- <a href="#" 
               class="text-gray-900 bg-white hover:bg-gray-100   font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center mr-2"
               data-modal-toggle="delete-user-modal">
               Enviar mensaje
           </a>  --}}
           
               <button onclick="closeModal('modelConfirm')" type="submit" href="{{ route('contacto') }}" class="text-lg bg-fondoboton text-white  px-4 py-2 rounded-full w-auto inline-block text-center mt-3   mr-2" >
                 <span class=" font-MontserratSemibold text-base">Enviar solicitud</span><img src="{{ asset('img/iconbutton.svg')}}" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block  "></button>

               <a href="#"  onclick="closeModal('modelConfirm')"
               class="text-lg bg-red-500 text-white  px-6 py-3.5 rounded-full w-auto inline-block text-center  mr-3">
               <span class=" font-MontserratSemibold text-base">Cancelar</span></a>
         </form>
        </div>

    </div>
</div>
  @endif
  
</div>
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
              menu.classList.add("w-screen", "h-screen", "opacity-100", "-mt-20");
          }
  
          
          estado = !estado;
      });
  
  }); 

  </script>

<script type="text/javascript">
  window.onload = function() {
      // Esperar 1 segundo (1000 milisegundos) y luego abrir el modal automáticamente
      
        openModal('modelConfirm'); // Reemplaza 'tuModalId' con el ID real de tu modal
      
    };
    
  window.openModal = function(modalId) {
      document.getElementById(modalId).style.display = 'block'
      document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
  }

  window.closeModal = function(modalId) {
      document.getElementById(modalId).style.display = 'none'
      document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
  }

  // Close all modals when press ESC
  document.onkeydown = function(event) {
      event = event || window.event;
      if (event.keyCode === 27) {
          document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
          let modals = document.getElementsByClassName('modal');
          Array.prototype.slice.call(modals).forEach(i => {
              i.style.display = 'none'
          })
      }
  };
</script>