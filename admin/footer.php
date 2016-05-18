<?php
echo'
<footer>
<div class="container_16">
<div class="grid_16"><p style="margin:5px;">Copyright &copy; '.date('Y').' <b>'; if(isset($company)){echo$company;} echo'</b><img src="images/sepa.png" width="11" height="17" alt="">Powered by <b><font color="#444">Sylver</font><font color="#888">Scales</font></b></p></div>
</div>
</footer>
<div style="position:fixed;bottom:50px;right:20px;z-index:-999;"><img src="images/logo.png" width="200px" style="opacity:50%;"></div>
</center>

</body>
</html>';
?>