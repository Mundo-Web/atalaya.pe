<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <link rel="stylesheet" href="{{ asset('build/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  {{-- sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}" /> --}}

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

  <!-- Event snippet for Registro Mundo Web conversion page -->
  <script>
    gtag('event', 'conversion', {
      'send_to': 'AW-11094498070/qv5WCLv1icQZEJa2oqop'
    });
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

  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> --}}


  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> --}}

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Landing Mundo Web</title>

  <style>
    .navbar-fixed-top.scrolled {
      background-color: #fff !important;
      transition: background-color 200ms linear;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.4);
    }

    .navbar-fixed-top.scrolled .nav-link {
      color: #555;
    }

    @font-face {
      font-family: "RightgroteskMediumMedium";
      /* src: url({{ asset('fonts/rightRightgroteskMedium-medium-webfont.woff') }}) format("woff"); */
      src: url({{ asset('fonts/rightRightgroteskMedium-widemedium-webfont.woff') }}) format("woff");
    }

    .bg_fondoMain {
      background-image: url({{ asset('images/img/imgMundoWeb/image_33.png') }});
    }

    .bg_fondoMainMobile {
      background-image: url({{ asset('images/img/imgMundoWeb/image_34.png') }});
    }

    @media (min-width: 768px) {
      .bg_fondoMain {
        background-image: url({{ asset('images/img/imgMundoWeb/image_2.png') }});
      }

      .bg_fondoMainMobile {
        background-image: url({{ asset('images/img/imgMundoWeb/image_14.png') }});
      }
    }

    /* .swiper-slide{
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      
      height: 100% !important;
    } */

    .height-modal {
      max-height: 550px;

    }

    .opacidad {
      opacity: 0.8;
    }

    .cerrar {
      background-color: rgb(49, 54, 59);
    }

    .cerrar_close {
      width: 15px;
    }

    @media (min-width: 768px) {
      .height-modal {
        max-height: 700px;

      }

      .cerrar_close {
        width: 18px;

      }
    }

    .custom-auto-width {
      width: 100%;
    }

    @media (min-width: 768px) {
      .custom-auto-width {
        width: auto;
      }
    }

    .ancho_modal {
      width: 80%
    }

    @media (min-width:768px) {
      .ancho_modal {
        width: 60%
      }
    }

    .body-no-scroll {
      overflow: hidden;
    }

    /* ---------------- Modificar los Bullets de swiper Beneficios -------------------- */
    .procesoRelative {
      position: relative;
    }

    .swiper-pagination-proceso .swiper-pagination-bullet.swiper-pagination-bullet-active {
      background-color: transparent;
      background-image: url({{ asset('img/bullets.svg') }});
      background-repeat: no-repeat;
      background-position: center;
      width: 20px;
      height: 20px;
    }

    .swiper-pagination-proceso .swiper-pagination-bullet {
      background-color: #303BE4;
      opacity: 1;
    }

    .swiper-pagination-proceso.swiper-pagination-horizontal {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    @media (min-width: 1024px) {
      .swiper-pagination-proceso.swiper-pagination-horizontal {
        --swiper-pagination-bottom: 670px;
        position: absolute;
        justify-content: start;
      }
    }


    /* ---------------- Modificar los Bullets de swiper Proyectos -------------------- */
    .proyectosRelative {
      position: relative;
    }

    .swiper-pagination-proyectos .swiper-pagination-bullet.swiper-pagination-bullet-active {
      background-color: transparent;
      background-image: url({{ asset('img/bullets.svg') }});
      background-repeat: no-repeat;
      background-position: center;
      width: 20px;
      height: 20px;
    }

    .swiper-pagination-proyectos .swiper-pagination-bullet {
      background-color: #303BE4;
      opacity: 1;
    }

    .swiper-pagination-proyectos.swiper-pagination-horizontal {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    @media (min-width: 1024px) {
      .swiper-pagination-proyectos.swiper-pagination-horizontal {
        --swiper-pagination-bottom: 670px;
        position: absolute;
        justify-content: start;
      }
    }
  </style>


</head>



<body class="body">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKKZ35GL" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="overlay"></div>

  <header>

    <div class="absolute md:fixed left-0 right-0 py-5 navbar-fixed-top z-[20]" data-aos="fade-right"
      data-aos-duration="1500">
      <div class="mx-auto w-full md:w-11/12">
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-5 bg-transparent w-11/12 mx-auto">
          <div>
            <a href="{{ route('ultimalanding') }}"><img src="{{ asset('/images/img/imgMundoWeb/image_1.png') }}"
                alt="mundo web"></a>
          </div>
          <div class="group custom-auto-width">
            <a href="#formularioListo"
              class="font-montserrat font-semibold text-white py-2 px-4 bg-[#303BE4] justify-center items-center gap-3 rounded-full flex">
              <!-- Quité la clase w-full del botón -->
              <span>Quiero mi web</span>
              <div class="group-hover:rotate-45 transition-all duration-500 ">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <circle cx="20" cy="20" r="20" fill="white" />
                  <path
                    d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                    stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


    {{-- z-[100] --}}

    {{-- <div class="px-[75px] absolute md:fixed left-0 right-0 py-5 navbar-fixed-top z-[20]"> 
            <div class="flex flex-col md:flex-row md:justify-between items-center gap-5 bg-transparent ">
                <div>
                    <a href="{{ route('ultimalanding') }}"><img src="{{ asset('/images/img/imgMundoWeb/image_1.png') }}"
                            alt="mundo web"></a>
                </div>
                <div class="group">
                    <a href="#formularioListo"
                        class="font-montserrat font-semibold text-white py-2 px-4 bg-[#303BE4] flex justify-center items-center gap-3 rounded-full">
                        <span>Quiero mi web</span>

                        <div class="group-hover:rotate-45 transition-all  duration-500 ">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="white" />
                                <path
                                    d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                                    stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}
    <div class="flex justify-end w-11/12 mx-auto  z-10">
      <div class="fixed bottom-6 sm:bottom-[2rem] right-[20px] lg:bottom-[7rem] z-[80]  lg:right-[40px]">
        <a href="https://wa.link/x8295h" rel="noopener" target="_blank">
          <img src="{{ asset('images/img/imgMundoWeb/WhatsApp.svg') }}" alt="whatsapp"
            class="w-20 h-20 md:w-full md:h-full">
        </a>
      </div>
    </div>
  </header>


  <div class="main overflow-x-hidden">
    <main>
      <section class="bg_fondoMain bg-cover bg-center bg-no-repeat sm:w-full h-full pt-40 md:pt-32">
        <div class="flex flex-col lg:flex-row justify-between gap-0 md:gap-10">
          <div class="basis-1/2 flex flex-col gap-5 px-5 md:pl-16 pt-16  md:pb-0" data-aos="fade-right"
            data-aos-duration="1500">
            <span class="font-RightgroteskMedium text-text32 md:text-text64">🚀</span>
            <h1 class="font-RightgroteskMedium text-text32 md:text-text64 leading-tight text-[#050A41]">
              <span class="text-[#E15A29]">¡Nuestra pasión, </span><span id="type">tu transformación
                Digital!</span>
            </h1>
            <p class="font-montserrat font-medium text-text18 md:text-text20 text-[#3F4654]">Somos una
              <b>empresa de desarrollo web</b> joven y dinámica, especializada en transformar ideas en
              soluciones digitales excepcionales. En Mundo Web, no solo construimos sitios web y
              aplicativos, sino que creamos experiencias digitales que impulsan el éxito de nuestros
              clientes.
            </p>

            <div class="pt-5 group">
              <a href="#formularioListo"
                class="font-montserrat font-semibold text-white py-2 px-4 bg-[#303BE4] justify-center items-center gap-3 rounded-full inline-flex">
                <span>Quiero mi web</span>

                <div class="group-hover:rotate-45 transition-all duration-500">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="white" />
                    <path
                      d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                      stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </div>
              </a>
            </div>

            <div class="text-text24 pt-10 gap-5 flex flex-row md:items-center justify-between md:justify-start pb-10">

              <img src="{{ asset('images/img/imgMundoWeb/image_3.png') }}" alt="mundoweb" class="w-20">

              <p class="font-RightgroteskMedium uppercase text-text16 md:text-text24 font-medium">
                <span class="text-[#E15A29] text-text24">100+</span> <span class="text-text14">Clientes
                  digitalizados</span>
              </p>

            </div>


          </div>

          <div class="hidden basis-1/2 md:flex items-start justify-end" data-aos="fade-left" data-aos-duration="1500">
            <img src="{{ asset('images/img/imgMundoWeb/image_website.png') }}" alt="mundo web" class="">
          </div>

          <div class=" basis-1/2 flex md:hidden items-start justify-center" data-aos="fade-left"
            data-aos-duration="1500">
            <img src="{{ asset('images/img/imgMundoWeb/image_website.png') }}" alt="mundo web" class="">
          </div>
        </div>
      </section>
      <section class="xl:-mt-10 z-0">
        <div class="bg-[#303BE4] ">
          <div x-data="{}" x-init="$nextTick(() => {
              let ul = $refs.logos;
              ul.insertAdjacentHTML('afterend', ul.outerHTML);
              ul.nextSibling.setAttribute('aria-hidden', 'true');
          })"
            class="px-[5%]  bg-[#303BE4] w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
            <ul x-ref="logos"
              class="h-32 flex flex-row justify-between items-center  [&_li]:mx-10 [&_img]:max-w-none  animate-infinite-scroll">

              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo1.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo2.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo3.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo4.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo5.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo6.svg') }}" />
              </li>

            </ul>

            <ul x-ref="logos"
              class="h-32 flex flex-row justify-between items-center  [&_li]:mx-10 [&_img]:max-w-none  animate-infinite-scroll"
              aria-hidden="true">

              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo1.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo2.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo3.svg') }}" />
              </li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo4.svg') }}" /></li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo5.svg') }}" /></li>
              <li class="w-60 py-8"><img class="object-contain"
                  src="{{ asset('img_mundowebaplicativos/Logo6.svg') }}" /></li>

            </ul>
          </div>
        </div>
      </section>
      <section class="bg_fondoMainMobile bg-cover bg-center bg-no-repeat sm:w-full h-full pt-20 flex flex-col gap-10">

        <div class="w-11/12 mx-auto grid grid-cols-1 lg:grid-cols-2" data-aos="fade-right" data-aos-duration="1500">
          <div class="flex justify-center hidden md:block">
            <img src="{{ asset('images/img/imgMundoWeb/image_5.png') }}" alt="mundo web">
          </div>

          <div id="formularioListo" class="flex flex-col justify-center gap-10">
            <h2
              class="text-[#050A41] font-RightgroteskMedium text-text32 md:text-text64 leading-tight font-medium w-full lg:w-2/3">
              ¿Listo para crear tu página <span class="text-[#E15A29]">web a medida?</span> </h2>
            <p class="text-[#3F4654] text-text18 font-montserrat font-medium">¡Desata el potencial de tu
              negocio! Convierte visitantes en clientes leales creando experiencias digitales únicas y
              cautivadoras. Llena nuestro formulario y déjanos ser tus aliados en el camino hacia el éxito
              en línea.

            </p>

            <div>
              <form id="dataForm" class="flex flex-col gap-5">
                @csrf
                <div>
                  <input type="text" name="contact_name" placeholder="Nombre Completo" required
                    class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px]
                                          text-[#323BDC] font-montserrat w-full py-4 px-5 rounded-xl text-text16  placeholder-opacity-25 font-medium bg-white">
                </div>

                <div class="flex flex-col md:flex-row md:justify-between gap-5 w-full">
                  <div class="w-full">
                    <input type="email" name="contact_email" placeholder="Correo Electrónico" required
                      id="email"
                      class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px]
                                             text-[#323BDC] font-montserrat w-full py-4 px-5 rounded-xl text-text16 font-medium bg-white">
                  </div>

                </div>

                <div class="flex flex-col md:flex-row md:justify-between gap-5 w-full">

                  <div class="w-full flex">

                    <select id="phone_prefix" name="country_prefix"
                      class="
                                            shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                            w-2/5 text-[#323BDC] font-montserrat py-4 px-5 rounded-l-xl text-text16 font-medium bg-white border-r-0">
                      <option value="" disabled selected>Selecciona</option>
                    </select>

                    <input type="text" name="contact_phone" placeholder="Teléfono" required id="telefono"
                      maxlength="9"
                      class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                             text-[#323BDC] font-montserrat w-3/5 py-4 px-5 rounded-r-xl text-text16 font-medium bg-white border-l-0">
                  </div>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between gap-5 w-full">

                  <div class="w-full">
                    <input type="text" placeholder="Empresa / Marca (Opcional)" name="name"
                      class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                             text-[#323BDC] font-montserrat w-full py-4 px-5 rounded-xl text-text16 font-medium bg-white">
                  </div>
                  <div class="w-full">
                    <input type="text" placeholder="Rubro Empresarial (Opcional)" name="sector"
                      class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                             text-[#323BDC] font-montserrat w-full py-4 px-5 rounded-xl text-text16 font-medium bg-white">
                  </div>

                </div>
                <div class="w-full">
                  <input type="text" placeholder="Link de Web (Opcional)" name="web_url"
                    class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                         text-[#323BDC] font-montserrat w-full py-4 px-5 rounded-xl text-text16 font-medium bg-white ">
                </div>

                <input type="hidden" name="source" id="source" value="[Mundo Web] - Landing WebSite">
                <input type="hidden" name="origin" id="llegade" value="[Mundo Web] - Landing WebSite">
                <input type="hidden" name="client_width" id="anchodispositivo">
                <input type="hidden" name="client_height" id="largodispositivo">
                <input type="hidden" name="client_latitude" id="latitud">
                <input type="hidden" name="client_longitude" id="longitud">
                <input type="hidden" name="client_system" id="sistema">

                <div>
                  <textarea name="message" id="input" rows="5" maxlength="256" placeholder="Cuéntanos sobre tu proyecto"
                    class="shadow-sm shadow-[#303BE4] border-[#303BE4] border-[1px] 
                                          text-[#323BDC] w-full py-4 bg-bgRosaWeak rounded-xl text-text16 font-medium px-5 font-montserrat placeholder:text-textAzul"></textarea>
                </div>
              </form>
            </div>



            <div class="md:pt-10 group">
              <button id='procesarSolicitud'
                class="font-montserrat font-semibold text-white py-3 px-4 bg-[#303BE4] justify-center items-center gap-3 rounded-full inline-flex text-text18">
                <span>Solicitar Servicio</span>

                <div class="group-hover:rotate-45 transition-all  duration-500 ">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="white" />
                    <path
                      d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                      stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </div>
              </button>
            </div>

          </div>
        </div>

        <div class="w-11/12 mx-auto flex flex-col gap-10 md:gap-16 pt-10">
          <h2 data-aos="fade-right" data-aos-duration="1500"
            class="text-[#050A41] font-RightgroteskMedium  text-text32 md:text-text64 font-medium  w-full lg:w-6/12 leading-tight">
            ¡Explora nuestras Maravillas <span class="text-[#E15A29]">Digitales!</span></h2>

          <div class="hidden lg:block">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-10">

              {{-- ---- modal por imagenes --}}

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/LimpiaBnb.png') }}" alt="limpiabnb"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/LimpiaBnb.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/EmprendeEnvio.png') }}" alt="emprendenvio"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/EmprendeEnvio.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/PatnertsLogistic.png') }}" alt="logistic"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/PatnertsLogistic.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/Capi.png') }}" alt="hpi"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/Capi.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/image_43.png') }}" alt="hpi"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/image_43.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/image_42.png') }}" alt="hpi"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/image_42.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/image_44.png') }}" alt="hpi"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/image_44.png') }}')">
              </div>

              <div data-aos="fade-up" data-aos-duration="1500"
                class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                <img src="{{ asset('images/img/imgMundoWeb/machineshop.png') }}" alt="hpi"
                  class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                  onclick="openModal('{{ asset('images/img/imgMundoWeb/machineshop.png') }}')">
              </div>
            </div>
          </div>

          <div data-aos="fade-right" data-aos-duration="1500"
            class="w-full relative block lg:hidden proyectosRelative">
            <div class="swiper proyectos rounded-2xl">
              <div class="swiper-wrapper">
                <div class="swiper-slide flex items-center justify-center mx-auto">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/LimpiaBnb.png') }}" alt="limpiabnb"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/LimpiaBnb.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/EmprendeEnvio.png') }}" alt="emprendenvio"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/EmprendeEnvio.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/PatnertsLogistic.png') }}" alt="logistic"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/PatnertsLogistic.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/Capi.png') }}" alt="hpi"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/Capi.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/image_43.png') }}" alt="hpi"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/image_43.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/image_42.png') }}" alt="hpi"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/image_42.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/image_44.png') }}" alt="hpi"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/image_44.png') }}')">
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="flex justify-center items-start md:hover:scale-110 md:duration-300 shadow-md shadow-black border-black border-[7px] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/img/imgMundoWeb/machineshop.png') }}" alt="hpi"
                      class="w-full h-[400px] xl:h-[520px] bg-cover object-cover  object-top p-0"
                      onclick="openModal('{{ asset('images/img/imgMundoWeb/machineshop.png') }}')">
                  </div>
                </div>
              </div>
              <div class="swiper-pagination-proyectos mt-4 mb-2"></div>
            </div>
          </div>

          <!-- Modal -->
          <div id="modal" class="modal hidden fixed inset-0 items-center justify-center z-[100]">

            <span
              class=" close absolute top-[10%] md:top-0 right-[8%] md:right-[20%] -mr-3 cursor-pointer text-white text-text48  leading-none p-3  cerrar rounded-full z-[101]">
              <img src="{{ asset('images/img/imgMundoWeb/cerrar_close.svg') }}" alt="" class="cerrar_close">
            </span>

            <div class="modal-overlay absolute w-full h-full bg-black opacity-50 opacidad"></div>

            <div
              class="modal-container bg-white mx-auto  rounded shadow-lg z-[100]  overflow-y-auto relative ancho_modal">
              {{-- w-5/6 --}}

              <div class="modal-content p-4 relative overflow-y-scroll height-modal">
                {{--  style="max-height: 700px;" --}}

                <img id="modalImage" src="" alt="Imagen" class="w-full h-auto">
              </div>
            </div>
          </div>
        </div>

        <div class="w-11/12 bg-white lg:bg-[#303BE4] mx-auto rounded-2xl py-10  px-5 mt-10 mb-20 ">
          <div class="w-full md:w-6/12 mx-auto">
            <h2 data-aos="fade-right" data-aos-duration="1500"
              class="text-[#050A41] lg:text-white font-medium text-text32 md:text-text64 text-center leading-tight font-RightgroteskMedium">
              ¡Conoce la receta que usamos en <span class="text-mwnaranja">Mundo Web!</span></h2>

            <p data-aos="fade-left" data-aos-duration="1500"
              class="font-montserrat text-text18 md:text-text20 leading-tight text-[#050A41] lg:text-white text-center py-5">
              Somos una <b>agencia de desarrollo web</b> con un modelo de trabajo que puede llevar tu
              presencia en línea al siguiente nivel.

            </p>
          </div>
          <div class="hidden lg:block">
            <div
              class="grid grid-cols-1 md:grid-cols-2 gap-10 2xl:gap-16 py-14 md:px-10  lg:px-20 min-[2000px]:px-[16%] ">
              <div data-aos="fade-right" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 relative">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">1. Kick
                    Off
                    (Levantamiento de Información)
                  </h2>
                  <p class="text-text18  font-montserrat font-medium">Analizaremos la competencia, la
                    audiencia objetivo y los requerimientos del proyecto.
                    Todo comienza por entender tu visión y objetivos.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>

              <div data-aos="fade-left" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">2.
                    Propuesta
                    Diseño Web
                  </h2>
                  <p class="text-text18  font-montserrat font-medium">Presentamos una propuesta de
                    diseño
                    que este alineada a las especificaciones identificadas.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


              <div data-aos="fade-right" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">3.
                    Maquetación HTML
                  </h2>
                  <p class="text-text18  font-montserrat font-medium">Convertimos la propuesta de
                    diseño
                    web en un sitio navegable, donde revisaremos todas las funcionalidades de
                    navegación.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>

              <div data-aos="fade-left" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">4.
                    Implementación y Configuración SEO</h2>
                  <p class="text-text18  font-montserrat font-medium">Colocaremos las palabras clave,
                    las
                    metadescripciones, realizaremos la curación de texto y
                    el indexado en buscadores de google para poder encontrarte fácilmente.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


              <div data-aos="fade-right" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">5.
                    Programación del BACK END y FRONT END</h2>
                  <p class="text-text18  font-montserrat font-medium">Esto no permitirá tener un
                    panel de
                    control de la web donde podremos administrar el contenido, información y más.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


              <div data-aos="fade-left" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">6.
                    Pruebas y
                    Funcionamiento</h2>
                  <p class="text-text18  font-montserrat font-medium">Realizamos pruebas de
                    funcionalidad, usabilidad, rendimiento, seguridad y compatibilidad.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


              <div data-aos="fade-right" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">7.
                    Capacitación y Despliegue</h2>
                  <p class="text-text18  font-montserrat font-medium">Se realiza una capacitación
                    sobre
                    el uso de la plataforma, seguido del despliegue a los servidores del cliente.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


              <div data-aos="fade-left" data-aos-duration="1500"
                class="text-white flex gap-2 group bg-white  bg-opacity-10 justify-between rounded-xl px-5 py-10 md:p-10 ">
                <div class="flex flex-col gap-5 basis-10/12">
                  <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">8.
                    Garantía</h2>
                  <p class="text-text18  font-montserrat font-medium">Luego de entregado el servicio, contamos con un
                    periodo de garantía y
                    acompañamiento para asegurar la calidad de su producto, con mundo web, tendrás máxima seguridad de
                    un buen soporte a tu servicio.
                  </p>
                </div>
                <div
                  class="opacity-0  md:duration-300 basis-2/12 flex justify-end items-start group-hover:opacity-100">
                  <img src="{{ asset('images/img/imgMundoWeb/image_30.png') }}" alt="mundo web" class="w-8 h-8">
                </div>
              </div>


            </div>
          </div>
          <div class="w-full relative block lg:hidden procesoRelative" data-aos="fade-left" data-aos-duration="1500">
            <div class="swiper proceso rounded-2xl">
              <div class="swiper-pagination-proceso mt-2 mb-4"></div>
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="text-white flex gap-2 group bg-[#303BE4] justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        1. <br>Kick Off
                        (Levantamiento de Información)
                      </h2>
                      <p class="text-text18  font-montserrat font-medium">Analizaremos la
                        competencia, la
                        audiencia objetivo y los requerimientos del proyecto.
                        Todo comienza por entender tu visión y objetivos.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="text-white flex gap-2 group bg-[#303BE4] justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        2. <br>Propuesta
                        Diseño Web
                      </h2>
                      <p class="text-text18  font-montserrat font-medium">Presentamos una
                        propuesta de diseño
                        que este alineada a las especificaciones identificadas.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="text-white flex gap-2 group bg-[#303BE4] justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        3. <br>
                        Maquetación HTML
                      </h2>
                      <p class="text-text18  font-montserrat font-medium">Convertimos la
                        propuesta de diseño
                        web en un sitio navegable, donde revisaremos todas las funcionalidades
                        de
                        navegación.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="text-white flex gap-2 group bg-[#303BE4] justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        4. <br>
                        Implementación y Configuración SEO</h2>
                      <p class="text-text18  font-montserrat font-medium">Colocaremos las
                        palabras clave, las
                        metadescripciones, realizaremos la curación de texto y
                        el indexado en buscadores de google para poder encontrarte fácilmente.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="text-white flex gap-2 group bg-[#303BE4] justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        5. <br>
                        Programación del BACK END y FRONT END</h2>
                      <p class="text-text18  font-montserrat font-medium">Esto no permitirá tener
                        un panel de
                        control de la web donde podremos administrar el contenido, información y
                        más.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="text-white flex gap-2 group bg-[#303BE4]  justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        6. <br>Pruebas y
                        Funcionamiento</h2>
                      <p class="text-text18  font-montserrat font-medium">Realizamos pruebas de
                        funcionalidad, usabilidad, rendimiento, seguridad y compatibilidad.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="text-white flex gap-2 group bg-[#303BE4]  justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        7. <br>
                        Capacitación y Despliegue</h2>
                      <p class="text-text18  font-montserrat font-medium">Se realiza una
                        capacitación sobre
                        el uso de la plataforma, seguido del despliegue a los servidores del
                        cliente.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div
                    class="text-white flex gap-2 group bg-[#303BE4]  justify-between rounded-xl px-5 py-10 md:p-10 ">
                    <div class="flex flex-col gap-5 basis-full">
                      <h2 class="font-RightgroteskMedium font-medium text-text32 leading-tight ">
                        8. <br>
                        Garantía</h2>
                      <p class="text-text18  font-montserrat font-medium">Luego de entregado el servicio, contamos con
                        un periodo de garantía y
                        acompañamiento para asegurar la calidad de su producto, con mundo web, tendrás máxima seguridad
                        de un buen soporte a tu servicio.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-5 flex justify-between w-full" data-aos="fade-up" data-aos-duration="1500">
            <div class="w-full flex justify-center group">
              <a href="#formularioListo"
                class="font-montserrat font-semibold text-white py-2 px-4 bg-[#303BE4] lg:bg-white lg:bg-opacity-10  justify-center items-center gap-3 rounded-full inline-flex text-center">
                <span>Quiero mi web</span>

                <div class="group-hover:rotate-45 transition-all  duration-500 ">
                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="white" />
                    <path
                      d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                      stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </div>
              </a>
            </div>

          </div>

        </div>

      </section>


    </main>
  </div>


  <footer class="bg-[#303BE4] py-20" data-aos="fade-up" data-aos-duration="1500">

    <div
      class="flex flex-col gap-5 md:gap-0 md:flex-row md:justify-between w-11/12 mx-auto border-b-[1px] border-gray-400 pb-10">

      <div class="basis-8/12 flex flex-col gap-5 justify-between">
        <div>
          <a href="{{ route('ultimalanding') }}"><img src="{{ asset('/images/img/imgMundoWeb/image_31.png') }}"
              alt="mundo web"></a>
        </div>


        <div class="group">
          <a href="#formularioListo"
            class="border-white border-[1px] font-montserrat font-semibold text-white py-2 px-4 bg-[#303BE4] justify-center items-center gap-3 rounded-full inline-flex">
            <span>Ir a la web</span>

            <div class="group-hover:rotate-45 transition-all  duration-500 ">
              <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="white" />
                <path
                  d="M16.4583 15.0808L24.9803 15.0807M24.9803 15.0807L24.9803 23.4815M24.9803 15.0807L15.0808 24.9802"
                  stroke="#303BE4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
          </a>
        </div>

        <div class="flex gap-5">
          <a href="https://www.instagram.com/mundoweb.pe/" target="_blank">
            <img src="{{ asset('/images/img/imgMundoWeb/Instagram.svg') }}" alt="instagram">
          </a>
          <a href="https://www.facebook.com/mundoweb.pe/" target="_blank">
            <img src="{{ asset('/images/img/imgMundoWeb/Facebook.svg') }}" alt="facebook">
          </a>
        </div>
      </div>

      <div class="basis-4/12 text-white">

        <div class="">
          <p class="font-montserrat font-normal text-text16 pb-5">Dirección</p>
          <p class="font-montserrat font-normal text-text16">Centro Empresarial Peruano - Suizo</p>
          <p class="font-montserrat font-normal text-text16">Av. Aramburú 166 - Miraflores, Oficina 4B, Lima,
            Lima
            51, PE</p>

        </div>

        <div>
          <p class="font-montserrat font-normal text-text16 py-5">Horario</p>
          <p class="font-montserrat font-normal text-text16">Lunes - Viernes 8am - 6pm</p>
          <p class="font-montserrat font-normal text-text16">Sábados 9am - 1pm</p>
        </div>
      </div>

    </div>


    <div class="pt-10 w-11/12 mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-7 font-monserrat ">
        <div class="lg:col-span-7">
          <p class="text-base font-normal text-white">Copyright © 2024 Mundo Web. Reservados todos los
            derechos.</p>
        </div>
        <div class="flex flex-row justify-between lg:items-center lg:justify-end lg:col-span-5 gap-2 lg:gap-10">
          <p class="text-base font-normal text-white">hola@mundoweb.pe</p>

        </div>
      </div>
    </div>

  </footer>
