<div>
    <form action="../submission.php" method="post">
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Last Name"  required/>          
        </div>
        <button id=taskbutton type="submit" class="btn btn-primary">Submit Name</button>
    </form>
</div>



<?php
$lastname = $_POST['lastname'];
echo "<span class= \"testtext\">$lastname</span>";
?>