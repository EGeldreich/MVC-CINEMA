// ELEMENTS
// const addPersonBtn = document.querySelector("#addPerson");
// const addGenreBtn = document.querySelector("#addGenre");
// const addFilmBtn = document.querySelector("#addFilm");
// const addCharacterBtn = document.querySelector("#addCharacter");
// const addCastingBtn = document.querySelector("#addCasting");

const PersonBtn = document.querySelector("#person");
const GenreBtn = document.querySelector("#genre");
const FilmBtn = document.querySelector("#film");
const CharacterBtn = document.querySelector("#character");
const CastingBtn = document.querySelector("#casting");

const allBtns = document.querySelectorAll(".form-list_button");
const forms = document.querySelectorAll(".forms");

// FUNCTIONS FOR EDIT FORMS
const formsClickHandler = (event) => {
    // Get clicked btn
    const clickedBtn = event.currentTarget;
    //Get related form name from btn id
    const formName = clickedBtn.id;

    // Handle the active class of the buttons
    allBtns.forEach((btn) =>
        btn.classList.toggle("active", btn === clickedBtn)
    );

    // Handle the hidden class of the forms
    forms.forEach((form) => {
        const isTargetForm = form.classList.contains(`${formName}-form`);
        form.classList.toggle("hidden", !isTargetForm);
    });
};

// Add event listeners to all buttons
[GenreBtn, FilmBtn, PersonBtn, CastingBtn, CharacterBtn].forEach((btn) => {
    btn.addEventListener("click", formsClickHandler);
});
// FUNCTIONS FOR ADD FORMS
// const formsClickHandler = (event) => {
//     // Get clicked btn
//     const clickedBtn = event.currentTarget;
//     //Get related form name from btn id
//     const formName = clickedBtn.id.replace("add", "").toLowerCase();

//     // Handle the active class of the buttons
//     allBtns.forEach((btn) =>
//         btn.classList.toggle("active", btn === clickedBtn)
//     );

//     // Handle the hidden class of the forms
//     forms.forEach((form) => {
//         const isTargetForm = form.classList.contains(`${formName}-form`);
//         form.classList.toggle("hidden", !isTargetForm);
//     });
// };

// // Add event listeners to all buttons
// [addGenreBtn, addFilmBtn, addPersonBtn, addCastingBtn, addCharacterBtn].forEach(
//     (btn) => {
//         btn.addEventListener("click", formsClickHandler);
//     }
// );
