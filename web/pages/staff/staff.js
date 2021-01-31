let personRole = document.querySelector('.role_from_db').textContent;
document.querySelector('.role_from_db').remove();

let allPrepodsData = document.querySelector('.all_prepods_data').textContent.split(';;');
let arrayOfCourses = document.querySelectorAll('.course_of_id');

for (let i = 0; i < allPrepodsData.length; i++) {
    let helpVariable = allPrepodsData[i].split('^^^ ');
    allPrepodsData[i] = helpVariable;
    allPrepodsData[i].push(arrayOfCourses[i].textContent.split(';;'));
}
document.querySelector('.all_prepods_data').remove();
for (let i = allPrepodsData.length - 1; i >= 0; i--) {
    arrayOfCourses[i].remove();
}

if (personRole == 2) {
    const add_person_btn = document.createElement('p');
    add_person_btn.classList.add('add_person_btn');
    add_person_btn.innerHTML = '<span class="material-icons">person_add</span>';
    add_person_btn.title = 'Добавить сотрудника?';
    document.querySelector(".staff").appendChild(add_person_btn);
    add_person_btn.addEventListener('click', () => {
        document.querySelector('.modal').style.display = 'initial';
    });
    document.querySelector('.close_btn').addEventListener('click', () => {
        document.querySelector('.modal').style.display = 'none';
    });
}

let details, summary, all_info, first_p, second_p, image, right_info, first_info_p, second_info_p, third_info_p, fourth_info_p, courses, numOfCourses, course_li, fifth_info_p, show_more_p;
let numOfPrepods = allPrepodsData.length;

function staffFromDB() {
    for (let j = 0; j < numOfPrepods; j++) {
        details = document.createElement("details"); 
        summary = document.createElement("summary"); 
        all_info = document.createElement("div"); 
        all_info.classList.add("all_info");
        first_p = document.createElement("p"); 
        first_p.innerHTML = `<span class="last_name_for_admin">${allPrepodsData[j][1]}</span> <span class="first_name_for_admin">${allPrepodsData[j][2]}</span> <span class="fathers_name_for_admin">${allPrepodsData[j][3]}</span>`;
        second_p = document.createElement("p");
        second_p.innerHTML = `<span class="position_for_admin">${allPrepodsData[j][8]}</span>, <span class="degree_for_admin">${allPrepodsData[j][9]}</span>`; 
        summary.appendChild(first_p);
        summary.appendChild(second_p);
        details.appendChild(summary);
        image = document.createElement("img");
        image.src = `../../assets/images/photos/${allPrepodsData[j][0]}.jpg`;
        image.alt = "prepod";
        right_info = document.createElement("div"); 
        right_info.classList.add("right_info");
        all_info.appendChild(image);
        all_info.appendChild(right_info);

        if (personRole == 2) {
            const change_admin_btn = document.createElement("p");
            change_admin_btn.classList.add('change_admin_btn');
            change_admin_btn.innerHTML = '<span class="material-icons">create</span>';
            change_admin_btn.title = 'Изменить данные сотрудника?';
            const delete_admin_btn = document.createElement("p");
            delete_admin_btn.classList.add('delete_admin_btn');
            delete_admin_btn.innerHTML = '<span class="material-icons">clear</span>';
            delete_admin_btn.title = 'Удалить сотрудника?';
            right_info.appendChild(change_admin_btn);
            right_info.appendChild(delete_admin_btn);
            change_admin_btn.addEventListener('click', () => {
                changeAdminPersonData(j, allPrepodsData[j][0]);
            });
            delete_admin_btn.addEventListener('click', () => {
                deleteAdminPerson(allPrepodsData[j][0]);
            });
        }

        first_info_p = document.createElement("p");
        first_info_p.innerHTML = `<span>Аудитория: </span><span class="location_for_admin">${allPrepodsData[j][4]}</span>`
        second_info_p = document.createElement("p");
        second_info_p.innerHTML = `<span>Телефон: </span><span class="phone_for_admin">${allPrepodsData[j][5]}</span>`;
        third_info_p = document.createElement("p");
        third_info_p.innerHTML = `<span>E-mail: </span><span class="email_for_admin">${allPrepodsData[j][6]}</span>`;
        right_info.appendChild(first_info_p);
        right_info.appendChild(second_info_p);
        right_info.appendChild(third_info_p);
        right_info.appendChild(document.createElement("hr"));
        fourth_info_p = document.createElement("p");
        fourth_info_p.innerHTML = `<span>Читаемые курсы: </span>`;
        courses = document.createElement("ul");
        numOfCourses = allPrepodsData[j][11].length;
        for (let i = 0; i < numOfCourses; i++) {
            course_li = document.createElement("li");
            course_li.textContent = allPrepodsData[j][11][i];
            courses.appendChild(course_li);
        }
        fourth_info_p.appendChild(courses);
        right_info.appendChild(fourth_info_p);
        right_info.appendChild(document.createElement("hr"));
        fifth_info_p = document.createElement("p");
        fifth_info_p.innerHTML = `<span>Направление научной деятельности: </span><br><span class="science_for_admin">${allPrepodsData[j][10]}</span>`;
        right_info.appendChild(fifth_info_p);
        show_more_p = document.createElement("p");
        show_more_p.classList.add('show_more_p');
        show_more_p.textContent = 'посмотреть расписание';
        right_info.appendChild(show_more_p);
        details.appendChild(all_info);
        document.querySelector(".staff").appendChild(details);

        show_more_p.addEventListener('click', () => {
            submitPost(allPrepodsData[j][0]);
        })


        if (personRole == 2) {
            const passArea = document.createElement("textarea");
            passArea.classList.add('pass_area_for_admin');
            passArea.name = "pass_area_for_admin";
            passArea.placeholder = "логин - пароль";
            passArea.maxLength = "60";
            right_info.appendChild(passArea);
        }
    }
}
staffFromDB();

