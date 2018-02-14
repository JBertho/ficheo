<?php
/**
 * Date: 13/02/2018
 */
    session_start();
    if(isset($_POST['title']) AND isset($_POST['text']) AND isset($_POST['category'])) {
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['text'] = $_POST['text'];
        $_SESSION['category'] = $_POST['category'];
    }

    function regexTitle(){
        if (isset($_POST['title'])) {
            $NewTitle = stripslashes($_SESSION['titre']);
            $NewTitle = htmlspecialchars($NewTitle);

            return $NewTitle;
        }
        else {
            echo 'Vous n\avez pas entré de titre';
        }
    }

    function regexTexte(){
        if (isset($_POST['text'])) {
            $NewText = stripslashes($_SESSION['texte']);
            $NewText = htmlspecialchars($NewText);
            $NewText = nl2br($NewText);

            $NewText = preg_replace('#\[g\](.+)\[/g\]#isU', '<strong>$1</strong>', $NewText);
            $NewText = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $NewText);
            $NewText = preg_replace('#\[s\](.+)\[/s\]#isU', '<span style="text-decoration: underline;">$1</span>', $NewText);
            $NewText = preg_replace('#\[url=(((https?|ftp)://)?w{3}\.[a-z0-9._/-]+\.[a-z]{2,4}.*)\](.+)\[/url\]#i', '<a href="$1">$4</a>', $NewText);
            $NewText = preg_replace('#\[centre\](.+)\[/centre\]#isU', '<div style="text-align: center;">$1</div>', $NewText);
            $NewText = preg_replace('#\[titre=(.+)\](.+)\[/titre\]#isU', '<h4 id="$1">$2</h4>', $NewText);
            $NewText = preg_replace('#\[stitre=(.+)\](.+)\[/stitre\]#isU', '<h5 id="$1">$2</h5>', $NewText);

            return $NewText;
        }
        else{
            echo 'Vous n\'avez pas entré de texte';
        }
    }

    /* Isoler les es <h4> et <h5> de $NewText et créer des ancres
    function regexPlan(){
        if (isset($_POST['text'])) {
            $NewPlan = stripslashes($_SESSION['plan']);
            $NewPlan = htmlspecialchars($NewPlan);
            $NewPlan = nl2br($NewPlan);

            $NewPlan = preg_replace('#\[a=(.+)\](.+)\[/a\]#isU', '<a href="#$1" class="LiensPlan">$2</a>', $NewPlan);

            return $NewPlan;
        }
    }
    */
