/**
 * Main application script
 */
var app = {
  show_loading: function () {
    $.blockUI({
      css: {
        border: "none",
        padding: "15px",
        backgroundColor: "#000",
        "-webkit-border-radius": "10px",
        "-moz-border-radius": "10px",
        opacity: 1,
        color: "#fff",
      },
      message: "<h4>Loading </h4>",
    });
  },

  hide_loading: function () {
    $.unblockUI();
  },
  show_block: function (obj) {
    $(obj).block({
      css: {
        border: "none",
        padding: "15px",
        backgroundColor: "#000",
        "-webkit-border-radius": "10px",
        "-moz-border-radius": "10px",
        opacity: 1,
        color: "#fff",
      },
      message: "<h4> Loading...</h4>",
    });
  },
  hide_block: function (obj) {
    $(obj).unblock();
  },

  mysql_to_thai_date: function (d) {
    if (!d) {
      return "-";
    } else {
      var date = d.split("-");

      var dd = date[2],
        mm = date[1],
        yyyy = parseInt(date[0]) + 543;

      return dd + "/" + mm + "/" + yyyy;
    }
  },

  thai_to_datepicker: function (d) {
    if (!d) {
      return "-";
    } else {
      var date = d.split("/");

      var dd = date[0],
        mm = date[1],
        yyyy = parseInt(date[2]) - 543;

      return dd + "/" + mm + "/" + yyyy;
    }
  },

  count_age: function (d) {
    if (!d) {
      return 0;
    } else {
      var d = d.split("-");
      var year_birth = d[0];
      var year_current = new Date();
      var year_current2 = year_current.getFullYear();

      var age = year_current2 - parseInt(year_birth);

      return age;
    }
  },

  go_to_url: function (url) {
    location.href = site_url + url;
  },
  /**
   * Ajax
   *
   * @param url
   * @param params
   * @param cb
   */
  ajax: function (url, params, cb) {
    params.csrf_token = csrf_token;

    app.show_loading();

    try {
      $.ajax({
        url: site_url + url,
        type: "POST",
        dataType: "json",

        data: params,

        success: function (data) {
          if (data.success) {
            if (data) {
              cb(null, data);
            } else {
              cb("Record not found.", null);
            }

            app.hide_loading();
          } else {
            cb(data.msg, null);
            app.hide_loading();
          }
        },

        error: function (xhr, status) {
          cb("Error:  [" + xhr.status + "] " + xhr.statusText, null);
          app.hide_loading();
        },
      });
    } catch (err) {
      cb(err, null);
    }
  },
  ajax_cross: function (url, params, cb) {
    params.csrf_token = csrf_token;

    app.show_loading();

    try {
      $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: params,
        success: function (data) {
          cb(data);
          app.hide_loading();
        },
        error: function (xhr, status) {
          cb("Error:  [" + xhr.status + "] " + xhr.statusText, null);
          app.hide_loading();
        },
      });
    } catch (err) {
      cb(err, null);
    }
  },

  alert: function (msg, title) {
    if (!title) {
      title = "Messages";
    }

    $("#freeow").freeow(title, msg, {
      //classes: ["gray", "error"],
      classes: ["gray"],
      prepend: false,
      autoHide: true,
    });
  },

  set_first_selected: function (obj) {
    $(obj).find("option").first().attr("selected", "selected");
  },

  trim: function (string) {
    return $.trim(string);
  },

  add_commars: function (str) {
    var my_number = numeral(str).format("0,0.00");

    return my_number;
  },

  add_commars_with_out_decimal: function (str) {
    var my_number = numeral(str).format("0,0");

    return my_number;
  },

  clear_null: function (v) {
    return v == null ? "-" : v;
  },

  set_cookie: function (k, v) {
    $.cookie(k, v);
  },
  clear_form: function () {
    $("input[type=text],input[type=password], textarea").val("");
    //$("option:first").attr('selected','selected');
    $("select").val($("#target option:first").val());
  },
  get_cookie: function (k) {
    $.cookie(k);
  },

  strip: function (str, len) {
    if (!str) {
      return "-";
    } else {
      if (str.length <= len) {
        return str;
      } else {
        return str.substr(0, len) + "...";
      }
    }
  },
  intVal: function (i) {
    return typeof i === "string"
      ? i.replace(/[\$,]/g, "") * 1
      : typeof i === "number"
      ? i
      : 0;
  },
  mobileCheck: function () {
    let check = false;
    (function (a) {
      if (
        /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(
          a
        ) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
          a.substr(0, 4)
        )
      )
        check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
  },
};
//Record pre page
app.record_per_page = 25;

app.set_runtime = function () {
  $('input[data-type="date"]').mask("99/99/9999");
  $('input[data-type="time"]').mask("99:99");
  $('input[data-type="year"]').mask("9999");
  $('input[data-type="number"]').numeric();
  $("input[disabled]").css("background-color", "white");
  $("select[disabled]").css("background-color", "white");
  $("textarea[disabled]").css("background-color", "white");

  $('[data-rel="tooltip"]').tooltip();
};

app.disable_form = function (target) {
  $("input").prop("disabled", true);
  $("select").prop("disabled", true);
  $("textarea").prop("disabled", true);
  $(".btn").prop("disabled", true);
};
app.to_string_date = function (s) {
  var d = s.split("/");
  var str = d[2] + d[1] + d[0];
  return str;
};
app.to_string_date_mysql = function (s) {
  var d = s.split("/");
  var str = d[2] - 543 + "-" + d[1] + "-" + d[0];
  return str;
};
app.string_to_date = function (s) {
  var parts = s.split("-");
  var mydate = new Date(parts[0], parts[1] - 1, parts[2]);
  return mydate;
};

app.daysInMonth = function (year) {
  var array = year.split("-");
  console.log(array[0] + array[1]);
  return new Date(array[0], array[1], 0).getDate();
};

$(function () {
  app.set_runtime();
});
