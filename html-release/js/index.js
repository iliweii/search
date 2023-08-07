window.onload = function () {

    /****************** 简单禁用控制台 *******************/
    if ("https:" === document.location.protocol) {
        // 1. 屏蔽键盘事件
        document.onkeydown = function () {
            var e = window.event || arguments[0];
            //F12
            if (e.keyCode == 123) {
                return false;
                //Ctrl+Shift+I
            } else if ((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)) {
                return false;
                //Shift+F10
            } else if ((e.shiftKey) && (e.keyCode == 121)) {
                return false;
                //Ctrl+U
            } else if ((e.ctrlKey) && (e.keyCode == 85)) {
                return false;
            }
        };
        // 2. 屏蔽鼠标右键
        document.oncontextmenu = function () {
            return false;
        }
    }


    /****************** 判断窗口大小 *******************/
    // 判断窗口大小，添加输入框自动完成
    var wid = $("body").width();
    if (wid < 640) {
        //$(".wd").attr('autocomplete', 'off');
    } else {
        $(".wd").focus();
    }

    /****************** 右侧菜单事件 *******************/
    // 菜单点击事件
    $("#menu").click(function (event) {
        $(this).toggleClass('on');
        $(".menu-body").toggleClass('closed');
    });
    $("#content").click(function (event) {
        $(".on").removeClass('on');
        $(".menu-body").addClass('closed');
        $('#word').hide();
    });

    /****************** 关键词推荐 *******************/
    var kos = document.getElementById("kos");
    var kol = document.getElementById("kol");
    var kob = document.getElementById("kob");



    //监听输入框的keuup事件，
    kos.onkeyup = function () {
        if (this.value) {
            show(kol);
            // 动态创建script标签，使用百度提供的接口，将查询字符串编码后，写到src当中
            var s = document.createElement('script');
            s.src = 'https://s.video.qq.com/smartbox?callback=fn&plat=2&ver=0&num=5&otype=json&query=' + encodeURI(this.value.trim());
            // 插入到文档后获取jsonp格式的数据，然后调用callback函数，将data数据以参数的形式传入
            document.body.appendChild(s);
        } else {
            hide(kol);
        }
    }

    //点击li标签后把输入框的信息填入到文本框
    kol.onclick = function (e) {
        var e = e || window.event;
        var target = e.target || e.srcElement;
        if (target.nodeName == "LI") {
            kos.value = target.innerHTML;
            $('#kob').click();
        }
        hide(kol)
    }


    //点击百度一下按钮跳转到相应的页面
    $('#kob').click(function () {
        if (($("input[id='kos']").val()) == "") {
            alert("请输入关键字");
        } else {
            $.ajax({
                type: "get",
                url: "./api.php",
                dataType: "json",
                data: "do=get&v=" + $("input[id='kos']").val(),
                async: true,
                success: function (res) {
                    if (res.status == 200) {
                        res = res.res;
                        lihtml = "";
                        $.each(res, function (index, value) {

                            lihtml = lihtml + '<li class="wei"><a class="a" href=javascript:play(' + value["url"] + ',"' + value["title"] + '")>' + value["title"] + '</a></li>';
                        });

                        $("ul[id='kol']").html(lihtml);
                        show(kol);
                    } else {
                        alert(res.res);
                    }

                },
                error: function (a) {
                    alert("失败,请检查关键字。");
                }
            });
        }

    });

    function play(id, title) {
        $.ajax({
            type: "get",
            url: "./api.php",
            dataType: "json",
            data: "do=play&v=" + id + "&title=" + title,
            async: true,
            success: function (res) {
                if (res.status == 200) {
                    res = res.res;
                    lihtml = "";
                    $.each(res, function (index, value) {

                        lihtml = lihtml + '<li class="wei"><a class="a" target="_blank" href="' + value['url'] + '">' + value['title'] + '</a></li>';
                        $("ul[id='kol']").html(lihtml);
                        show(kol);
                    });
                } else {
                    alert(res.res);
                }
            },
            error: function (a) {
                alert("失败，请检查关键字。");
            }
        })
    }

    function fn(data) {
        var lihtml = "";
        //这时候遍历查询到的信息，放到li标签当中
        data.item.forEach(function (item, index) {
            lihtml = lihtml + '<div class="wei" cursor="pointer"><li class="a">' + item['word'] + '</li></div>';
        });
        $("ul[id='kol']").html(lihtml);
        show(kol);

        // 获取到数据后，把脚本删除
        var s = document.querySelectorAll('script');
        for (var i = 1, len = s.length; i < len; i++) {
            document.body.removeChild(s[i]);
        }
    }

    function hide(obj) {
        obj.style.display = "none"
    }

    function show(obj) {
        obj.style.display = "block"
    }


    /****************** 搜索框事件 *******************/
    let engines = document.querySelectorAll('input[name="type"]');
    let searchfm = document.querySelector("#super-search-fm");
    let searchtext = document.querySelector("#search-text");

    let group = document.querySelectorAll(".search-group");
    let first = engines[0];

    init();

    for (let i = 0; i < engines.length; i++) {
        engines[i].addEventListener("change", change);
    }

    searchfm.addEventListener("submit", (e) => {
        e.preventDefault();
        if ("" == searchtext.value) {
            searchtext.focus();
        } else {
            searchfm.action = document.querySelector('input[name="type"]:checked').value + searchtext.value;
            window.open(searchfm.action, +new Date);
        }
    });

    function init() {
        let typeVal = window.localStorage.getItem("superSearchType") || engines[0].value;
        let type = document.querySelector('input[name="type"][value="' + typeVal + '"]');
        type && (type.checked = !0, setCurrent(type));
        searchtext.setAttribute("placeholder", document.querySelector('input[name="type"]:checked').getAttribute("data-placeholder"));
        searchfm.action = document.querySelector('input[name="type"]:checked').value;
    }

    function change(e) {
        first = e.target;
        searchtext.setAttribute("placeholder", document.querySelector('input[name="type"]:checked').getAttribute("data-placeholder"));
        searchfm.action = e.target.value;
        window.localStorage.setItem("superSearchType", e.target.value);
        searchtext.focus();
        setCurrent(e.target);
    }

    function setCurrent(selected) {
        for (var i = 0; i < group.length; i++) {
            group[i].classList.remove("s-current")
        }
        selected.parentNode.parentNode.parentNode.classList.add("s-current");
    }


    /****************** 一言 *******************/
    async function fetchHitokoto() {
        const response = await fetch('https://v1.hitokoto.cn')
        const { uuid, hitokoto: hitokotoText } = await response.json()
        const hitokoto = document.querySelector('#hitokoto_text')
        hitokoto.style.display = 'inline-block'
        // hitokoto.innerText = hitokotoText
        const hitokotoTexts = hitokotoText.split('')
        displayHitokoto()
        function displayHitokoto() {
            if (0 == hitokotoTexts.length) return
            setTimeout(() => {
                hitokoto.innerText += hitokotoTexts.shift()
                displayHitokoto()
            }, 50)
        }
    }
    fetchHitokoto()
}

/****************** 和风天气插件配置 *******************/
WIDGET = {
    "CONFIG": {
        "modules": "02",
        "background": "5",
        "tmpColor": "FFFFFF",
        "tmpSize": "18",
        "cityColor": "FFFFFF",
        "citySize": "16",
        "aqiColor": "FFFFFF",
        "aqiSize": "16",
        "weatherIconSize": "26",
        "alertIconSize": "18",
        "padding": "10px 10px 10px 10px",
        "shadow": "0",
        "language": "auto",
        "fixed": "true",
        "vertical": "right",
        "horizontal": "left",
        "left": "8",
        "top": "8",
        "key": "2876fc0106824630b9dcce28706f1b03"
    }
}