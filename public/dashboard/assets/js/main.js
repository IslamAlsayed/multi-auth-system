let btnDeleteAllModel = document.getElementById("deleteAllModel"),
    btnsDeleteOne = document.querySelectorAll(".deleteOne"),
    countDoctorsDeleted = document.querySelector(".countDoctorsDeleted"),
    selected = [];

if (deleteAllModel) {
    if (selected.length <= 0) btnDeleteAllModel.style.display = "none";

    btnsDeleteOne.forEach((doctor) => {
        doctor.addEventListener("click", () => {
            let index = selected.indexOf(doctor.value);
            if (index == -1) selected.push(doctor.value);
            else selected.splice(index, 1);

            if (selected.length <= 0) btnDeleteAllModel.style.display = "none";
            else btnDeleteAllModel.style.display = "inline-block";
        });
    });

    btnDeleteAllModel.addEventListener("click", () => {
        countDoctorsDeleted.innerHTML = selected.length;

        // document.getElementById("ids").value = JSON.stringify(selected);
        document.getElementById("ids").value = selected;
        if (selected.length <= 0)
            btnDeleteAllModel.removeAttribute("data-toggle");
        else btnDeleteAllModel.setAttribute("data-toggle", "modal");
    });
}
