<?php

session_start();
$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$foto_producto = $_POST['foto_producto'];
$precio_producto = $_POST['precio_producto'];
$cantidad = $_POST['cantidad'];
$tamano = $_POST['size'];

$carrito = $_SESSION['carrito'] ?? [];
$carrito[] = [
  'id_producto' => $id_producto,
  'nombre_producto' => $nombre_producto,
  'foto_producto' => $foto_producto,
  'precio_producto' => $precio_producto,
  'cantidad' => $cantidad,
  'tamano' => $tamano,
];
$_SESSION['carrito'] = $carrito;

echo ("
<script> 
console.log('Id: $id_producto'); 
console.log('Nombre: $nombre_producto'); 
</script>
");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carrito</title>
  <link rel="stylesheet" href="../css/estilos__globales.css" />
  <link rel="stylesheet" href="../css/estilos__carrito.css" />
</head>

<body>
  <!-- HEADER -->
  <header class="nav__header">
    <ul>
      <li class="menu__logo">
        <a href="../index.php"></a>
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
            <i class="carrito fa-solid fa-cart-shopping"></i>
            <section class="numero"></section>
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

  <section id="empty-cart-message" class="empty-cart-message">
    Agrega algún producto para continuar.
    <button id="btn__back__home" onclick="backHome()">
      Seguir comprando...
    </button>
  </section>

  <section class="general__cart">
    <article class="title__cart">
      <h3>Carrito de compras</h3>
    </article>

    <section class="body__cart">
      <article class="detalles__productos">
        <article class="detalles">
          <ul class="lista__detalles">
            <li class="pr__detalle">
              <p>Producto</p>
            </li>
            <li>
              <p>Precio</p>
            </li>
            <li>
              <p>Cantidad</p>
            </li>
            <li>
              <p>Subtotal</p>
            </li>
          </ul>
        </article>
        <!-- PRODUCTOOOOOOO -->
        <article class="producto">
          <ul class="lista__producto">
            <li class="pr__desc">
              <img src="../productos_img/<?php echo $foto_producto; ?>" alt="" />
              <p><?php echo $nombre_producto; ?></p>
            </li>
            <li>
              <p id="precio_u" value="<?php echo $precio_producto ?>"><?php echo $precio_producto ?></p>
            </li>
            <li>
              <article class="container__quantity">
                <input name="cantidad" id="cantidad" type="number" placeholder="1" value="<?php echo $cantidad; ?>" min="1" class="input__quantity" oninput="calcularSubtotal(<?php echo $precio_producto; ?>)" />

              </article>
            </li>
            <li>
              <p id="subtotal"><?php $subtotal = $cantidad * $precio_producto;
                                echo $subtotal; ?></p>
            </li>
          </ul>
        </article>
        <!-- __________________________________ -->
      </article>
      <article class="detalle__compra">
        <h5>Total de compra</h5>
        <article class="desc">
          <p class="det">Subtotal</p>
          <p class="det" id="subtotal__compra">90</p>
        </article>
        <article class="desc">
          <p class="det">Total</p>
          <p class="det" id="total__compra">100</p>
        </article>
        <label for="tipo__envio">Tipo de envio:</label>
        <select id="tipo__envio" name="envio" onchange="mostrarCodigoPostal()">
          <option disabled selected value="">Escoge una opcion</option>
          <option value="envio">Envío a casa</option>
          <option value="recoger">Recoger en tienda</option>
        </select>
        <article class="codigo__postal" id="codigo-postal">
          <article>
            <label for="cp">Código Postal:</label>
            <input type="text" id="cp" name="cp" maxlength="5" minlength="5" />
          </article>
          <button onclick="validarCodigoPostal()">
            Verificar Código Postal
          </button>
          <p id="mensaje-error">
            Lo sentimos, no realizamos envíos a este código postal. <br />
            Solo podras recoger en tienda
          </p>
          <p id="mensaje-envio" class="success-message">
            Tenemos envíos a esa zona.
          </p>
        </article>
        <button class="finalizar" id="btn__finalizar">
          Finalizar compra
        </button>
      </article>
    </section>
  </section>

  <!-- FOOTER -->
  <footer>
    <section class="container__footer">
      <section class="box__footer">
        <article class="logo">
          <img src="" alt="" />
        </article>
        <article class="terms">
          <aside>DERECHOS</aside>
        </article>
      </section>

      <section class="box__footer">
        <h4>Secciones</h4>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
      </section>

      <section class="box__footer">
        <h4>Referencias</h4>
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
        <p>Todos los derechos reservados &copy;</p>
      </aside>
    </section>
  </footer>
  <script src="https://kit.fontawesome.com/5f7aa8b497.js" crossorigin="anonymous"></script>
  <script src="../js/script__carrito.js"></script>

</body>

</html>