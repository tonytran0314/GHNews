<form action="../auth/loginProcess" method="POST" style="width:50%; margin: auto; padding: 20px;">
  <div class="row mb-3">
    <label for="userName" class="col-sm-2 col-form-label">User name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="userName" name="userName">
    </div>
    <?php if(isset($_SESSION["error"]["username"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["username"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["username"]);
                            ?>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <?php if(isset($_SESSION["error"]["password"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["password"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["password"]);
                            ?>
  </div>
  <button type="submit" name="loginBtn" class="btn btn-primary">Log in</button>

  <?php if(isset($_SESSION["authFail"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["authFail"]; ?></div>
                            <?php }
                                unset($_SESSION["authFail"]);
                            ?>
</form>