<?php

require './php/conexion.php';

$sql_productos = "SELECT * FROM productos_activos WHERE categoria != 'vela' GROUP BY nombre_pr ORDER BY CASE WHEN categoria = 'pastel' THEN 1 WHEN categoria = 'gelatina' THEN 2 ELSE 5 END, nombre_pr;";

$catalogo_productos = mysqli_query($conexion, $sql_productos);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>El rincon del pastel</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/estilos__globales.css">
</head>

<body>
  <!-- HEADER -->
  <?php require './views/header.php'; ?>
  <!-- HERO -->
  <section id="hero">
    <section class="container__carousel">
      <article class="carruseles" id="slider">
        <section class="slider__section">
          <img src="./productos_img/Producto-Web-flash-tfds.webp" />
        </section>
        <section class="slider__section">
          <img src="./productos_img/Pastel-Queso-Pina-Nuez-150-1000-2.webp" />
        </section>
        <section class="slider__section">
          <img src="./productos_img/Pastel-Chocolate-nuez-150-1000-2.webp" />
        </section>
      </article>
      <div class="btn__left"><i class="bx bx-chevron-left"></i></div>
      <div class="btn__right"><i class="bx bx-chevron-right"></i></div>
    </section>
  </section>
  <!-- CARDS -->
  <section id="pasteles" class="container">
    <article class="title__pasteles">
      <h3>Productos</h3>
    </article>
    <article id="container__cards">
      <?php

      while ($mostrar = mysqli_fetch_array($catalogo_productos)) {
        echo ('
        <a href="./views/detalle_producto.php?id_pr=' . $mostrar['id_catalogo_pr'] . '&id_precio=' . $mostrar['id_precio'] . '">
          <article class="card">
            <article class="image__card">
              <img src="./productos_img/' . $mostrar['foto_pr'] . '" />
            </article>
            <article class="card__overlay card__overlay--blur">
              <h5 class="card__title">' . $mostrar['nombre_pr'] . '</h5>
              <p class="card__text">$' . $mostrar['precio'] . '</p>
            </article>
          </article>
        </a>
        ');
      }

      ?>
    </article>
  </section>
  <!-- DIRECCION PASTELERIA -->
  <section id="container__mapa">
    <article class="texto__mapa">

      <h5>¡Nos encontramos aqui!</h5>
      <p id="title__horario">Horario de atención:</p>
      <p class="horarios__atencion">
      <ul>
        <li>
          <p class="dia">Lunes a viernes:</p>
          <p>
          <ul>
            <li class="hora">Apertura: 8:00 AM</li>
          </ul>
          </p>
        </li>
        <li>
          <p class="dia">Sabado:</p>
          <p>
          <ul>
            <li class="hora">Apertura: 9:00 AM</li>
          </ul>
          </p>
        </li>
        <li>
          <p class="dia">Domingo:</p>
          <p>
          <ul>
            <li class="hora">Apertura: 10:00 AM</li>
          </ul>
          </p>
        </li>
      </ul>
      </p>

    </article>
    <article id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1878.238059782261!2d-98.99960740209671!3d19.69234357199865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ed581677a649%3A0xb33a3da2be90981f!2sPostres%20la%20delicia%20sierra%20hermosa!5e0!3m2!1ses!2smx!4v1694928410463!5m2!1ses!2smx" width="700" height="500" style="border: 1px solid black; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </article>
  </section>
  <!-- FOOTER -->

  <footer>
    <section class="container__footer">
      <section class="box__footer">
        <article class="logo">
          <img src="" alt="" />
        </article>
        <article class="terms">
          <aside>&copy; 2023 Dulces Delicias. Todos los derechos reservados. <br>

            El contenido de esta página web está protegido por derechos de autor. Queda prohibida la reproducción, distribución o modificación del material sin autorización previa por escrito de Dulces Delicias.<br>

            Nombres de productos, marcas comerciales y logotipos son propiedad de sus respectivos dueños.<br>

            Se permite la descarga o impresión del contenido solo para uso personal y no comercial, manteniendo los avisos de derechos de autor intactos.</aside>
        </article>
      </section>

      <section class="box__footer">
        <h4>Secciones</h4>
        <a href="./index.php">Home</a>
        <a href="#"></a>
        <a href="#"></a>
      </section>

      <section class="box__footer">
        <h4>Redes Sociales</h4>
        <a href="#"></a>
      </section>
    </section>
    <section class="box__copyrigtht">
      <hr />
      <aside>
        <p>&copy; 2023 Dulce Delicias. Todos los derechos reservados.</p>
      </aside>
    </section>
  </footer>

  
  <script src="https://kit.fontawesome.com/1731f30281.js" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>