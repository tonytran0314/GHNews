<form action="../auth/signupProcess" method="POST" style="width:50%; margin: auto; padding: 20px;">
  <div class="row mb-3">
    <label for="userName" class="col-sm-2 col-form-label">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="userName" name="userName">
      <span id="messageUsername" style="color: red;"></span>
      <?php if(isset($_SESSION["error"]["username"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["username"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["username"]);
                            ?>
    </div>
  </div>
  <div class="row mb-3">
    <label for="fullname" class="col-sm-2 col-form-label">Full-name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fullname" name="fullname">
      <?php if(isset($_SESSION["error"]["fullname"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["fullname"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["fullname"]);
                            ?>
    </div>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
      <?php if(isset($_SESSION["error"]["password"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["password"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["password"]);
                            ?>
    </div>
  </div>
  <div class="row mb-3">
    <label for="re-password" class="col-sm-2 col-form-label">Repeat Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="re-password" name="re-password">
      <?php if(isset($_SESSION["error"]["re-password"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["re-password"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["re-password"]);
                            ?>
    </div>
  </div>
  
  <button type="submit" name="signupBtn" class="btn btn-primary">Sign up</button>
  <?php if(isset($_SESSION["authSuccess"])) { ?>
                                <div class="alert alert-success"><?php echo $_SESSION["authSuccess"]; ?></div>
                            <?php }
                                unset($_SESSION["authSuccess"]);
                            ?>
  <?php if(isset($_SESSION["authFail"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["authFail"]; ?></div>
                            <?php }
                                unset($_SESSION["authFail"]);
                            ?>
</form>
