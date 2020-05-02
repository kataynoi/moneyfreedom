$(function(){

    var rpt = {};

    rpt.ajax = {

        get_pay_month: function(year, cb){
            var url = '/report/get_pay_month',
                params = {
                    year: year
                };

            app.ajax(url, params, function(err, data){
                err ? cb(err) : cb(null, data);
            });
        },get_top10: function(year, cb){
            var url = '/pages/get_top10',
                params = {
                    year: year
                };

            app.ajax(url, params, function(err, data){
                err ? cb(err) : cb(null, data);
            });
        }
    }


    rpt.get_pay_month = function(year)
    {
        rpt.ajax.get_pay_month(year,function(err, data){

            if(err)
            {
                app.alert(err);
                $('#tbl_mrpt_total_status > tbody').append('<tr><td colspan="2">ไม่พบรายการ</td></tr>');
            }
            else
            {
                rpt.chart.get_pay_month(data);
            }
        });
    };

    rpt.get_top10 = function(year)
    {
        rpt.ajax.get_top10(year,function(err, data){


            if(err)
            {
                app.alert(err);
                $('#tbl_mrpt_total_status > tbody').append('<tr><td colspan="2">ไม่พบรายการ</td></tr>');
            }
            else
            {
                rpt.chart.get_top10(data);
            }
        });
    };

    rpt.chart = {};

    rpt.chart.get_pay_month = function(data){
        var options = {
            chart: {
                renderTo: 'disease_year',
                type: 'spline'
            },
            title: {
                text: 'รายจ่าย ปี '+$('#txt_year option:selected').text(),
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'จำนวนรายจ่าย'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#FF0000'
                }]
            },
            tooltip: {
                valueSuffix: ' บาท'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'จำนวนรายการรับจ่าย',
                data: [],
                color: '#0088FF',
                negativeColor: '#FF0000'
            },{
                name: 'รายการรับ',
                data: [],
                color: '#00ff37',
                negativeColor: '#00ff37'
            },{
                name: 'รายจ่าย',
                data: [],
                color: '#FF0000',
                negativeColor: '#FF0000'
            }]



        };

        _.each(data.rows, function(v){
            options.xAxis.categories.push(v.fullname);
            options.series[0].data.push(parseFloat(v.total*1));
            options.series[1].data.push(parseFloat(v.income*1));
            options.series[2].data.push(parseFloat(v.outcome*1));
        });

        //console.log(options.series);
        new Highcharts.Chart(options);
    };

    rpt.chart.get_top10 = function(data){
        var options = {
            chart: {
                renderTo: 'top10',
                type: 'pie'
            },
            title: {
                text: 'จำนวนผู้ป่วย โรคทางระบาดวิทยา 10 อันดับแรก',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: 'จำนวนผู้ป่วย ( ราย)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' ราย'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'จำนวนอุบัติเหตุ',
                data: []
            }]



        };

        _.each(data.rows, function(v){
            options.series[0].data.push(Array(v.name,parseFloat(v.total*1)));
        });
        new Highcharts.Chart(options);
    };

    $('#btn_show_chart').on('click', function(){
        var data = {};
        data.year = $('#txt_year').val();

        if(!data.year)
        {
            app.alert('กรุณาระบุปี');
        }
        else
        {
            rpt.get_pay_month(data.year);
        }
    });

    $("#sl_code506").removeAttr('selected').find(':first').attr('selected','selected');
    $("#txt_year").removeAttr('selected').find(':last').attr('selected','selected');

    rpt.get_pay_month(year);
});