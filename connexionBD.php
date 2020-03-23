<?php
    
    class ConnexionBD {

        public static $bdd;

        function __construct() {
            $this->initConnexion();
        }

        public static function initConnexion() {
            $dns = "mysql:host=localhost;dbname=nawakstory;";
            $user = "root";
            $password = "";
            self::$bdd = new PDO($dns, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
    }

	/*class ConnexionBD {

		public static $bdd;

		function __construct() {
			$this->initConnexion();
		}

		public static function initConnexion() {
			$dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201615;";
			$user = "dutinfopw201615";
			$password = "pymazubu";
			self::$bdd = new PDO( $dns, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
		}
		<script type=\"text/javascript\">
				alert(\"Hello! I am an alert box!!\");

				function test() {
					alert(\"prout\");
				}

				function ouvrirPopup() {
					var popup = document.getElementById(\"popup\");
					alert(popup;)
					popup.style.display = \"block\";
				}

				function fermerPopup() {
					var elements = document.getById(\"popup\");
					popup.style.display = \"none\";
				}

            </script>
	}*/
?>