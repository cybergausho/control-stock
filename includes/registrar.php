<?php 
?>
<br><br><br>

<div id="signup">
    <h3>Regisrarse</h3>
    <form method="post" action="" name="signup">
        <label>Nombre</label>
        <input type="text" name="nombreForm" autocomplete="off" />
        <label>Correo</label>
        <input type="text" name="correoForm" autocomplete="off" />
        <label>DNI</label>
        <input type="text" name="dniForm" autocomplete="off" />
        <label>Password</label>
        <input type="password" name="passwordForm" autocomplete="off" />
        <div class="errorMsg"><?php echo $errorMsgReg; ?></div>
        <input type="submit" class="button" name="signupSubmit" value="Signup">
    </form>
</div>