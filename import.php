<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Import Data Excel Ke Database</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="import_file" class="form-control">
                        <button type="submit" name="save_data" class="btn btn-primary">Import</button>
                    </form>
                </div>
                <div class="btn btn-secondary">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<h4>" . $_SESSION['message'] . "<h4>";
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>