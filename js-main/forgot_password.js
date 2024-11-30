document.addEventListener("DOMContentLoaded", function () {
    const usernameModal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));
    const securityQuestionModal = new bootstrap.Modal(document.getElementById('securityQuestionModal'));
    const newPasswordModal = new bootstrap.Modal(document.getElementById('newPasswordModal'));

    // Handle username submission
    document.getElementById("usernameForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const username = document.getElementById("forgotPasswordUsername").value;

        fetch("fetch_security_question.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("securityQuestionText").textContent = data.security_question;
                    usernameModal.hide();
                    securityQuestionModal.show();
                } else {
                    alert("Username not found. Please try again.");
                }
            })
            .catch(err => console.error(err));
    });

    // Handle security question submission
    document.getElementById("securityQuestionForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const securityAnswer = document.getElementById("securityAnswerInput").value;

        fetch("verify_security_answer.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ security_answer: securityAnswer })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    securityQuestionModal.hide();
                    newPasswordModal.show();
                } else {
                    alert("Incorrect answer. Please try again.");
                }
            })
            .catch(err => console.error(err));
    });

    // Handle new password submission
    document.getElementById("newPasswordForm").addEventListener("submit", function (event) {
        event.preventDefault();
        const newPassword = document.getElementById("newPasswordInput").value;

        fetch("reset_password.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ new_password: newPassword })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Password reset successfully.");
                    newPasswordModal.hide();
                    window.location.reload();
                } else {
                    alert("Error resetting password. Please try again.");
                }
            })
            .catch(err => console.error(err));
    });
});
