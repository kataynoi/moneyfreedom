$(document).ready(function () {
  $("#get_data").on("click", function () {
      let param1=$("#param1").val();
      let param2=$("#param2").val()+"-"+$("#param3").val();
      
    CalldataTable(param1,param2);
  });
});
//var table = $("#table_data").DataTable({});
CalldataTable = function (param1 = null,param2) {
  var table = $("#table_data").DataTable({
    createdRow: function (row, data, dataIndex) {
      $(row).attr("name", "row" + dataIndex);
    },
    footerCallback: function (row, data, start, end, display) {
      var api = this.api(),
        data;

      total = api
        .column(2)
        .data()
        .reduce(function (a, b) {
          return app.intVal(a) + app.intVal(b);
        }, 0);

      // Update footer
      $(api.column(2).footer()).html(total);
    },
    processing: true,
    serverSide: true,
    order: [],

    pageLength: 50,
    ajax: {
      url: site_url + "/report_pay_month/fetch_report_pay_month",
      data: {
        csrf_token: csrf_token,
        param1: param1,
        param2: param2,
      },
      type: "POST",
    },
    columnDefs: [{ targets: "no-sort", orderable: false }],
    paging: false,
    searching: false,
    stateSave: true,
    "bDestroy": true,
    "initComplete": function(settings, json) {
      data = table.rows().data()
      console.log(data);
      var categories = []; //creating array for storing browser type in array.
      var series_data = [];
      for (var i = 0; i < data.length; i++) {
        categories.push(data[i][0])
        //series_data.push(Number([data[i][2].match(/\d/g).join("")]))
        series_data.push(Number(data[i][2]))
      }
      console.log(categories);
      console.log(series_data);
      plotChart(categories, series_data)
    }

  });
};


function plotChart(categories, series_data) {
  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    xAxis: {
      categories: categories
    },
    yAxis: {

      title: {
        text: 'Count'
      }
    },
    series: [{
      name: 'ค่าใช้จ่าย',
      data: series_data
    }]

  });
}
