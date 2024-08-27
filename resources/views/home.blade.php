<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Atalaya</title>
  <link rel="shortcut icon" href="/img/isotipo.svg" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0e0e0;
    }

    .card {
      width: 300px;
      height: 200px;
      background-color: #e0e0e0;
      box-shadow: 20px 20px 60px #bebebe,
        -20px -20px 60px #ffffff;
      position: relative;
      display: grid;
      place-content: center;
      border-radius: 10px;
      overflow: hidden;
      transition: all 0.5s ease-in-out;
    }

    #logo-main,
    #logo-second {
      height: 100%;
    }

    #logo-main {
      fill: #000938;
    }

    #logo-second {
      padding-bottom: 10px;
      fill: none;
      stroke: #000938;
      stroke-width: 1px;
    }

    .border {
      position: absolute;
      inset: 0px;
      border: 2px solid #000938;
      opacity: 0;
      transform: rotate(10deg);
      transition: all 0.5s ease-in-out;
    }

    .bottom-text {
      position: absolute;
      left: 50%;
      bottom: 13px;
      transform: translateX(-50%);
      font-size: 6px;
      text-transform: uppercase;
      padding: 0px 5px 0px 8px;
      color: #000938;
      background: #e0e0e0;
      opacity: 0;
      letter-spacing: 7px;
      transition: all 0.5s ease-in-out;
    }

    .content {
      transition: all 0.5s ease-in-out;
    }

    .content .logo {
      height: 35px;
      position: relative;
      width: 33px;
      overflow: hidden;
      transition: all 1s ease-in-out;
    }

    .content .logo .logo1 {
      height: 33px;
      position: absolute;
      left: 0;
    }

    .content .logo .logo2 {
      height: 33px;
      position: absolute;
      left: 33px;
    }

    .content .logo .trail {
      position: absolute;
      right: 0;
      height: 100%;
      width: 100%;
      opacity: 0;
    }

    .content .logo-bottom-text {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      margin-top: 30px;
      color: #000938;
      padding-left: 8px;
      font-size: 11px;
      opacity: 0;
      letter-spacing: none;
      transition: all 0.5s ease-in-out 0.5s;
    }

    .card:hover {
      border-radius: 0;
      transform: scale(1.1);
    }

    .card:hover .logo {
      width: 134px;
      animation: opacity 1s ease-in-out;
    }

    .card:hover .border {
      inset: 15px;
      opacity: 1;
      transform: rotate(0);
    }

    .card:hover .bottom-text {
      letter-spacing: 3px;
      opacity: 1;
      transform: translateX(-50%);
    }

    .card:hover .content .logo-bottom-text {
      opacity: 1;
      letter-spacing: 9.5px;
    }

    .card:hover .trail {
      animation: trail 1s ease-in-out;
    }

    @keyframes opacity {
      0% {
        border-right: 1px solid transparent;
      }

      10% {
        border-right: 1px solid #000938;
      }

      80% {
        border-right: 1px solid #000938;
      }

      100% {
        border-right: 1px solid transparent;
      }
    }

    @keyframes trail {
      0% {
        background: linear-gradient(90deg, rgba(0, 9, 56, 0) 90%, rgb(0, 9, 56) 100%);
        opacity: 0;
      }

      30% {
        background: linear-gradient(90deg, rgba(0, 9, 56, 0) 70%, rgb(0, 9, 56) 100%);
        opacity: 1;
      }

      70% {
        background: linear-gradient(90deg, rgba(0, 9, 56, 0) 70%, rgb(0, 9, 56) 100%);
        opacity: 1;
      }

      95% {
        background: linear-gradient(90deg, rgba(0, 9, 56, 0) 90%, rgb(0, 9, 56) 100%);
        opacity: 0;
      }
    }
  </style>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat">
  <a href="/login">
    <div class="card ">
      <div class="border"></div>
      <div class="content">
        <div class="logo">
          <div class="logo1">
            <img id="logo-main" src="/img/isotipo.svg" alt="">
          </div>
          <div class="logo2">
            <img id="logo-second" src="/img/atalaya.svg" alt="">
          </div>
          <span class="trail"></span>
        </div>
        <span class="logo-bottom-text">atalaya.pe</span>
      </div>
      <span class="bottom-text">All in one place</span>
    </div>
  </a>
</body>

</html>
