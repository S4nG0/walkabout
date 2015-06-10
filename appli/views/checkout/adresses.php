<?php 
$page = 'informations'; 
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

        <!-- Existing adress block -->
        <div class="row">
            <h1>Vos adresses</h1>
           <?php echo form_open('checkout/payement'); ?>
                <div class="infos-block existing-address clearfix">
                    <div class="col-sm-6 col-md-8">
                        <div class="form-group">
                            <label for="adresses">Mon adresse</label>
                            <p style="text-align:left;font-weight:900"><?php 
                            if($user->adresse2 != ""){
                                echo $user->nom.' '.$user->prenom.' <br/>'.$user->adresse1.' <br/> '.$user->adresse2.' <br/>'.$user->CP.' '.$user->ville.'<br/>'.$user->pays;
                                
                            }
                            else{
                                echo $user->nom.' '.$user->prenom.' <br/>'.$user->adresse1.' <br/>'.$user->CP.' '.$user->ville.'<br/>'.$user->pays;
                            }
?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <button class="button black" type="submit"><i class="fa fa-check-square"></i>J'utilise cette adresse</button>
                            <a href="<?php echo base_url(); ?>moncompte" class="button black" id="add-address"><i class="fa fa-plus-square"></i>Modifier l'adresse</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Add new address block -->
        <div class="row" id="new-address">
            <h1>Entrer une nouvelle adresse</h1>

            <form action="checkout-informations.php" method="POST">
                <div class="infos-block clearfix">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nom">Nom&nbsp;<sup>*</sup></label>
                                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom&nbsp;<sup>*</sup></label>
                                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom">
                            </div>

                            <div class="form-group">
                                <label for="adresse">Adresse&nbsp;<sup>*</sup></label>
                                <input type="text" name="adresse" id="adresse" placeholder="Numéro, rue">
                            </div>

                            <div class="form-group">
                                <label for="adresse2">Complément d'adresse</label>
                                <input type="text" name="adresse2" id="adresse2" placeholder="Complément d'adresse">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="telephone">Téléphone fixe&nbsp;<sup>**</sup></label>
                                <input type="telephone" name="telephone" id="telephone" placeholder="Entrez un numéro de téléphone">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Téléphone Mobile&nbsp;<sup>**</sup></label>
                                <input type="telephone" name="mobile" id="mobile" placeholder="Entrez un numéro de téléphone">
                            </div>

                            <div class="form-group">
                                <label for="additionary_infos">Informations supplémentaires</label>
                                <textarea name="additionary_infos" id="additionary_infos" rows="7" maxlength="300" placeholder="Des informations supplémentaires ? (300 caractères maximum)"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="code_postal">Code postal&nbsp;<sup>*</sup></label>
                                <input type="text" name="code_postal" id="code_postal" pattern="\d*" placeholder="00000">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ville">Ville&nbsp;<sup>*</sup></label>
                                <input type="text" name="ville" id="ville" placeholder="Votre ville">
                            </div>
                        </div>
                        <div class="col-md-6 hidden-sm hidden-xs">
                            <div class="form-group">
                                <p>
                                    <sup>*</sup>&nbsp;Champ requis
                                </p>
                                <p>
                                    <sup>**</sup>&nbsp;Vous devez préciser au moins un numéro de téléphone
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb0">
                                <label for="pays">Pays&nbsp;<sup>*</sup></label>
                                <select name="pays" id="pays">
                                    <option value="FR">France</option>
                                    <option value="IT">Italie</option>
                                    <option value="ES">Espagne</option>
                                    <option value="UK">Royaume-Uni</option>
                                    <option value="US">États-Unis</option>
                                    <option value="DE">Allemagne</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 hidden-md hidden-lg">
                            <div class="form-group mb0 mt25">
                                <p>
                                    <sup>*</sup>&nbsp;Champ requis
                                </p>
                                <p>
                                    <sup>**</sup>&nbsp;Vous devez préciser au moins un numéro de téléphone
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <button class="button black mt25 mb0" type="submit"><i class="fa fa-check-square"></i>J'enregistre l'adresse !</button>
                </div>

            </form>
        </div>
        <div class="buttons-block">
            <a class="button prev"  onclick="history.go(-1);">Retour</a>
        </div>
    </div>
</div>
