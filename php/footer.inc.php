<?php
if ($_SERVER['REQUEST_URI']=='/Fletnix/inlog.php' or $_SERVER['REQUEST_URI']=='/Fletnix/inlog.php?return=filmoverzicht.php' or $_SERVER['REQUEST_URI']=='/Fletnix/about.php?contact=success'
or $_SERVER['REQUEST_URI']=='/Fletnix/account.php' or $_SERVER['REQUEST_URI']=='/Fletnix/uitlog.php' or $_SERVER['REQUEST_URI']=='/Fletnix/about.php' or $_SERVER['REQUEST_URI']=='/Fletnix/error.php'
or $_SERVER['REQUEST_URI']=='/Fletnix/filmoverzicht.php?search=result'){
    echo
        "
        <footer class='fixed'>
            <h4>
                &copy; - Danny Gerritsen en Wout Hakvoort - 2018
        </h4>
        </footer>
        </body>
        </html>
        ";
}
else{
    echo
    "
        <footer>
            <h4>
                &copy; - Danny Gerritsen en Wout Hakvoort - 2018
        </h4>
        </footer>
        </body>
        </html>
        ";
}
?>
