<?php

class AssociationController
{

    public function index()
    {
        $res = Database::query("SELECT * FROM association");
        echo json_encode($res);
    }

    public function create()
    {

    }

    public function read()
    {
        $res = Database::query("SELECT DISTINCT A.Nom, A.Email_siege, A.Site_web,L.Continent
            FROM association_has_mission AM, association A, mission M, mission_has_localisation ML, localisation L
            WHERE A.id = AM.FK_idAssociation
            AND AM.FK_idMission = M.id
            AND M.id = ML.FK_idMission
            AND ML.FK_idLocalisation = L.id
            AND L.Continent = '{$_REQUEST['continent']}'
            AND M.id = '{$_REQUEST['element']}'");

        if (!$res)
            die(json_encode(array("error" => "Aucune association trouvée")));

        echo json_encode($res[0]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
