<?php
$page = 'choice'; 
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
            <div class="choice-block">
                <h1>Choisissez une date de départ</h1>

                <?php echo form_open('checkout/identification')?>

                    <ul class="date-list">
                        
                        <?php
                        $x = 0;
                        foreach($voyages as $voyage){
                            if($voyage_selectionne == $voyage->idVoyage){
                                $checked = 'checked';
                            }else if($voyage_selectionne == false && $x == 0){
                                $checked = 'checked';
                            }else{
                                $checked = '';
                            }
                            echo '  <li>
                                        <div class="form-group">
                                            <input class="radio" type="radio" name="date" id="date'.$x.'" value="'.$voyage->idVoyage.'" '.$checked.'>
                                            <label for="date'.$x.'"><span></span>'.$voyage->date_depart.' :</label>
                                            <p>
                                                <strong>Départ</strong> : '.$voyage->date_depart.'<br>
                                                <strong>Retour</strong> : '.$voyage->date_retour.'<br>
                                                <strong>'.$voyage->prix.' € par personnes.</strong><br>
                                                <strong>Places restantes</strong> : '.$voyage->nb_reservés.' sur '.$voyage->nb_places.'
                                            </p>
                                        </div>
                                    </li>';
                            $x++;
                        }
                        
                        ?>
                    </ul>

                    <div class="buttons-block">
                        <a class="button prev cancel-form" onclick="history.go(-1);">Annuler la réservation</a>
                        <input class="button next" type="submit" value="Je réserve ma place !">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>