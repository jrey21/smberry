<style>
	.logo {
    margin: auto;
}
</style>

<nav class="navbar navbar-success bg-success fixed-top" style="padding:5px">
  <div class="container-fluid mt-2 mb-2" style="padding-top:5px">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
          <img src="assets/img/mmh_logo.png" width="60px" height="60px">
  			</div>
  		</div>
      <div class="col-md-5 float-left text-white" style="margin-top:15px">
        <large><b>SMberry Management System</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white" style="margin-top:15px">
	  		<?php if (isset($_SESSION['login_name'])): ?>
	  		  <a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name']; ?> <i class="fa fa-power-off"></i></a>
	  		<?php else: ?>
	  		  <a href="login.php" class="text-white">Login <i class="fa fa-power-off"></i></a>
	  		<?php endif; ?>
	    </div>
    </div>
  </div>
</nav>
