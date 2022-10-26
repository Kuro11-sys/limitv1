
<div class="login-box" style="width: 450px">
  <div class="login-logo">
    <img src="<?= base_url() ?>assets/Asset 20.png" alt="LIMIT Logo" class="brand-image img-circle elevation-3" style="height: 275px">
    <p style="font-size: 30pt; color: white; line-height: 1; font-family: 'Alegraya SC'"><strong>LIMIT 2023</strong>
      <br />
    <p style="font-family: 'Georgia'; font-size: 19pt; line-height: 1; color: white;"><strong>"Challenge Your Limit With Mathematics"</strong></p>
    </p>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body-2">
      <p class="login-box-msg" style="color: black; text-align: left; font-family: 'Open Sans'; font-size: 14pt;"> * LOGIN Untuk Memulai </p>

      <div id="infoMessage" class="text-center"><?php echo $message; ?></div>

      <?= form_open("auth/cek_login", array('id' => 'login')); ?>
      <div class="input-group mb-3">
        <?= form_input($identity); ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        <span class="help-block input-group" style="color: black"></span>
      </div>
      <div class="input-group mb-3">
        <?= form_input($password); ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>

          </div>
        </div>
        <span class="help-block input-group" style="color: black"></span>
      </div>
      <div class="center-4">

        <!-- /.col -->
        <div class="center-4">
          <?= form_submit('submit', lang('login_submit_btn'), array('id' => 'submit', 'class' => 'btn btn-primary btn-block btn')); ?>
        </div>
        <!-- /.col -->
      </div>
      <?= form_close(); ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<footer class="footer" style="color: white">
  <strong>Copyright &copy; 2021 <a>HIMATIKA "Geokompstat"</a></strong>
</footer>

<script type="text/javascript">
  let base_url = '<?= base_url(); ?>';
</script>
<script src="<?= base_url() ?>assets/app/auth/login.js"></script>