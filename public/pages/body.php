<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<meta name="viewport"
  content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">


<!-- CARROSSEL -->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
      aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="public/images/carrossel/lasanhabolanhesa.jpg" class="d-block w-100 " alt="..." height="480px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Lasanha</h5>
        <p>Receita deliciosa de lasanha à bolonhesa, perfeita para uma refeição em família. Camadas suculentas de massa,
          molho de carne moída, queijo e molho de tomate.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="public/images/carrossel/panquecas.jpg" class="d-block w-100 " alt="..." height="480px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Panquecas</h5>
        <p>Receita de panquecas americanas fofinhas para um café da manhã delicioso. Feitas com farinha de trigo,
          açúcar, fermento, leite, ovo e manteiga derretida.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="public/images/carrossel/risotocamarao.jpg" class="d-block w-100 " alt="..." height="480px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Risoto de Camarão</h5>
        <p>Risoto de camarão cremoso e saboroso para um jantar especial. Preparado com camarões frescos, arroz arbóreo,
          cebola, alho, vinho branco, caldo de legumes, queijo parmesão e manteiga.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="public/images/carrossel/tortalimao.jpg" class="d-block w-100 " alt="..." height="480px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Torta de Limão</h5>
        <p>Deliciosa torta de limão com base crocante e recheio cremoso. Feita com biscoito maisena, manteiga, leite
          condensado, suco de limão e raspas de limão para decorar.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- MENU -->
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php?category=1">Café da Manhã</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?category=2">Almoço</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?category=3">Sobremesas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?category=4">Jantar</a>
  </li>
</ul>