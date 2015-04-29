<!DOCTYPE html>
<html>
<head>
    <title>Pams link parser</title>
    <style>
        textarea {
            display: block;
            width: 100%;
        }
    </style>
</head>
<body>

<div style="width:600px; margin: 0 auto">

<h3>PAMS link parser</h3>
<hr />


<?php
if(isset($_POST['submit']) && $_POST['submit'] == 1){

    $count = preg_match_all('/href="[^"]+"/', $_POST['tehcodez']);

   echo '<p>Replaced: ' . $count . (($count == 1)? ' link':' links') . '</p>';
    echo '<textarea id="tehcodez"  rows="25">' . preg_replace_callback('/href="[^"]+"/',
            function($matches){
                $prepend = 'href="http://www.vetuk.co.uk/link.php?href=';
                return $prepend . urlencode($matches[0]) . '"';
            }, preg_replace('/[<]/', '&lt;', $_POST['tehcodez'])) . '</textarea>';

    echo '<p>Click in the box and copy the converted code (CTRL+C)</p>';

    ?>
    <script type="text/javascript">
        var tehcodez = document.getElementById('tehcodez');
        tehcodez.addEventListener('focus', function () {
            this.select();
        }, false);

    </script>
<?php
}else{
    ?>

    <p>Paste HTML code in the box and hit 'OK'</p>
    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post">
        <textarea id="tehcodez" name="tehcodez" rows="25"></textarea>
        <button style="display: block; width: 100%; margin-top: 1em; padding: 1em 0;" type="submit" name="submit"
                value="1">OK
        </button>
    </form>



<?php
}
?>


</div>
</body>
</html>