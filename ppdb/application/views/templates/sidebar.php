<div class="sidebar" data-color="blue">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
  <div class="logo">
    <!--<a href="#" class="simple-text logo-mini">-->
    <!--  <img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url('assets/'); ?>img/Logo.png">-->
    <!--</a>-->
    <a href="#" class="simple-text logo-normal">
      <?= $sekolah['nama_sekolah']; ?>
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">

      <?php

      $queryMenu = "SELECT `ppdb_user_menu`.`id`, `menu`
                        FROM `ppdb_user_menu` JOIN `ppdb_user_access_menu`
                        ON `ppdb_user_menu`.`id` = `ppdb_user_access_menu`.`menu_id`
                        WHERE `ppdb_user_access_menu`.`role_id` = 1
                        ORDER BY `ppdb_user_access_menu`.`menu_id` ASC";
      $menu = $this->db->query($queryMenu)->result_array(); ?>
      <!-- LOOPING MENU -->
      <?php foreach ($menu as $m) : ?>
        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                             FROM `ppdb_user_sub_menu` JOIN `ppdb_user_menu` 
                             ON `ppdb_user_sub_menu`.`menu_id` = `ppdb_user_menu`.`id`
                             WHERE `ppdb_user_sub_menu`.`menu_id` = $menuId
                             AND `ppdb_user_sub_menu`.`is_active` = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="active">
            <?php else : ?>
            <li class="">
            <?php endif; ?>
            <a href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span></a>
            </li>
          <?php endforeach; ?>

          <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>


        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
    </ul>
  </div>
</div>
<div class="main-panel" id="main-panel">