
document.querySelector("#monthActual").addEventListener("change", (e) => {
    let m = e.currentTarget;
    document.querySelector("#month").value = m.value;
    document.querySelector("#year").value = document.querySelector("#oldyear").innerHTML;
    document.querySelector('#changemonth').submit();
});
document.querySelector("#yearActual").addEventListener("change", (e) => {
    let y = e.currentTarget;
    document.querySelector("#month").value = document.querySelector("#oldmonth").innerHTML;;
    document.querySelector("#year").value = y.value;
    document.querySelector('#changemonth').submit();
});
document.querySelector("#yearMinus").addEventListener("click", () => {
    document.querySelector("#month").value = document.querySelector("#oldmonth").innerHTML;
    document.querySelector("#year").value = parseInt(document.querySelector("#oldyear").innerHTML) - 1;
    document.querySelector('#changemonth').submit();
});
document.querySelector("#yearMinus").addEventListener("click", () => {
    document.querySelector("#month").value = document.querySelector("#oldmonth").innerHTML;
    document.querySelector("#year").value = parseInt(document.querySelector("#oldyear").innerHTML) - 1;
    document.querySelector('#changemonth').submit();
});
document.querySelector("#yearPlus").addEventListener("click", () => {
    document.querySelector("#month").value = document.querySelector("#oldmonth").innerHTML;
    document.querySelector("#year").value = parseInt(document.querySelector("#oldyear").innerHTML) + 1;
    document.querySelector('#changemonth').submit();
});
document.querySelector("#monthMinus").addEventListener("click", () => {
    if (parseInt(document.querySelector("#oldmonth").innerHTML) - 1 == 0) {
        document.querySelector("#month").value = 12
        document.querySelector("#year").value = parseInt(document.querySelector("#oldyear").innerHTML) - 1;
    } else {
        document.querySelector("#month").value = parseInt(document.querySelector("#oldmonth").innerHTML) - 1;
        document.querySelector("#year").value = document.querySelector("#oldyear").innerHTML;
    }
    document.querySelector('#changemonth').submit();
});
document.querySelector("#monthPlus").addEventListener("click", () => {
    if (parseInt(document.querySelector("#oldmonth").innerHTML) + 1 == 13) {
        document.querySelector("#month").value = 1
        document.querySelector("#year").value = parseInt(document.querySelector("#oldyear").innerHTML) + 1;
    } else {
        document.querySelector("#month").value = parseInt(document.querySelector("#oldmonth").innerHTML) + 1;
        document.querySelector("#year").value = document.querySelector("#oldyear").innerHTML;
    }
    document.querySelector('#changemonth').submit();
});

const findDuplicates = (arr) => {
    let results = [];
    let ignore = [];
    for (let i = 0; i < arr.length - 1; i++) {
        const elementCurrent = arr[i];
        let unique = true;
        for (let j = i + 1; j < arr.length; j++) {
            const elementNext = arr[j];
            if (elementCurrent.value == elementNext.value && !arr.includes(j)) {
                results.push(elementNext.id);
                unique = false;
                ignore.push(j);
            }
        }
        if (!unique) {
            ignore.push(i);
            results.push(elementCurrent.id);
        }
    }
    return results;
}
const getSalles = (date) => {
    let noeud = document.querySelectorAll(".salles[id$='-d-" + date + "']");
    let doublons = []
    noeud.forEach(element => {
        element.classList.remove("duplicate");
        element.classList.remove("entreprise");
        element.classList.remove("vacance");
        if (element.value == "1") {
            element.classList.add("entreprise");
        }
        if (element.value == "2") {
            element.classList.add("vacance");
        }
        if (element.value != "null") doublons.push(element);
    });
    return doublons;
}

var salles = document.querySelectorAll(".salles");

