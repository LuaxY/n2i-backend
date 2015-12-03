<?php

class DonateController
{

    public function faire_un_don()
    {
        if (!isLogged())
            header("location: " . Router::url("account/login"));

        Router::view('pages/dons/faire_un_don');
    }

    public function choisir_une_agence()
    {
        if (!isLogged())
            header("location: " . Router::url("account/login"));

        $don = @$_REQUEST['don'];

        if (empty($don))
        {
            die("Don invalide");
        }

        Router::view('pages/dons/choisir_une_agence', ["don" => $don]);
    }

    public function prendre_un_rendez_vous()
    {
        if (!isLogged())
            header("location: " . Router::url("account/login"));

        $agenceId = Router::getParam(1);

        if (!$agenceId)
        {
            die("Agence invalide");
        }

        // TODO: get agence /w $agenceId

        Router::view('pages/dons/prendre_un_rendez_vous');
    }

    public function valider_le_rendez_vous()
    {
        if (!isLogged())
            header("location: " . Router::url("account/login"));

        $date = @$_REQUEST['date'];
        $heure = @$_REQUEST['heure'];

        if (empty($date) || empty($heure))
        {
            die("Date/heure invalide");
        }

        // TODO: check date

        // TODO: store RDV

        // TODO: if ok -> show success
    }

}
