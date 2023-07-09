<?php
 
function protection($texte) {
    global $conn;
    if (!empty($texte)) {
        $texte = mysqli_real_escape_string($conn, $texte);
    }
    return $texte;
}

function getArraySQL($commandLine) {
    global $conn;


    // On fait l'entaite
    $result = mysqli_query($conn, $commandLine);
    $liste = array();
    $resultLine = mysqli_fetch_assoc($result);


    // Remplissage le tableau avec les resultats
    while ($resultLine != NULL) {
        array_push($liste,$resultLine);
        $resultLine = mysqli_fetch_assoc($result);
    }
    return $liste;
}

function getPost($id_post, $nbr_Com) {
    $idpost = $id_post;
    $nbrCom = $nbr_Com;

    include 'post.php';
}

function getActualDate() {
    return date("Y-m-d H:i:s");
}


// ajouter un post
function addPost($id_posteur, $message, $public){
    global $conn ;
    
    // protection de la base de donnée
    $message = protection($message);
    $heure_date_publication = getActualDate();
    
    $req = "INSERT INTO POST(id_posteur, message, heure_date_publication, public) 
                    VALUES(".$id_posteur.",'".$message."','".$heure_date_publication."',".$public.")" ;
    
    
    // envoie de la requete à la base mysql
    mysqli_query($conn, $req);
}

// retourn le nombre de post d'un utilisateur à publier
// $public=1 affiche seulement les commentaires privé et $public=0 affiche tout les commentaires
function nbrPost($pseudo, $public){
    global $conn ;
    $command = "SELECT id FROM Utilisateur WHERE pseudo='".$pseudo."'";
    $query = mysqli_query($conn,$command);
    $id_user = mysqli_fetch_array(mysqli_query ($conn, $command))[0] ;
    
    if ($public === 1){
        //compte seulement les posts public
        $command = "SELECT SUM(public) FROM Post WHERE id_posteur=".(int)$id_user ;
    }else{
        // compte tout les posts 
        $command = "SELECT COUNT(message) FROM Post WHERE id_posteur=".(int)$id_user ;
    }
    
    // récupération du résultat
    $res =  mysqli_fetch_array(mysqli_query ($conn, $command))[0] ;
    
    return $res ;
}


// affiche tous les postes d'un utilisateur
// $public=1 affiche seulement les commentaires privé et $public=0 affiche tout les commentaires
function getAllPost($pseudo, $public){
    global $conn ;
    
    $id_user =   mysqli_fetch_array(mysqli_query ($conn, "SELECT id FROM Utilisateur WHERE pseudo='".$pseudo."'"))[0] ;

    $command_res_all_post_id  = "SELECT * FROM Post WHERE id_posteur=".(int)$id_user ;

    $res_all_post = getArraySQL($command_res_all_post_id) ;
    

    // appelle plusieurs fois la fonction juste au dessus
    for ($i = 0 ; $i < count($res_all_post) ; $i++ ){

        // pemet de tester si le posts est publi ou privé
        if ($public === 1){
            if (1 == $res_all_post[$i]['public']) getPost($res_all_post[$i]['id_post'], 0) ;
        }else getPost($res_all_post[$i]['id_post'], 0) ;
    }

    
}

// affiche les n posts les plus récents
function getRecentPosts($nbrPost){
    global $conn ;

    // récupération n derniers lignes dans la table de données Post
    $command = "SELECT id_post FROM Post ORDER BY id_post DESC LIMIT ".$nbrPost ;

    $res =  getArraySQL($command) ;

    for ($i = 0  ; $i < count($res)  ; $i++ ){
        if ($res[$i]['id_post'] !== NULL) {

            // En fonction dela machine utilisé, il peut se produire une si le nombre de commentaire est non nul 
        
            getPost($res[$i]['id_post'], 0) ;
        }
    }

}

 ?>