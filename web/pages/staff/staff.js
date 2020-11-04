let details, summary, all_info, first_p, second_p, image, right_info, first_info_p, second_info_p, third_info_p, fourth_info_p, courses, numOfCourses, course_li, fifth_info_p;
let numOfPrepods = 10;

function staffFromDB() {
    for (let j = 0; j < numOfPrepods; j++) {
        details = document.createElement("details"); 
        summary = document.createElement("summary"); 
        all_info = document.createElement("div"); 
        all_info.classList.add("all_info");
        first_p = document.createElement("p"); 
        first_p.textContent = `Михайлов Михаил Михайллович`;
        second_p = document.createElement("p"); 
        second_p.innerHTML = `<span>Преподаватель</span>, <span>канд.техн.наук, доцент</span>`;
        summary.appendChild(first_p);
        summary.appendChild(second_p);
        details.appendChild(summary);
        image = document.createElement("img");
        image.src = "../../assets/icons/user_default_ico_inhead.jpg";
        image.alt = "prepod";
        right_info = document.createElement("div"); 
        right_info.classList.add("right_info");
        all_info.appendChild(image);
        all_info.appendChild(right_info);
        first_info_p = document.createElement("p");
        first_info_p.innerHTML = `<span>Аудитория: </span><span>410-1</span>`;
        second_info_p = document.createElement("p");
        second_info_p.innerHTML = `<span>Телефон: </span><span>+375123456789</span>`;
        third_info_p = document.createElement("p");
        third_info_p.innerHTML = `<span>E-mail: </span><span>ivanovivan@gmail.com</span>`;
        right_info.appendChild(first_info_p);
        right_info.appendChild(second_info_p);
        right_info.appendChild(third_info_p);
        right_info.appendChild(document.createElement("hr"));
        fourth_info_p = document.createElement("p");
        fourth_info_p.innerHTML = `<span>Читаемые курсы: </span>`;
        courses = document.createElement("ul");
        numOfCourses = 3;
        course_li;
        for (let i = 0; i < numOfCourses; i++) {
            course_li = document.createElement("li");
            course_li.textContent = `«Методы и средства защиты информации»`;
            courses.appendChild(course_li);
        }
        fourth_info_p.appendChild(courses);
        right_info.appendChild(fourth_info_p);
        right_info.appendChild(document.createElement("hr"));
        fifth_info_p = document.createElement("p");
        fifth_info_p.innerHTML = `<span>Направление научной деятельности: </span><br><span>Организация учебного и научно-исследовательского процессов в техническом университете</span>`;
        right_info.appendChild(fifth_info_p);
        details.appendChild(all_info);
        document.querySelector(".staff").appendChild(details);
    }
}

staffFromDB();