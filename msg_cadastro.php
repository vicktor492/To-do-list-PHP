<?php
    session_start();
    if(isset($_SESSION['msg'])){        
    
?>
<script language='javascript'>
    onload = function(){
        M.toast({html: '<?= $_SESSION["msg"] ?>'});
    }
</script>
<?php
    }
    session_unset();
?>