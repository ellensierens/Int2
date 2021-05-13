<?php

require_once( __DIR__ . '/DAO.php');

class ActivityDAO extends DAO {

    public function selectActiviteitById($id){
        $sql = "SELECT `int2_activiteiten`.*, `int2_soorten`.`soort` , `int2_locaties`.`locatie`, `int2_niveaus`.`name` AS `niveau` FROM `int2_activiteiten` 
        INNER JOIN `int2_soorten` ON `int2_activiteiten`.`soort_id` = `int2_soorten`.`id` 
        INNER JOIN `int2_locaties` ON `int2_activiteiten`.`locatie_id` = `int2_locaties`.`id`
        INNER JOIN `int2_niveaus` ON `int2_activiteiten`.`niveau_id` = `int2_niveaus`.`id` WHERE `int2_activiteiten`.`id` = :id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectRandomActiviteiten($id, $aantal){
        $sql = "SELECT `int2_activiteiten`.*, `int2_soorten`.`soort` , `int2_locaties`.`locatie` FROM `int2_activiteiten` 
        INNER JOIN `int2_soorten` ON `int2_activiteiten`.`soort_id` = `int2_soorten`.`id` 
        INNER JOIN `int2_locaties` ON `int2_activiteiten`.`locatie_id` = `int2_locaties`.`id` WHERE `int2_activiteiten`.`id` != :id ORDER BY RAND() LIMIT :aantal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':aantal', $aantal);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAllActiviteiten($niveau = false, $soort = false, $datum = false){
        $sql = "SELECT `int2_activiteiten`.*, `int2_soorten`.`soort` , `int2_locaties`.`locatie`, `int2_niveaus`.`name` AS `niveau` FROM `int2_activiteiten` 
        INNER JOIN `int2_soorten` ON `int2_activiteiten`.`soort_id` = `int2_soorten`.`id` 
        INNER JOIN `int2_locaties` ON `int2_activiteiten`.`locatie_id` = `int2_locaties`.`id`
        INNER JOIN `int2_niveaus` ON `int2_activiteiten`.`niveau_id` = `int2_niveaus`.`id`
        WHERE 1";
        if($soort && $soort != 'all'){
            $sql .=" AND `int2_soorten`.`soort` LIKE :soort";
        }
        if($niveau && $niveau != 'all'){
            $sql .=" AND (`int2_niveaus`.`name` LIKE :niveau OR `int2_niveaus`.`name` LIKE 'iedereen')";
        }

        if($datum){
            if($datum == "oplopend"){
                $sql .= " ORDER BY `recuring` DESC, `datum` ASC ";
            }
            if($datum == "aflopend"){
                $sql .= " ORDER BY `recuring` ASC, `datum` DESC";
            }
        }else{
            $sql .= " ORDER BY `recuring` DESC, `datum` ASC ";
        }

        

        $stmt = $this->pdo->prepare($sql);
        if($niveau){
            $stmt->bindValue(":niveau", $niveau);
        }
        if($soort  && $soort != 'all'){
            $stmt->bindValue(":soort", $soort);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
