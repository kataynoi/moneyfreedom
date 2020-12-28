$(document).ready(function() {
    var dataTable = $('#table_data').DataTable({
        'createdRow': function (row, data, dataIndex) {
                    $(row).attr('name', 'row'+dataIndex);
                },
        "processing": true,
        "serverSide": true,
        "order": [],

        "pageLength": 50,
        "ajax": {
            url: site_url + '/sum_account/fetch_sum_account',
           data: {
                           'csrf_token': csrf_token
                       },
                       type: "POST"
                   },
                   "columnDefs": [
                       { targets: 'no-sort', orderable: false },
                   ],
                   "paging": false,"searching": false
               });

           });
















