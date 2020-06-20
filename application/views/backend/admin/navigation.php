<div class="page-sidebar">
  <div class="main-header-left d-none d-lg-block">
    <div class="logo-wrapper"><a href="#"><img src="<?=base_url()?>public/img/logo.png" width="50px" alt=""><b style="font-style: normal;font-weight: bold;font-size: 20px;line-height: 27px;color: #E51453;">CARI GURU</b></a></div>
  </div>
  <div class="sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
      <?php 
        $tipe = $session['tipe'];
        $id = $session['user_id'];
        $user = $this->db->get_where('admin', array('id_'.$tipe => $id))->row();

        if ($user->foto == null) { ?>
          <div>
            <img class="img-60 rounded-circle" src="<?php echo base_url('public/') ?>img/user/user.png" alt="#">
            <div class="profile-edit">
              <a href="<?=site_url('admin/profile_edit')?>"><i data-feather="edit"></i></a>
            </div>
          </div>
            <h6 class="mt-3 f-14"><?=$user->name;?></h6>
            <p><?=$tipe;?></p>
        <?php }else{ ?>
          <div>
            <img class="img-60 rounded-circle" src="<?php echo base_url('public/img/user/'.$user->foto) ?>" alt="#">
            <div class="profile-edit">
              <a href="<?=site_url('admin/profile_edit')?>"><i data-feather="edit"></i></a>
            </div>
          </div>
            <h6 class="mt-3 f-14"><?=$user->name;?></h6>
            <p><?=$tipe;?></p>
        <?php } ?>
    </div>
    <ul class="sidebar-menu">
      <li <?php if ($page_name == 'dashboard') {echo "class='active'";} ?>><a class="sidebar-header" href="<?=site_url('administrator')?>"><i data-feather="home"></i><span>Dashboard</span></a>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Pengguna</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="<?=site_url('administrator/mitra')?>"><i class="fa fa-circle"></i>Guru</a></li>
          <li><a href="<?=site_url('administrator/user')?>"><i class="fa fa-circle"></i>Murid</a></li>
          <li><a href="<?=site_url('administrator/admin')?>"><i class="fa fa-circle"></i>Operator</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="shopping-cart"></i><span>Transaksi</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Pending</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Belum Dibayar</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Berhasil</a></li>
        </ul>
      </li>
      <li <?php if ($page_name == 'kurikulum' || $page_name == 'jenjang' || $page_name == 'mapel') {echo "class='active'";} ?>><a class="sidebar-header" href="#"><i data-feather="layers"></i><span>Belajar & Pembelajaran</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Evaluasi Belajar</a></li>
          <li <?php if ($page_name == 'mapel') {echo "class='active'";} ?>><a href="<?=site_url('administrator/mapel');?>"><i class="fa fa-circle"></i>Mata Pelajaran</a></li>
          <li <?php if ($page_name == 'jenjang') {echo "class='active'";} ?>><a href="<?=site_url('administrator/jenjang');?>"><i class="fa fa-circle"></i>Jenjang</a></li>
          <li <?php if ($page_name == 'kurikulum') {echo "class='active'";} ?>><a href="<?=site_url('administrator/kurikulum');?>"><i class="fa fa-circle"></i>Kurikulum</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#" target="_blank"><i data-feather="aperture"></i><span> Link Guru Meet</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="edit"></i><span> Blog</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span> Pencairan Dana</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Setting</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="<?=site_url('administrator/profile')?>"><i class="fa fa-circle"></i>Profile</a></li>
          <li><a href="<?=site_url('administrator/biaya')?>"><i class="fa fa-circle"></i>Setting Biaya</a></li>
        </ul>
      </li>
    </ul>
    <!-- <div class="sidebar-user text-center">
      <div><img class="img-60 rounded-circle" src="<?=base_url()?>assets/endless/assets/images/user/1.jpg" alt="#">
        <div class="profile-edit"><a href="edit-profile.html" target="_blank"><i data-feather="edit"></i></a></div>
      </div>
      <h6 class="mt-3 f-14">ELANA</h6>
      <p>general manager.</p>
    </div>
    <ul class="sidebar-menu">
      <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Dashboard</span><span class="badge badge-pill badge-primary">6</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="index.html"><i class="fa fa-circle"></i><span>Default</span></a></li>
          <li><a href="dashboard-ecommerce.html"><i class="fa fa-circle"></i><span>E-commerce</span></a></li>
          <li><a href="dashboard-university.html"><i class="fa fa-circle"></i><span>University</span></a></li>
          <li><a href="dashboard-bitcoin.html"><i class="fa fa-circle"></i><span>Crypto</span></a></li>
          <li><a href="dashboard-server.html"><i class="fa fa-circle"></i><span>Server</span></a></li>
          <li><a href="dashboard-project.html"><i class="fa fa-circle"></i><span>Project</span></a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="airplay"></i><span>Widgets</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="general-widget.html"><i class="fa fa-circle"></i>General</a></li>
          <li><a href="chart-widget.html"><i class="fa fa-circle"></i>Chart</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="http://admin.pixelstrap.com/endless/starter-kit/layout-light.html"><i data-feather="anchor"></i><span> Starter kit</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="disc"></i><span>Color Version</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="layout-light.html"><i class="fa fa-circle"></i>Layout Light</a></li>
          <li><a href="layout-dark.html"><i class="fa fa-circle"></i>Layout Dark</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="sidebar"></i><span>Sidebar</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="compact.html"><i class="fa fa-circle"></i>Compact Sidebar</a></li>
          <li><a href="compact-small.html"><i class="fa fa-circle"></i>Compact Icon Sidebar</a></li>
          <li><a href="sidebar-hidden.html"><i class="fa fa-circle"></i>Sidebar Hidden</a></li>
          <li><a href="sidebar-fixed.html"><i class="fa fa-circle"></i>Sidebar Fixed</a></li>
          <li><a class="disabled" href="#" onclick="return false;"><i class="fa fa-circle"></i>Disable</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="layout"></i><span>Page layout</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="box-layout.html"><i class="fa fa-circle"></i>Boxed</a></li>
          <li><a href="layout-rtl.html"><i class="fa fa-circle"></i>RTL</a></li>
          <li><a href="1-column.html"><i class="fa fa-circle"></i>1 Column</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="align-justify"></i><span>Menu Options</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="hide-on-scroll.html"><i class="fa fa-circle"></i>Hide menu on Scroll</a></li>
          <li><a href="vertical.html"><i class="fa fa-circle"></i>Vertical Menu</a></li>
          <li><a href="mega-menu.html"><i class="fa fa-circle"></i>Mega Menu</a></li>
          <li><a href="fix-header.html"><i class="fa fa-circle"></i>Fix header</a></li>
          <li><a href="fix-header-sidebar.html"><i class="fa fa-circle"></i>Fix Header & sidebar</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="cloud-lightning"></i><span>Footers</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="footer-light.html"><i class="fa fa-circle"></i>Footer Light</a></li>
          <li><a href="footer-dark.html"><i class="fa fa-circle"></i>Footer Dark</a></li>
          <li><a href="footer-fixed.html"><i class="fa fa-circle"></i>Footer Fixed</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="pagebuild.html"><i data-feather="clipboard"></i><span>Page Builder</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="edit-3"></i><span>Form Builders</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="form-builder-1.html"><i class="fa fa-circle"></i>Form Builder 1</a></li>
          <li><a href="form-builder-2.html"><i class="fa fa-circle"></i>Form Builder 2</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="button-builder.html"><i data-feather="bookmark"></i><span>Button Builder</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span> Base</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="state-color.html"><i class="fa fa-circle"></i>State color</a></li>
          <li><a href="typography.html"><i class="fa fa-circle"></i>Typography</a></li>
          <li><a href="avatars.html"><i class="fa fa-circle"></i>Avatars</a></li>
          <li><a href="helper-classes.html"><i class="fa fa-circle"></i>helper classes</a></li>
          <li><a href="grid.html"><i class="fa fa-circle"></i>Grid</a></li>
          <li><a href="tag-pills.html"><i class="fa fa-circle"></i>Tag & pills</a></li>
          <li><a href="progress-bar.html"><i class="fa fa-circle"></i>Progress</a></li>
          <li><a href="modal.html"><i class="fa fa-circle"></i>Modal</a></li>
          <li><a href="alert.html"><i class="fa fa-circle"></i>Alert</a></li>
          <li><a href="popover.html"><i class="fa fa-circle"></i>Popover</a></li>
          <li><a href="tooltip.html"><i class="fa fa-circle"></i>Tooltip</a></li>
          <li><a href="loader.html"><i class="fa fa-circle"></i>Spinners</a></li>
          <li><a href="dropdown.html"><i class="fa fa-circle"></i>Dropdown</a></li>
          <li><a href="#"><i class="fa fa-circle"></i>Tabs<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="tab-bootstrap.html"><i class="fa fa-circle"></i>Bootstrap Tabs</a></li>
              <li><a href="tab-material.html"><i class="fa fa-circle"></i>Line Tabs</a></li>
            </ul>
          </li>
          <li><a href="according.html"><i class="fa fa-circle"></i>Accordion</a></li>
          <li><a href="navs.html"><i class="fa fa-circle"></i>Navs</a></li>
          <li><a href="box-shadow.html"><i class="fa fa-circle"></i>Shadow</a></li>
          <li><a href="list.html"><i class="fa fa-circle"></i>Lists</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="folder-plus"></i><span> Advance</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="scrollable.html"><i class="fa fa-circle"></i>Scrollable</a></li>
          <li><a href="tree.html"><i class="fa fa-circle"></i>Tree view</a></li>
          <li><a href="bootstrap-notify.html"><i class="fa fa-circle"></i>Bootstrap Notify</a></li>
          <li><a href="rating.html"><i class="fa fa-circle"></i>Rating</a></li>
          <li><a href="dropzone.html"><i class="fa fa-circle"></i>dropzone</a></li>
          <li><a href="tour.html"><i class="fa fa-circle"></i>Tour</a></li>
          <li><a href="sweet-alert2.html"><i class="fa fa-circle"></i>SweetAlert2</a></li>
          <li><a href="modal-animated.html"><i class="fa fa-circle"></i>Animated Modal</a></li>
          <li><a href="owl-carousel.html"><i class="fa fa-circle"></i>Owl Carousel</a></li>
          <li><a href="ribbons.html"><i class="fa fa-circle"></i>Ribbons</a></li>
          <li><a href="pagination.html"><i class="fa fa-circle"></i>Pagination</a></li>
          <li><a href="steps.html"><i class="fa fa-circle"></i>Steps</a></li>
          <li><a href="breadcrumb.html"><i class="fa fa-circle"></i>Breadcrumb</a></li>
          <li><a href="range-slider.html"><i class="fa fa-circle"></i>Range Slider</a></li>
          <li><a href="image-cropper.html"><i class="fa fa-circle"></i>Image cropper</a></li>
          <li><a href="sticky.html"><i class="fa fa-circle"></i>Sticky</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="cloud-drizzle"></i><span>Animation<span class="badge badge-danger ml-3">Hot</span></span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="animate.html"><i class="fa fa-circle"></i>Animate</a></li>
          <li><a href="scroll-reval.html"><i class="fa fa-circle"></i>Scroll Reveal</a></li>
          <li><a href="AOS.html"><i class="fa fa-circle"></i>AOS animation</a></li>
          <li><a href="tilt.html"><i class="fa fa-circle"></i>Tilt Animation</a></li>
          <li><a href="wow.html"><i class="fa fa-circle"></i>Wow Animation</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="command"></i><span>Icons</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="flag-icon.html"><i class="fa fa-circle"></i>Flag icon</a></li>
          <li><a href="font-awesome.html"><i class="fa fa-circle"></i>Fontawesome Icon</a></li>
          <li><a href="ico-icon.html"><i class="fa fa-circle"></i>Ico Icon</a></li>
          <li><a href="themify-icon.html"><i class="fa fa-circle"></i>Thimify Icon</a></li>
          <li><a href="feather-icon.html"><i class="fa fa-circle"></i>Feather icon</a></li>
          <li><a href="whether-icon.html"><i class="fa fa-circle"></i>Whether Icon</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="cloud"></i><span>Buttons</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="buttons.html"><i class="fa fa-circle"></i>Default Style</a></li>
          <li><a href="buttons-flat.html"><i class="fa fa-circle"></i>Flat Style</a></li>
          <li><a href="buttons-edge.html"><i class="fa fa-circle"></i>Edge Style</a></li>
          <li><a href="raised-button.html"><i class="fa fa-circle"></i>Raised Style</a></li>
          <li><a href="button-group.html"><i class="fa fa-circle"></i>Button Group</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="file-text"></i><span>Forms</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Form Controls<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="form-validation.html"><i class="fa fa-circle"></i>Form Validation</a></li>
              <li><a href="base-input.html"><i class="fa fa-circle"></i>Base Inputs</a></li>
              <li><a href="radio-checkbox-control.html"><i class="fa fa-circle"></i>Checkbox & Radio</a></li>
              <li><a href="input-group.html"><i class="fa fa-circle"></i>Input Groups</a></li>
              <li><a href="megaoptions.html"><i class="fa fa-circle"></i>Mega Options</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle"></i>Form Widgets<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="datepicker.html"><i class="fa fa-circle"></i>Datepicker</a></li>
              <li><a href="time-picker.html"><i class="fa fa-circle"></i>Timepicker</a></li>
              <li><a href="datetimepicker.html"><i class="fa fa-circle"></i>Datetimepicker</a></li>
              <li><a href="daterangepicker.html"><i class="fa fa-circle"></i>Daterangepicker</a></li>
              <li><a href="touchspin.html"><i class="fa fa-circle"></i>Touchspin</a></li>
              <li><a href="select2.html"><i class="fa fa-circle"></i>Select2</a></li>
              <li><a href="switch.html"><i class="fa fa-circle"></i>Switch</a></li>
              <li><a href="typeahead.html"><i class="fa fa-circle"></i>Typeahead</a></li>
              <li><a href="clipboard.html"><i class="fa fa-circle"></i>Clipboard</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle"></i>Form Layout<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="default-form.html"><i class="fa fa-circle"></i>Default Forms</a></li>
              <li><a href="form-wizard.html"><i class="fa fa-circle"></i>Form Wizard 1</a></li>
              <li><a href="form-wizard-two.html"><i class="fa fa-circle"></i>Form Wizard 2</a></li>
              <li><a href="form-wizard-three.html"><i class="fa fa-circle"></i>Form Wizard 3</a></li>
              <li><a href="form-wizard-four.html"><i class="fa fa-circle"></i>Form Wizard 4</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="server"></i><span>Tables</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Bootstrap Tables<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="bootstrap-basic-table.html"><i class="fa fa-circle"></i>Basic Tables</a></li>
              <li><a href="bootstrap-sizing-table.html"><i class="fa fa-circle"></i>Sizing Tables</a></li>
              <li><a href="bootstrap-border-table.html"><i class="fa fa-circle"></i>Border Tables</a></li>
              <li><a href="bootstrap-styling-table.html"><i class="fa fa-circle"></i>Styling Tables</a></li>
              <li><a href="table-components.html"><i class="fa fa-circle"></i>Table components</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle"></i>Data Tables<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="datatable-basic-init.html"><i class="fa fa-circle"></i>Basic Init</a></li>
              <li><a href="datatable-advance.html"><i class="fa fa-circle"></i>Advance Init</a></li>
              <li><a href="datatable-styling.html"><i class="fa fa-circle"></i>Styling</a></li>
              <li><a href="datatable-AJAX.html"><i class="fa fa-circle"></i>AJAX</a></li>
              <li><a href="datatable-server-side.html"><i class="fa fa-circle"></i>Server Side</a></li>
              <li><a href="datatable-plugin.html"><i class="fa fa-circle"></i>Plug-in</a></li>
              <li><a href="datatable-API.html"><i class="fa fa-circle"></i>API</a></li>
              <li><a href="datatable-data-source.html"><i class="fa fa-circle"></i>Data Sources</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle"></i>Extension Data Tables<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="datatable-ext-autofill.html"><i class="fa fa-circle"></i>Auto Fill</a></li>
              <li><a href="datatable-ext-basic-button.html"><i class="fa fa-circle"></i>Basic Button</a></li>
              <li><a href="datatable-ext-col-reorder.html"><i class="fa fa-circle"></i>Column Reorder</a></li>
              <li><a href="datatable-ext-fixed-header.html"><i class="fa fa-circle"></i>Fixed Header</a></li>
              <li><a href="datatable-ext-html-5-data-export.html"><i class="fa fa-circle"></i>HTML 5 Export</a></li>
              <li><a href="datatable-ext-key-table.html"><i class="fa fa-circle"></i>Key Table</a></li>
              <li><a href="datatable-ext-responsive.html"><i class="fa fa-circle"></i>Responsive</a></li>
              <li><a href="datatable-ext-row-reorder.html"><i class="fa fa-circle"></i>Row Reorder</a></li>
              <li><a href="datatable-ext-scroller.html"><i class="fa fa-circle"></i>Scroller</a></li>
            </ul>
          </li>
          <li><a href="jsgrid-table.html"><i class="fa fa-circle"></i>Js Grid Table</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="book"></i><span>Cards</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="basic-card.html"><i class="fa fa-circle"></i>Basic Card</a></li>
          <li><a href="creative-card.html"><i class="fa fa-circle"></i>Creative Card</a></li>
          <li><a href="tabbed-card.html"><i class="fa fa-circle"></i>Tabbed Card</a></li>
          <li><a href="dragable-card.html"><i class="fa fa-circle"></i>Draggable Card</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="sliders"></i><span>Timeline</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="timeline-v-1.html"><i class="fa fa-circle"></i>Timeline 1</a></li>
          <li><a href="timeline-v-2.html"><i class="fa fa-circle"></i>Timeline 2</a></li>
          <li><a href="timeline-small.html"><i class="fa fa-circle"></i>Timeline 3</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>Charts</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="chart-google.html"><i class="fa fa-circle"></i>Google Chart</a></li>
          <li><a href="chart-sparkline.html"><i class="fa fa-circle"></i>sparkline chart</a></li>
          <li><a href="chart-flot.html"><i class="fa fa-circle"></i>Flot Chart</a></li>
          <li><a href="chart-knob.html"><i class="fa fa-circle"></i>Knob Chart</a></li>
          <li><a href="chart-morris.html"><i class="fa fa-circle"></i>Morris Chart</a></li>
          <li><a href="chartjs.html"><i class="fa fa-circle"></i>chatjs Chart</a></li>
          <li><a href="chartist.html"><i class="fa fa-circle"></i>chartist Chart</a></li>
          <li><a href="chart-peity.html"><i class="fa fa-circle"></i>Peity Chart</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="map"></i><span>Maps</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="map-js.html"><i class="fa fa-circle"></i>Maps JS</a></li>
          <li><a href="vector-map.html"><i class="fa fa-circle"></i>Vector Maps</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="printer"></i><span>Email Templates</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Basic<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="basic-template.html" target="_blank"><i class="fa fa-circle"></i>Basic Email</a></li>
              <li><a href="email-header.html" target="_blank"><i class="fa fa-circle"></i>Basic With Header</a></li>
            </ul>
          </li>
        </ul>
        <ul class="sidebar-submenu">
          <li><a href="#"><i class="fa fa-circle"></i>Ecommerce<i class="fa fa-angle-down pull-right"></i></a>
            <ul class="sidebar-submenu">
              <li><a href="template-email.html" target="_blank"><i class="fa fa-circle"></i>Email Template</a></li>
              <li><a href="template-email-2.html" target="_blank"><i class="fa fa-circle"></i>Email Template 2</a></li>
              <li><a href="ecommerce-templates.html" target="_blank"><i class="fa fa-circle"></i>Ecommerce Email</a></li>
              <li><a href="email-order-success.html" target="_blank"><i class="fa fa-circle"></i>Order Success </a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="git-pull-request"></i><span>Editors</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="summernote.html"><i class="fa fa-circle"></i>Summer Note</a></li>
          <li><a href="ckeditor.html"><i class="fa fa-circle"></i>CK editor</a></li>
          <li><a href="simple-MDE.html"><i class="fa fa-circle"></i>MDE editor</a></li>
          <li><a href="ace-code-editor.html"><i class="fa fa-circle"></i>ACE code editor</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="users"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="user-profile.html"><i class="fa fa-circle"></i>Users Profile</a></li>
          <li><a href="edit-profile.html"><i class="fa fa-circle"></i>Users Edit</a></li>
          <li><a href="user-cards.html"><i class="fa fa-circle"></i>Users Cards</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="calendar"></i><span>Calender</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="calendar.html"><i class="fa fa-circle"></i>Full Calender Basic</a></li>
          <li><a href="calendar-event.html"><i class="fa fa-circle"></i>Full Calender Events</a></li>
          <li><a href="calendar-advanced.html"><i class="fa fa-circle"></i>Full Calender Advance</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="internationalization.html"><i data-feather="aperture"></i><span>Internationalization</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="image"></i><span>Gallery</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="gallery.html"><i class="fa fa-circle"></i>Gallery Grid</a></li>
          <li><a href="gallery-with-description.html"><i class="fa fa-circle"></i>Gallery Grid with Desc</a></li>
          <li><a href="gallery-masonry.html"><i class="fa fa-circle"></i>Masonry Gallery</a></li>
          <li><a href="masonry-gallery-with-disc.html"><i class="fa fa-circle"></i>Masonry Gallery Desc</a></li>
          <li><a href="gallery-hover.html"><i class="fa fa-circle"></i>Hover Effects</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="mail"></i><span>Email</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="email-application.html"><i class="fa fa-circle"></i>Email App</a></li>
          <li><a href="email-compose.html"><i class="fa fa-circle"></i>Email Compose</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="edit"></i><span> Blog</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="blog.html"><i class="fa fa-circle"></i>Blog Details</a></li>
          <li><a href="blog-single.html"><i class="fa fa-circle"></i>Blog Single</a></li>
          <li><a href="add-post.html"><i class="fa fa-circle"></i>Add Post</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="message-square"></i><span>Chat</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="chat.html"><i class="fa fa-circle"></i>Chat App</a></li>
          <li><a href="chat-video.html"><i class="fa fa-circle"></i>Video chat</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="social-app.html"><i data-feather="chrome"></i><span>Social App</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="user-check"></i><span>Job Search</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="job-cards-view.html"><i class="fa fa-circle"></i>Cards view</a></li>
          <li><a href="job-list-view.html"><i class="fa fa-circle"></i>List View</a></li>
          <li><a href="job-details.html"><i class="fa fa-circle"></i>Job Details</a></li>
          <li><a href="job-apply.html"><i class="fa fa-circle"></i>Apply</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="layers"></i><span>Learning</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="learning-list-view.html"><i class="fa fa-circle"></i>Learning List</a></li>
          <li><a href="learning-detailed.html"><i class="fa fa-circle"></i>Detailed Course </a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="faq.html"><i data-feather="help-circle"></i><span>FAQ</span></a></li>
      <li><a class="sidebar-header" href="knowledgebase.html"><i data-feather="database"></i><span>Knowledgebase</span></a></li>
      <li><a class="sidebar-header" href="support-ticket.html"><i data-feather="headphones"></i><span>Support Ticket</span></a></li>
      <li><a class="sidebar-header" href="to-do.html"><i data-feather="mic"></i><span>To-Do</span></a></li>
      <li><a class="sidebar-header" href="landing-page.html" target="_blank"><i data-feather="navigation-2"></i><span>Landing page</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="shopping-bag"></i><span>Ecommerce</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="product.html"><i class="fa fa-circle"></i>Product</a></li>
          <li><a href="product-page.html"><i class="fa fa-circle"></i>Product page</a></li>
          <li><a href="list-products.html"><i class="fa fa-circle"></i>Product list</a></li>
          <li><a href="payment-details.html"><i class="fa fa-circle"></i>Payment Details</a></li>
          <li><a href="order-history.html"><i class="fa fa-circle"></i>Order History</a></li>
          <li><a href="invoice-template.html"><i class="fa fa-circle"></i>Invoice</a></li>
          <li><a href="cart.html"><i class="fa fa-circle"></i>Cart</a></li>
          <li><a href="list-wish.html"><i class="fa fa-circle"></i>Wishlist</a></li>
          <li><a href="checkout.html"><i class="fa fa-circle"></i>Checkout</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="pricing.html"><i data-feather="dollar-sign"></i><span> Pricing</span></a></li>
      <li><a class="sidebar-header" href="sample-page.html"><i data-feather="file"></i><span> Sample page</span></a></li>
      <li><a class="sidebar-header" href="#"><i data-feather="search"></i><span>Search Pages</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="search.html"><i class="fa fa-circle"></i>Search Website</a></li>
          <li><a href="search-images.html"><i class="fa fa-circle"></i>Search Images</a></li>
          <li><a href="search-video.html"><i class="fa fa-circle"></i>Search Video</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="alert-octagon"></i><span> Error Page</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="error-400.html" target="_blank"><i class="fa fa-circle"></i>Error 400</a></li>
          <li><a href="error-401.html" target="_blank"><i class="fa fa-circle"></i>Error 401</a></li>
          <li><a href="error-403.html" target="_blank"><i class="fa fa-circle"></i>Error 403</a></li>
          <li><a href="error-404.html" target="_blank"><i class="fa fa-circle"></i>Error 404</a></li>
          <li><a href="error-500.html" target="_blank"><i class="fa fa-circle"></i>Error 500</a></li>
          <li><a href="error-503.html" target="_blank"><i class="fa fa-circle"></i>Error 503</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="unlock"></i><span> Authentication</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="login.html" target="_blank"><i class="fa fa-circle"></i>Login Simple</a></li>
          <li><a href="login-image.html" target="_blank"><i class="fa fa-circle"></i>Login with Bg Image</a></li>
          <li><a href="login-video.html" target="_blank"><i class="fa fa-circle"></i>Login with Bg video</a></li>
          <li><a href="signup.html" target="_blank"><i class="fa fa-circle"></i>Register Simple</a></li>
          <li><a href="signup-image.html" target="_blank"><i class="fa fa-circle"></i>Register with Bg Image</a></li>
          <li><a href="signup-video.html" target="_blank"><i class="fa fa-circle"></i>Register with Bg video</a></li>
          <li><a href="unlock.html" target="_blank"><i class="fa fa-circle"></i>Unlock User</a></li>
          <li><a href="forget-password.html" target="_blank"><i class="fa fa-circle"></i>Forget Password</a></li>
          <li><a href="reset-password.html" target="_blank"><i class="fa fa-circle"></i>Reset Password</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="#"><i data-feather="briefcase"></i><span>Coming Soon</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
          <li><a href="comingsoon.html" target="_blank"><i class="fa fa-circle"></i>Coming Simple</a></li>
          <li><a href="comingsoon-bg-video.html" target="_blank"><i class="fa fa-circle"></i>Coming with Bg video</a></li>
          <li><a href="comingsoon-bg-img.html" target="_blank"><i class="fa fa-circle"></i>Coming with Bg Image</a></li>
        </ul>
      </li>
      <li><a class="sidebar-header" href="maintenance.html" target="_blank"><i data-feather="settings"></i><span> Maintenance</span></a></li>
    </ul> -->
  </div>
</div>