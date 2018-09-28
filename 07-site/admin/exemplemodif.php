<!DOCTYPE html>
<html>
<body>
<?php
    if (isset($_POST['id'])) /* AFFICHAGE DE LA NEWS A MODIFIER*/
    {       $bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
            $reponse = $bdd->prepare('SELECT * FROM news WHERE id= '.$_POST['id'].' ');
            $reponse->execute(array(''));
            while ($donnees = $reponse->fetch())
            {
                        echo'<link rel="stylesheet" href="css/interface_user/page/nrt.css" />
                    <h2 style="background-color:#567C73;">modifier news</h2>
                        <form method="POST" action=""    id="formulaire" enctype="multipart/form-data">
                            <div id="top_interface_user">
                                <div id="timer_zone">';
                                    include ('interface_user/outils/outils_timer.php');
                    echo'       </div>
                                <input type="text"               name="titre"        id="titre"          size="24"   maxlength="256" value= "'.$donnees['titre_news'].'" />
                                <input type="text"               name="descriptif"   id="descriptif"     size="24"   maxlength="256" value= "'.$donnees['descriptif_news'].'" />
                            </div>
 
                            <h3 style="background-color:#567C73;">Boite a outils:</h3>
                            <div id="outils_zone">';
                                include ('interface_user/outils/outils_texte.php');
                    echo'   </div>
 
                            <div id="texte_zone">
                                <textarea                        name="message"  id="message"        rows="16" >'.$donnees['message_news'].'</textarea>
                            </div>
                            <div id="bottom_interface_user">
                                <div id ="note"> <h3 style="background-color:#567C73;">Note</h3>
                                    <textarea                        name="note"         id="note" rows="1">'.$donnees['note_news'].'</textarea>
                            </div>
                                <div id ="prerequis"> <h3 style="background-color:#567C73;">Pré-Requis</h3>
                                    <textarea                        name="prerequis"        id="prerequis" rows="1" > '.$donnees['prerequis_news'].' </textarea>
                                </div>
                                <input type="HIDDEN"             name="id"                   id="id"         value= "'.$donnees['id'].'" />
                                <input type="HIDDEN"             name="timer"                id="timer"      value= "'.$time_timer.'" />
                                <input type="submit"         name="modifier"             id="envoyer"    value="Modifier"/>
                                <input type="button"         name="Aperçu"               id="apercu"     value="Aperçu" />
 
 
                            </div>
                        </form>';
                        echo 'Page de mise a jours des news.</br> Le type est: '.$donnees['type_news'].'.</br> Numero:'.$donnees['id'].'. </br> Le compte a rebour s\'acheve le : '.$donnees['timer_news'].'';               
            }
    }      
                if(isset($_POST['id']) AND isset($_POST['titre']) AND isset($_POST['message']) AND isset($_POST['modifier'])) /* TRAITEMENT DE LA NEWS A MODIFIER*/
                {
                $_POST['timer'] = $time_timer;
                $bdd = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                $req = $bdd->prepare("UPDATE news SET titre_news = :titre, descriptif_news = :descriptif, message_news = :message, note_news = :note, prerequis_news = :prerequis, timer_news = :timer, check_timer = :check_timer  WHERE id = :id");
                $req->execute(array( /* ( La premiere valeur est bien celle de la bdd ? la second celle du post.)*/
                            'titre_news'=> $_POST['titre'],
                            'descriptif_news'=> $_POST['descriptif'],
                            'message_news'=> $_POST['message'],
                            'note_news'=> $_POST['note'],
                            'prerequis_news'=> $_POST['prerequis'],
                            'timer_news'=> $_POST['timer'],
                            'check_timer' => $_POST['check_timer'],
                            'id'=> $_POST['id']
                            ));
                echo 'Peut-être mise a jours  . Ci dessous les valeurs recuperées:</br>';
                echo ''.$_POST['titre'].'</br>';
                echo ''.$_POST['descriptif'].'</br>';
                echo ''.$_POST['message'].'</br>';
                echo ''.$_POST['note'].'</br>';
                echo ''.$_POST['id'].'</br>';
                echo ''.$_POST['check_timer'].'</br>';
                echo ''.$_POST['timer'].'';
                /* A la place des valeurs au dessus il y aura une redirection*/
                }
                else
                {
                echo 'Page de mise a jours des news.</br> Le type est: '.$donnees['type_news'].'.</br> Numero:'.$donnees['id'].'. </br> Le compte a rebour s\'acheve le : '.$donnees['timer_news'].'';
                }