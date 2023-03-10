<?php

    class Card{
            /* Propriétés */
        public $id;
        public $name;
        public $Card;
        private $choice1;
        private $choice2;
        private $find;
        private $height;
        private $width;

        /* Constructeur */
        public function __construct($id) 
        {
            $this->id = $id;
            $this->Card = $_SESSION['deck'][$this->id];
            $this->name = "carte".$this->id;
            // variable contenant les cartes retournées
            if(isset($_SESSION['choice1'])){
                $this->choice1['id'] = $_SESSION['choice1']['id'];
                $this->choice1['Card'] = $_SESSION['choice1']['Card'];
            }
            else{
                $this->choice1 = [
                    'id' => '',
                    'Card' => ''
                ];
            }
            if(isset($_SESSION['choice2'])){
                $this->choice2['id'] = $_SESSION['choice2']['id'];
                $this->choice2['Card'] = $_SESSION['choice2']['Card'];
            }
            else{
                $this->choice2 = [
                    'id' => '',
                    'Card' => ''
                ];
            }
            // Tableau contenant les cartes choisies/trouvées
            if(isset($_SESSION['find'])){
                $this->find = $_SESSION['find'];
            }
            else{
                $this->find = [];
            }

            if($_SESSION['nb_paires'] <= 5){
                $this->height = 250;
                $this->width = 170;
            }
            elseif ($_SESSION['nb_paires'] == 6){
                $this->height = 240;
                $this->width = 160;
            }
            //Si la $_SESSION plateau comprend 8 cartes ou moins
            elseif($_SESSION['nb_paires'] <= 8){
                $this->height = 210;
                $this->width = 140;
            }
            //Si la $_SESSION plateau comprend 9 cartes
            elseif($_SESSION['nb_paires'] == 9){
                $this->height = 200;
                $this->width = 145;
            }
            //Si la $_SESSION plateau comprend plus de 9 cartes
            elseif($_SESSION['nb_paires'] > 9){
                $this->height = 180;
                $this->width = 110;
            }
        }

        /* Méthodes */

        // affichage de l'avant de la carte
        public function displayFront(){
            $TrueImg=str_replace("bis", "", $this->Card)
            ?>
                <img src="<?= $TrueImg ?>" alt="carte" height="<?= $this->height ?>" width="<?= $this->width?>">
            <?php
        }

        // affichage de l'arrière de la carte
        public function displayBack(){
            ?>
                <button type="submit" name="id" value="<?= $this->id ?>"><img src="./img/back.jpg" alt="dos de carte" height="<?= $this->height ?>" width="<?= $this->width?>" ></button>
            <?php
        }

        // affichage cartes
        public function displayCard(){
            ?>
            <div class="carte">
                <?php
                    if($this->isFind()){
                        $this->displayFront();
                    }
                    else{
                        $this->displayBack();
                    }
                ?>
            </div>
            <?php
        }

        // Vérification qi la carte est retournée
        public function isFind(){
            if($this->id == $this->choice1['id'] || $this->id == $this->choice2['id'] || in_array($this->id, $this->find)){
                return true;
            }
            else{
                return false;
            }
        }

        // stockage des cartes choisies
        public function choice(){
            if($this->choice1['id'] == ''){
                $_SESSION['choice1']['id'] = $this->id;
                $_SESSION['choice1']['Card'] = $this->Card;
                $this->choice1['id'] = $this->id;
                $this->choice1['Card'] = $this->Card;

            }
            else{
                $_SESSION['choice2']['id'] = $this->id;
                $_SESSION['choice2']['Card'] = $this->Card;
                $this->choice2['id'] = $this->id;
                $this->choice2['Card'] = $this->Card;
            }
        }
    }
?>