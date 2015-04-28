<html>
<head>
    <title>Pams link parser</title>
</head>
<body>

<h3>PAMS link parser</h3>
<hr />


<?php
if(isset($_POST['submit']) && $_POST['submit'] == 1){

    $count = preg_match_all('/href="[^"]+"/', $_POST['tehcodez']);

   echo '<p>Replaced: ' . $count . (($count == 1)? ' link':' links') . '</p>';
    echo '<textarea cols="80" rows="30">' . preg_replace_callback('/href="[^"]+"/',
            function($matches){
                $prepend = 'href="http://www.vetuk.co.uk/link.php?href=';
                return $prepend . urlencode($matches[0]) . '"';
            }, preg_replace('/[<]/', '&lt;', $_POST['tehcodez'])) . '</textarea>';
}else{
    ?>

    <p>Paste HTML code in the box and hit 'OK'</p>
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post">
        <textarea name="tehcodez" cols="80" rows="30"></textarea>
        <button type="submit" name="submit" value="1">OK</button>
    </form>

<?php
}
?>
</body>
</html>