function buttonClick() {
    const element = document.getElementById("pwd");

    html2pdf().from(element).save();
    // alert("It works");
}