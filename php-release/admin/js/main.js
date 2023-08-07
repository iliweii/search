$(function () {
    // 退出登录
    $("#logout").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                op: "logout"
            },
            success: function (e) {
                window.location.reload();
            }
        })
    })

    // 更新用户信息
    $("#userUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                nickname: $("#inputNickname").val(),
                username: $("#inputUsername").val(),
                password: $("#inputPassword").val(),
                op: "updateUser"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });


    // 新增/更新菜单项
    $("#menuUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                title: $("#inputTitle").val(),
                icon: $("#inputIcon").val(),
                color: $("#inputColor").val(),
                is_nav: Number($("#inputIsNav").is(":checked")),
                orders: Number($("#inputOrders").val()),
                op: "updateMenu"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.href = "?page=menu"
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });

    // 新增/更新菜单项详情
    $("#menuItemUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                menu_id: Number($("#inputMenuId").val()),
                name: $("#inputName").val(),
                link: $("#inputLink").val(),
                icon: $("#inputIcon").val(),
                color: $("#inputColor").val(),
                orders: Number($("#inputOrders").val()),
                op: "updateMenuItem"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.href = `?page=menu-item&menuid=${$("#inputMenuId").val()}`
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });


    // 新增/更新引擎分类
    $("#engineClassUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                title: $("#inputTitle").val(),
                orders: Number($("#inputOrders").val()),
                op: "updateEngineClass"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.href = "?page=engine-class"
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });

    // 新增/更新搜索引擎详情
    $("#engineUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                class_id: Number($("#inputClassId").val()),
                name: $("#inputName").val(),
                link: $("#inputLink").val(),
                placeholder: $("#inputPlaceholder").val(),
                orders: Number($("#inputOrders").val()),
                op: "updateEngine"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.href = `?page=engine&classid=${$("#inputClassId").val()}`
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });

    // 新增/更新小组件
    $("#widgetUpdateButton").click(() => {
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number($("#inputId").val()),
                name: $("#inputName").val(),
                position: $("#inputPosition").val(),
                menu_id: Number($("#inputMenuId").val()),
                code: $("#inputCode").val(),
                remark: $("#inputRemark").val(),
                op: "updateWidget"
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.href = "?page=widget"
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });




    $(".removeBtn").click((e) => {
        let index = $(".removeBtn").index(e.target);
        $(".removeBtn").eq(index).attr("disabled", "true");
        $(".removeNext").eq(index).css("display", "inline");
    })
    $(".removeExit").click((e) => {
        let index = $(".removeExit").index(e.target);
        $(".removeNext").eq(index).css("display", "none");
        $(".removeBtn").eq(index).removeAttr("disabled");
    })
    $(".removeOk").click((e) => {
        let index = $(".removeOk").index(e.target);
        let op = $(".removeOk").eq(index).attr("op");
        let id = $(".removeOk").eq(index).attr("for");
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                id: Number(id),
                op: op
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });




    // 壁纸管理
    if ($("#wallpaperManagePage")) {
        const src = window.localStorage.getItem("superSearchBg");
        if (src) {
            if (/^\/upload\//.test(src)) {
                let e = $(`.bgimg[src='${src}'] ~ .card-img-overlay`);
                bgcardClick(Number(e.attr("index")), true);
            } else {
                bgInputUrlChange(src);
                $("#inputImageUrl").val(src);
            }
        }
    }
    $(".bgcard").click(e => {
        const index = Number(e.target.getAttribute("index"));
        bgcardClick(index);
    });
    $("#inputImageUrl").keydown(event => {
        const url = $("#inputImageUrl").val();
        if (url && event.keyCode == 13) {
            bgInputUrlChange(url);
        }
    })

    function bgcardClick(index, init = false) {
        const card = $(".bgcard").eq(index);
        const image = $(".bgimg").eq(index);
        if (!init) window.localStorage.setItem("superSearchBg", image.attr("src"));
        $(".bgcard").removeClass("border-primary");
        $(".bgcard").removeClass("selected");
        card.addClass("border-primary");
        card.addClass("selected");

        $("#inputImageCheckbox").removeAttr("checked");
        console.log(`url(${image.attr("src")})`);
        $(".bg-selected-img").css("background-image", `url(\"${image.attr("src")}\")`);
        $(".bg-selected-name").text(image.attr("src"));
    }

    function bgInputUrlChange(url) {
        $("#inputImageCheckbox").attr("checked", "true");
        window.localStorage.setItem("superSearchBg", url);
        $(".bgcard").removeClass("border-primary");
        $(".bgcard").removeClass("selected");
        $(".bg-selected-img").css("background-image", `url("${url}")`);
        $(".bg-selected-name").text(url);
    }

    $("#inputUploadFile").change((event) => {
        if (event.target.files.length === 0) {
            $("label[for='inputUploadFile']").text('Choose file...');
            return;
        }
        const file = event.target.files[0];
        $("label[for='inputUploadFile']").text(file.name);
    })
    $("#uploadBtn").click(() => {
        const files = $("#inputUploadFile").prop("files");
        if (files.length === 0) {
            swal("ERROR", "请先选择壁纸再上传", "error");
            return;
        }
        var formData = new FormData();
        // 获取文件
        var fileData = files[0];
        formData.append("op", "upload");
        formData.append("file", fileData);
        $.ajax({
            url: 'api.php',
            type: 'POST',
            async: false,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    window.localStorage.setItem("superSearchBg", '/upload/' + e.result);
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    });
    $(".removeFileBtn").click((e) => {
        const filename = e.target.getAttribute("for");
        $.ajax({
            type: "post",
            url: "./api.php",
            data: {
                file: filename,
                op: 'removeFile'
            },
            dataType: 'json',
            success: function (e) {
                if (!e.success) {
                    swal("ERROR", e.message, "error");
                } else {
                    swal("SUCCESS", e.message, "success");
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function (e) {
                swal("ERROR", "网络堵塞或服务器故障!", "error");
            }
        });
    })

})