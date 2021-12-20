$(function () {
  var rpt = {};

  rpt.ajax = {
    get_pay_month: function (year, cb) {
      var url = "/report/get_pay_month",
        params = {
          year: year,
        };

      app.ajax(url, params, function (err, data) {
        err ? cb(err) : cb(null, data);
      });
    },
    get_pay_subaccount: function (year, account, cb) {
      var url = "/report/get_pay_subaccount",
        params = {
          year: year,
          account: account,
        };

      app.ajax(url, params, function (err, data) {
        err ? cb(err) : cb(null, data);
      });
    },
  };

  rpt.get_pay_month = function (year) {
    rpt.ajax.get_pay_month(year, function (err, data) {
      if (err) {
        app.alert(err);
        $("#tbl_mrpt_total_status > tbody").append(
          '<tr><td colspan="2">ไม่พบรายการ</td></tr>'
        );
      } else {
        rpt.chart.get_pay_month(data);
      }
    });
  };

  rpt.get_top10 = function (year) {
    rpt.ajax.get_top10(year, function (err, data) {
      if (err) {
        app.alert(err);
        $("#tbl_mrpt_total_status > tbody").append(
          '<tr><td colspan="2">ไม่พบรายการ</td></tr>'
        );
      } else {
        rpt.chart.get_top10(data);
      }
    });
  };

  rpt.chart = {};

  rpt.chart.get_pay_month = function (data) {
    var options = {
      chart: {
        renderTo: "disease_year",
        type: "spline",
      },
      title: {
        text: "รายจ่าย ปี " + $("#txt_year option:selected").text(),
        x: -20, //center
      },
      subtitle: {
        text: "",
        x: -20,
      },
      xAxis: {
        categories: [],
      },
      yAxis: {
        title: {
          text: "จำนวนรายจ่าย",
        },
        plotLines: [
          {
            value: 0,
            width: 1,
            color: "#FF0000",
          },
        ],
      },
      tooltip: {
        valueSuffix: " บาท",
      },
      legend: {
        layout: "vertical",
        align: "right",
        verticalAlign: "middle",
        borderWidth: 0,
      },
      series: [
        {
          name: "จำนวนรายการรับจ่าย",
          data: [],
          color: "#0088FF",
          negativeColor: "#0088FF",
        },
        {
          name: "รายการรับ",
          data: [],
          color: "#00ff37",
          negativeColor: "#00ff37",
        },
        {
          name: "รายจ่าย",
          data: [],
          color: "#FF0000",
          negativeColor: "#FF0000",
        },
      ],
    };

    _.each(data.rows, function (v) {
      options.xAxis.categories.push(v.fullname);
      options.series[0].data.push(parseFloat(v.total * 1));
      options.series[1].data.push(parseFloat(v.income * 1));
      options.series[2].data.push(parseFloat(v.outcome * 1));
    });

    //console.log(options.series);
    new Highcharts.Chart(options);
  };

  $("#btn_show_chart").on("click", function () {
    var data = {};
    data.year = $("#txt_year").val();

    if (!data.year) {
      app.alert("กรุณาระบุปี");
    } else {
      rpt.get_pay_month(data.year);
    }
  });

  rpt.get_pay_month(year);

  /*Start Ghaph subaccount */

  rpt.get_pay_subaccount = function (year, account) {
    rpt.ajax.get_pay_subaccount(year, account, function (err, data) {
      if (err) {
        app.alert(err);
        //$('# > tbody').append('<tr><td colspan="2">ไม่พบรายการ</td></tr>');
      } else {
        rpt.chart.get_pay_subaccount(data);
      }
    });
  };
  rpt.chart.get_pay_subaccount = function (data) {
    var options = {
      chart: {
        renderTo: "subaccount",
        type: "spline",
      },
      title: {
        text: "รายจ่าย ปี " + $("#txt_year option:selected").text(),
        x: -20, //center
      },
      subtitle: {
        text: "",
        x: -20,
      },
      xAxis: {
        categories: [],
      },
      yAxis: {
        title: {
          text: "จำนวนรายจ่าย",
        },
        plotLines: [
          {
            value: 0,
            width: 1,
            color: "#FF0000",
          },
        ],
      },
      tooltip: {
        valueSuffix: " บาท",
      },
      legend: {
        layout: "vertical",
        align: "right",
        verticalAlign: "middle",
        borderWidth: 0,
      },
      series: [
        {
          name: "จำนวนรายการรับจ่าย",
          data: [],
          color: "#0088FF",
          negativeColor: "#0088FF",
        },
        {
          name: "รายการรับ",
          data: [],
          color: "#00ff37",
          negativeColor: "#00ff37",
        },
        {
          name: "รายจ่าย",
          data: [],
          color: "#FF0000",
          negativeColor: "#FF0000",
        },
      ],
    };
    var i = 0;

    _.each(data.rows, function (v) {
      options.xAxis.categories.push(v.fullname);
      options.series[0].data.push(parseFloat(v.total * 1));
      options.series[1].data.push(parseFloat(v.income * 1));
      options.series[2].data.push(parseFloat(v.outcome * 1));
    });

    //console.log(options.series);
    new Highcharts.Chart(options);
  };
  rpt.get_pay_subaccount(year, 1);
  if (app.mobileCheck()) {
    window.location.replace(site_url + "/quick_add");
  }
});
