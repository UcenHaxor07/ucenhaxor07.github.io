<html>
 <head> 
  <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>404</title> 
  <link rel="icon" type="image/x-icon" href="https://raw.githubusercontent.com/UcenHaxor07/ucenhaxor07.github.io/main/ucenhaxorprofil.png"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> 
  <link rel="stylesheet" href="https://ucenhaxor07.github.io/css/text-animation/style.css" type="text/css" media="all"> 
  <style type="text/css" media="all">
      @import url('https://fonts.googleapis.com/css2?family=Combo');
      body {
        user-select: none;
        font-family: 'Combo', cursive;
      }
    </style> 
 </head> 
 <body class="bg-dark text-light"> 
  <div class="position-absolute top-50 start-50 translate-middle text-center"> 
   <span class="text-4 fs-1" title="404">404</span> 
   <span class="position-absolute top-55 start-55 translate-middle badge rounded-pill bg-secondary">+<span class="33321"></span></span> 
   <p class="text-danger">Sorry, you entered the wrong link, <span onclick="window.history.back()">please try again.</span></p> 
  </div> 
  <script type="text/javascript" charset="utf-8">
      function updateCounter() {
        fetch('https://api.countapi.xyz/update/404/p3ychcount/?amount=1')
        .then(res => res.json())
        .then(data => counterElement.innerHTML = data.value)
      }
      
      updateCounter()
      
      counterElement = document.getElementsByClassName('33321')[0];
    </script> 
 </body>
</html>
