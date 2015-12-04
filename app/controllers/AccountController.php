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
            Router::json('error', '.selector', 'Au moins un des champs est manquant');
            //Router::view('pages/account/login',["error"=>"Au moins un des champs est manquant"]); die();
        }
        $pwd =hash('sha512', $_REQUEST["password"].'1mhum4n');
        $res = Database::query("SELECT * FROM USER where USER_E_MAIL= '{$_REQUEST['email']}' and USER_PWD ='{$pwd}' ");
        if (!$res)
        {
            Router::json('error', '.selector', 'Aucun compte trouvé');
            //Router::view('pages/account/login',["error"=>"Aucun compte trouvé"]); die();
        }
        $res = Database::query("SELECT USER_ID FROM USER where USER_E_MAIL= '{$_REQUEST['email']}'");
        $_SESSION["compte"] = $res[0]["USER_ID"];
        //header("location: " . Router::url(""));
        Router::json('redirect', '#popUpLogin1', 'Bonjour '.$_REQUEST["email"]);
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
        Router::json('redirect', '#popUpLogin1','pages/account/inscription'); die();
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
            Router::json('error', '.selector', "Au moins un des champs est manquant"); die();
        }

            // check email only js

        // check unique
        $res = Database::query("SELECT * FROM USER WHERE USER_E_MAIL = '{$_REQUEST['email']}'");

        if ($res)
        {
            Router::json('error', '.selector', "Email déjà existant"); die();
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
            Router::json('error', '.selector', "Compte créé"); die();
        } else
        {
            Router::json('error', '.selector', "Compte déjà existant"); die();
        }
    }

    /**
     * read account details
     * id of account
     **/
    public function read()
    {
        $res = Database::query("SELECT USER_NOM,USER_PRENOM,USER_E_MAIL,USER_CP FROM USER WHERE USER_ID = '{$_SESSION['compte']}'");

        Router::json('redirect', '#popUpLogin1','pages/account/compte',["infos" => $res[0]]);
    }


}
