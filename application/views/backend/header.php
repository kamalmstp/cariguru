<div class="main-header-right row">
  <div class="main-header-left d-lg-none">
    <div class="logo-wrapper"><a href="#"><img src="<?=base_url()?>public/img/logo.png" alt=""></a></div>
  </div>
  <div class="mobile-sidebar d-block">
    <div class="media-body text-right switch-sm">
      <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
    </div>
  </div>
  <div class="nav-right col p-0">
    <ul class="nav-menus">
      <li>
        <form class="form-inline search-form" action="#" method="get">
          <div class="form-group">
            <div class="Typeahead Typeahead--twitterUsers">
              <div class="u-posRelative">
                <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search...">
                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
              </div>
              <div class="Typeahead-menu"></div>
            </div>
          </div>
        </form>
      </li>
      <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
      <li class="onhover-dropdown"><i data-feather="bell"></i><span class="dot"></span>
        <ul class="notification-dropdown onhover-show-div">
          <li>Notification <span class="badge badge-pill badge-primary pull-right"></span></li>
          <li>
            No Activity
            <!-- <div class="media">
              <div class="media-body">
                <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order ready for Ship..!<small class="pull-right">9:00 AM</small></h6>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
              </div>
            </div> -->
          </li>
          <li class="bg-light txt-dark"><a href="#">All</a> notification</li>
        </ul>
      </li>
      <li class="onhover-dropdown">
        <div class="media align-items-center">
          <?php 
          $tipe1 = $session['tipe'];
          $id1 = $session['user_id'];
          $user1 = $this->db->get_where($tipe1, array('id_'.$tipe1 => $id1))->row();

          if ($user1->foto == null) { ?>
            <img class="align-self-center pull-right img-50 rounded-circle" src="<?php echo base_url('public/') ?>img/user/user.jpg" alt="header-user">
          <?php }else{ ?>
            <img class="align-self-center pull-right img-50 rounded-circle" src="<?php echo base_url('public/img/mitra/'.$user1->foto) ?>" alt="header-user">
          <?php } ?>
          <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
        </div>
        <ul class="profile-dropdown onhover-show-div p-20">
          <?php if($tipe1 == 'mitra'){ ?>
          <li><a href="<?=site_url('mitraguru/edit_password')?>"><i data-feather="user"></i>Ubah Password</a></li>
          <?php }else{ ?>
            <li><a href="<?=site_url('administrator/edit_password')?>"><i data-feather="user"></i>Ubah Password</a></li>
          <?php } ?>
          <!-- <li><a href="#"><i data-feather="mail"></i>Inbox</a></li> -->
          <!-- <li><a href="#"><i data-feather="settings"></i>Settings</a></li> -->
          <li><a href="<?=site_url('auth/logout')?>"><i data-feather="log-out"></i>                                    Logout</a></li>
        </ul>
      </li>
    </ul>
    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
  </div>
</div>