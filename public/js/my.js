
function showMe (it, box) {
    var vis = (box.checked) ? "block" : "none";
    document.getElementById(it).style.display = vis;
}

function insertMetachars(sStartTag, sEndTag) {
    var bDouble = arguments.length > 1, oMsgInput = document.myform.post, nSelStart = oMsgInput.selectionStart, nSelEnd = oMsgInput.selectionEnd, sOldText = oMsgInput.value;
    oMsgInput.value = sOldText.substring(0, nSelStart) + (bDouble ? sStartTag + sOldText.substring(nSelStart, nSelEnd) + sEndTag : sStartTag) + sOldText.substring(nSelEnd);
    oMsgInput.setSelectionRange(bDouble || nSelStart === nSelEnd ? nSelStart + sStartTag.length : nSelStart, (bDouble ? nSelEnd : nSelStart) + sStartTag.length);
    oMsgInput.focus();
}

function PreviewImage(file,preview) {


    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(file).files[0]);

    oFReader.onload = function(oFREvent) {


        document.getElementById(preview).src = oFREvent.target.result;
        document.getElementById(preview).style.display = "block";

    };
};

function _(el){
    return document.getElementById(el);
}


function Confirm(text)
{
    var x = confirm(text);
    if (x)
        return true;
    else
        return false;
}




