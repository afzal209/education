<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
// $(document).ready(function() {
    $('.pay_link').on('click', function() {
        
        var id = $(this).data('id');
        // console.log(id);
        $('.pay_prof').attr("src", id);
        // $('.modal').modal('show');
    });
    function close(val){
        $(val).modal('hide');
    }
// })
</script>
<?php 
// Js Libray
include(BASE_PATH.'includes/script.php'); 
?>

</body>

</html>