</body>


</html>


<script>
  //new Typewriter('#type', {
  //   strings: ['tu transformación Digital!', 'tu presencia en Internet', 'la calidad en tu Servicio'], 
  //    autoStart: true,
  //    loop:true,
  // });

  var swiper = new Swiper(".proceso", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 0,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination-proceso",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 1,
      },
    },
  });

  var swiper = new Swiper(".proyectos", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    initialSlide: 0,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination-proyectos",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 1,
      },
    },
  });
</script>

<script>
  $(function() {
    $(document).scroll(function() {
      var $nav = $(".navbar-fixed-top");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });
</script>
<script>
  var especialidades = new Swiper(".clientes", {
    slidesPerView: 6,
    spaceBetween: 20,
    loop: true,
    grabCursor: true,
    centeredSlides: false,
    initialSlide: 0,
    allowTouchMove: true,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 6,
      },
    },
  });


  // Función para abrir el modal con una imagen específica
  function openModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
    document.body.classList.add('body-no-scroll');
  }

  // Función para cerrar el modal
  function closeModal() {
    document.getElementById('modal').classList.remove('flex');
    document.getElementById('modal').classList.add('hidden');
    document.body.classList.remove('body-no-scroll');
  }

  // Cerrar modal al hacer clic en el botón de cierre
  const closeButtons = document.querySelectorAll('.close');
  closeButtons.forEach(button => {
    button.addEventListener('click', () => {
      closeModal();
    });


  });


  // Cerrar modal al hacer clic fuera del contenido del modal
  document.querySelector('.modal-overlay').addEventListener('click', closeModal);

  // Cerrar modal al presionar la tecla Escape
  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
      closeModal();
    }
  });
