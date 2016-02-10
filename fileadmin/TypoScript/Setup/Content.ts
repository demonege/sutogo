lib.stdheader >

temp.contentHeader >
temp.contentHeader = CASE
temp.contentHeader {

    key.field = colPos

    2 = COA
    2 {
        10 = TEXT
        10 {
            field = header
            stdWrap {
                htmlSpecialChars = 1
                listNum = 0
                listNum.splitChar = |
            }
        }

        wrap = <header>|</header>
        typolink {
            parameter.insertData = 1
            parameter = {field:header_link}
        }
    }
}

tt_content.stdWrap.innerWrap >