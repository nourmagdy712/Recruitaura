const buttons = document.querySelectorAll(".role-btn");

const candidateForm = document.getElementById("candidate-form");
const companyForm = document.getElementById("company-form");

buttons.forEach(btn => {
    btn.addEventListener("click", () => {

        // active button UI
        buttons.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const role = btn.dataset.role;

        if (role === "candidate") {
            candidateForm.classList.remove("hidden");
            companyForm.classList.add("hidden");
        } 
        else {
            companyForm.classList.remove("hidden");
            candidateForm.classList.add("hidden");
        }
    });
});