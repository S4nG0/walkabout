<?php
$page = 'account';
?>

<body class="sign-in">

    <div class="main" id="main" data-stellar-background-ratio="0.5">
        <div class="container-fluid noPadding">
            <!-- Navbar -->
            <?php include 'template/menu.php'; ?>
        </div>

        <div class="caption-wrapper">

            <div class="caption">

                <div class="row noPadding">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>Espace voyageur</h1>
                    </div>
                </div>

                <!-- FORM -->
                <?php echo form_open('connexion'); ?>
                <?php
                if ($result === false) {
                    echo '<div class="alert alert-danger" role="alert"><strong>Erreur!</strong> L\'email de connexion ou le mot de passe sont incorrect. Veuillez réessayer!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                }
                ?>
                <div class="row noPadding">

                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="row noPadding">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password">
                            <?php echo form_error('password'); ?>
                            <p class="forgotten-pwd">
                                Vous avez oublié votre mot de passe ? <a href="#">Cliquez-ici</a>
                            </p>                            
                        </div>
                    </div>
                </div>
                <div class="row noPadding">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="submit" class="button pull-right" value="Je me connecte">
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- /FORM -->


            </div>
        </div>

    </div>