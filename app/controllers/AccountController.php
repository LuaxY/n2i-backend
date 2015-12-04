<?php

class AccountController
{

    /**
     * list accounts
     * no params needed
     */
    public function index()
    {

        Router::view('pages/account/login');
    }

    /**
     * log in
     * no params needed
     */
    public function login()
    {
        if (empty($_REQUEST["email"]) || empty($_REQUEST["password"]))
        {
            Router::json('error', '#popUpLogin1 .error', 'Au moins un des champs est manquant');
            //Router::view('pages/account/login',["error"=>"Au moins un des champs est manquant"]); die();
        }
        $pwd =hash('sha512', $_REQUEST["password"].'1mhum4n');
        $res = Database::query("SELECT * FROM USER where USER_E_MAIL= '{$_REQUEST['email']}' and USER_PWD ='{$pwd}' ");
        if (!$res)
        {
            Router::json('error', '#popUpLogin1 .error', 'Aucun compte trouvé');
            //Router::view('pages/account/login',["error"=>"Aucun compte trouvé"]); die();
        }
        $res = Database::query("SELECT USER_ID FROM USER where USER_E_MAIL= '{$_REQUEST['email']}'");
        $_SESSION["compte"] = $res[0]["USER_ID"];
        //header("location: " . Router::url(""));
        Router::json('reload', '', '/');
    }
    /**
     * log out
     * no params needed
     */
    public function out()
    {
       if(isset($_SESSION["compte"])){
           session_destroy();
       }
        header("location: " . Router::url(""));
    }
    /**
     * new account view
     * no params needed
     */
    public function inscription()
    {
        Router::view('pages/account/inscription'); die();
    }
    /**
     * create new account
     * all required field
     */
    public function create()
    {
        // check required params
        $required = array("nom", "prenom", "email", "password", "cp");
        $error_field = array();

        foreach ($required as $r)
        {
            if (empty($_REQUEST[$r]))
                $error_field[] = $r;
        }

        if (!empty($error_field))
        {
            Router::view('pages/account/inscription',["error"=>"Au moins un des champs est manquant"]); die();
        }

            // check email only js

        // check unique
        $res = Database::query("SELECT * FROM USER WHERE USER_E_MAIL = '{$_REQUEST['email']}'");

        if ($res)
        {
            Router::view('pages/account/inscription',["error"=>"Email déjà existant"]); die();
        }

        $pwd =hash('sha512', $_REQUEST["password"].'1mhum4n');
        $res = Database::save((object)array(
            "USER_NOM" => $_REQUEST['nom'],
            "USER_PRENOM" => $_REQUEST['prenom'],
            "USER_E_MAIL" => $_REQUEST['email'],
            "USER_PWD" => $pwd,
            "USER_CP" => $_REQUEST['cp']
        ), "USER");

        if ($res)
        {
            Router::view('pages/account/inscription',["error"=>"Compte créé"]); die();
        } else
        {
            Router::view('pages/account/inscription',["error"=>"Compte déjà existant"]); die();
        }
    }

    /**
     * read account details
     * id of account
     **/
    public function read()
    {
        $res = Database::query("SELECT USER_NOM,USER_PRENOM,USER_E_MAIL,USER_CP FROM USER WHERE USER_ID = '{$_SESSION['compte']}'");

        Router::view('pages/account/compte',["infos" => $res[0]]);
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
//    public function login()
//    {
//        // check required params
//        $required = array("email", "password");
//        $error_field = array();
//
//        foreach ($required as $r)
//        {
//            if (empty($_REQUEST[$r]))
//                $error_field[] = $r;
//        }
//
//        if (!empty($error_field))
//            die(json_encode(array("error" => "Les champs ". implode(', ', $error_field) . " sont manquant")));
//
//        // check account
//        $_REQUEST['password'] = md5($_REQUEST['password']);
//        $res = Database::query("SELECT * FROM users WHERE Email = '{$_REQUEST['email']}' AND Mdp = '{$_REQUEST['password']}'");
//
//        if (!$res)
//            die(json_encode(array("error" => "Email ou mot de passe incorrect")));
//
//        // delete password
//        unset($res[0]['Mdp']);
//
//        echo json_encode($res[0]);
//    }

}
