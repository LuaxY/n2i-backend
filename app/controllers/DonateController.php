<?php

class DonateController
{

    public function faire_un_don()
    {
        if (!isLogged())
            header("location: " . Router::url("account/login"));

        //Router::view('pages/dons/faire_un_don');
        Router::json('redirect', '.selector', 'pages/dons/api_faire_un_don');
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

        $list_agences = Database::query("SELECT ASSOCIATION.NOM_ASSOC, AGENCE.* from AGENCE, ASSOCIATION, USER
                                  WHERE AGENCE.ASSOC_ID = ASSOCIATION.ASSOC_ID
                                  AND AGENCE.AGENCE_CP = 78000
                                  ORDER BY USER_ID");
        if(empty($list_agences))
        {
          $list_agences = Database::query("SELECT AGENCE.AGENCE_ID, ASSOCIATION.NOM_ASSOC, AGENCE.ADRESSE, AGENCE.AGENCE_CP, AGENCE.AGENCE_VILLE, AGENCE.AGENCE_E_MAIL
                                           FROM AGENCE, ASSOCIATION
                                           WHERE AGENCE.ASSOC_ID = ASSOCIATION.ASSOC_ID");
        }
        var_dump($list_agences);

        Router::view('pages/dons/choisir_une_agence', ["don" => $don, "list_agences" => $list_agences]);
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

        Router::view('pages/dons/prendre_un_rendez_vous', ["AGENCE_ID" => $agenceId]);
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

        $res = Database::save((object)array(
            "AGENCE_ID" => $_REQUEST['AGENCE_ID'],
            "message" => $_REQUEST['Message'],
        ), "RDV");

        // TODO: store RDV

        // TODO: if ok -> show success
    }

}
