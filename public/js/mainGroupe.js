salles.forEach(element => {
    // console.log(element);
    element.addEventListener("change", (e) => {
        let base = e.currentTarget;
        let idChange = base.id.split("-");
        let groupe = idChange[1];
        let date = idChange[3] + "-" + idChange[4] + "-" + idChange[5];
        let dateBdd = idChange[5] + "-" + ((idChange[3] < 10) ? "0" : "") + idChange[3] + "-" + ((idChange[4] < 10) ? "0" : "") + idChange[4];
        let salle = base.value;
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

        // on affiche les doublons
        let sallesduJour = getSalles(date);
        // document.querySelectorAll(".salles.duplicate").forEach((duplicate) => {
        //     duplicate.classList.remove("duplicate");
        // });
        let duplicateSalles = findDuplicates(sallesduJour);
        //console.log(duplicateSalles);
        if (duplicateSalles.length > 0) {
            duplicateSalles.forEach((input) => {
                //console.log(input);
                document.getElementById(input).classList.add("duplicate")
            });
        }
        //console.log(sallesduJour);
    });
});

let checkSalles = () => {
    let jours = document.querySelectorAll('.colonneJour');
    jours.forEach(jour => {
        let salles = jour.querySelectorAll(".salles");
        if (salles.length > 0) {
            let d = salles[0];
            let idChange = d.id.split("-");
            let date = idChange[3] + "-" + idChange[4] + "-" + idChange[5];
            let sallesduJour = getSalles(date);
            let duplicateSalles = findDuplicates(sallesduJour);
            //console.log(duplicateSalles);
            if (duplicateSalles.length > 0) {
                duplicateSalles.forEach((input) => {
                    //console.log(input);
                    let champ = document.getElementById(input).classList;
                    if (!champ.contains("entreprise") && !champ.contains("vacance")) {
                        champ.add("duplicate");
                    }

                });
            }
        }
    });
}
// console.log(salles)


checkSalles();
