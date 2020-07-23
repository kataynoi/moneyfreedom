$(document).ready(function(){
    $("#btn_login").removeAttr("disabled");
    //User namespace
    var users = {};
    users.ajax = {
        do_auth: function (pin, cb) {
            var url = '/user/do_auth',
                params = {
                    pin: pin,
                }
            app.ajax(url, params, function (err,data) {
                err ? cb(err) : cb(null, data);
            });
        },do_auth_mobile: function (tel, cb) {
            var url = '/user/do_auth_mobile',
                params = {
                    tel: tel,

                }
            app.ajax(url, params, function (err,data) {
                err ? cb(err) : cb(null, data);
            });
        },regis_auth_mobile: function (tel,name, cb) {
            var url = '/user/regis_auth_mobile',
                params = {
                    tel: tel,
                    name: name,

                }
            app.ajax(url, params, function (err,data) {
                err ? cb(err) : cb(null, data);
            });
        }

    };

    users.do_auth = function(pin){
        users.ajax.do_auth(pin, function (err, data) {
            if (err) {
                swal(err)

            }
            else {
                if(data.success){
                    swal('Login Success');
                   window.location= base_url;
                }
            }
        });
    }



    $('#btn_login').on('click',function(e){
        e.preventDefault();
        console.log('click');
        var pin = $('#pin').val();
            users.do_auth(pin);
    });



$('#btn_forget_pass').on('click',function(){
    $('#frm_login').hide();
    $('#frm_forgot_pass').show();

});

    $('#send_mail_forget_pass').on('click',function(e){
        e.preventDefault();
        var email=$('#txt_repass_email').val();
        if(!email){
            app.alert('กรุณากรอกรหัสผ่าน');
            email.focus();
        }else{


        users.ajax.send_mail_forget_pass(email, function (err, data) {
            //console.log(data);
            if (err) {
                    app.alert(err);
            }
            else {

                if(data.success){
                    app.alert('ส่งข้อมูลไป ที่'+ email +' แล้ว กรุณาตรวจสอบ ');
                }else{
                    app.alert('Email นี้ไม่มีอยู่ในระบบ');
                }
            }
        });
    }
});
$('#btn_back').on('click',function(){
    $('#frm_login').show();
    $('#frm_forgot_pass').hide();
});
    $('#frm_login').on('submit', function(e) {
        //return users.check_login();
    });


    $('.digit').on('click',function(e){
        e.preventDefault();
        var id = $(this).data('digit');
        if(id=='del'){
            $('#pin').val("");
        }else{
            var pin = $('#pin').val()+id;
            $('#pin').val(pin);
        }


    });
});

