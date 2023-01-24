<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>Export Database Ke Excel</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <select name="export_file_type" id="form-control">
                            <option value="xlsx">XLSX</option>
                            <option value="xls">XLS</option>
                            <option value="csv">CSV</option>
                        </select>
                        <select name="export_from" id="form-control">
                            <option value="Pesanan">Pesanan</option>
                            <option value="Toko">Toko</option>
                            <option value="Angkutan">Angkutan</option>
                        </select>
                        <button type="submit" name="export_data" class="btn btn-primary">Export</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>