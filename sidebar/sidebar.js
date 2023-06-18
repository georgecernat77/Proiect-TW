document.addEventListener("DOMContentLoaded", function() {
    var accountType = document.getElementById("accountType").value;
    var imgElement = document.querySelector(".sidebar img");
    var adminOptionLink = document.querySelector('li a.admin-option');
    console.log(accountType);
    if (accountType === "user") {
        imgElement.src = "../sidebar/user.png";
    } else if (accountType === "admin") {
        imgElement.src = "../sidebar/admin.png";
        adminOptionLink.style.display = 'block';
    }
});
