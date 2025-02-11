<style>
    /* style.css */

/* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

h3 {
    margin-bottom: 20px;
    color: #007bff;
}

/* Table Styles */
.table {
    margin-bottom: 30px;
    border-radius: 5px;
    overflow: hidden;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.text-truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Chart Styles */
#piechart {
    width: 100%;
    height: 400px;
    margin: auto;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table, .bieudo1, .bieudo2 {
        width: 100%;
        overflow-x: auto;
    }

    .bieudo1, .bieudo2 {
        padding: 0 10px;
    }
}

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/be9ed8669f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../giaodien/style.css">
</head>

<body>
    <?php include "view/component/header.php"; ?>
    <!-- END HEADER -->

    <!-- CONTENT -->
    <main class="d-flex container">
        <!-- Sidebar trái -->
        <?php include "view/component/sidebar.php"; ?>

        <!-- Main content -->
        <div class="bieudo1 pt-4 ms-4 me-4">
            <h3 style="height: 70px;">Thông kê sản phẩm theo danh mục</h3>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Số lượng tổng kho</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dsthongKe as $tk) { ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td>
                                <div class="text-truncate" style="width: 100px;">
                                    <?= $tk->cate_name ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-truncate" style="width: 100px;">
                                    <?= $tk->total_quantity ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h3 class="text-center mt-5">Biểu đồ</h3>
            <div id="piechart"></div>
        </div>

        <div class="bieudo2 pt-4 ms-4 me-4">
    
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng bán được</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dsSold_M7 as $tk) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <div class="text-truncate" style="width: 100px;">
                                    <?= $tk->pro_name ?>
                                </div>
                            </td>
                            <td>
                                <div class="text-truncate" style="width: 100px;">
                                    <?= $tk->total_pro_bill ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- End main content -->
    </main>
    <!-- FOOTER -->
    <?php include "view/component/footer.php"; ?>
    <!-- END FOOTER -->

    <!-- External JS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên danh mục', 'Số lượng sản phẩm'],
                <?php foreach ($dsthongKe as $tk) : ?>['<?= $tk->cate_name ?>', <?= $tk->total_quantity ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                'title': 'Thống kê sản phẩm theo danh mục',
                'width': 550,
                'height': 400
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>
