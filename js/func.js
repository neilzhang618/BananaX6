(function () {
    try {
        var tocEle = document.querySelector('.toc-body')
        if (tocEle) {
            var articleEle = document.querySelector('article.single-article')
            var articleHeight = articleEle.clientHeight
            var ul = document.createElement('ul')
            var hArr = Array.from(articleEle.querySelectorAll('h1, h2, h3'))
            if (0 && hArr.length <= 1) {
                tocEle.style.visibility = 'hidden'
            }
            else {
                var targetEle = ul   //targetEle总是某个ul
                hArr.forEach(function (v, i) {
                    var li = document.createElement('li')
                    var a = document.createElement('a')
                    v.id = 'toc-' + i
                    // li.classList.add('toc-' + v.nodeName.toLowerCase())
                    a.innerHTML = v.innerText
                    a.href = '#' + v.id
                    li.className = v.nodeName
                    li.appendChild(a)

                    if (!targetEle.lastElementChild) {
                        // do nothing
                    }
                    else if (v.nodeName > targetEle.lastElementChild.className) {
                        var newUl = document.createElement('ul')
                        targetEle.appendChild(newUl)
                        targetEle = newUl
                    }
                    else if (v.nodeName < targetEle.lastElementChild.className) {
                        targetEle = targetEle.parentElement
                    }
                    targetEle.appendChild(li)
                })

                tocEle.appendChild(ul)
                adjustTocEle(window.scrollY)
            }

            // 目录开关功能
            var tsbEle = document.querySelector('.toc-switch-button')
            var tocOpened = tocEle.style.display !== 'none'
            tsbEle.addEventListener('click', function () {
                if (tocOpened) {
                    tocOpened = false
                    tsbEle.innerHTML = '打开目录'
                    tocEle.style.display = 'none'
                    articleEle.parentElement.style.margin = '0 auto'
                    articleEle.parentElement.style.width = '100%'
                    articleEle.parentElement.style.float = 'none'
                }
                else {
                    tocOpened = true
                    tsbEle.innerHTML = '关闭目录'
                    tocEle.style.display = 'block'
                    articleEle.parentElement.style.margin = '0'
                    articleEle.parentElement.style.width = '72%'
                    articleEle.parentElement.style.float = 'left'
                }

                document.cookie = 'tocOpened=' + tocOpened
                document.querySelector('.header-func-menu').style.display = 'none'
            })
        }
        //只有在文章页才显示目录开关按钮
        document.querySelector('.toc-switch-button').style.display = !!tocEle ? 'block' : 'none'

        var sttEle = document.createElement('div')
        sttEle.classList.add('scroll-to-top')
        sttEle.innerHTML = '^'
        sttEle.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        })
        adjustSttEle(window.scrollY)
        document.body.appendChild(sttEle)

        window.addEventListener('scroll', !!tocEle ? function () {
            var scrollPosition = window.scrollY;
            adjustTocEle(scrollPosition)
            adjustSttEle(scrollPosition)
        } : function () {
            var scrollPosition = window.scrollY;
            adjustSttEle(scrollPosition)
        });

        function adjustTocEle(p) {
            tocEle.style.position = p > 88.4 ? 'fixed' : 'unset'
            tocEle.style.top = p > articleHeight + 32 ? -(p - (articleHeight + 32)) + 'px' : 0
            // tocEle.style.visibility = p > articleHeight + 88.4 ? 'hidden' : 'visible'
        }

        function adjustSttEle(p) {
            sttEle.style.opacity = p > 500 ? '0.5' : '0'
            // sttEle.style.transform = p > 500 ? 'scale(1)' : 'scale(0)'
        }


        /*------------------侧边栏----------------*/
        var hfm = document.querySelector('.header-func-menu')
        document.querySelector('.header-func-button').addEventListener('click', function () {
            hfm.style.display = 'block'
        })
        document.querySelector('.hfm-background').addEventListener('click', function () {
            hfm.style.display = 'none'
        })

        /*------------------手机搜索栏----------------*/
        var hmsc = document.querySelector('.header-mobile-search-container')
        document.querySelector('.header-mobile-search-button svg').addEventListener('click', function () {
            hmsc.style.display = 'block'
            document.querySelector('.hmsc-content input').focus()
        })
        document.querySelector('.hmsc-background').addEventListener('click', function () {
            hmsc.style.display = 'none'
        })

    }
    catch (e) {
        console.error(e)
    }
})()
