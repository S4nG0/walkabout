<?php
$page = "single-carnet";
switch($commentaire){
    case "reussi":
        echo '<script>alert("Votre commentaire est bien enregistré, il sera modéré sous peu");</script>';
        break;
    case "fail":
        echo '<script>alert("Une erreur est survenue lors de l\'enregistrement de votre commentaire, veuillez contacter le service technique.");</script>';
        break;
}
?>





<body class="single-carnet">



    <div class="main" id="main" data-stellar-background-ratio="0.5">

        <div class="overlay"></div>

        <div class="container-fluid noPadding">

            <!-- Navbar -->

            <?php include 'template/menu.php'; ?>



            <div class="caption-wrapper">

                <div class="caption">

                    <div class="row noPadding">

                        <div class="col-md-8 col-md-offset-2">

                            <picture class="profile-picture">

                                <img src="<?php echo img_url($user[0]->photo); ?>" alt="Profil" />

                            </picture>

                            <h1>

                                <?php
                                echo $carnet[0]->titre;
                                ?>

                            </h1>

                            <p>

                                <?php
                                echo $carnet[0]->description;
                                ?>

                            </p>

                        </div>

                    </div>

                    <div class="bottom-wrapper">

                        <div class="col-xs-12 col-sm-4 col-md-4 details">

                            <span class="author">

                                <a href="#"><?php echo $user[0]->prenom . ' ' . $user[0]->nom ?></a>

                            </span>

                            <span class="bull">&bull;</span>

                            <span class="location">

                                <?php echo $pays[0]->nom ?>, <?php echo 'Le ' . $carnet[0]->date ?>

                            </span>

                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">

                            <div class="arrow-wrapper">

                                <a href="#content"><i class="fa fa-angle-down"></i></a>

                            </div>

                        </div>

                        <div class="hidden-xs col-sm-4 col-md-4 social">

                            <a class="item_fb" href="#" target="blank">

                                <i class="fa fa-facebook"></i>

                            </a>

                            <a class="item_tw" href="#" target="blank">

                                <i class="fa fa-twitter"></i>

                            </a>

                            <a class="item_gp" href="#" target="blank">

                                <i class="fa fa-google-plus"></i>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="content" id="content">



        <div class="container-fluid noPadding">

            <!-- begin:article -->

            <?php
            $i = 1;

            foreach ($articles as $article) {

                echo '<div class="row noPadding">';

                $photos = array();

                $photos = explode(';', $article->photos);

                array_pop($photos);

                $html_photo = '';

                foreach ($photos as $key => $photo) {

                    $html_photo .= '<li>

                                        <figure>

                                            <img src="' . img_url($photo) . '" alt="photo' . $key . '">

                                            <figcaption>

                                                <div class="caption-content">

                                                    <!-- Lien vers galerie fancybox -->

                                                    <a class="fancybox" rel="group" href="' . img_url($photo) . '">

                                                        <i class="fa fa-search"></i>

                                                        <p>Agrandir l\'image</p>

                                                    </a>

                                                </div>

                                            </figcaption>

                                        </figure>

                                    </li>

                                    ';
                }



                echo '

                      <article class="tb-article">

                                <h1 class="tb-article--title">

                                    ' . $article->titre . '

                                </h1>

                                '.$article->texte.'

                                ';
                if ($html_photo != '') {



                    echo '<div class="gallery align-center">

                <h2>Les photos liées à cet article</h2>

                <ul class="grid">

                ' . $html_photo . ''
                    . '</ul></div>';
                }

                echo '

                            </article>

                            ';
                $i++;
            }
            
            ?>





        </div>

    </div>
</div>
<div class="container-fluid discussion">

    <div class="row noPadding">



        <!-- Comment -->



        <?php
        foreach ($commentaires as $key => $commentaire) {

            if($commentaire->idUsers == 3){
                $data = json_decode($commentaire->data, true);
                $commentaire->user[0]->prenom = $data['prenom'];
                $commentaire->user[0]->nom = $data['nom'];
            }
            
            echo '<section class="comment">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-2 col-md-2 col-md-offset-2">

                            <div class="profile-picture">

                                <img src="' . img_url($commentaire->user[0]->photo) . '" alt="Profile">

                            </div>

                        </div>

                        <div class="col-sm-10 col-md-6">

                            <div class="comment--content">

                                <div class="arrow"></div>

                                <div class="row noPadding">

                                    <span class="username"><a href="#">' . $commentaire->user[0]->prenom . ' ' . $commentaire->user[0]->nom . '</a></span>

                                    <span class="bull">&bull;</span>

                                    <span class="published">Publié le ' . $commentaire->date . '</span>

                                    <p>

                                        ' . $commentaire->texte . '

                                    </p>

                                </div>

                                <div class="row noPadding">

                                    <div class="comment--reply">

                                        <a class="reply-link" href="#comment-form">

                                            Participez à la discussion

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>';
        }
        ?>

    </div>

</div>



<div class="container-fuild">

    <div class="row noPadding">

        <section class="comment-form" id="comment-form">

            <div class="container">

                <div class="row noPadding">

                    <div class="col-md-8 col-md-offset-2 form-container">

                        <?php
                        echo form_open('commentaire/add/' . $carnet[0]->idCarnetDeVoyage);
                        ?>

                        <h3 class="col-md-12 align-center">Laissez un commentaire !</h3>
                        <?php
                        if($connecte !== true){
                        ?>
                        <div class="form-group col-md-6">

                            <label for="last-name">Nom</label>
                            <input type="text" name="last-name" value="" placeholder="Entrez votre nom" id="last-name">
                            <?php echo form_error('last-name'); ?>
                        </div>

                        <div class="form-group col-md-6">

                            <label for="first-name">Prénom</label>
                            <input type="text" name="first-name" value="" placeholder="Entrez votre prénom" id="first-name">
                            <?php echo form_error('first-name'); ?>
                        </div>

                        <div class="form-group col-md-12">

                            <label for="email">Email</label>
                            <input type="text" name="email" value="" placeholder="Entrez votre email" id="email">
                            <?php echo form_error('email'); ?>
                            <div class="help-block">

                                Déjà un compte ? <a href="<?php echo base_url(); ?>connexion">Connectez-vous pour discuter !</a>

                            </div>

                        </div>
                        <?php } ?>
                        <div class="form-group col-md-12">
                            <label for="message">Message</label>
                            <textarea name="message" cols="30" rows="10" placeholder="Laissez un message" id="message"></textarea>
                            <?php echo form_error('message'); ?>
                        </div>

                        <div class="form-group col-md-3 col-md-offset-9">

                            <input type="submit" name="submit_commentaire" value="Envoyer" id="submit_commentaire" class="button">
                        </div>

                        <?php
                        echo form_close();
                        ?>

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>



<div class="container-fluid share">

    <div class="row align-center noPadding">

        <div class="col-md-4 col-md-offset-4">

            <!-- Share block -->

            <h1>Vous avez aimé ce carnet ?</h1>

            <p class="italic">Partagez-le avec vos amis !</p>

            <div class="social">

                <a class="item_fb" href="#" target="blank">

                    <i class="fa fa-facebook"></i>

                </a>

                <a class="item_tw" href="#" target="blank">

                    <i class="fa fa-twitter"></i>

                </a>

                <a class="item_gp" href="#" target="blank">

                    <i class="fa fa-google-plus"></i>

                </a>

            </div>

        </div>

    </div>

</div>
</div>
