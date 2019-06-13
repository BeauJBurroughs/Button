<?php

echo 'Hello ' . htmlspecialchars($_POST["submit"]) . '! ';

$file = "./buttonState.txt";
$current = file_get_contents($file);

if ($_POST["submit"]=="Open" and $current=="0")
{
    echo "Gate relay pull from " . $current ;
    $current="1";
    echo " to new state = " . $current;
    file_put_contents($file, $current);
}
elseif ($_POST["submit"]=="Open" and $current=="1")
{
    echo "Gate relay release from " . $current;
    $current="0";
    echo " to new state = " . $current;
    file_put_contents($file, $current);
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="button.css">
</head>
<body onload="toggleColor()">


<h2>Animated Buttons - "Pressed Effect"</h2>

<form action="index.php" method="post">
<input class="button" type="submit" name="submit" value="Open" id="btn_O">
<input class="button" type="submit" name="submit" value="Close" id="btn_C">
</form>

<script>
function toggleColor(){
 if (<?php echo $current; ?>  == "1"){
 document.getElementById("btn_O").classList.add('toggle');
 }else {
 document.getElementById("btn_O").classList.remove('toggle');
 }
}
</script>

</body>
</html>
