$(document).ready(function() {

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(shares_chart);
  google.charts.setOnLoadCallback(file_upload_chart);
  google.charts.setOnLoadCallback(total_users_and_files_chart);
  google.charts.setOnLoadCallback(extensions_chart);
  google.charts.setOnLoadCallback(data_size_chart);
  google.charts.setOnLoadCallback(total_files_chart);

  function shares_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_shares_data.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Month', 'Shares']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Shares per month', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('shares_chart'));
        chart.draw(data, options);
      }
    });
  }

  function file_upload_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_file_upload.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Week', 'Uploads']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Uploads per week', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('file_upload_chart'));
        chart.draw(data, options);
      }
    });
  }

  function total_users_and_files_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_users_and_files.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Month', 'Users', 'Files']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value.user, value.file]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Total users & files', 'width':1000, 'height':350, 'colors':['#8190ff','#0a102d']};
        var chart = new google.visualization.LineChart(document.getElementById('total_users_and_files_chart'));
        chart.draw(data, options);
      }
    });
  }

  function extensions_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_extensions.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Extension', 'Percentage']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Most popular file extensions', 'width':1000, 'height':350, 'colors':['#0a102d','#122772','#8190ff','#c2cad0','#424866','#333333']};
        var chart = new google.visualization.PieChart(document.getElementById('extensions_chart'));
        chart.draw(data, options);
      }
    });
  }

  function data_size_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_data_size.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Week', 'Size in GB']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Total data size per week', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('data_size_chart'));
        chart.draw(data, options);
      }
    });
  }

  function total_files_chart() {
    $.ajax({
      type : 'post',
      url : 'admin/php/chart_total_files.php',
      dataType : 'json',
      success : (db_data) =>
      {
        var dataArray = [['Week', 'Files']];

        // convert json data to a datatable for google API
        db_data.forEach(function (obj) {
          for (let [key, value] of Object.entries(obj)) {
            dataArray.push([key, value]);
          }
        });

        var data = google.visualization.arrayToDataTable(dataArray);

        var options = {'title':'Total files per week', 'width':1000, 'height':350, 'colors':['#8190ff']};
        var chart = new google.visualization.ColumnChart(document.getElementById('total_files_chart'));
        chart.draw(data, options);

        $('#total_files_chart').css('display', 'none');
      }
    });
  }

  // chart selectbox function
  $('#chart_toggle').on('change', function() {
    let selected = $(this).children("option:selected").val();

    if (selected == 'file_size') {
      $(this).closest('.card').find('#data_size_chart').css('display', 'block');
      $(this).closest('.card').find('#total_files_chart').css('display', 'none');
    }
    else {
      $(this).closest('.card').find('#data_size_chart').css('display', 'none');
      $(this).closest('.card').find('#total_files_chart').css('display', 'block');
    }
  });

});
