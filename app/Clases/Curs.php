<?php
        namespace App\Clases;

        class Curs{

                private $id;
                private $sigles;
                private $nom;
                private $siglesCicle;
        

        public function __construct($id, $sigles, $nom, $siglesCicle){

                $this-> id = $id;
                $this-> sigles = $sigles;
                $this-> nom = $nom;
                $this-> siglesCicle= $siglesCicle;

        }
        public function __toString(){
                $string = $this-> id .'<br>';
                $string .= $this-> sigles . '<br>';
                $string .= $this-> nom . '<br>';
                $string .= $this-> siglesCicle . '<br>';

                return $string;
        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of sigles
         */ 
        public function getSigles()
        {
                return $this->sigles;
        }

        /**
         * Set the value of sigles
         *
         * @return  self
         */ 
        public function setSigles($sigles)
        {
                $this->sigles = $sigles;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

                /**
                 * Get the value of siglesCicle
                 */ 
                public function getSiglesCicle()
                {
                                return $this->siglesCicle;
                }

                /**
                 * Set the value of siglesCicle
                 *
                 * @return  self
                 */ 
                public function setSiglesCicle($siglesCicle)
                {
                                $this->siglesCicle = $siglesCicle;

                                return $this;
                }
    }