<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mundoweb</title>


  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('build/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body>

  <div class="bg-azulform bg-textura bg-left-bottom bg-no-repeat bg-cover lg:bg-contain ">
    <header class="px-[5%]">
      <div class="header_top"> </div>

      <div class="header_middle grid grid-cols-12 h-28">
        <div class="block_left col-span-7 md:col-span-5 flex items-end justify-start ">
          <a href="{{ route('landingaplicativos') }}">
            <img class="w-52" src="{{ asset('img_mundowebaplicativos/logomwhite.svg') }}" />
          </a>
        </div>

        <div
          class="block_center col-span-1 md:col-span-2 py-10 flex flex-col justify-center items-end font-RightgroteskMedium">

        </div>

        <div class="block_right col-span-4  md:col-span-5  flex flex-row items-end justify-end pl-2 ">

          <div class="group hidden md:block font-MontserratSemibold ">
            <a href="{{ route('inicio') }}" type="button"
              class=" float-right text-base lg:text-lg bg-azulmw text-white px-2 lg:px-4 py-3 rounded-full w-auto inline-block ">
              Visita nuestra web<img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}"
                alt="Flecha a la derecha"
                class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></a>
          </div>

        </div>
      </div>

      <div class="header_bottom "></div>

    </header>


    <section>
      <div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-10 xl:gap-0 ">

          <div
            class=" xl:col-span-5  text-left  space-y-10 flex flex-col justify-center items-start px-[5%] pt-[10%] pb-[5%] xl:px-[12%] xl:pt-[20%] xl:pb-[45%]">

            <div class="flex flex-row justify-center items-center mx-auto md:mx-0">
              <div class="grid grid-cols-12  items-center justify-center ">
                <ul class="flex -space-x-6 col-span-12 md:col-span-4 justify-center">
                  <li class="rounded-full"><img class="rounded-full w-12"
                      src="{{ asset('img_mundowebaplicativos/persona1.png') }}"> </li>
                  <li class="rounded-full"><img class="rounded-full w-12"
                      src="{{ asset('img_mundowebaplicativos/persona2.png') }}"> </li>
                  <li class="rounded-full"><img class="rounded-full w-12"
                      src="{{ asset('img_mundowebaplicativos/persona3.png') }}"> </li>
                  <li class="rounded-full"><img class="rounded-full w-12"
                      src="{{ asset('img_mundowebaplicativos/persona4.png') }}"> </li>
                  <li class="rounded-full"><img class="rounded-full w-12"
                      src="{{ asset('img_mundowebaplicativos/persona5.png') }}"> </li>
                </ul>
                <p class="col-span-12 md:col-span-8 ml-4 text-white text-base items-end font-RightgroteskMedium"><span
                    class="font-bold text-2xl">100+ </span> CLIENTES DIGITALIZADOS</p>
              </div>
            </div>

            <h2 class="font-RightgroteskMedium text-4xl md:text-5xl lg:text-6xl font-medium text-textonegro"><span
                class="text-white">Desarrolla tu app móvil con Mundo Web</h2>
            <p class="font-MontserratMedium text-lg md:text-xl font-normal text-white"> En Mundo Web, convertimos tus
              ideas en app móviles innovadoras y atractivas. Desde la concepción hasta el lanzamiento, nuestro equipo de
              desarrollo de aplicaciones está aquí para hacer realidad tu visión y llevarte al éxito en el mundo
              digital.</p>

            <div class="group">
              <a type="button"
                class="font-MontserratSemibold text-base lg:text-lg bg-azulmw text-white px-2 lg:px-4 py-3 rounded-full w-auto inline-block ">
                Inicia tu Viaje Digital<img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}"
                  alt="Flecha a la derecha"
                  class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></a>
            </div>
          </div>

          <div
            class="xl:col-span-7 flex flex-row justify-center items-start bg-fondoapps z-10 bg-cover xl:bg-contain bg-no-repeat bg-center-top xl:bg-right  ">
            <div class="h-200"></div>
          </div>

        </div>
      </div>
    </section>

  </div>

  <section class="xl:-mt-10 z-0">
    <div class="bg-barracarrusel">
      <div x-data="{}" x-init="$nextTick(() => {
          let ul = $refs.logos;
          ul.insertAdjacentHTML('afterend', ul.outerHTML);
          ul.nextSibling.setAttribute('aria-hidden', 'true');
      })"
        class="px-[5%]  bg-barracarrusel w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
        <ul x-ref="logos"
          class="h-32 flex flex-row justify-between items-center  [&_li]:mx-10 [&_img]:max-w-none  animate-infinite-scroll">

          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo1.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo2.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo3.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo4.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo5.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo6.svg') }}" />
          </li>

        </ul>

        <ul x-ref="logos"
          class="h-32 flex flex-row justify-between items-center  [&_li]:mx-10 [&_img]:max-w-none  animate-infinite-scroll"
          aria-hidden="true">

          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo1.svg') }}" />
          </li>
          <li class="w-60 py-8"><img class="object-contain" src="{{ asset('img_mundowebaplicativos/Logo2.svg') }}" />
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


  <div class=" bg-azulform bg-textura bg-center bg-repeat-y  bg-cover lg:bg-contain ">
    <section>
      <div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-0 xl:gap-0 ">

          <div
            class=" xl:col-span-5  text-left  space-y-10 flex flex-col justify-center items-start px-[5%] pt-[10%] pb-[5%] xl:pl-[12%]">

            <h2 class="font-RightgroteskMedium text-4xl md:text-5xl lg:text-6xl font-medium text-textonegro"><span
                class="text-white">¿Te animas a hacer realidad tu App Móvil?</h2>
            <p class="font-MontserratMedium text-lg md:text-xl font-normal text-white">
              Llena este formulario y comienza el viaje hacia el desarrollo de tu aplicación móvil. En Mundo Web,
              nuestros desarrolladores de app se pondrán en contacto contigo para crear una sitio que impacte en el
              mercado.
            </p>

            <div class="w-full">
              <form id="formAplicativos">
                @csrf

                <div class="grid grid-cols-12 mt-5">

                  <div class="w-full col-span-12 lg:col-span-12  ">
                    <input
                      class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white placeholder:text-white  border-none rounded-2xl py-4 px-4 mb-3 leading-tight "
                      name="nombre" type="text" placeholder="Nombre completo">
                    @error('nombre')
                      <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror
                  </div>

                  <div>
                    <input
                      class=" font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white  border-none rounded-full py-4 px-4 mb-2 leading-tight "
                      name="source" type="hidden" value="Landing Aplicativos">
                  </div>
                </div>

                <div class="grid grid-cols-12 mt-3 gap-3">

                  <div class="w-full col-span-12 lg:col-span-6 ">
                    <input
                      class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white placeholder:text-white border-none rounded-2xl py-4 px-4 mb-3 leading-tight "
                      name="email" type="email" placeholder="Correo electrónico">
                    @error('email')
                      <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="w-full col-span-12 lg:col-span-6 ">
                    <input
                      class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white placeholder:text-white border-none rounded-2xl py-4 px-4 mb-3 leading-tight "
                      name="telefono" type="number" placeholder="Número de teléfono">
                    @error('telefono')
                      <span class="text-red-500 text-base ">{{ $message }}</span>
                    @enderror
                  </div>

                </div>


                <div class="grid grid-cols-12 mt-3 gap-6">

                  <div class="w-full col-span-12 lg:col-span-6 relative">

                    <div class="col-span-12">
                      <select name="cargo"
                        class="font-MontserratRegular block appearance-none w-full bg-fondoinput  text-white placeholder:text-white py-4 px-4 pr-8 rounded-2xl">
                        <option class="text-white" value="" selected disabled hidden>Cual es tu cargo</option>
                        <option class="text-white" value="CEO">CEO</option>
                        <option class="text-white" value="Director">Director</option>
                        <option class="text-white" value="Administrador">Administrador</option>
                        <option class="text-white" value="Comunity Manager">Comunity Manager</option>
                      </select>

                      <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-7 text-white placeholder:text-white">
                        <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                      </div>

                      <!-- @error('cargo')
  <span class="text-red-500 text-base ">{{ $message }}</span>
