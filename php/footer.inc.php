<?php
if ($_SERVER['REQUEST_URI']=='/fletnix/inlog.php' or $_SERVER['REQUEST_URI']=='/fletnix/inlog.php?return=filmoverzicht.php' or $_SERVER['REQUEST_URI']=='/Fletnix/about.php?contact=success'
or $_SERVER['REQUEST_URI']=='/fletnix/account.php' or $_SERVER['REQUEST_URI']=='/fletnix/uitlog.php' or $_SERVER['REQUEST_URI']=='/fletnix/about.php'){
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
