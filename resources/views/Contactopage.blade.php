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


<body class="font-sans  bg-azulform textura w-full h-full" >
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKKZ35GL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</div> 
<div class=" inset-0 bg-azulform bg-opacity-80">
  <!-- Encabezado superpuesto -->
  <header class=" text-white xs:px-[5%]  w-full  xs:pt-10 lg:pt-20 h-20 flex justify-between items-center">
    <div class="items-center inline-flex xs:w-8/12 xl:w-3/12 z-50"> 
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
     
    <div class="flex flex-col text-white text-left text-4xl  space-y-4 font-RightgroteskMedium tracking-wider">
        <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
        <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
        <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
        <a class="hover:underline duration-300" href="{{ route('posts.index') }}">Blog</a>
        <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
    </div>
  </div>

  <!-- Contenido principal -->
  <div class=" grid  grid-cols-12 xs:min-w-96  xs:h-full px-[5%] xs:gap-0 lg:gap-12">

      <!-- Columna 1 (60%) -->
      <div class="xs:col-span-12  lg:col-span-8  w-full h-full  p-4  text-left  flex flex-col justify-center items-center mx-auto">
        
        <div class="items-center  xs:py-[5%] md:py-[8%] lg:py-[10%]  ">
         <form method="POST" action="{{ route('guardarcontacto') }}">
          @csrf
          <h1 class="xs:text-4xl xl:text-6xl  text-white w-full  font-RightgroteskMedium tracking-wide">
            ¡Estamos Aquí para Ayudarte!
          </h1>
          <p class="xs:text-base xl:text-lg text-white  font-normal mt-10 font-MontserratRegular ">
            ¿Estás preparado para iniciar con tu <b>página weba</b> con nuestra agencia? A continuación, 
            completa este formulario y nos contactaremos contigo para llevarte al éxito
          </p>
          
          

            <h2 class="xs:text-lg xl:text-2xl text-white mt-10 font-RightgroteskMedium tracking-wide">
                Información Personal
            </h2>

            <div class="grid grid-cols-12  mb-6 mt-8">
               
                <div class="w-full xs:col-span-12 lg:col-span-12  "> 
                  <input class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-3 leading-tight "  name="nombre" type="text" placeholder="Nombre completo">
                  @error('nombre')
                        <span class="text-red-500 text-base ">{{ $message }}</span>
                  @enderror  
                </div>
 
            </div>
            
            <div class="grid grid-cols-12  mb-6 mt-8 gap-6">

                <div class="w-full xs:col-span-12 lg:col-span-6 ">
                    <input class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-3 leading-tight " name="email" type="email" placeholder="Correo electrónico">
                    @error('email')
                        <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full xs:col-span-12 lg:col-span-6 ">
                    <input class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-3 leading-tight " name="telefono"  type="number" placeholder="Número de teléfono">
                    @error('telefono')
                        <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror
                </div>

            </div> 


            <h2 class="xs:text-lg xl:text-2xl text-white font-RightgroteskMedium tracking-wide mt-10">
                Sobre tu proyecto
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                ¿Qué tipo de proyecto necesitas?
            </p>

            <div class="grid grid-cols-12  mt-8 relative">
              <div class="col-span-12"> 
                <select name="tipoproyecto" class="font-MontserratRegular block appearance-none w-full bg-fondoinput  text-white py-4 px-4 pr-8 rounded-full">
                    <option class="text-black" value="" selected disabled hidden >Selecciona el tipo de página</option>
                    <option class="text-black" value="One page" >One Page</option>
                    <option class="text-black" value="Landing" >Landing</option>
                    <option class="text-black" value="E-commerce" >E-commerce</option>
                    <option class="text-black" value="App móvil" >App móvil</option>
                </select>
                
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-7 text-white">
                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>

                  @error('tipoproyecto')
                        <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror 
              </div>  
            </div>

            <h2 class="xs:text-lg xl:text-2xl text-white  font-RightgroteskMedium tracking-wide mt-10">
                Mensaje o Detalles del Proyecto
            </h2>

            <div class="grid grid-cols-12  mb-6 mt-8">
               
                <div class="w-full xs:col-span-12 lg:col-span-12  "> 
                  <textarea rows="6" name="mensaje" class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-2xl   py-4 px-4 mb-3 leading-tight "  type="textarea" placeholder="Tu mensaje"></textarea>
                </div>
 
            </div>

            <h2 class="xs:text-lg xl:text-2xl text-white  font-RightgroteskMedium tracking-wide mt-10">
                Si tienes una web que quieres mejorar, ingrésala aquí
            </h2>


            <div class="grid grid-cols-12  mb-6 mt-8">
               
                <div class="w-full xs:col-span-12 lg:col-span-12  "> 
                  <input class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-3 leading-tight "  name="urlweb" type="text" placeholder="https://tu-web.com">
                  @error('urlweb')
                        <span class="text-red-500 text-base ">{{ $message }}</span>
                  @enderror  
                </div>
 
            </div>

            <h2 class="xs:text-lg xl:text-2xl text-white  font-RightgroteskMedium tracking-wide  mt-10">
                Preferencias de Contacto
            </h2>
            
            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                ¿Cómo Prefieres que te Contactemos?
            </p>

            <div class="grid grid-cols-12  mb-6 mt-8 gap-6">

                <div class="w-full xs:col-span-12 lg:col-span-6 ">
                   
                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput   border-none rounded-full ">
                        <label for="bordered-radio-1" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">Correo Electrónico</label>
                        <input id="bordered-radio-1" type="radio" value="Correo Electrónico" name="tipocontacto" class="h-4 w-[15%]">
                    </div>

                </div>

                <div class="w-full xs:col-span-12 lg:col-span-6 ">

                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput    border-none rounded-full ">
                        <label for="bordered-radio-2" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">Teléfono</label>
                        <input  id="bordered-radio-2" type="radio" value="Teléfono" name="tipocontacto" class="w-[15%] h-4" >
                    </div>
                
                </div>
                
                @error('tipocontacto')
                    <span class="text-red-500 text-base xs:col-span-12 ">{{ $message }}</span>
                @enderror 
            </div> 

            <h2 class="xs:text-lg xl:text-2xl text-white  font-RightgroteskMedium tracking-wide mt-10">
                Horario Preferido para Contacto
            </h2>
            
            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                ¿En qué horario prefieres que te contactemos?
            </p>
            
  
            <div class="grid grid-cols-12  mb-6 mt-8 gap-6">

                <div class="w-full xs:col-span-12 lg:col-span-6 ">
                   
                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput   border-none rounded-full ">
                        <label for="bordered-radio-3" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">09:00 AM - 11:00 AM</label>
                        <input id="bordered-radio-3" type="radio" value="09:00 AM - 11:00 AM" name="horacontacto" class="h-4 w-[15%]">
                    </div>

                </div>

                <div class="w-full xs:col-span-12 lg:col-span-6 ">

                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput    border-none rounded-full ">
                        <label for="bordered-radio-4" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">11:00 AM - 01:00 PM</label>
                        <input  id="bordered-radio-4" type="radio" value="11:00 AM - 01:00 PM" name="horacontacto" class="w-[15%] h-4" >
                    </div>
                
                </div>

                <div class="w-full xs:col-span-12 lg:col-span-6 ">
                   
                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput   border-none rounded-full ">
                        <label for="bordered-radio-5" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">01:00 PM - 03:00 PM</label>
                        <input id="bordered-radio-5" type="radio" value="01:00 PM - 03:00 PM" name="horacontacto" class="h-4 w-[15%]">
                    </div>

                </div>

                <div class="w-full xs:col-span-12 lg:col-span-6 ">

                    <div class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput    border-none rounded-full ">
                        <label for="bordered-radio-6" class="w-[85%] py-4 ms-2 text-base font-normal text-white ">03:00 PM - 05:00 PM</label>
                        <input  id="bordered-radio-6" type="radio" value="03:00 PM - 05:00 PM" name="horacontacto" class="w-[15%] h-4" >
                    </div>
                
                </div>

                    @error('horacontacto')
                        <span class="text-red-500 text-base xs:col-span-12 ">{{ $message }}</span>
                    @enderror 
            </div> 



            <h2 class="xs:text-lg xl:text-1xl text-white  font-bold mt-10">
                Nota
            </h2>
            
            <p class="xs:text-base xl:text-base text-white  font-normal mt-2 font-MontserratRegular">
                Toda la información proporcionada se mantiene confidencial y 
                solo se utilizará para ponernos en contacto contigo en relación con tu consulta.
            </p>

            <div class="group mt-8 inline-block ">   
                <button type="submit" href="{{ route('contacto') }}" class="text-lg bg-fondoboton text-white  px-6 py-3 rounded-full w-auto inline-block text-center mt-6  group-hover:pr-3 group-hover:border-4 group-hover:border-white transition-all  duration-250" >
                 <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold text-base">Enviar solicitud</span><img src="{{ asset('img/iconbutton.svg')}}" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block  group-hover:rotate-45 transition-all duration-500"></button>  
              </div>

          </form>


        </div>
      </div>

      <!-- Columna 2 (40%) -->
      <div class="xs:col-span-12 lg:col-span-4  flex  flex-col justify-center items-center mx-auto ">
         
        <div class="xs:w-[100%] lg:w-[100%] min-h-96 md:h-[100%]   ">
            
            <h2 class="xs:text-lg xl:text-2xl text-white  mt-10 font-RightgroteskMedium tracking-wide">
                Dirección
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                Centro Empresarial Peruano - Suizo<br>
                Av. Andrés Aramburú 166 - Miraflores, Oficina 4B<br>
                Lima - Perú
             </p>

             <h2 class="xs:text-lg xl:text-2xl text-white  mt-10 font-RightgroteskMedium tracking-wide">
                Teléfono
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                +51 908 857 558
             </p>

             <h2 class="xs:text-lg xl:text-2xl text-white   mt-10 font-RightgroteskMedium tracking-wide">
                Correo Electrónico:
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                hola@mundoweb.pe
             </p>  
             
             <h2 class="xs:text-lg xl:text-2xl text-white  mt-10 font-RightgroteskMedium tracking-wide">
                Horario de Atención
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                Lunes a Viernes<br>
                9:00 AM - 6:00 PM<br>
                Sábados<br>
                9:00 AM - 1:00 PM
             </p> 

             <h2 class="xs:text-lg xl:text-2xl text-white  font-bold mt-10 font-RightgroteskMedium tracking-wide">
                ¿Prefieres Visitar nuestra Oficina?
            </h2>

            <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                Estamos ubicados en el vibrante corazón de Ciudad Tecnológica. ¡Ven a saludarnos!
             </p>

             <div class="group">
                <a type="button" href="https://maps.app.goo.gl/HBop8pkCVnsW8uRa7" target="_blank" class="text-lg bg-fondoboton text-white px-3 py-2 mt-10 rounded-full w-auto inline-block text-center  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500" >
                  <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold text-base">Ver mapa </span><img src="img/iconbutton.svg" alt="Flecha a la derecha" class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-75"></a> 
            </div> 
        </div>

      </div>

  </div>

  <a href="https://api.whatsapp.com/send?phone=51908857558&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none" target="_blank">
    <img src="{{ asset('img/wspf.svg') }}" class=" w-16" />
    </a>


  <!-- Pie de página -->
  <footer class="grid grid-cols-12  text-right items-center justify-between px-[5%] ">
   
    <div class="xs:col-span-12 lg:col-span-4 ">

    </div>

    <div  class="xs:col-span-12 lg:col-span-4">

    </div>

    <div  class="xs:col-span-12 lg:col-span-4 ">

       
    
    </div>

  </footer>

  
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