@enderror  -->
                    </div>

                  </div>

                  <div class="w-full col-span-12 lg:col-span-6 ">
                    <input
                      class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white placeholder:text-white border-none rounded-2xl py-4 px-4 mb-3 leading-tight "
                      name="empresa" type="text" placeholder="Empresa / Marca">
                    <!-- @error('empresa')
  <span class="text-red-500 text-base ">{{ $message }}</span>
@enderror -->
                  </div>

                </div>


                <div class="grid grid-cols-12   mt-3">

                  <div class="w-full xs:col-span-12 lg:col-span-12  ">
                    <textarea rows="1" name="mensaje"
                      class="font-MontserratRegular appearance-none block w-full bg-fondoinput  text-white placeholder:text-white  border-none rounded-2xl   py-4 px-4 mb-3 leading-tight "
                      type="textarea" placeholder="Tu mensaje"></textarea>
                  </div>

                </div>


                {{-- <p class="xs:text-base xl:text-lg text-white  font-normal mt-2 font-MontserratRegular">
                  ¿Cómo prefieres que te contactemos?
                </p> --}}

                {{-- <div class="grid grid-cols-12  mt-3 gap-6">

                  <div class="w-full xs:col-span-12 lg:col-span-6 ">

                    <div
                      class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput   border-none rounded-2xl ">
                      <label for="bordered-radio-1"
                        class="w-[85%] py-4 ms-2 text-base font-normal text-white placeholder:text-white">Correo
                        Electrónico</label>
                      <input id="bordered-radio-1" type="radio" value="Correo Electrónico" name="tipocontacto"
                        class="h-4 w-[15%]">
                    </div>

                  </div>

                  <div class="w-full xs:col-span-12 lg:col-span-6 ">

                    <div
                      class="font-MontserratRegular flex items-center ps-4 appearance-none w-full bg-fondoinput    border-none rounded-2xl ">
                      <label for="bordered-radio-2"
                        class="w-[85%] py-4 ms-2 text-base font-normal text-white placeholder:text-white">Teléfono</label>
                      <input id="bordered-radio-2" type="radio" value="Teléfono" name="tipocontacto"
                        class="w-[15%] h-4">
                    </div>

                  </div>

                  <!-- @error('tipocontacto')
                    <span class="text-red-500 text-base xs:col-span-12 ">{{ $message }}</span>
                  @enderror  -->
                </div> --}}


                <div class="group  mt-8">
                  <button id="FormSave"
                    class="font-MontserratSemibold text-base lg:text-lg bg-azulmw text-white px-2 lg:px-4 py-3 rounded-full w-auto inline-block ">
                    ¡Dale Vida a tu Proyecto!<img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}"
                      alt="Flecha a la derecha"
                      class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></button>
                </div>


                @if (Session::has('mensaje'))
                  <div class="mt-3">
                    <span class="text-white text-lg animate-fade-down ">Gracias, nos contactaremos contigo, </span>
                    <span class="text-white text-lg animate-fade-down ">{{ session()->get('name') }}</span>
                  </div>
                @endif

              </form>


            </div>


          </div>

          <div class="xl:col-span-7 flex flex-row justify-center items-start z-10  xl:py-[3%]  ">
            <img class="lg:h-full object-contain " src="{{ asset('img_mundowebaplicativos/apps2.png') }}" />
          </div>

        </div>
      </div>
    </section>


    <section>
      <div class="px-[5%] py-8 pt-[6%] ">
        <div class="space-y-10 flex flex-col justify-center items-center">
          <h2 class=" text-center text-4xl md:text-6xl font-medium text-white font-RightgroteskMedium md:w-[75%]">
            Beneficios para el desarrollo de tu <br>app</h2>
          <p class="md:text-center text-lg md:text-xl font-medium text-white md:w-[70%] font-MontserratMedium"> Explora
            los exclusivos beneficios que Mundo Web tiene para ofrecerte. Desde experiencias innovadoras hasta soporte
            continuo, nuestro equipo trabajará para que tu aplicativo móvil tenga un gran impacto en las personas.</p>

        </div>
      </div>
    </section>



    <section class="texturasecond">
      <div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-10 xl:gap-0 ">

          <div
            class="xl:col-span-6 flex flex-row justify-center items-start bg-fondoapps2 z-10 bg-cover xl:bg-contain bg-center-top xl:bg-left  bg-no-repeat ">
            <div class="h-200"></div>
          </div>


          <div
            class=" xl:col-span-6  text-left  space-y-10 flex flex-col justify-center items-start px-[5%] pt-[0%] pb-[5%] xl:px-[12%] xl:pt-[10%] xl:pb-[10%]">

            <div class="group bg-azulmw p-6 space-y-4 rounded-xl">

              <div class="flex flex-row justify-between items-center">
                <a type="button"
                  class="font-RightgroteskMedium text-lg lg:text-4xl  text-white  w-auto inline-block font-normal">
                  Experiencias Móviles Inmersivas </a>

                <img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}" alt="Flecha a la derecha"
                  class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500">
              </div>
              <p class="font-MontserratMedium text-lg  font-normal text-white"> Desarrollamos aplicaciones móviles que
                ofrecen experiencias de usuario inmersivas y cautivadoras. Nos comprometemos a desarrollar un proyecto
                con una navegación intuitiva y un diseño elegante, cada detalle se adaptará para maximizar el compromiso
                del usuario.</p>

            </div>


            <div class="group bg-azulmw p-6 space-y-4 rounded-xl">

              <div class="flex flex-row justify-between items-center">
                <a type="button"
                  class="font-RightgroteskMedium text-lg lg:text-4xl  text-white  w-auto inline-block font-normal">
                  Compatibilidad con Dispositivos Móviles </a>

                <img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}" alt="Flecha a la derecha"
                  class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500">
              </div>

              <p class="font-MontserratMedium text-lg  font-normal text-white"> En Mundoweb, garantizamos la máxima
                compatibilidad con dispositivos móviles. Tu aplicativo se adaptará perfectamente a cualquier pantalla,
                brindando una experiencia fluida y atractiva para los visitantes. ¡Confía en nosotros para llegar al
                siguiente nivel!</p>

            </div>



            <div class="group bg-azulmw p-6 space-y-4 rounded-xl">

              <div class="flex flex-row justify-between items-center">
                <a type="button"
                  class="font-RightgroteskMedium text-lg lg:text-4xl  text-white  w-auto inline-block font-normal">
                  Soporte y Mantenimiento Continuos </a>

                <img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}" alt="Flecha a la derecha"
                  class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500">
              </div>

              <p class="font-MontserratMedium text-lg  font-normal text-white">Te garantizamos un soporte y
                mantenimiento continuo para tu aplicativo móvil con la finalidad de garantizar su correcto
                funcionamiento. El equipo de desarrolladores de Mundo Web resolverá cualquier duda o problema que tengas
                en el instante.</p>

            </div>



          </div>

        </div>
      </div>
    </section>



    <section>
      <div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-10 xl:gap-0 ">

          <div
            class=" xl:col-span-6  text-left  space-y-10 flex flex-col justify-center items-start px-[5%] pt-[0%] pb-[5%] xl:px-[10%] xl:pt-[10%] xl:pb-[10%]">

            <h2 class="font-RightgroteskMedium text-4xl md:text-5xl lg:text-6xl font-medium"><span class="text-white">
                ¡Explora Nuestras Maravillas Digitales!
            </h2>
            <p class="font-MontserratMedium text-lg md:text-xl font-normal text-white"> Descubre un universo de
              oportunidades con nuestros servicios integrales. Mundo Web cuenta con diseños y estrategias que te
              ayudarán a generar una relación más estrechas entre tu marca y potenciales clientes. ¡Comienza el
              desarrollo de tu app HOY!</p>

            <div class="group">
              <a href="{{ route('proyectos') }}" type="button"
                class="font-MontserratSemibold text-base lg:text-lg bg-azulmw text-white px-2 lg:px-4 py-3 rounded-full w-auto inline-block ">
                Descubre Más<img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}"
                  alt="Flecha a la derecha"
                  class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></a>
            </div>
          </div>

          <div
            class="xl:col-span-6 flex flex-row justify-center items-start bg-fondoapps3 z-10 bg-cover  xl:bg-contain bg-no-repeat bg-center xl:bg-center  ">
            <div class="h-200"></div>
          </div>

        </div>
      </div>
    </section>
  </div>


  <footer class="bg-azulmundoweb p-[10%] sm:p-[7%] md:p-[5%] lg:p-[5%]">
    <div class="footer_main pb-10 border-b">
      <div class="grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 gap-2 lg:gap-7">
        <div
          class="flex flex-col justify-center items-start  sm:col-span-12 md:col-span-12 lg:col-span-4 lg:justify-start lg:items-start">
          <div class="flex flex-col justify-center items-center m-auto lg:m-0 ">
            <a href="{{ route('landingaplicativos') }}"><img class="w-64 md:w-64 lg:max-w-64"
                src="{{ asset('img_mundowebaplicativos/logomundowebf.svg') }}"></a>
          </div>

          <div class="group mt-6">
            <a type="button" href="{{ route('contacto') }}"
              class="font-MontserratRegular text-base lg:text-lg bg-azulmw text-white px-2 lg:px-4 py-2 rounded-full w-auto inline-block border-2">
              Quiero mi web<img src="{{ asset('img_mundowebaplicativos/flechaderechaarriba.svg') }}"
                alt="Flecha a la derecha"
                class="h-10 w-10 ml-2 inline-block group-hover:rotate-45 transition-all  duration-500"></a>
          </div>

          <div class="flex flex-row items-center justify-center lg:justify-end lg:col-span-5 gap-3 mt-5">
            <a href="https://www.facebook.com/mundoweb.pe" target="_blank"><img
                src="{{ asset('img_mundowebaplicativos/Facebook.svg') }}" /></a>
            <a href="https://www.instagram.com/mundoweb.pe/" target="_blank"><img
                src="{{ asset('img_mundowebaplicativos/Instagram.svg') }}" /></a>
          </div>
        </div>

        <div class="text-white sm:col-span-3 lg:col-span-2">

        </div>

        <div class="text-white sm:col-span-3 lg:col-span-2">

        </div>


        <div class="font-MontserratRegular text-white sm:col-span-12 lg:col-span-4 space-y-5 ">
          <div>
            <h2 class="text-lg font-medium mb-1">Dirección</h2>
            <p class="text-base font-normal">
              Centro Empresarial Peruano - Suizo - Av. Aramburú 166 - Miraflores, Oficina 4B, Lima, Lima 51, PE
            </p>
          </div>
          <div>
            <h2 class="text-lg font-medium mb-1">Horario</h2>
            <p class="text-base font-normal">
              Lunes - Viernes 8am - 6pm <br>
              Sábados 9am - 1pm
            </p>
          </div>
        </div>


        <!-- <div class="text-white sm:col-span-3 lg:col-span-2">
                    <nav>
                        <h2 class="text-lg font-medium">Políticas</h2>
                        <ul class="text-base font-normal">
                            <li>Pellentesque</li>
                            <li>Suspendisse</li>
                        </ul>
                    </nav>
                </div> -->

      </div>
    </div>

    <div class="footer_bottom ">

      <div class="pt-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-7 font-MontserratRegular ">
          <div class="lg:col-span-7">
            <p class="text-base font-normal text-white">Copyright © 2024 Mundo Web. Reservados todos los derechos.</p>
          </div>
          <div
            class="flex flex-col lg:flex-row items-left lg:items-center justify-center lg:justify-end lg:col-span-5 gap-2 lg:gap-10">
            <p class="text-base font-normal text-white">hola@mundoweb.pe</p>
            <p class="text-base font-normal text-white">+51 934 464 915</p>
          </div>
        </div>
      </div>

    </div>


  </footer>



</body>

</html>

<script>
  $('#formAplicativos').submit(function(event) {
    // Evita que se envíe el formulario automáticamente
    //method="POST" action="{{ route('guardarlandingaplicativos') }}"

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
      url: '{{ route('guardarlandingaplicativos') }}',
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        Swal.close();
        Swal.fire({
          title: response.message,
          icon: "success",
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
