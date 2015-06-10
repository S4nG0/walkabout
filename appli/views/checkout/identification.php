<?php 
$page = 'sign-in'; 
?>

<body class="checkout">


<div class="main" id="main">
    <div class="container-fluid noPadding">
        <!-- Navbar -->
        <?php 
        
        set_include_path(dirname(__FILE__)."/../");
        require 'template/menu.php'; 
        
        ?>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <!-- Etapes de commande -->
            <?php include 'etapes.php'; ?>
        </div>

        <!-- Sign-in Block -->
        <div class="row">
            <div class="sign-in-block">
                <h1>Identification</h1>

                <div class="col-md-6">
                    <div class="user-log-in">
                        <h2>Déjà inscrit ? Identifiez-vous !</h2>
                        <?php echo form_open('connexion'); ?>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="email">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password">
                                <?php echo form_error('password'); ?>
                                <p class="forgotten-pwd">
                                    Vous avez oublié votre mot de passe ? <a href="#">Cliquez-ici</a>
                                </p>                            
                            </div>
                            <!-- Form submitted via jQuery -->
                            <input type="submit" class="button submit-form black" value="Je me connecte !" />
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="new-user">
                        <h2>Nouveau client ? Créez un compte !</h2>
                        <?php echo form_open('checkout/identification/inscription'); ?>
                            <div class="form-group">
                                <label for="email">E-mail désiré</label>
                                <input type="email" name="email" id="email" placeholder="E-mail">
                            </div>
                            <!-- Form submitted via jQuery -->
                            <input type="submit" class="button submit-form black" value="Je m'inscris !"/>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Previous button -->
            <a onclick="history.go(-1);" class="button prev">Retour</a>
        </div>

    </div>
</div>
