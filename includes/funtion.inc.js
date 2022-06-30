function congenitalCheckboxChecker(elClass) {
    el = document.getElementsByClassName(elClass);
    var mainCheckbox = document.querySelector('#inborn');
    var subCheckbox1 = document.querySelector('#autism');
    var subCheckbox2 = document.querySelector('#adhd');
    var subCheckbox3 = document.querySelector('#cerebralPalsy');
    var subCheckbox4 = document.querySelector('#downSyndrome');

    if (subCheckbox1.checked || subCheckbox2.checked || subCheckbox3.checked || subCheckbox4.checked) {
        mainCheckbox.checked = true;
        for (i = 0; i < el.length; i++) {
        el[i].required = false;
        }
    } else {
        mainCheckbox.checked = false;
        for (i = 0; i < el.length; i++) {
        el[i].required = true;
        }
    }
}

function acquiredCheckboxChecker(elClass) {
    el = document.getElementsByClassName(elClass);
    var mainCheckbox = document.querySelector('#acquired');
    var subCheckbox1 = document.querySelector('#chronicIllness');
    var subCheckbox2 = document.querySelector('#acquiredCerebralPalsy');
    var subCheckbox3 = document.querySelector('#injury');

    if (subCheckbox1.checked || subCheckbox2.checked || subCheckbox3.checked) {
        mainCheckbox.checked = true;
        for (i = 0; i < el.length; i++) {
        el[i].required = false;
        }
    } else {
        mainCheckbox.checked = false;
        for (i = 0; i < el.length; i++) {
        el[i].required = true;
        }
    }
}

function deRequire(elClass) {
    el = document.getElementsByClassName(elClass);

    var atLeastOneChecked = false; //at least one cb is checked
    for (i = 0; i < el.length; i++) {
        if (el[i].checked === true) {
        atLeastOneChecked = true;
        }
    }

    if (atLeastOneChecked === true) {
        for (i = 0; i < el.length; i++) {
        el[i].required = false;
        }
    } else {
        for (i = 0; i < el.length; i++) {
        el[i].required = true;
        }
    }
}

function duplicate() {
    var parent = document.getElementsByClassName('family-list');
    var original = document.getElementById('duplicater');
    var clone = original.cloneNode(true);
    original.parentNode.appendChild(clone);
}

function deleteDiv(button) {
    const countAll = document.querySelectorAll('#duplicater').length;
    if (countAll > 1) {
        $(button).parent().closest('div').remove();
    }
}


