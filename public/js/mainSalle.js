salles.forEach(element => {
    // console.log(element);
    element.addEventListener("change", (e) => {
        let base = e.currentTarget;
        let idChange = base.id.split("-");
        let groupe = base.value;
        let date = idChange[3] + "-" + idChange[4] + "-" + idChange[5];
        let dateBdd = idChange[5] + "-" + ((idChange[3] < 10) ? "0" : "") + idChange[3] + "-" + ((idChange[4] < 10) ? "0" : "") + idChange[4];
        let salle = idChange[1];
        let data = {
            salle: salle,
            groupe: groupe,
            date: dateBdd
        }
        // on envoie en base via ajax

        $.ajax({
            url: "savePlanning/",
            method: "GET",
            data: data
        }).done(function (msg) {
            console.log(msg);
        });

        // // on affiche les doublons
        // let sallesduJour = getSalles(date);
        // // document.querySelectorAll(".salles.duplicate").forEach((duplicate) => {
        // //     duplicate.classList.remove("duplicate");
        // // });
        // let duplicateSalles = findDuplicates(sallesduJour);
        // //console.log(duplicateSalles);
        // if (duplicateSalles.length > 0) {
        //     duplicateSalles.forEach((input) => {
        //         //console.log(input);
        //         document.getElementById(input).classList.add("duplicate")
        //     });
        // }
        // //console.log(sallesduJour);
    });
});


let checkSalles = () => {
    let allSelect = document.querySelectorAll('select');
    allSelect.forEach(element => {
        let idChange = element.id.split("-");
        if (idChange[1] != 1 && idChange[1] != 2) {
            let child = element.querySelectorAll("option[selected]");
            if (child.length > 1) {
                element.classList.add("duplicate");
            }
            console.log(child.length);
        }
    });
    // console.log(child.lenth);
}
// console.log(salles)


checkSalles();
