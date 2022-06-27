function congenitalCheckboxChecker() {
    var mainCheckbox = document.querySelector('#inborn');
    var subCheckbox1 = document.querySelector('#autism');
    var subCheckbox2 = document.querySelector('#adhd');
    var subCheckbox3 = document.querySelector('#cerebralPalsy');
    var subCheckbox4 = document.querySelector('#downSyndrome');

    if (subCheckbox1.checked || subCheckbox2.checked || subCheckbox3.checked || subCheckbox4.checked) {
        mainCheckbox.checked = true;
    } else {
        mainCheckbox.checked = false;
    }
}

function acquiredCheckboxChecker() {
    var mainCheckbox = document.querySelector('#acquired');
    var subCheckbox1 = document.querySelector('#chronicIllness');
    var subCheckbox2 = document.querySelector('#acquiredCerebralPalsy');
    var subCheckbox3 = document.querySelector('#injury');

    if (subCheckbox1.checked || subCheckbox2.checked || subCheckbox3.checked) {
        mainCheckbox.checked = true;
    } else {
        mainCheckbox.checked = false;
    }
}

$(document).ready(function(){
    $("#id-type").on('change', function(){
        $(".registration-container").hide();
        $("#" + $(this).val()).fadeIn(700);
    });
}).change();
