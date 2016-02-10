RTE.default {
    # Available: https://docs.typo3.org/typo3cms/extensions/rtehtmlarea/Configuration/PageTsconfig/interfaceConfiguration/Index.html
    showButtons =  bold, italic, underline, orderedlist, unorderedlist, left, center, right, subscript, superscript, insertcharacter, link, undo, redo, chMode, removeformat
    toolbarOrder = bold, italic, underline, bar, orderedlist, unorderedlist, bar, left, center, right, bar, subscript, superscript, bar, insertcharacter, bar, link, bar, undo, redo, bar, chMode, bar, removeformat

    removeTags = font, meta, o:p, sdfield, strike, style, title, h1

    proc.entryHTMLparser_db.removeTags < .removeTags
    contentCSS = fileadmin/Resources/Public/StyleSheet/backend.css
}

# media tag
RTE.default.proc.overruleMode = ts_css,txdam_media
RTE.default.FE.proc.overruleMode = ts_css,txdam_media

## Classes for RTE (dropdown with classes)
RTE.classes.highlight {
    name = Highlight
    value = color:red;
}

RTE.default {
    ignoreMainStyleOverride = 1
    useCSS = 1
    showTagFreeClasses = 1
    contentCSS = fileadmin/Resources/Public/StyleSheet/rte.css

    buttons {
        # use comma-separated for more options
        blockstyle.tags.div.allowedClasses := addToList(highlight)
        blockstyle.tags.p.allowedClasses := addToList(highligh)
        textstyle.tags.span.allowedClasses := addToList(highlight)
    }

    proc.allowedClasses := addToList(highlight)
}