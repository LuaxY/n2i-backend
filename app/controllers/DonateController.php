<?php

class DonateController
{

    public function faire_un_don()
    {
        if (!isLogged())
            return Router::view('pages/error', ['error' => 'Connectez-vous']);

        return Router::view('pages/dons/faire_un_don');
    }

    public function choisir_une_agence()
    {
        if (!isLogged())
            return Router::view('pages/error', ['error' => 'Connectez-vous']);

        $don = @$_REQUEST['don'];

        // TECHNIQUE D'ESCRO :D (pour récup plustard)
        $_SESSION['don'] = $don;

        if (empty($don))
        {
            return Router::view('pages/error', ['error' => 'Don invalide']);
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

        return Router::view('pages/dons/choisir_une_agence', ["don" => $don, "list_agences" => $list_agences]);
    }

    public function prendre_un_rendez_vous()
    {
        if (!isLogged())
            return Router::view('pages/error', ['error' => 'Connectez-vous']);

        $agenceId = Router::getParam(1);

        if (!$agenceId)
        {
            return Router::view('pages/error', ['error' => 'Agence invalide']);
        }

        return Router::view('pages/dons/prendre_un_rendez_vous', ["AGENCE_ID" => $agenceId]);
    }

    public function valider_le_rendez_vous()
    {
        if (!isLogged())
            return Router::view('pages/error', ['error' => 'Connectez-vous']);

        $date = @$_REQUEST['date'];
        $heure = @$_REQUEST['heure'];
        $agenceId = @$_REQUEST['agence_id'];

        if (empty($date) || empty($heure) || empty($agenceId))
        {
            return Router::view('pages/error', ['error' => 'Date/heure invalide']);
        }

        $res = Database::save((object)array(
            "AGENCE_ID" => $agenceId,
            "USER_ID" => $_SESSION["compte"],
            "MATERIEL" => $_SESSION['don'],
            "RDV_DATE" => "$date $heure"
        ), "RDV");

        //unset($_SESSION['don']);

        return Router::view('pages/success', ['success' => 'Le rendez-vous a bien était prit en compte.']);
    }

}
