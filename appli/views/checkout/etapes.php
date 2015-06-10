<div class="steps-wrapper">

    <ul class="steps">

<?php if( $page == 'choice' ) { ?>

        <li class="active">
            <a href="<?php echo base_url(); ?>checkout/dates/<?php echo $destination ?>">
                <div class="step-block">
                    <i class="fa fa-globe"></i>
                    <span class="step">Date de départ</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-sign-in"></i>
                    <span class="step">Connexion</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-info-circle"></i>
                    <span class="step">Informations</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-money"></i>
                    <span class="step">Paiement</span>
                </div>
            </a>
        </li>

<?php }; ?>

<?php if( $page == 'sign-in' ) { ?>

        <li>
            <a href="<?php echo base_url(); ?>checkout/dates/<?php echo $destination ?>">
                <div class="step-block">
                    <i class="fa fa-globe"></i>
                    <span class="step">Date de départ</span>
                </div>
            </a>
        </li>

        <li class="active">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-sign-in"></i>
                    <span class="step">Connexion</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-info-circle"></i>
                    <span class="step">Informations</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-money"></i>
                    <span class="step">Paiement</span>
                </div>
            </a>
        </li>

<?php }; ?>

<?php if( $page == 'informations' || $page == 'inscription' ) { ?>

        <li>
            <a href="<?php echo base_url(); ?>checkout/dates/<?php echo $destination ?>">
                <div class="step-block">
                    <i class="fa fa-globe"></i>
                    <span class="step">Date de départ</span>
                </div>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-sign-in"></i>
                    <span class="step">Connexion</span>
                </div>
            </a>
        </li>

        <li class="active">
            <a href="checkout-informations.php">
                <div class="step-block">
                    <i class="fa fa-info-circle"></i>
                    <span class="step">Informations</span>
                </div>
            </a>
        </li>

        <li class="disabled">
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-money"></i>
                    <span class="step">Paiement</span>
                </div>
            </a>
        </li>

<?php }; ?>

<?php if( $page == 'payment' ) { ?>

        <li>
            <a href="<?php echo base_url(); ?>checkout/dates/<?php echo $destination->idDestination ?>">
                <div class="step-block">
                    <i class="fa fa-globe"></i>
                    <span class="step">Date de départ</span>
                </div>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);">
                <div class="step-block">
                    <i class="fa fa-sign-in"></i>
                    <span class="step">Connexion</span>
                </div>
            </a>
        </li>

        <li>
            <a href="checkout-informations.php">
                <div class="step-block">
                    <i class="fa fa-info-circle"></i>
                    <span class="step">Informations</span>
                </div>
            </a>
        </li>

        <li class="active">
            <a href="checkout-payment.php">
                <div class="step-block">
                    <i class="fa fa-money"></i>
                    <span class="step">Paiement</span>
                </div>
            </a>
        </li>

<?php }; ?>

    </ul>
</div>