$(document).ready(function() {
    $('#get_data').on('click',function(){
        CalldataTable(1);
    });
    //CalldataTable();
});

    CalldataTable = function(param1=null) { $('#table_data').DataTable({
        'createdRow': function (row, data, dataIndex) {
                    $(row).attr('name', 'row'+dataIndex);
         },
         "footerCallback": function (row, data, start, end, display) {
                            var api = this.api(), data;

                            total = api
                                .column(2)
                                .data()
                                .reduce(function (a, b) {
                                    return app.intVal(a) + app.intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(2).footer()).html(
                                total
                            );
        },
        "processing": true,
        "serverSide": true,
        "order": [],

        "pageLength": 50,
        "ajax": {
            url: site_url + '/report1/fetch_report1',
           data: {
                           'csrf_token': csrf_token,
                           'param1':param1
                       },
                       type: "POST"
                   },
                   "columnDefs": [
                       { targets: 'no-sort', orderable: false },
                   ],
                   "paging": false,"searching": false
               });

            }    
















