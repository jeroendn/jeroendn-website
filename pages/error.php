<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>jeroendenijs - Something went wrong!</title>
    <meta name="description" content=""/>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html {
        overflow: hidden;
      }

      body {
        margin: 0;
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Varela Round';
        background-color: #fff;
        overflow: hidden;
      }

      .error-banner {
        width: 100%;
        text-align: center;
        background: #000;
        padding: 50px 0;
        color: #fff;
        position: relative;
      }

      .error-banner:before, .error-banner:after {
        content: '';
        background-color: #000;
        position: absolute;
        width: 105%;
        z-index: -1;
      }

      .error-banner:before {
        height: 50px;
        left: 0;
        bottom: 100%;
        transform: rotateZ(-1deg) translateY(30px);
        box-shadow: 0px -2px 2px 1px #000;
      }

      .error-banner:after {
        height: 100px;
        left: 0;
        top: 100%;
        transform: rotateZ(3deg) translate(-5px, -52px);
        box-shadow: 0px 2px 2px 0px #000;
      }

      .error-banner p {
        font-size: 25px;
        margin: 5px 0;
      }

      a {
        color: #c95f00;
      }

      a:hover {
        text-decoration: none;
      }
    </style>
  </head>

  <body>
    <div class="error-banner">
      <p>Something went wrong while requesting the page!</p>
      <p>Return to my homepage: <a href="https://jeroendn.nl">jeroendn.nl</a></p>
    </div>
  </body>
</html>
