<?php require "Templates/header.php";?>

<h1>Fail...</h1>
<?php echo "FAIL   ".date($_POST['birthdate']); ?>
<a href="?p=">Home</a>


<?php include "Templates/footer.php"?>