<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/education/config.php';
	include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Forget Password");
?>

            <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Forget Password</h2>
                </div>
                <div class="card-body">
                    <?php 
                        if (!empty($_GET['response'])) {
                            echo '<div class="alert alert-' . htmlspecialchars($_GET['class']) . '">
                                    <strong>' . ucfirst(htmlspecialchars($_GET['response'])) . '!</strong> ' . htmlspecialchars($_GET['message']) . '
                                  </div>';
                        }
                    ?>
                    <form method="POST" action="phpScript/forgotpass_script.php">
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'" />
                            <label for="email">Email</label>
                        </div>
                    
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" name="submit" class="btn btn-primary flex-grow-1">Forget Password</button>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once(BASE_PATH.'/includes/footer.php'); 
?>