<?php
include_once '../php/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Statistics - Cloud Storage</title>
    <meta name="description" content=""/>
    <?php include_once  __DIR__ . '../../php/head.php' ?>
  </head>

  <body>
    <!-- header -->
    <?php include_once  __DIR__ . '../../php/header.php' ?>

    <main id="dashboard" class="page-content">
      <section class="container mt-5">
        <h6>Total users & files</h6>
        <div class="card mt-1 mb-3 p-2">
          <div id="total_users_and_files_chart"></div>
        </div>
        <h6>File uploads per week</h6>
        <div class="card mt-1 mb-3 p-2">
          <div id="file_upload_chart"></div>
        </div>
        <h6>Total shares per month</h6>
        <div class="card mt-1 mb-3 p-2">
          <div id="shares_chart"></div>
        </div>
        <h6>Most popular file extensions</h6>
        <div class="card mt-1 mb-3 p-2">
          <div id="extensions_chart"></div>
        </div>
        <h6>Total data size & files per week</h6>
        <div class="card mt-1 mb-3 p-2">
          <select id="chart_toggle">
            <option value="file_size">Total files size</option>
            <option value="file_amount">Total number of files</option>
          </select>
          <div id="data_size_chart"></div>
          <div id="total_files_chart"></div>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php include_once  __DIR__ . '../../php/footer.php' ?>

    <!-- scripts -->
    <?php include_once  __DIR__ . '../../php/js_include.php' ?>
  </body>
</html>
