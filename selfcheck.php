<?php

// Vorpr�fungen bei erstmaligem Aufruf

function CheckIntegrity()
{
		global $sGuipath;
		global $sDatabase;
		
/*		// PHP5 
		
		$sVersion = phpversion();
		if ((int) $sVersion[0] < 5) {
				Error("Fehler: OpenLawyer\'s ben�tigt PHP5 !");
				die;
		}
		
		// SQlite2
		if (phpversion('sqlite') == '') {
				Error("Fehler: PHP-Bibliothek f�r SQLite fehlt !");
				die;
		}
		
		// Ohne Oberfl�che l�uft nichts
		
		if (!file_exists($sGuipath)) {
				Error("Fehler: Oberfl�chendateien (GUI) nicht verf�gbar.");
				die;
		}
*/
		// Existiert �berhaupt eine Datenbank ?
		
/*		if (!file_exists($sDatabase)) {
				Initialize();
		}
*/		
		// Datenbank existiert - geht Zugriff ?
		
		$hTestHandle = OpenDB($sDatabase, $sError);
		if ($hTestHandle == false) {
				Error("Fehler bei Datenbankzugriff: " . $sError);
				die;
		}
		CloseDB($hTestHandle);
		
		IPSperre();
}
