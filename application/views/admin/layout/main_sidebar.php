<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?= base_url()?>assets/img/ari.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Syahrusfarabi</p>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <?php $this->load->view("admin/layout/left_menu");?>
  </ul>
</section>

<!-- /.sidebar -->
