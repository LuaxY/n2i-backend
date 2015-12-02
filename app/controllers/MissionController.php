<?php

class MissionController
{

    /**
     * list missions
     *
     */
    public function index()
    {
        // TODO: list by categories

        $res = Database::query("SELECT * FROM mission");
        echo json_encode($res);
    }

    /**
     * create new mission
     * all required field
     */
    public function create()
    {
        // check required params
        $required = array("nom", "taille", "budget", "description");
        $error_field = array();

        foreach ($required as $r)
        {
            if (empty($_REQUEST[$r]))
                $error_field[] = $r;
        }

        if (!empty($error_field))
            die(json_encode(array("error" => "Les champs ". implode(', ', $error_field) . " sont manquant")));

        // check unique
        /*$res = Database::query("SELECT * FROM mission WHERE Nom = '{$_REQUEST['nom']}'");

        if ($res)
            die(json_encode(array("error" => "Une mission existe déjà sur ce nom")));*/

        $res = Database::save((object)array(
            "Nom" => $_REQUEST['nom'],
            "Taille" => $_REQUEST['taille'],
            "Budget" => $_REQUEST['budget'],
            "Description" => $_REQUEST['description']
        ), "mission");

        if ($res)
            echo json_encode(array("message" => "Mission créé"));
        else
            echo json_encode(array("error" => "Impossible de créer la mission"));
    }

    /**
     * read mission details
     * id of mission
     **/
    public function read()
    {
        if (empty(@$_REQUEST['id']))
            die(json_encode(array("error" => "Aucun identifiant spécifié")));

        $res = Database::query("SELECT * FROM mission WHERE id = {$_REQUEST['id']}");

        if (!$res)
            die(json_encode(array("error" => "Aucune mission trouvé")));

        echo json_encode($res[0]);
    }

    /**
     * update mission info
     * id of mission and field to update
     **/
    public function update()
    {

    }

    /**
     * delete mission
     * id of mission
     **/
    public function delete()
    {
        if (empty(@$_REQUEST['id']))
            die(json_encode(array("error" => "Aucun identifiant spécifié")));

        $res = Database::delete($_REQUEST['id'], 'mission');

        if ($res)
            echo json_encode(array("message" => "Mission supprimé"));
        else
            echo json_encode(array("error" => "Impossible de supprimer la mission"));
    }

    public function search()
    {
        if (empty(@$_REQUEST['value']))
            die(json_encode(array("error" => "Aucun montant spécifié")));

        if (!is_numeric($_REQUEST['value']) || $_REQUEST['value'] <= 0)
            die(json_encode(array("error" => "Valeur du montant incorrect")));

        $result = array();
        $base = array(
            "arbre" => array("Planter %1 arbres", 1),
            "kit" => array("Offrir %1 kits scolaire", 5),
            "medicament" => array("Donner %1 medicaments", 10),
            "repas" => array("Servir de %1 à %2 repas", array(0.2, 2)),
            "ecole" => null
        );

        if (!empty(@$_REQUEST['categorie']) && !empty(@$_REQUEST['continent']))
        {
            $categorie = $_REQUEST['categorie'];
            $continent = $_REQUEST['continent'];

            $res = Database::query("SELECT * FROM mission WHERE Nom = '$categorie'"); // TODO: requete en fonction de la categorie et du continent

            if ($categorie == 'repas')
            {
                foreach ($res as $r)
                {
                    $result[] = array("message" => "Servir ". $_REQUEST['value'] / $r['Budget_requis'] ." repas {$r['Description']}", "association" => 1);
                }
            }
            elseif ($categorie == 'ecole')
            {
                foreach ($res as $r)
                {
                    $result[] = array("message" => "Contribuer à la construction d'une école {$r['Description']}", "association" => 1, "pourcentage" => 100 * $r['Budget_acquis'] / $r['Budget_requis']);
                }
            }
            else
            {
                foreach ($res as $r)
                {
                    $result[] = array("message" => str_replace("%1", $_REQUEST['value'] / $base[$categorie][1], $base[$categorie][0]) . " " . $r['Description'], "association" => 1);
                }
            }

        }
        else
        {
            foreach ($base as $categorie => $details)
            {
                if ($categorie == "repas")
                {
                    $r = $details[0];

                    $r = str_replace("%1", $_REQUEST['value'] / $details[1][1], $r);
                    $r = str_replace("%2", $_REQUEST['value'] / $details[1][0], $r);

                    $result[$categorie] = $r;
                }
                elseif ($categorie == "ecole")
                {
                    $result[$categorie] = "Contribuer à la construction d'une école";
                }
                else
                {
                    $result[$categorie] = str_replace("%1", $_REQUEST['value'] / $details[1], $details[0]);
                }
            }
        }

        echo json_encode($result);
    }

}
