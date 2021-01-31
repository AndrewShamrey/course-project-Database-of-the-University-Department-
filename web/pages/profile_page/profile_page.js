let userConsultData = document.querySelector('.consult_data').textContent;
document.querySelector('.consult_data').remove();

let textarea = document.querySelector('textarea.consultations');
textarea.value = userConsultData;

textarea.addEventListener('blur', () => {
    document.querySelector(".consultations_container form").submit();
});


let subjectsArray = document.querySelector('.subj_to_table').textContent.split(';;');
for (let i = 0; i < subjectsArray.length; i++) {
    let helpVariable = subjectsArray[i].split('^^^ ');
    subjectsArray[i] = helpVariable;
}
document.querySelector('.subj_to_table').remove();

for (let i = 0; i < subjectsArray.length; i++) {
    let currentCell = document.querySelector(`.table_container tbody tr:nth-child(${subjectsArray[i][2]}) td:nth-child(${subjectsArray[i][1] - 0 + 1})`);
    currentCell.textContent = subjectsArray[i][0];
    currentCell.title = `${subjectsArray[i][0]}
Кабинет ${subjectsArray[i][3]}
Группа ${subjectsArray[i][4]} - ${subjectsArray[i][5]}`;
    currentCell.style.cursor = 'pointer';
};

let currentDate = new Date();
let currentDay = currentDate.getDay();
let countOfPars = 8;

function addClassToDay() {
    if (currentDay !== 0) {
        document.querySelector(`.table_container thead th:nth-child(${currentDay + 1})`).classList.add("active_day");
        for (let j = 0; j < countOfPars; j++) {
            document.querySelector(`.table_container tbody tr:nth-child(${j + 1}) td:nth-child(${currentDay + 1})`).classList.add("active_day");
        }
    }
}
addClassToDay();