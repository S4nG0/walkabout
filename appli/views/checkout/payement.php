<?php
$page = 'payment'; 
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

        <!-- Choice block -->
        <div class="row">
            <div class="payment-block">

                <?php echo form_open('checkout/conclusion'); ?>

                    <div class="recap-block">
                        <h1>Récapitulatif de la réservation</h1>
                        <p class="small hidden-lg hidden-md hidden-sm">
                            Attention : sur petits écrans (smartphones ou certaines tablettes), n'oubliez pas de préciser le nombre de participants en déplaçant le tableau ci-dessous vers la gauche&nbsp;!
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Destination choisie</td>
                                        <td>Prix</td>
                                        <td>Participants</td>
                                        <td>Total</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <h3><?php echo $destination->titre; ?></h3>
                                        <p><?php echo $pays->nom; ?>&nbsp;&bull;&nbsp;du <?php echo $voyage->date_depart; ?> au <?php echo $voyage->date_retour; ?></p>
                                    </td>
                                    <td>
                                        <span class="price" id="price"><span id="prix_personne"><?php echo $voyage->prix; ?></span><sup> €</sup></span>
                                    </td>
                                    <td>
                                        <input type="number" name="nb_personne" id="nb_personne" value="1" min="1" max="<?php echo $nb_places_restantes; ?>"><br /><span class="small">(places restantes : <?php echo $nb_places_restantes; ?>)</span>
                                    </td>
                                    <td>
                                        <span class="price" id="total"><span id="result_total"><?php echo $voyage->prix; ?></span><sup> €</sup></span>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="payment-method-block clearfix">
                        <h1>Mode de paiement</h1>
                        <p class="small">
                            Remarque : le paiement d'un accompte de 10% du prix final est nécessaire pour pouvoir réserver votre place. Cet accompte sera déduit immédiatement de votre compte et vous sera remboursé en cas d'annulation. Le reste du total sera déduit à la conclusion du dossier.
                        </p>
                        <ul class="methods">
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-paypal"></i>
                                    <span>Paypal</span>
                                    <input type="radio" name="payment-method" value="pm-paypal" id="pm-paypal" checked>
                                    <label for="pm-paypal"><span></span></label>
                                </div>
                            </li>
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-cc-visa"></i>
                                    <span>Visa&nbsp;/&nbsp;Master Card</span>
                                    <input type="radio" name="payment-method" value="pm-cc" id="pm-cc">
                                    <label for="pm-cc"><span></span></label>
                                </div>
                            </li>
                            <li class="method">
                                <div class="icon-wrapper">
                                    <i class="fa fa-bank"></i>
                                    <span>Virement bancaire</span>
                                    <input type="radio" name="payment-method" value="pm-bank" id="pm-bank">
                                    <label for="pm-bank"><span></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="terms-and-conditions-block">
                        <input type="checkbox" name="gtc" id="gtc">
                        <label for="gtc"><span></span>En cochant cette case, vous acceptez avoir lu les <a href="#">conditions générales de vente</a> de Walkabout.</label>
                        <input class="button black" id="submit_commande" type="submit" value="Je finalise ma réservation !">
                    </div>



                </form>
                <div class="buttons-block">
                    <a class="button prev" href="checkout-sign-in.php">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
