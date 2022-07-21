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
// Cause of disability checker
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
// Cause of disability checker
$(window).on('load', function() {
    if ($("#change-info").is(":checked")) {
        $("#textChangeInfo").removeAttr("disabled");
        $("#textChangeInfo").focus();
    } else {
        $("#textChangeInfo").attr("disabled", "disabled");
        $('#textChangeInfo').val(""); 
    }
    if ($("#transfer").is(":checked")) {
        $("#textTransfer").removeAttr("disabled");
        $("#textTransfer").focus();
    } else {
        $("#textTransfer").attr("disabled", "disabled");
        $('#textTransfer').val(""); 
        }
    el = document.getElementsByClassName('cod');
    var subCheckboxAutism = document.querySelector('#autism');
    var subCheckboxADHD = document.querySelector('#adhd');
    var subCheckboxCerebralPalsy = document.querySelector('#cerebralPalsy');
    var subCheckboxDownSyndrome = document.querySelector('#downSyndrome');
    var subCheckboxChronicIllnes = document.querySelector('#chronicIllness');
    var subCheckboxAcquiredCerebralPalsy = document.querySelector('#acquiredCerebralPalsy');
    var subCheckboxInjury = document.querySelector('#injury');
    if (subCheckboxAutism.checked || subCheckboxADHD || subCheckboxCerebralPalsy || subCheckboxDownSyndrome || subCheckboxChronicIllnes || subCheckboxAcquiredCerebralPalsy || subCheckboxInjury) {
        for (i = 0; i < el.length; i++) {
            el[i].required = false;
        }
    }
});
// Add Family Member
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
// Prohibit Special Characters 
function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}

$("input[name='employmentStatus']").click(function () {
    if ($('#employed').is(':checked') || $('#selfEmployed').is(':checked')) {
        $(".disable").removeClass('disableDiv');
    } else {
        $(".disable").addClass('disableDiv');
        $('input:radio[name=income]').each(function () { $(this).prop('checked', false); });
        $('input:radio[name=categoryOfEmployment]').each(function () { $(this).prop('checked', false); });
        $('input:radio[name=natureOfEmployment]').each(function () { $(this).prop('checked', false); });
        $('input:radio[name=occupation]').each(function () { $(this).prop('checked', false); });
        $('#organization').val(""); 
        $('#contactPerson').val(""); 
        $('#officeAddress').val(""); 
        $('#telNumber').val("");
        $('#otherOccupation').val("");
    }
});

$('#guardianLastName').change(function(){
    if($(this).val() == "") {
        $("#guardianRelationship").attr("disabled", true);
        $("#guardianContactNumber").attr("disabled", true);
        $("#guardianRelationship").val("");
        $("#guardianContactNumber").val("");
    } else {
        $("#guardianRelationship").attr("disabled", false);
        $("#guardianContactNumber").attr("disabled", false);
    }
});

// Profile Picture
const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener('mouseenter', function(){
    uploadBtn.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function(){
    uploadBtn.style.display = "none";
});

file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader();

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});
// ID Type
$("input[name='idType']").click(function () {
if ($("#transfer").is(":checked")) {
    $("#textTransfer").removeAttr("disabled");
    $("#textTransfer").focus();
} else {
    $("#textTransfer").attr("disabled", "disabled");
    $('#textTransfer').val(""); 
    }
});

$("input[name='idType']").click(function () {
if ($("#change-info").is(":checked")) {
    $("#textChangeInfo").removeAttr("disabled");
    $("#textChangeInfo").focus();
} else {
    $("#textChangeInfo").attr("disabled", "disabled");
    $('#textChangeInfo').val(""); 
}
});
// Date Of Birth and Age
dob.max = new Date().toISOString().split("T")[0];
srCitizenDOB.max = new Date().toISOString().split("T")[0];
birth.max = new Date().toISOString().split("T")[0];
$(window).load(function()
{
    $('#staticBackdrop').modal('show');
});
$(document).ready(function(){
    $("#id-type").on('change', function(){
        $(".registration-container").hide();
        $("#" + $(this).val()).fadeIn(700);
    });
}).change();

$('#srCitizenDOB').change(function () {
    var dateOfBirth = new Date($('#srCitizenDOB').val())
    //calculate month difference from current date in time
    var month_diff = Date.now() - dateOfBirth.getTime()

    //convert the calculated difference in date format
    var age_dt = new Date(month_diff)

    //extract year from date
    var year = age_dt.getUTCFullYear()

    //now calculate the age of the user
    var age = Math.abs(year - 1970)

    //display the calculated age
    $('#edad').val(age)
});

$('#birth').change(function () {
    var dateOfBirth = new Date($('#birth').val())
    //calculate month difference from current date in time
    var month_diff = Date.now() - dateOfBirth.getTime()

    //convert the calculated difference in date format
    var age_dt = new Date(month_diff)

    //extract year from date
    var year = age_dt.getUTCFullYear()

    //now calculate the age of the user
    var age = Math.abs(year - 1970)

    //display the calculated age
    $('#age').val(age)
});