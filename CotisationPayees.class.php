<?php 

class CotisationPayee 
{
	// Attributs
	public $iTypeCotisation = 1; // int
	public $sCINMedecin; // string
	public $iModeVersement = 6; // int
	public $sNumRecuTransaction; // string
	public $iIdParamCotisation; // int
	public $iIdBanque = -1; // int


	public function __construct ($sCINMedecin, $sNumRecuTransaction, $iIdParamCotisation) {
		$this->sCINMedecin 			=	$sCINMedecin;
		$this->sNumRecuTransaction	=	$sNumRecuTransaction;
		$this->iIdParamCotisation	=	$iIdParamCotisation;
	}

	public function get_CINMedecin () {
		return $this->sCINMedecin;
	}

	public function get_NumRecuTransaction () {
		return $this->sNumRecuTransaction;
	}

	public function get_IdParamCotisation () {
		return $this->iIdParamCotisation;
	}

	public function readAttribute () {
		echo "Je suis la CIN : $this->sCINMedecin, de la transaction $this->sNumRecuTransaction, pour l'année : $this->iIdParamCotisation <br>";
	}
}

?>