function submitPost(e) {
    document.querySelector('form.id_to_show_page textarea').value = e;
    document.querySelector('form.id_to_show_page').submit();
}

let isChange = false;
let strToChangeData;
function changeAdminPersonData(index, e) {
    isChange = !isChange;
    let currentChangeBtn = document.querySelectorAll('.change_admin_btn')[index];
    currentChangeBtn.innerHTML = isChange ? '<span class="material-icons">check</span>' : '<span class="material-icons">create</span>';
    currentChangeBtn.classList.toggle('check_admin_btn');

    let currentLastName = document.querySelectorAll('.last_name_for_admin')[index];
    let currentFirstName = document.querySelectorAll('.first_name_for_admin')[index];
    let currentFathersName = document.querySelectorAll('.fathers_name_for_admin')[index];
    let currentPositionName = document.querySelectorAll('.position_for_admin')[index];
    let currentAcDegree = document.querySelectorAll('.degree_for_admin')[index];
    let currentLocation = document.querySelectorAll('.location_for_admin')[index];
    let currentPhone = document.querySelectorAll('.phone_for_admin')[index];
    let currentEmail = document.querySelectorAll('.email_for_admin')[index];
    let currentScience = document.querySelectorAll('.science_for_admin')[index];

    let currentPassArea = document.querySelectorAll('.pass_area_for_admin')[index];
    currentPassArea.style.display = "flex";
    currentPassArea.style.height = "40px";

    currentLastName.contentEditable = isChange ? 'true' : 'false';
    currentFirstName.contentEditable = isChange ? 'true' : 'false';
    currentFathersName.contentEditable = isChange ? 'true' : 'false';
    currentPositionName.contentEditable = isChange ? 'true' : 'false';
    currentAcDegree.contentEditable = isChange ? 'true' : 'false';
    currentLocation.contentEditable = isChange ? 'true' : 'false';
    currentPhone.contentEditable = isChange ? 'true' : 'false';
    currentEmail.contentEditable = isChange ? 'true' : 'false';
    currentScience.contentEditable = isChange ? 'true' : 'false';

    currentLastName.classList.toggle('content_editable_span');
    currentFirstName.classList.toggle('content_editable_span');
    currentFathersName.classList.toggle('content_editable_span');
    currentPositionName.classList.toggle('content_editable_span');
    currentAcDegree.classList.toggle('content_editable_span');
    currentLocation.classList.toggle('content_editable_span');
    currentPhone.classList.toggle('content_editable_span');
    currentEmail.classList.toggle('content_editable_span');
    currentScience.classList.toggle('content_editable_span');

    if (isChange === false) {
        strToChangeData = `${currentLastName.textContent}^^${currentFirstName.textContent}^^${currentFathersName.textContent}^^${currentPositionName.textContent}^^${currentAcDegree.textContent}^^${currentLocation.textContent}^^${currentPhone.textContent}^^${currentEmail.textContent}^^${currentScience.textContent}^^${e}^^${currentPassArea.value}`;
        document.querySelector('form.change_admin_data textarea').value = strToChangeData;
        document.querySelector('form.change_admin_data').submit();
    }
}

function deleteAdminPerson(e) {
    document.querySelector('form.delete_person textarea').value = e;
    document.querySelector('form.delete_person').submit();
}