</script>
<script>
  $('#procesarSolicitud').on('click', function() {
    console.log('precionando btn envio');

    let formulario = $('#dataForm').serialize()

    /* if (!validarTelefono($('#telefono').val())) {
            return;
        };

        if (!validarEmail($('#email').val())) {
            return;
        }; */
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

    // $.ajax({
    //   url: '{{ route('guardarlandingmundoweb') }}',
    //   method: 'POST',
    //   data: formulario,
    //   success: function(response) {
    //     Swal.close();
    //     Swal.fire({
    //       title: response.message,
    //       icon: "success",
    //     });

    //     $('#dataForm')[0].reset();

    //     window.location.href = 'https://mundoweb.pe/website#formularioListo';
    //   },
    //   error: function(response) {

    //     Swal.close();
    //     Swal.fire({
    //       title: response.responseJSON.message,
    //       icon: "error",
    //     });
    //   }
    // });

    fetch("{{ route('save.crm') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          _token: $('[name="_token"]').val(),
          contact_name: $('[name="contact_name"]').val(),
          contact_email: $('[name="contact_email"]').val(),
          contact_phone: `${$('[name="country_prefix"]').val()}${$('[name="contact_phone"]').val()}`,
          tradename: $('[name="name"]').val(),
          sector: $('[name="sector"]').val(),
          web_url: $('[name="web_url"]').val(),
          source: $('[name="source"]').val(),
          origin: $('[name="origin"]').val(),
          client_width: $('[name="client_width"]').val(),
          client_height: $('[name="client_height"]').val(),
          client_latitude: $('[name="client_latitude"]').val(),
          client_longitude: $('[name="client_longitude"]').val(),
          client_system: $('[name="client_system"]').val(),
          message: $('[name="message"]').val(),
        })
      })
      .then(res => res.json())
      .then(response => {
        Swal.close();
        Swal.fire({
          title: response.message,
          icon: "success",
        });

        $('#dataForm')[0].reset();

        window.location.href = 'https://mundoweb.pe/website#formularioListo';
      }).catch(() => {
        Swal.close();
        Swal.fire({
          title: response.responseJSON.message,
          icon: "error",
        });
      })

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

  // Obtener la página de referencia
  const referrer = document.referrer;
  document.getElementById('llegade').value = referrer;


  // Obtener la resolución de la pantalla
  const screenWidth = window.screen.width;
  const screenHeight = window.screen.height;
  document.getElementById('anchodispositivo').value = screenWidth;
  document.getElementById('largodispositivo').value = screenHeight;
