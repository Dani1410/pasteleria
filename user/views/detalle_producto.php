<?php

session_start();
require '../php/conexion.php';

$id_producto = $_GET['id_pr'];

$sql_productos = "SELECT * FROM productos_activos WHERE id_catalogo_pr = $id_producto";

$catalogo_productos = mysqli_query($conexion, $sql_productos);

if ($mostrar = mysqli_fetch_array($catalogo_productos)) {
  $nombre_pr = $mostrar['nombre_pr'];
  $descripcion_pr = $mostrar['descripcion_pr'];
  $foto_pr = $mostrar['foto_pr'];
  $precio_pr = $mostrar['precio'];
  $categoria = $mostrar['categoria'];
  $precio_pr_max = $mostrar['precio'];
}

if ($categoria != 'pastel') {
  $precio_pr_max = $mostrar['precio'];
}

while ($mostrar = mysqli_fetch_array($catalogo_productos)) {
  if ($mostrar['precio'] > $precio_pr_max) {
    $precio_pr_max = $mostrar['precio'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NOMBREPR</title>
  <link rel="stylesheet" href="../css/estilos__detalle_pr.css" />
  <link rel="stylesheet" href="../css/estilos__globales.css" />
</head>

<body>
  <!-- HEADER -->
  <header class="nav__header">
    <ul>
        <li class="menu__logo">
            <a href="./index.php"></a>
        </li>
        <!-- <li class="menu__categorias"></li> -->
        <li class="menu__general">
            <ul>
                <li class="menu__busqueda">
                    <form autocomplete="off">
                        <article>
                            <input type="text" name="q" placeholder="Buscar" />
                        </article>
                    </form>
                </li>
                <li class="menu__carrito">
                    <a href="./carrito_compras.php"> <i class="fa-solid fa-cart-shopping"></i> </a>
                </li>
                <li class="menu__cuenta__horizontal">
                    <a href="#">User</a>
                    <ul class="menu__cuenta__vertical">
                        <li>
                            <a href="#">Mi cuenta</a>
                        </li>
                        <li><a href="#">Pedidos</a></li>
                        <li><a href="#">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>

  <!--  -->
  <article class="container__title">
    <h3><?php echo ($nombre_pr); ?></h3>
  </article>

  <main class="main__product">
    <article class="container__img">
      <article class="image__card">
        <img src="../productos_img/<?php echo ($foto_pr); ?>" />
      </article>
      <article class="card__overlay card__overlay--blur">
        <h3 class="card__title"><?php echo ($nombre_pr); ?></h3>
      </article>
    </article>

    <article class="container__info__producto">
      <article class="container__price">
        <span>$<?php if ($categoria != 'pastel') echo ($precio_pr);
                else echo ($precio_pr . " - $" . $precio_pr_max); ?></span>
      </article>

      <form action="./carrito_compras.php" method="POST">
        <article class="container__details__product">
          <article class="form__group">
            <label for="size">Tamaño</label>
            <select name="size" id="size">
              <option disabled selected value="">Escoge una opcion</option>
              <?php
              $sql_productos = "SELECT * FROM productos_activos WHERE id_catalogo_pr = $id_producto";
              $catalogo_productos = mysqli_query($conexion, $sql_productos);
              while ($mostrar = mysqli_fetch_array($catalogo_productos)) {
                echo ('<option value="' . $mostrar['tamano'] . '">' . $mostrar['tamano'] . ' - personas</option>');
              }
              ?>
            </select>
          </article>
        </article>
        <article class="container__add__cart">
          <article class="container__quantity">
            <input name="cantidad" id="cantidad" type="number" placeholder="1" value="1" min="1" class="input__quantity" />
            <article class="btn__increment__decrement">
              <i class="fa-solid fa-chevron-up" id="increment"></i>
              <i class="fa-solid fa-chevron-down" id="decrement"></i>
            </article>
          </article>
          <button class="btn__add__to__cart">
            <i class="fa-solid fa-plus"></i>
            Añadir a la cesta
          </button>
          <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id_producto; ?>">
          <input type="hidden" name="nombre_producto" id="nombre_producto" value="<?php echo $nombre_pr; ?>">
          <input type="hidden" name="foto_producto" id="foto_producto" value="<?php echo $foto_pr; ?>">
          <input type="hidden" name="precio_producto" id="precio_producto" value="<?php echo $precio_pr; ?>">
        </article>
      </form>

      <?php if ($categoria == 'pastel' || $categoria == 'gelatina') {
        echo ('
        <article class="container__description">
        <article class="title__description">
          <h4>Descripcion</h4>
          <i class="fa-solid fa-chevron-down"></i>
        </article>
        <article class="text__description">
          <p>
            ' . $descripcion_pr . ' 
          </p>
        </article>
      </article>
        ');
      } ?>
    </article>
  </main>

  <section class="container__related__products">
    <h2>Productos complementarios</h2>
    <article class="card__list__products">
      <?php

      $sql_productos = "SELECT * FROM productos_activos WHERE categoria != '$categoria' GROUP BY nombre_pr ORDER BY RAND() LIMIT 4";

      $productos_complementarios = mysqli_query($conexion, $sql_productos);

      while ($mostrar = mysqli_fetch_array($productos_complementarios)) {
        echo ('
        <a href="./detalle_producto.php?id_pr=' . $mostrar['id_catalogo_pr'] . '&id_precio=' . $mostrar['id_precio'] . '">
      <article class="card">
        <article class="card__img">
          <img src="../productos_img/' . $mostrar['foto_pr'] . '" alt="' . $mostrar['nombre_pr'] . '" />
        </article>
        <article class="info__card">
          <article class="text__product">
            <h3>' . $mostrar['nombre_pr'] . '</h3>
            <p class="category">' . $mostrar['categoria'] . '</p>
          </article>
          <article class="price"><p>$' . $mostrar['precio'] . '</p></article>
        </article>
      </article>
      </a>
      ');
      }

      ?>

    </article>
  </section>

  <!-- FOOTER -->
  <?php include './footer.php' ?>

  <script src="https://kit.fontawesome.com/2e545f6e86.js" crossorigin="anonymous"></script>
  <script src="../js/script__detalle__pr.js"></script>
</body>

</html>

<?php if ($categoria != 'pastel') { ?>
  <script>
    var elementos = document.querySelectorAll(".form__group");
    elementos.forEach(function(elemento) {
      elemento.style.display = "none";
    });
  </script>
<?php } ?>