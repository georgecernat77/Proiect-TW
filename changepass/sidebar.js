document.addEventListener("DOMContentLoaded", function() {
    var accountType = document.getElementById("accountType").value;
    var imgElement = document.querySelector(".sidebar img");
    console.log(accountType);
    if (accountType === "user") {
        imgElement.src = "user.png";
    } else if (accountType === "admin") {
        imgElement.src = "admin.png";
    }
});
