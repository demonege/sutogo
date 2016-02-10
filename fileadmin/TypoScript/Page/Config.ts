TCEFORM.tt_content {
    # General tab
    sys_language_uid.disabled = 0
}

mod.wizards.newContentElement {
    wizardItems {
        common.show := removeFromList(header,text,textpic,image,bullets,table)
        special.show := removeFromList(uploads,media,menu,html,div,shortcut)
        forms.show := removeFromList(login,mailform,search)
        plugins.show := removeFromList(list)
    }
}