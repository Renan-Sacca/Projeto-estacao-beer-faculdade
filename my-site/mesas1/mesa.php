<html>
<head>
    <meta charset="utf-8">
<title>MESA </title>
</head>

<?php
$mesa = $_GET['mesa'];

?>

<frameset rows=25%,75%>
<frame SRC=banner.php>
<frameset cols=17%,75%>
<frame SRC=menu.php?mesa=<?php echo $mesa?>>
<frame name="form">
<!--<frame SRC=get_mesa.php?mesa=<?php //echo $mesa?>>-->
</frameset>
</frameset></html>
</html>