</script>
<script>
  AOS.init();

  $('#ex1').click(function(event) {
    event.preventDefault();
    this.blur(); // Manually remove focus from clicked link.
    $.get(this.href, function(html) {
      $(html).appendTo('body').modal();
    });
  });
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const phonePrefixSelect = document.getElementById('phone_prefix');

        fetch('./prefijocelular.json')
            .then(response => response.json())
            .then(phonePrefixes => {
                phonePrefixes.forEach(prefix => {
                    const option = document.createElement('option');
                    option.value = prefix.realCode;
                    option.textContent = `${prefix.country} (${prefix.beautyCode})`;
                    if (prefix.realCode === "51") {
                        option.selected = true; 
                    }
                    phonePrefixSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error cargando el archivo JSON:', error));
    });
</script> --}}


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const phonePrefixSelect = document.getElementById('phone_prefix');

    fetch('./prefijocelular.json')
      .then(response => response.json())
      .then(phonePrefixes => {
        phonePrefixes.forEach(prefix => {
          const option = document.createElement('option');
          option.value = prefix.realCode;
          option.textContent = `${prefix.country} (${prefix.beautyCode})`;
          phonePrefixSelect.appendChild(option);
        });

        // Recuperar y establecer el prefijo seleccionado desde localStorage
        const selectedPrefix = localStorage.getItem('selectedPrefix');
        if (selectedPrefix) {
          phonePrefixSelect.value = selectedPrefix;
        } else {
          // Si no hay valor en localStorage, establecer Perú como predeterminado
          phonePrefixSelect.value = "51";
        }
      })
      .catch(error => console.error('Error cargando el archivo JSON:', error));

    // Guardar la selección en localStorage al cambiar la selección
    phonePrefixSelect.addEventListener('change', function() {
      localStorage.setItem('selectedPrefix', phonePrefixSelect.value);
    });
  });
</script>
