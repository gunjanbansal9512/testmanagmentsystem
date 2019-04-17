$(function () {
    $(".btnSubmit").click(function () {
        var password = $("#new").val();
        var confirmPassword = $("#cnew").val();
        if (password != confirmPassword) {
            alert("Password and Confirm Password do not match.");
            return false;
        }
        return true;
    });
  });
