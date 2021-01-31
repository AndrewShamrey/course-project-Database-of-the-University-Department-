let adminData = document.querySelector('.admin_data').textContent.split(';;');
document.querySelector('.admin_data').remove();

function adminFromDB() {
  let details = document.createElement("details"); 
  details.open = true;
  let summary = document.createElement("summary"); 
  let all_info = document.createElement("div"); 
  all_info.classList.add("all_info");
  let first_p = document.createElement("p"); 
  first_p.textContent = `${adminData[1]} ${adminData[2]} ${adminData[3]}`;
  let second_p = document.createElement("p"); 
  second_p.innerHTML = `<span>${adminData[7]}</span>, <span>${adminData[8]}</span>`;
  summary.appendChild(first_p);
  summary.appendChild(second_p);
  details.appendChild(summary);
  let image = document.createElement("img");
  image.src = `../../assets/images/photos/${adminData[0]}.jpg`;
  image.alt = "admin";
  let right_info = document.createElement("div"); 
  right_info.classList.add("right_info");
  all_info.appendChild(image);
  all_info.appendChild(right_info);
  let first_info_p = document.createElement("p");
  first_info_p.innerHTML = `<span>Аудитория: </span><span>${adminData[4]}</span>`;
  let second_info_p = document.createElement("p");
  second_info_p.innerHTML = `<span>Телефон: </span><span>${adminData[5]}</span>`;
  let third_info_p = document.createElement("p");
  third_info_p.innerHTML = `<span>E-mail: </span><span>${adminData[6]}</span>`;
  right_info.appendChild(first_info_p);
  right_info.appendChild(second_info_p);
  right_info.appendChild(third_info_p);
  details.appendChild(all_info);
  document.querySelector("div.admin").appendChild(details);
}
adminFromDB();


const questions = [
    {
      "question": "Как посмотреть своё расписание на текущий день?",
      "answer": `Расписание преподавателя на текущий день отображается в разделе "Моя страница."`
    },
    {
      "question": "Где можно узнать телефон сотрудника кафедры?",
      "answer": `Данные о сотрудниках можно найти в разделе "Состав кафедры."`
    },
    {
      "question": "Как можно изменить свои личные данные?",
      "answer": `Телефон, email и кабинет можно изменить, нажав на кнопку "редактировать" в левом разделе сайта.`
    },
    {
      "question": "Можно ли изменить данные другого сотрудника кафедры?",
      "answer": `Вы можете изменить только личную информацию. Ислы Вы обнаружили неточность в данных, обратитесь к администратору. Контакты администратора приведены выше в разделе "Помощь".`
    },
    {
      "question": "Где можно найти документы кафедры?",
      "answer": `С документами кафедры можно ознакомиться, нажав на раздел "Документы" в меню навигации сайта.`
    },
    {
      "question": "Как я могу ознакомить с историей нашей кафедры?",
      "answer": `История кафедры доступна в разделе "История кафедры".`
    },
    {
      "question": "Могу ли я внести изменение в своё расписание?",
      "answer": `Нет, однако Вы можете написать заметку с необходимой информацией, которую сможет увидеть каждый сотрудник кафедры. Для этого перейдите в раздел "Моя страница" и введите данные в текстовое поле.`
    }
];

let numOfQuestions = questions.length;
let details, summary, question_p, answer, answer_p;

function FillQuestions() {
    for (let i = 0; i < numOfQuestions; i++) {
        details = document.createElement("details"); 
        summary = document.createElement("summary"); 
        summary.classList.add("question_summ");
        question_p = document.createElement("p"); 
        question_p.textContent = questions[i].question;
        summary.appendChild(question_p);
        details.appendChild(summary);

        answer = document.createElement("div"); 
        answer.classList.add("answer");
        answer_p = document.createElement("p"); 
        answer_p.textContent = questions[i].answer;
        answer.appendChild(answer_p);
        details.appendChild(answer);

        document.querySelector("div.questions").appendChild(details);
    }
}
FillQuestions();