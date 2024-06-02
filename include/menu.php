<?php
require_once('../include/fonction.php');
?>
<nav>
  <ul class="nav nav-pills">
    <li class="nav-item <?php echo menuActif('index'); ?>">
      <a class="nav-link" href="../public/index.php"><img src="../img/logo.png" id="logo" alt="Logo"></a>
    </li>
    <li class="nav-item <?php echo menuActif('suppliers'); ?>">
      <a class="nav-link" href="../public/suppliers.php">Fournisseurs</a>
    </li>
    <li class="nav-item <?php echo menuActif('villes'); ?>">
      <a class="nav-link" href="../public/villes.php">Villes</a>
    </li>
  </ul>
</nav>
