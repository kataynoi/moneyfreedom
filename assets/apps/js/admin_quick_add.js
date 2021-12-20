$(document).ready(function () {
  var dataTable = $("#table_data").DataTable({
    createdRow: function (row, data, dataIndex) {
      $(row).attr("name", "row" + dataIndex);
    },
    processing: true,
    serverSide: true,
    order: [],

    pageLength: 50,
    ajax: {
      url: site_url + "/admin_quick_add/fetch_admin_quick_add",
      data: {
        csrf_token: csrf_token,
      },
      type: "POST",
    },
    columnDefs: [
      {
        targets: [1, 2],
        orderable: false,
      },
    ],
  });
});

var crud = {};

crud.ajax = {
  del_data: function (id, cb) {
    var url = "/admin_quick_add/del_admin_quick_add",
      params = {
        id: id,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
  save: function (items, cb) {
    var url = "/admin_quick_add/save_admin_quick_add",
      params = {
        items: items,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
  get_update: function (id, cb) {
    var url = "/admin_quick_add/get_admin_quick_add",
      params = {
        id: id,
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
};
crud.del_data = function (id) {
  crud.ajax.del_data(id, function (err, data) {
    if (err) {
      swal(err);
    } else {
      //swal('ลบข้อมูลเรียบร้อย')
      app.alert("ลบข้อมูลเรียบร้อย");
    }
  });
};

crud.save = function (items, row_id) {
  crud.ajax.save(items, function (err, data) {
    if (err) {
      //app.alert(err);
      swal(err);
    } else {
      if (items.action == "insert") {
        crud.set_after_insert(items, data.id);
      } else if (items.action == "update") {
        crud.set_after_update(items, row_id);
      }
      $("#frmModal").modal("toggle");
      swal("บันทึกข้อมูลเรียบร้อยแล้ว ");
    }
  });
};

crud.get_update = function (id, row_id) {
  crud.ajax.get_update(id, function (err, data) {
    if (err) {
      //app.alert(err);
      swal(err);
    } else {
      //swal('แก้ไขข้อมูลเรียบร้อยแล้ว ');
      //location.reload();
      crud.set_update(data, row_id);
    }
  });
};

crud.set_after_update = function (items, row_id) {
  var row_id = $('tr[name="' + row_id + '"]');
  row_id.find("td:eq(0)").html(items.id);
  row_id.find("td:eq(1)").html(items.shortname);
  row_id.find("td:eq(2)").html(items.name);
  row_id.find("td:eq(3)").html(items.price);
  row_id.find("td:eq(4)").html(items.account_id);
  row_id.find("td:eq(5)").html(items.subaccount_id);
};
crud.set_after_insert = function (items, id) {
  $(
    '<tr name="row' +
      (id + 1) +
      '"><td>' +
      id +
      "</td>" +
      "<td>" +
      items.id +
      "</td>" +
      "<td>" +
      items.shortname +
      "</td>" +
      "<td>" +
      items.name +
      "</td>" +
      "<td>" +
      items.price +
      "</td>" +
      "<td>" +
      items.account_id +
      "</td>" +
      "<td>" +
      items.subaccount_id +
      "</td>" +
      '<td><div class="btn-group pull-right" role="group">' +
      '<button class="btn btn-outline btn-success" data-btn="btn_view" data-id="' +
      id +
      '"><i class="fa fa-eye"></i></button>' +
      '<button class="btn btn-outline btn-warning" data-btn="btn_edit" data-id="' +
      id +
      '"><i class="fa fa-edit"></i></button>' +
      '<button class="btn btn-outline btn-danger" data-btn="btn_del" data-id="' +
      id +
      '"><i class="fa fa-trash"></i></button>' +
      "</td></div>" +
      "</tr>"
  ).insertBefore("table > tbody > tr:first");
};

crud.set_update = function (data, row_id) {
  $("#row_id").val(row_id);
  $("#id").val(data.rows["id"]);
  $("#shortname").val(data.rows["shortname"]);
  $("#name").val(data.rows["name"]);
  $("#price").val(data.rows["price"]);
  $("#account_id").val(data.rows["account_id"]);
  $("#subaccount_id").val(data.rows["subaccount_id"]);
};

$("#btn_save").on("click", function (e) {
  e.preventDefault();
  var action;
  var items = {};
  var row_id = $("#row_id").val();
  items.action = $("#action").val();
  // items.brand_name = $("#brand option:selected").text();
  items.id = $("#id").val();
  items.shortname = $("#shortname").val();
  items.name = $("#name").val();
  items.price = $("#price").val();
  items.account_id = $("#account_id").val();
  items.subaccount_id = $("#subaccount_id").val();

  if (validate(items)) {
    crud.save(items, row_id);
  }
});

$("#add_data").on("click", function (e) {
  e.preventDefault();
  $("#frmModal input").prop("disabled", false);
  $("#frmModal select").prop("disabled", false);
  $("#frmModal textarea").prop("disabled", false);
  $("#frmModal .btn").prop("disabled", false);
  $("#action").val("insert");
  app.clear_form();
});

$(document).on("click", 'button[data-btn="btn_del"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  var td = $(this).parent().parent().parent();

  swal({
    title: "คำเตือน?",
    text: "คุณต้องการลบข้อมูล ",
    icon: "warning",
    buttons: ["cancel !", "Yes !"],
    dangerMode: true,
  }).then(function (isConfirm) {
    if (isConfirm) {
      crud.del_data(id);
      td.hide();
    }
  });
});

$(document).on("click", 'button[data-btn="btn_edit"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $("#action").val("update");
  $("#id").val(id);
  var row_id = $(this).parent().parent().parent().attr("name");
  $("#frmModal input").prop("disabled", false);
  $("#frmModal select").prop("disabled", false);
  $("#frmModal textarea").prop("disabled", false);
  $("#frmModal .btn").prop("disabled", false);

  crud.get_update(id, row_id);
  $("#frmModal").modal("show");
});

$(document).on("click", 'button[data-btn="btn_view"]', function (e) {
  e.preventDefault();
  var id = $(this).data("id");
  $("#action").val("update");
  $("#id").val(id);
  var row_id = $(this).parent().parent().parent().attr("name");
  crud.get_update(id, row_id);
  $("#frmModal input").prop("disabled", true);
  $("#frmModalselect").prop("disabled", true);
  $("#frmModaltextarea").prop("disabled", true);
  $("#frmModal .btn").prop("disabled", true);
  $("#btn_close").prop("disabled", false);
  $("#frmModal").modal("show");
});

function validate(items) {
   if (!items.shortname) {
    swal("กรุณาระบุชื่อสั้นๆ");
    $("#shortname").focus();
  } else if (!items.name) {
    swal("กรุณาระบุ");
    $("#name").focus();
  } else if (!items.price) {
    swal("กรุณาระบุราคา");
    $("#price").focus();
  } else if (!items.account_id) {
    swal("กรุณาระบุบัญชีหลัก");
    $("#account_id").focus();
  } else if (!items.subaccount_id) {
    swal("กรุณาระบุบัญชีรอง");
    $("#subaccount_id").focus();
  } else {
    return true;
  }
}
