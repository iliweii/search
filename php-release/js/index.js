window.onload = function () {

    /*******************************************
     *************** 判断窗口尺寸 ***************
     *******************************************/
    {
        // 判断窗口大小，输入框自动聚焦
        var wid = $("body").width()
        if (wid < 640) {
        } else {
            $("#search-text").focus()
        }
    }


    /*******************************************
     ***************  菜单按钮  *****************
     *******************************************/
    {
        // 菜单点击事件
        $("#menu").click(function (event) {
            $(this).toggleClass('on')
            $(".menu-body").toggleClass('closed')
        })
        $("#content").click(function (event) {
            $(".on").removeClass('on')
            $(".menu-body").addClass('closed')
            $('#word').hide()
        })
    }


    /*******************************************
     *************** 关键词推荐 *****************
     *******************************************/
    {
        var searchText = document.getElementById('search-text')
        var searchSug = document.getElementById('search-sug')
        // 搜索输入框键盘事件
        searchText.onkeyup = async function () {
            if (!this.value) {
                keywordSuggest([])
                return
            }
            const params = { wd: this.value }
            const result = await jsonp('https://sp0.baidu.com/5a1Fazu8AA54nxGko9WTAnF6hhy/su', params, 'cb')
            keywordSuggest(result.s)
        }
        // 关键词推荐的点击事件
        $(document).on('click', '.keyword-suggest', event => {
            const suggest = event.target.innerText
            searchText.value = suggest
        })
        /**
         * 关键词推荐
         * 若数组有值，则清空之前的推荐值，展示新值；否则，清空推荐值。
         * @param {array} keywords 关键词推荐数组
         */
        async function keywordSuggest(keywords) {
            if (keywords.length > 0) {
                await clearKeywords(searchSug)
                searchSug.classList.add("show")
                await showKeywords(searchSug, keywords)
            } else {
                await clearKeywords(searchSug)
                searchSug.classList.remove("show")
            }

            /**
             * 清空关键词推荐列表
             * @param {Element} ele 关键词父元素
             */
            function clearKeywords(ele) {
                return new Promise((resolve, reject) => {
                    if (ele.firstChild) {
                        ele.firstChild.remove()
                        setTimeout(() => resolve(clearKeywords(ele)), 5) // 每操作一项，延时5毫米
                    } else resolve(true)
                })
            }
            /**
             * 展示关键词推荐列表
             * @param {Element} ele 关键词父元素
             * @param {array} keywords 关键词数组
             */
            function showKeywords(ele, keywords) {
                return new Promise((resolve, reject) => {
                    if (keywords.length > 0) {
                        let keyword = keywords.shift()
                        let li = document.createElement("li"), span = document.createElement("span")
                        li.classList.add("keyword-suggest")
                        span.innerText = keyword
                        li.appendChild(span), ele.appendChild(li)
                        setTimeout(() => resolve(showKeywords(ele, keywords)), 5) // 每操作一项，延时5毫米
                    } else resolve(true)
                })
            }
        }
    }



    /*******************************************
     *************** 搜索引擎切换 ***************
     *******************************************/
    {
        let engines = document.querySelectorAll('input[type="radio"][name="type"]') // 搜索引擎列表
        let searchfm = document.getElementById("super-search-fm") // 搜索输入框表单
        let searchtext = document.getElementById("search-text") // 搜索输入框

        // 初始化
        initEngine()

        // 搜索引擎类型切换事件
        for (let i = 0; i < engines.length; i++) {
            engines[i].addEventListener("change", (e) => {
                window.localStorage.setItem("superSearchType", e.target.value)
                searchtext.focus()
                changeEngine(e.target)
            })
        }

        // 搜索（搜索输入框表单提交）事件
        searchfm.addEventListener("submit", (e) => {
            e.preventDefault() // 阻止原生事件
            if (!searchtext.value) searchtext.focus()
            else window.open(searchfm.action + searchtext.value, +new Date) // 打开新窗口
        })

        /**
         * 初始化搜索引擎
         * 搜索引擎类型从本地存储获取，获取不到则取第一个
         */
        function initEngine() {
            let engineValue = window.localStorage.getItem("superSearchType") || engines[0].value // 从本地存储获取
            let engine = document.querySelector('input[type="radio"][name="type"][value="' + engineValue + '"]')
            if (engine) changeEngine(engine)
        }

        /**
         * 切换搜索引擎
         * @param {Element} engine 搜索引擎元素 
         */
        function changeEngine(engine) {
            engine.checked = true
            $(".search-group").removeClass("s-current")
            engine.parentNode.parentNode.parentNode.classList.add("s-current")
            searchfm.action = engine.value
            searchtext.setAttribute("placeholder", engine.getAttribute("data-placeholder"))
        }
    }


    /*******************************************
     ***************** 壁纸 ********************
     *******************************************/
    {
        const url = window.localStorage.getItem("superSearchBg")
        if (url && url != "undefined" && url != "null") {
            $("body").css("background-image", `url("${url}")`)
        } else {
            // 默认一个随机壁纸
            const len = $(".bgimg").length
            const index = Math.round(Math.random() * (len - 1))
            const src = $(".bgimg").eq(index).attr("src")
            $("body").css("background-image", `url("${src}")`)
            window.localStorage.setItem("superSearchBg", src)
        }
        $(".bgimg").click((e) => {
            const src = e.target.getAttribute("src")
            $("body").css("background-image", `url("${src}")`)
            window.localStorage.setItem("superSearchBg", src)
        })
    }
}




/**
 * JsonP 请求封装
 * @param {string} url 请求地址
 * @param {object} params 请求参数
 * @param {string} callback 默认'callback'，其他例如百度关键词要求'cb'
 * @returns Promise()
 */
function jsonp(url, params, callback = 'callback') {
    return new Promise((resolve, reject) => {
        if (!url) {
            console.error('Axios.JSONP 至少需要一个url参数!')
            return
        }
        // 这里的 "jsonCallBack" ，和调用的 jsonp 的 url 中的 callback 值相对应
        window.jsonCallBack = (result) => {
            resolve(result)
        }
        const JSONP = document.createElement('script')
        JSONP.type = 'text/javascript'
        JSONP.src = `${url}?${callback}=jsonCallBack`
        for (let key in params) {
            JSONP.src += `&${key}=${params[key]}`
        }
        document.getElementsByTagName('head')[0].appendChild(JSONP)
        setTimeout(() => {
            document.getElementsByTagName('head')[0].removeChild(JSONP)
        }, 500)
    })
}


/**
 * 简单禁用控制台
 * 1. 屏蔽键盘事件
 * 2. 屏蔽鼠标右键
 */
function disabledControl() {
    document.onkeydown = () => {
        var e = window.event || arguments[0]
        if (e.keyCode == 123) return false // F12
        else if ((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)) return false // Ctrl+Shift+I
        else if ((e.shiftKey) && (e.keyCode == 121)) return false // Shift+F10
        else if ((e.ctrlKey) && (e.keyCode == 85)) return false // Ctrl+U
    }
    document.oncontextmenu = () => {
        return false
    }
}
if ("https:" === document.location.protocol) {
    disabledControl()
}