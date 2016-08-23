<link href='<?php echo base_url(); ?>assets/css/login.css' rel="stylesheet" type="text/css" />
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico" autofocus>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                <!--<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
              -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Ingresar</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                ¿Olvidó su contraseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
