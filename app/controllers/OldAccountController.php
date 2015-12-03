<?php

class AccountController
{

    /**
     * list accounts
     * no params needed
     */
    public function index()
    {
        $res = Database::query("SELECT * FROM users");

        // delete password
        for ($i = 0; $i < count($res); $i++)
            unset($res[$i]['Mdp']);

        echo json_encode($res);
    }

    /**
     * create new account
     * all required field
     */
    public function create()
    {
        // check required params
        $required = array("nom", "prenom", "email", "password", "adresse", "code_postal", "pays");
        $error_field = array();

        foreach ($required as $r)
        {
            if (empty($_REQUEST[$r]))
                $error_field[] = $r;
        }

        if (!empty($error_field))
            die(json_encode(array("error" => "Les champs ". implode(', ', $error_field) . " sont manquant")));

        // check email
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
            die(json_encode(array("error" => "Format de l'email incorrect")));

        // check unique
        $res = Database::query("SELECT * FROM users WHERE Email = '{$_REQUEST['email']}'");

        if ($res)
            die(json_encode(array("error" => "Un compte existe déjà sur cet email")));

        $res = Database::save((object)array(
            "Nom" => $_REQUEST['nom'],
            "Prenom" => $_REQUEST['prenom'],
            "Email" => $_REQUEST['email'],
            "Mdp" => md5($_REQUEST['password']),
            "Adresse" => $_REQUEST['adresse'],
            "Code_postal" => $_REQUEST['code_postal'],
            "Pays" => $_REQUEST['pays']
        ), "users");

        if ($res)
            echo json_encode(array("message" => "Compte créé"));
        else
            echo json_encode(array("error" => "Impossible de créer le compte"));
    }

    /**
     * read account details
     * id of account
     **/
    public function read()
    {
        if (empty(@$_REQUEST['id']))
            die(json_encode(array("error" => "Aucun identifiant spécifié")));

        $res = Database::query("SELECT * FROM users WHERE id = {$_REQUEST['id']}");

        if (!$res)
            die(json_encode(array("error" => "Aucun compte trouvé")));

        // delete password
        unset($res[0]['Mdp']);

        echo json_encode($res[0]);
    }

    /**
     * update account info
     * id of account and field to update
     **/
    public function update()
    {
        if (empty(@$_REQUEST['id']))
            die(json_encode(array("error" => "Aucun identifiant spécifié")));

        $to_update = array();
        $to_update['id'] = $_REQUEST['id'];

        // check email
        if (@$_REQUEST['email'])
        {
            if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
                die(json_encode(array("error" => "Format de l'email incorrect")));

            $to_update['Email'] = $_REQUEST['email'];
        }

        // check password
        if (@$_REQUEST['password'])
        {
            $to_update['Mdp'] = md5($_REQUEST['password']);
        }

        $to_check = array(
            "nom" => "Nom",
            "prenom" => "Prenom",
            "adresse" => "Adresse",
            "code_postal" => "Code_postal",
            "pays" => "Pays"
        );

        foreach ($to_check as $k => $v)
        {
            if (!empty($_REQUEST[$k]))
                $to_update[$v] = $_REQUEST[$k];
        }

        $res = Database::save((object)$to_update, "users");

        if ($res)
            echo json_encode(array("message" => "Compte mis à jour"));
        else
            echo json_encode(array("error" => "Impossible de mettre à jour le compte"));
    }

    /**
     * delete account
     * id of account
     **/
    public function delete()
    {
        if (empty(@$_REQUEST['id']))
            die(json_encode(array("error" => "Aucun identifiant spécifié")));

        $res = Database::delete($_REQUEST['id'], 'users');

        if($res)
            echo json_encode(array("message" => "Compte supprimé"));
        else
            echo json_encode(array("error" => "Impossible de supprimer le compte"));
    }

    /**
     * account login
     * email and password
     **/
    public function login()
    {
        // check required params
        $required = array("email", "password");
        $error_field = array();

        foreach ($required as $r)
        {
            if (empty($_REQUEST[$r]))
                $error_field[] = $r;
        }

        if (!empty($error_field))
            die(json_encode(array("error" => "Les champs ". implode(', ', $error_field) . " sont manquant")));

        // check account
        $_REQUEST['password'] = md5($_REQUEST['password']);
        $res = Database::query("SELECT * FROM users WHERE Email = '{$_REQUEST['email']}' AND Mdp = '{$_REQUEST['password']}'");

        if (!$res)
            die(json_encode(array("error" => "Email ou mot de passe incorrect")));

        // delete password
        unset($res[0]['Mdp']);

        echo json_encode($res[0]);
    }

}
