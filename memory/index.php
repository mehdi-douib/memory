<!-- header des pages -->
    <?php
        session_start();
        require 'include/header.php';
    ?>

    <!-- contenu de la page -->
    <main>
        <?php
            // verif s'il y a une connexion
            if(!$player->isConnected()){
                ?>
                <div class="container">
                    <div class="background_form">
                        <h1>Bienvenue dans le jeu du Memory</h1>
                        <form action="" method="post">
                            <input type="submit" name="conn" value="Connexion" id="double">
                        </form>
                        <form action="" method="post">
                            <input type="submit" name="insc" value="Inscription" id="double">
                        </form>
                        <form action="" method="post">
                            <label for="nb_paires">Nombre de paires</label>
                            <select name="nb_paires" id="">
                                <option value=3 selected>3</option>
                                <option value=4 >4</option>
                                <option value=5 >5</option>
                                <option value=6 >6</option>
                                <option value=7 >7</option>
                                <option value=8 >8</option>
                                <option value=9 >9</option>
                                <option value=10>10</option>
                                <option value=11 >11</option>
                                <option value=12 >12</option>
                            <input type="submit" name="ano" value="Jouer anonymement">
                        </form>
                    </div>
                </div>
                <?php
                    // envoie vers la page de jeu si le formulaire est rempli
                    if(!empty($_POST)){
                        if(isset($_POST['conn'])){
                            header('Location: connexion.php');
                        }
                        elseif(isset($_POST['insc'])){
                            header('Location: inscription.php');
                        }
                        elseif(isset($_POST['ano'])){
                            $_SESSION['player'] = "anonyme";
                            $_SESSION['nb_paires'] = $_POST['nb_paires'];
                            header('Location: jeu.php');
                        }
                    }
            }
            else{ // d??j?? connect??
                ?>
                <div class="container">
                    <div class="background_form">
                        <h1>Bienvenue dans le jeu du Memory</h1>
                        <form action="" method="post">
                            <label for="nb_paires">Nombre de paires</label>
                            <select name="nb_paires" id="">
                                <option value=3 selected>3</option>
                                <option value=4 >4</option>
                                <option value=5 >5</option>
                                <option value=6 >6</option>
                                <option value=7 >7</option>
                                <option value=8 >8</option>
                                <option value=9 >9</option>
                                <option value=10>10</option>
                                <option value=11 >11</option>
                                <option value=12 >12</option>
                            </select>
                            <input type="submit" value="Jouer">
                        </form>
                <?php
                    // envoie vers la page de jeu si le formulaire est rempli
                    if(!empty($_POST)){
                        $_SESSION['nb_paires'] = $_POST['nb_paires'];
                        $_SESSION['player'] = "NewGame";
                        header('Location: jeu.php');
                    }
                
            }
                ?>


    </main>

    <!-- footer des pages -->
    <?php
        require 'include/footer.php';
    ?>
</body>
</html>
