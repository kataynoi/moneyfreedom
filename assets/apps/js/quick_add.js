$(function () {
  $("#btn_save").on("click", function (e) {
    e.preventDefault();
     //alert("save");
    var items = {};
    items.action = "insert";
    quick_id = $("#id").val();
    items.date = "";
    items.name = $("#name").val();
    items.price = $("#price").val();
    items.account_id = $("#account_id").val();
    items.subaccount_id = $("#subaccount_id").val();
    items.note = $("#note").val();
    //console.log(quick_id);
    crud.save_quick_add(items,quick_id);
  });
});
var crud = {};

crud.ajax = {
  save: function (items,quick_id, cb) {
    var url = "/pay_items/save_pay_items",
      params = {
        items: items,
        quick_id:quick_id
      };

    app.ajax(url, params, function (err, data) {
      err ? cb(err) : cb(null, data);
    });
  },
};

crud.save_quick_add = function (items,quick_id) {
  crud.ajax.save(items,quick_id, function (err, data) {
    //alert("ajax.save");
    if (err) {
      swal(err);
    } else {
      swal("เพิ่มข้อมูลเรียบร้อย");
      $("#quick_add_modal").modal("hide");
    }
  });
};

$(document).on("click", 'td[data-btn="btn_quick_add"]', function (e) {
  e.preventDefault();
  var quick_id = $(this).data("id");
  var name = $(this).data("name");
  var price = $(this).data("price");
  var account_id = $(this).data("account_id");
  var subaccount_id = $(this).data("subaccount_id");

  $("#name").val(name);
  $("#id").val(quick_id);
  $("#txt_name").html(name);
  $("#price").val(price);
  $("#account_id").val(account_id);
  $("#subaccount_id").val(subaccount_id);
});
