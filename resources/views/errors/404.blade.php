<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundoweb</title>
  <meta property="og:type" content="website" />
  <meta property="og:title "content="Página web a medida" />
  <meta property="og:description" content="El desarrollo de páginas web es un proceso de planificación, diseño, y programación. Su objetivo principal es crear una página web que sea atractiva, funcional y sobre todo que se vea muy bien en dispositivos móviles
  " />
  <meta property="og:image" content="enlace al archive de la imagen" />
  <meta property="og:url" content="permalink" />

  {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
  <link rel="stylesheet" href="{{asset('build/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/slick.min.js')}}"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script  src="https://code.jquery.com/jquery-3.7.1.js"  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body class="font-sans bg-azuloscuro lg:h-screen" >

    <!-- Encabezado superpuesto -->
    <header class=" text-white px-[5%]  w-full z-10 h-[15%]  flex justify-between items-center ">
      <div class="items-center inline-flex w-2/12  z-50 py-7 "> 
      
      </div>
    
      <div class="inline-flex items-center justify-center w-8/12  py-7 mt-7"> 
        
        <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-64 xl:w-64 "> </a>
        
      </div>
    
      <div class="flex flex-row items-end justify-end w-2/12  py-7"> 
       
      </div>
    
    </header>
    


    <!-- Contenido principal -->
    <div class=" grid  grid-cols-2  ">
    
        <!-- Columna 1 (60%) -->
        <div class="col-span-2   w-full h-full  p-4  text-left  flex flex-col justify-start items-center mx-auto ">
         
          <div class="flex flex-col justify-center items-center py-6 xs:px-[2%] md:px-[8%] gap-10">
           
           <img class="w-[100%] md:w-[70%]" src="{{ asset('img/404.png') }}" />

           <h2 class="text-xl  text-white w-full font-normal font-RightgroteskMedium tracking-wider text-center">
            ¡Ups! Parece que te has perdido. La página que buscas no está disponible.<br> Pero no te preocupes, ¡estamos aquí para ayudarte!
           </h2>

            <div class="group inline-block">   
              <a type="button" href="{{ route('inicio') }}" class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center mt-3  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500" >
               <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold">Ir al inicio</span><img src="{{ asset('img/iconbutton.svg') }}" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>  
            </div>
            
  
          </div>
        </div>
  
       
        
    </div>



    <a href="https://api.whatsapp.com/send?phone=51934464915&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none" target="_blank">
      <img src="{{ asset('img/wspf.svg') }}" class="w-16" />
    </a>
    
      
   
    
  
    
  
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


  
