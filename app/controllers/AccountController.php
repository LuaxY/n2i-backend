<?php

class AccountController
{

    /**
     * list accounts
     * no params needed
     */
    public function index()
    {
        return Router::view('pages/account/login');
    }

    /**
     * log in
     * no params needed
     */
    public function login()
    {
        if (empty($_REQUEST["email"]) || empty($_REQUEST["password"]))
        {
            return Router::json('error', '#popUpLogin1 .error', 'Au moins un des champs est manquant');
            //Router::view('pages/account/login',["error"=>"Au moins un des champs est manquant"]); die();
        }
        $pwd =hash('sha512', $_REQUEST["password"].'1mhum4n');
        $res = Database::query("SELECT * FROM USER where USER_E_MAIL= '{$_REQUEST['email']}' and USER_PWD ='{$pwd}' ");
        if (!$res)
        {
            return Router::json('error', '#popUpLogin1 .error', 'Aucun compte trouvé');
            //Router::view('pages/account/login',["error"=>"Aucun compte trouvé"]); die();
        }
        $res = Database::query("SELECT USER_ID FROM USER where USER_E_MAIL= '{$_REQUEST['email']}'");
        $_SESSION["compte"] = $res[0]["USER_ID"];
        //header("location: " . Router::url(""));
        return Router::json('reload', '', '/');
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
        return Router::json('redirect', '#popUpLogin1','pages/account/inscription'); die();
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
            //Router::view('pages/account/inscription',["error"=>"Au moins un des champs est manquant"]); die();
            return Router::json('error', '#popUpLogin2 .error', 'Au moins un des champs est manquant');
        }

            // check email only js

        // check unique
        $res = Database::query("SELECT * FROM USER WHERE USER_E_MAIL = '{$_REQUEST['email']}'");

        if ($res)
        {
            //Router::view('pages/account/inscription',["error"=>"Email déjà existant"]); die();
            //Router::view('pages/error', ['error' => 'Email déjà existant']);
            return Router::json('error', '#popUpLogin2 .error', 'Email déjà existant');
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
            //Router::view('pages/account/inscription',["error"=>"Compte créé"]); die();
            //Router::view('pages/success', ['success' => 'Compte créé, connectez-vous ;)']);
            $_SESSION['flash'] = 'Compte créé, connectez-vous ;)';
            return Router::json('reload', '', '/');
        } else
        {
            //Router::view('pages/account/inscription',["error"=>"Compte déjà existant"]); die();
            //Router::view('pages/error', ['error' => 'Compte déjà existant']);
            return Router::json('error', '#popUpLogin2 .error', 'Compte déjà existant');
        }
    }

    /**
     * read account details
     * id of account
     **/
    public function read()
    {
        $res = Database::query("SELECT USER_NOM,USER_PRENOM,USER_E_MAIL,USER_CP FROM USER WHERE USER_ID = '{$_SESSION['compte']}'");

        return Router::json('redirect', '#popUpLogin1','pages/account/compte',["infos" => $res[0]]);
    }


}
