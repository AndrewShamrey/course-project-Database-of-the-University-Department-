let userConsultData = document.querySelector('.consult_data').textContent;
document.querySelector('.consult_data').remove();

let pForTextarea = document.querySelector('p.consultations');
pForTextarea.innerHTML = userConsultData;

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

function addClassToDay() {
    for (let i = 0; i < 6; i++) {
        document.querySelector(`.table_container thead th:nth-child(${i + 2})`).classList.remove("active_day");
        for (let j = 0; j < 8; j++) {
            document.querySelector(`.table_container tbody tr:nth-child(${j + 1}) td:nth-child(${i + 2})`).classList.remove("active_day");
        }
    }
    if (currentDay !== 0) {
        document.querySelector(`.table_container thead th:nth-child(${currentDay + 1})`).classList.add("active_day");
        for (let j = 0; j < 8; j++) {
            document.querySelector(`.table_container tbody tr:nth-child(${j + 1}) td:nth-child(${currentDay + 1})`).classList.add("active_day");
        }
    }
}
addClassToDay();



let allPrepodsData = document.querySelector('.all_prepods_data').textContent.split('^^^ ');
document.querySelector('.all_prepods_data').remove();

const person_container = document.querySelector('.person_container');

const all_info = document.createElement("div"); 
all_info.classList.add("all_info");
const image = document.createElement("img");
image.src = `../../assets/images/photos/${allPrepodsData[0]}.jpg`;
image.alt = "prepod";
const right_info = document.createElement("div"); 
right_info.classList.add("right_info");
all_info.appendChild(image);
all_info.appendChild(right_info);

const first_p = document.createElement("p"); 
first_p.classList.add("prepod_name");
first_p.textContent = `${allPrepodsData[1]} ${allPrepodsData[2]} ${allPrepodsData[3]}`;
const second_p = document.createElement("p");
second_p.classList.add("second_p");
second_p.innerHTML = `<span class="default">${allPrepodsData[8]}</span>, <span>${allPrepodsData[9]}</span>`; 
const first_info_p = document.createElement("p");
first_info_p.innerHTML = `<span>Аудитория: </span><span>${allPrepodsData[4]}</span>`
const second_info_p = document.createElement("p");
second_info_p.innerHTML = `<span>Телефон: </span><span>${allPrepodsData[5]}</span>`;
const third_info_p = document.createElement("p");
third_info_p.innerHTML = `<span>E-mail: </span><span>${allPrepodsData[6]}</span>`;
right_info.appendChild(first_p);
right_info.appendChild(second_p);
right_info.appendChild(document.createElement("hr"));
right_info.appendChild(first_info_p);
right_info.appendChild(second_info_p);
right_info.appendChild(third_info_p);
person_container.appendChild(all_info);