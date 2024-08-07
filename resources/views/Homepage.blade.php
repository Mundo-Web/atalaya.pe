<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia de desarrollo web - Mundo Web</title>
  <meta property="og:type" content="website" />
  <meta property="og:title "content="Agencia de desarrollo web - Mundo Web" />
  <meta name="description"
    content="Somos la agencia de desarrollo web en Perú. Especialistas en diseño y desarrollo de páginas web, con enfoque en posicionamiento SEO. ¡Potencia tu presencia digital con nosotros!">
  <meta property="og:image" content="{{ asset('img/logomundoweb.svg') }}" />
  <meta property="og:url" content="https://mundoweb.pe/" />
  <meta name="keywords"
    content="Agencia de desarrollo web, Agencia de diseño web, Empresa de desarrollo web, Desarrolladores web, Páginas web Perú, Especialistas en diseño web, Creación de sitios web, Posicionamiento SEO, Empresa de posicionamiento web, Agencia de diseño web en Lima" />


  {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
  <link rel="stylesheet" href="{{ asset('build/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/slick.min.js') }}"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WKKZ35GL');
  </script>
  <!-- End Google Tag Manager -->

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1Q5HR10EMH"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-1Q5HR10EMH');
  </script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7CQ3LKCR4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-N7CQ3LKCR4');
  </script>
</head>

<div class="fullscreen-container">
  <video loop muted autoplay class="fullscreen-video md:block">
    <source src="../video/videomwdesktop.mp4" type="video/mp4">
  </video>
  <video loop muted autoplay class="fullscreen-video block md:hidden">
    <source src="../video/videomwmovil.mp4" type="video/mp4">
  </video>
</div>

<body class="font-sans bg-azuloscuro lg:h-screen">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKKZ35GL" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- Encabezado superpuesto -->
  <header class=" text-white px-[5%]  w-full z-10 h-[15%]  flex justify-between items-center ">
    <div class="items-center inline-flex xs:w-6/12 xl:w-3/12 z-50 py-7 ">
      <a href="{{ route('inicio') }}"> <img src="{{ asset('img/logomundoweb.svg') }}" class="h-full xs:w-64 xl:w-64 ">
      </a>
    </div>

    <nav class="inline-flex items-center xs:w-0/12 xl:w-6/12 xs:hidden xl:block py-7">
      <ul class="flex space-x-6 font-MontserratSemibold font-normal">
        <li class="hover:text-mwnaranja"><a href="{{ route('inicio') }}">Inicio</a></li>
        <li class="hover:text-mwnaranja"><a href="{{ route('servicios') }}">Servicios</a></li>
        <li class="hover:text-mwnaranja"><a href="{{ route('proyectos') }}">Proyectos</a></li>
        <a class="hover:underline duration-300" href="{{ route('posts.index') }}">Blog</a>
        <li class="hover:text-mwnaranja"><a href="{{ route('contacto') }}">Contacto</a></li>
        <li class="hover:text-mwnaranja"><a href="{{ route('Home.jsx') }}">Atalaya</a></li>
      </ul>
    </nav>

    <div class="flex flex-row items-end justify-end  xs:w-6/12 xl:w-3/12  xs:hidden xl:block py-7">
      <div class="group flex flex-row items-end justify-end mr-5">
        <a type="button" href="{{ route('contacto') }}"
          class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500">
          <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold text-base">Quiero mi web
          </span><img src="{{ asset('img/iconbutton.svg') }}" alt="Flecha a la derecha"
            class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>
      </div>
    </div>


    <div class="inline-flex items-center xs:w-4/12 xl:w-3/12 justify-end xs:block xl:hidden z-50 py-7">
      <div class="group " id="botonmenu">
        <a type="button" href="javascript:void(0)"
          class=" float-right text-lg bg-fondoboton text-white w-16 h-16 rounded-full  inline-flex items-center justify-center">

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


  <!-- Contenido principal -->
  <div class=" grid  grid-cols-2  xs:gap-1 lg:gap-10  xs:h-full lg:h-[85%] ">

    <!-- Columna 1 (60%) -->
    <div
      class="xs:col-span-2  lg:col-span-1 w-full h-full  p-4  text-left  flex flex-col justify-start items-center mx-auto ">

      <div class=" items-center  pt-[5%] md:pt-[5%] lg:pt-[5%]  xs:px-[2%] md:px-[8%] ">
        <h1 class="text-mwnaranja text-lg   w-full font-semibold font-RightgroteskMedium tracking-wider">Especialistas
          en diseño web</h1>
        <h2 class="xs:text-4xl lg:text-5xl   text-white w-full font-bold font-RightgroteskMedium tracking-wider">
          Pasión por la <span class="text-mwnaranja">transformación</span><br> digital
        </h2>

        <p class="xs:text-base xl:text-base text-white  font-normal mt-6 font-MontserratRegular ">Somos una empresa
          especializada en el <b>Desarrollo Web</b> y estrategias digitales,
          como el posicionamiento SEO, para cumplir con tus objetivos. Mundo Web te ofrece la construcción de sitios
          web,
          aplicativos móviles, servicios de <b>e-commerce</b> y experiencias digitales que te impulsarán al éxito.</p>
        <div class="group inline-block">
          <a type="button" href="{{ route('servicios') }}"
            class="text-lg bg-fondoboton text-white px-6 py-3 rounded-full w-auto inline-block text-center mt-6  group-hover:pl-3 group-hover:border-4 group-hover:border-white transition-all  duration-500">
            <span class="group-hover:pr-3 transition-all  duration-500 font-MontserratSemibold">Servicios</span><img
              src="{{ asset('img/iconbutton.svg') }}" alt="Flecha a la derecha"
              class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all duration-500"></a>
        </div>
        <div class="grid grid-flow-col auto-cols-max items-center xs:mt-10 md:my-10">
          <ul class="flex -space-x-6 xs:col-span-12 md:col-span-4">
            <li class="rounded-full"><img class="rounded-full w-12" src="{{ asset('img/persona1.png') }}"> </li>
            <li class="rounded-full"><img class="rounded-full w-12" src="{{ asset('img/persona2.png') }}"> </li>
            <li class="rounded-full"><img class="rounded-full w-12" src="{{ asset('img/persona3.png') }}"> </li>
            <li class="rounded-full"><img class="rounded-full w-12" src="{{ asset('img/persona4.png') }}"> </li>
            <li class="rounded-full"><img class="rounded-full w-12" src="{{ asset('img/persona5.png') }}"> </li>
          </ul>
          <p class="grid xs:col-span-12 md:col-span-8 ml-5 text-mwnaranja text-base items-end font-MontserratRegular">
            <span class="font-bold text-2xl mr-2 font-RightgroteskMedium tracking-wide">100+ </span> Clientes
            digitalizados
          </p>
        </div>

      </div>
    </div>

    <!-- Columna 2 (40%) -->
    <div class="xs:col-span-2 lg:col-span-1  flex p-8">

      <div
        class="w-[100%]  min-h-96 md:h-[80%] rounded-3xl  bg-cover bg-center flex justify-center items-center md:px-[10%]">

        <div
          class="text-left  space-y-2 flex flex-col justify-center items-start px-[8%] pt-[8%] pb-[8%] rounded-2xl bg-fondoform">

          <h2 class="font-RightgroteskMedium text-2xl font-medium"><span class="text-white">Hablemos de tu próximo
              Proyecto</h2>
          <p class="font-MontserratMedium text-base font-normal text-white"> Crea experiencias digitales que convierten
            visitantes en clientes leales</p>

          <div class="w-full text-sm">
            <form id="formHome">
              @csrf

              <div class="grid grid-cols-12 mt-2">

                <div class="w-full col-span-12 lg:col-span-12  ">
                  <input
                    class="font-MontserratRegular appearance-none block w-full  bg-inputmw  text-white  border-none rounded-xl py-4 px-3  leading-tight placeholder-slate-300 "
                    name="nombre" type="text" placeholder="Nombre completo" id="contact_name">
                  @error('nombre')
                    <span class="text-red-500 text-base ">{{ $message }}</span>
                  @enderror
                </div>

                <div>
                  <input
                    class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight placeholder-slate-300 "
                    name="source" type="hidden" value="Home">
                </div>

              </div>

              <div class="grid grid-cols-12 mt-4 gap-3 ">

                <div class="w-full col-span-12 lg:col-span-6">
                  <input
                    class="font-MontserratRegular appearance-none block w-full bg-inputmw  text-white  border-none rounded-xl py-4 px-3 leading-tight placeholder-slate-300 "
                    name="email" type="email" placeholder="Correo electrónico" id="contact_email">
                  @error('email')
                    <span class="text-red-500 text-base ">{{ $message }}</span>
                  @enderror
                </div>

                <div class="w-full col-span-12 lg:col-span-6 ">
                  <input
                    class="font-MontserratRegular appearance-none block w-full bg-inputmw  text-white  border-none rounded-xl py-4 px-3 leading-tight placeholder-slate-300 "
                    name="telefono" type="text" placeholder="Número de teléfono asdiasda" id="contact_phone">
                  @error('telefono')
                    <span class="text-red-500 text-base ">{{ $message }}</span>
                  @enderror
                </div>

              </div>

              <div class="grid grid-cols-12   mt-4">

                <div class="w-full xs:col-span-12 lg:col-span-12  ">

                  <textarea
                    class=" font-MontserratRegular appearance-none block w-full bg-inputmw  text-white  border-none rounded-xl py-4 px-3  leading-tight placeholder-slate-300 "
                    name="urlweb" placeholder="Mensaje" rows="3" id="message"></textarea>
                </div>
              </div>
              <div class="group  mt-6">
                <button type="submit" href="{{ route('inicio') }}"
                  class="font-MontserratSemibold font-light text-base bg-inputmw  text-white px-3  py-2 rounded-full w-auto inline-block ">
                  Solicitar servicio<img src="{{ asset('img/flechaderecha.svg') }}" alt="Flecha a la derecha"
                    class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></button>
              </div>
              @if (Session::has('mensaje'))
                <div class="grid grid-cols-12 pt-6">
                  <div class="w-full xs:col-span-12 lg:col-span-12  ">
                    <span class="text-white text-lg animate-fade-down  bg-mwnaranja rounded-xl pt-2 pb-3 px-3">Gracias,
                      nos contactaremos contigo, {{ session()->get('name') }} </span>
                  </div>
                </div>
              @endif
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <a href="https://api.whatsapp.com/send?phone=51908857558&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20."
    class="fixed bottom-28 left-2 md:left-5 z-50 animate-wiggle animate-infinite animate-delay-[5ms] animate-ease-in  float-right block bg-none"
    target="_blank">
    <img src="{{ asset('img/wspf.svg') }}" class="w-16" />
  </a>

  <div id="menu"
    class="fixed z-40 w-0 h-0 flex justify-center items-center bg-azulanding opacity-0 duration-700 ">

    <div
      class="flex flex-col text-white text-left text-4xl font-bold space-y-4 font-RightgroteskMedium tracking-wider">
      <a class="hover:underline duration-300" href="{{ route('inicio') }}">Inicio</a>
      <a class="hover:underline duration-300" href="{{ route('servicios') }}">Servicios</a>
      <a class="hover:underline duration-300" href="{{ route('proyectos') }}">Proyectos</a>
      <a class="hover:underline duration-300" href="{{ route('contacto') }}">Contacto</a>
    </div>
  </div>

  <footer class="z-10 col-span-2">
    <div class="px-1 py-2 h-20 lg:-mt-20 bg-azulmundoweb">
      <div x-data="{}" x-init="$nextTick(() => {
          let ul = $refs.logos;
          ul.insertAdjacentHTML('afterend', ul.outerHTML);
          ul.nextSibling.setAttribute('aria-hidden', 'true');
      })"
        class="px-[5%]  bg-azulmw w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
        <ul x-ref="logos"
          class="h-16 flex flex-row justify-between items-center  [&_li]:mx-10   animate-infinite-scroll">

          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo1.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo2.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo3.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo4.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo5.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo6.svg') }}" /></li>

        </ul>

        <ul x-ref="logos"
          class="h-16 flex flex-row justify-between items-center  [&_li]:mx-10   animate-infinite-scroll"
          aria-hidden="true">

          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo1.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo2.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo3.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo4.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo5.svg') }}" /></li>
          <li class="w-32 py-8"><img class="object-contain" src="{{ asset('img/Logo6.svg') }}" /></li>

        </ul>
      </div>
    </div>
  </footer>



