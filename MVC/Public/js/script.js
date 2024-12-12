// ELEMENTS
const addGenreBtn = document.querySelector("#addGenre");
const addFilmBtn = document.querySelector("#addFilm");
const addPersonBtn = document.querySelector("#addPerson");
const addCastingBtn = document.querySelector("#addCasting");
const forms = document.querySelectorAll(".forms");

const formsClickHandler = (name) => {
    forms.forEach((form) => {
        if (!form.classList.contains("hidden")) {
            form.classList.add("hidden");
        }
    });
    const form = document.querySelector(`.${name}-form`);
    form.classList.toggle("hidden");
};

addGenreBtn.addEventListener("click", () => formsClickHandler("genre"));
addFilmBtn.addEventListener("click", () => formsClickHandler("film"));
addPersonBtn.addEventListener("click", () => formsClickHandler("person"));
addCastingBtn.addEventListener("click", () => formsClickHandler("casting"));
