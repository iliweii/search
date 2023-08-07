$(function () {

    // 变量声明区域

    // 用户名、密码和验证码
    var Tbuser = $("input#Tbuser");
    var Tbpwd = $("input#Tbpwd");
    var Tbverify = $("input#Tbverify");
    // 登录按钮
    var Loginbtn = $("#Loginbtn");
    // 用户名、密码、验证码信息反馈
    var tbuserFeedback = $("#tbuserFeedback");
    var tbpwdFeedback = $("#tbpwdFeedback");
    var tbverifyFeedback = $("#tbverifyFeedback");
    var TbverifyGroup = $("div#TbverifyGroup");
    // 表单区域
    var Form = $("#Form");

    //初始化验证码
    var verifyCode = new GVerify({
        id: "verify-img",    //容器的ID
        type: "blend"    //图形验证码的类型：blend-数字字母混合类型（默认）、number-纯数字、letter-纯字母
    });

    // 用户名输入事件
    Tbuser.keyup(function () {
        Tbuser.removeClass("is-valid");
        tbuserFeedback.removeClass("valid-feedback");
        Tbuser.removeClass("is-invalid");
        tbuserFeedback.removeClass("invalid-feedback");
        tbuserFeedback.text("");
    });

    // 密码输入事件
    Tbpwd.keyup(function () {
        Tbpwd.removeClass("is-valid");
        tbpwdFeedback.removeClass("valid-feedback");
        Tbpwd.removeClass("is-invalid");
        tbpwdFeedback.removeClass("invalid-feedback");
        tbpwdFeedback.text("");
    });

    // 验证码输入事件
    Tbverify.keyup(function () {
        Tbverify.removeClass("is-valid");
        TbverifyGroup.removeClass("is-valid");
        tbverifyFeedback.removeClass("valid-feedback");
        Tbverify.removeClass("is-invalid");
        TbverifyGroup.removeClass("is-invalid");
        tbverifyFeedback.removeClass("invalid-feedback");
        tbverifyFeedback.text("");
    });

    // 登录按钮点击事件
    Loginbtn.click(function (e) {
        // 获取用户名
        var tbuser = Tbuser.val();
        if (tbuser.length == 0) {
            Tbuser.addClass("is-invalid");
            tbuserFeedback.addClass("invalid-feedback");
            tbuserFeedback.text("用户名不能为空!");
            return;
        }
        // 获取密码
        var tbpwd = Tbpwd.val();
        if (tbpwd.length == 0) {
            Tbpwd.addClass("is-invalid");
            tbpwdFeedback.addClass("invalid-feedback");
            tbpwdFeedback.text("密码不能为空!");
            return;
        }
        // 获取验证码
        var verify = Tbverify.val();
        if (verify.length == 0) {
            Tbverify.addClass("is-invalid");
            TbverifyGroup.addClass("is-invalid");
            tbverifyFeedback.addClass("invalid-feedback");
            tbverifyFeedback.text("请输入验证码!");
            return;
        }
        // 验证验证码
        else if (verifyCode.validate(verify) == false) {
            Tbverify.addClass("is-invalid");
            TbverifyGroup.addClass("is-invalid");
            tbverifyFeedback.addClass("invalid-feedback");
            tbverifyFeedback.text("验证码错误!");
            //刷新验证码
            verifyCode.refresh();
            return;
        }
        // 发送ajax 请求
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                username: tbuser,
                password: tbpwd,
                op: "login"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    // 出现问题
                    swal("ERROR", e.message, "error");
                } else {
                    window.localStorage.setItem("userinfo", e.result);
                    swal("SUCCESS", "登录成功，1s后自动跳转", "success");
                    setTimeout(() => {
                        // 延时刷新界面
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function (e) {
                // 网络或服务器错误
                swal("ERROR", "网络堵塞或服务器故障!", "error");
                console.log(e);
            }
        });
    });
})