page = PAGE
page {

    config.simulateStaticDocuments = 0
    config.baseURL = http://sutogo.local/
    config.tx_realurl_enable = 1
    config.uniqueLinkVars = 1
    # dont forget to set the allowed range - otherwise anything else could be inserted
    config.linkVars = L(0-3)

    typeNum = 0

    bodyTagCObject = TEXT
    bodyTagCObject.field = uid
    bodyTagCObject.wrap = <body id="page-|">

    bodyTagCObject.append = TEXT
    bodyTagCObject.append.value (
    )

    10 = FLUIDTEMPLATE
    10 {
            layoutRootPath = fileadmin/Layout

            file.stdWrap.cObject = CASE
            file.stdWrap.cObject {
            key.data = levelfield:-1, backend_layout_next_level, slide
            key.override.field = backend_layout

            default = TEXT
            default.value = fileadmin/Layout/Default.html

            1 = TEXT
            1.value = fileadmin/Layout/Default.html
        }

        variables {
            contentMain < styles.content.get
            contentMain {
                select.where = colPos = 0
                slide = -1
            }
        }
    }

    includeCSS {
            file1 = fileadmin/Resources/Public/Stylesheet/applicaion.css
    }
}
lib.textmenu = HMENU
lib.textmenu {
  1 = TMENU
  1.NO = 1
  1.NO.allWrap = <li>|</li>
  1.ACT = 1
  1.ACT.wrapItemAndSub = <li>|</li>
  1.wrap = <ul class="level1">|</ul>
  2 < .1
  2.wrap = <ul class="level2">|</ul>
  3 < .1
  3.wrap = <ul class="level3">|</ul>
}