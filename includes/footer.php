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


    document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("accordionSidebar");

    // Create toggle button if not exists
    const toggleBtn = document.getElementById("sidebarToggleTop");

    if (toggleBtn && sidebar) {

        toggleBtn.addEventListener("click", function () {

            sidebar.classList.toggle("show");

            // overlay handling
            let overlay = document.querySelector(".sidebar-overlay");

            if (!overlay) {
                overlay = document.createElement("div");
                overlay.classList.add("sidebar-overlay");
                document.body.appendChild(overlay);
            }

            overlay.classList.toggle("active");

            // close when clicking overlay
            overlay.addEventListener("click", function () {
                sidebar.classList.remove("show");
                overlay.classList.remove("active");
            });

        });
    }

});

    
// })
</script>
<?php 
// Js Libray
include(BASE_PATH.'includes/script.php'); 
?>

</body>

</html>