</body>

</html>


<script type="text/javascript">
  $(document).ready(function() {

    $('.carruselfooter ul ').slick({
      autoplay: true,
      autoplaySpeed: 1000,
      speed: 4000,
      slidesToShow: 3,
      centerMode: true,
      slidesToScroll: 1,
      arrows: false,
      adaptivew: true,
      responsive: [{
        breakpoint: 650, // Tamaño de pantalla md (ejemplo, puedes ajustar según tus necesidades)
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
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
<script>
  $('#formHome').submit(function(event) {
    // Evita que se envíe el formulario automáticamente
    // method="POST" action="{{ route('formhome') }}"

    event.preventDefault();
    Swal.fire({

      title: 'Procesando información',
      html: `Enviando... 
      <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            
        </div>
      </div>
      `,
      allowOutsideClick: false,
      onBeforeOpen: () => {
        Swal.showLoading();
      }
    });

    let formDataArray = $(this).serializeArray();

    $.ajax({
      url: '{{ route('formhome') }}',
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        Swal.close();
        Swal.fire({
          title: response.message,
          icon: "success",
        }).then((result) => {
          window.location.href = "{{ route('thankyoupage') }}";
        });
      },
      error: function(response) {

        Swal.close();
        Swal.fire({
          title: response.responseJSON.message,
          icon: "error",
        });
      }
    });

  })
</script>
<script>
  document.getElementById('formHome').addEventListener('submit', async function(e) {
    e.preventDefault()
    // if (!validarTelefono($('#contact_phone').val())) return;
    // if (!validarEmail($('#contact_email').val())) return;

    try {
      const request = {
        contact_name: $('#contact_name').val(),
        contact_phone: $('#contact_phone').val(),
        contact_email: $('#contact_email').val(),
        // contact_position: $('#contact_position').val(),
        // tradename: $('#tradename').val(),
        // workers: $('#workers').val(),
        message: $('#message').val(),
        origin: '[Mundo Web] - Web Oficial',
        source: '[Mundo Web] - Web Oficial',
      }
      const res = await fetch('https://atalaya.mundoweb.pe/free/clients', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(request)
      })
      const data = await res.json()

      const restCRM = await fetch("{{route('save.crm')}}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          ...request,
          _token: $('[name="_token"]').val(),
          tradename: request.contact_name
        })
      })
      const dataCRM = await restCRM.json()
    } catch (error) {
      console.error(error)
    }
  })
</script>
<script>
  // Obtener información del navegador y del sistema operativo
  const platform = navigator.platform;
  document.getElementById('sistema').value = platform;

  // Obtener la geolocalización del usuario (si se permite)
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      document.getElementById('latitud').value = position.coords.latitude;
      document.getElementById('longitud').value = position.coords.longitude;
    });
  }

  // Obtener la resolución de la pantalla
  const screenWidth = window.screen.width;
  const screenHeight = window.screen.height;
  document.getElementById('anchodispositivo').value = screenWidth;
  document.getElementById('largodispositivo').value = screenHeight;
</script>