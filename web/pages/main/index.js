let userData = document.querySelector('.user_data').textContent.split(';;');
document.querySelector('.user_data').remove();

let subjData = document.querySelector('.subj_data').textContent.split(';;');
document.querySelector('.subj_data').remove();


//For contain main information
let locationSpan = document.querySelector('.addition_information p:nth-child(1) span:nth-child(2)');
let phoneSpan = document.querySelector('.addition_information p:nth-child(2) span:nth-child(2)');
let emailSpan = document.querySelector('.addition_information p:nth-child(3) span:nth-child(2)');

document.querySelector('.user_name').innerHTML = `<span>${userData[3]} </span><span>${userData[4]}</span>`;
document.querySelector('.user_father_name').innerHTML = userData[5];
document.querySelector('.job').innerHTML = `<span>${userData[9]}</span>, <span>${userData[10]}</span>`;
locationSpan.innerHTML = userData[6];
phoneSpan.innerHTML = userData[7];
emailSpan.innerHTML = userData[8];
document.querySelector('.addition_information p:nth-child(9) span:last-child').innerHTML = userData[11];
let userPhotoSrc = `../../assets/images/photos/${userData[0]}.jpg`;
document.querySelector('.user_photo').src = userPhotoSrc;
document.querySelector('.user_photo_inHead img').src = userPhotoSrc;

let courses = document.querySelector('.addition_information ul');
courses.innerHTML = '';
for (let i = 0; i < subjData.length; i++) {
    const subjectLi = document.createElement('li');
    subjectLi.textContent = subjData[i];
    courses.append(subjectLi);
}

// --------------------------------------------------------------------------------------- //



document.querySelector("main").style.minHeight = `calc(100vh - 80px)`;
document.querySelector(".content_wrap").style.minHeight = `calc(100vh - 80px)`;


const help_page = document.querySelector(".footer_content").children[0];
const abilities_page = document.querySelector(".footer_content").children[2];

const nav_menu = document.querySelector(".menu");
const my_page = nav_menu.children[0];
const staff_page = nav_menu.children[1];
const history_page = nav_menu.children[2];
const docs_page = nav_menu.children[3];

const summaryBtn = document.querySelector(".left_main summary p");
const page_content = document.querySelector(".page_content");


// --------------------------------------------------------------------------------------- //
function openDocsPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.add("active");
    page_content.innerHTML = `<iframe src="https://docs.google.com/document/" frameborder="0"></iframe>`;
}
// --------------------------------------------------------------------------------------- //

function openMainPage() {
    my_page.classList.add("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../profile_page/profile_page.php" frameborder="0"></iframe>`;
}
openMainPage();

function openStaffPage() {
    my_page.classList.remove("active");
    staff_page.classList.add("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../staff/staff.php" frameborder="0"></iframe>`;
}

function openHistoryPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.add("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../history/history.html" frameborder="0"></iframe>`;
}

function openHelpPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../help/help.php" frameborder="0"></iframe>`;
}

function openAbilitiesPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../abilities/abilities.html" frameborder="0"></iframe>`;
}

let detailsOpen = false;
function changeSummaryBtn() {
    detailsOpen = !detailsOpen;
    if (detailsOpen) summaryBtn.textContent = "скрыть";
    else summaryBtn.textContent = "подробнее";
}

my_page.addEventListener('click', openMainPage);
staff_page.addEventListener('click', openStaffPage);
history_page.addEventListener('click', openHistoryPage);
// docs_page.addEventListener('click', openDocsPage);
help_page.addEventListener('click', openHelpPage)
abilities_page.addEventListener('click', openAbilitiesPage)
summaryBtn.addEventListener('click', changeSummaryBtn);



let changePersonDataBtn = document.querySelector('.change');
let isChange = false;
let strToPost;
function showChange() {
    isChange = !isChange;
    changePersonDataBtn.textContent = isChange ? 'готово!' : 'редактировать';
    locationSpan.contentEditable = isChange ? 'true' : 'false';
    phoneSpan.contentEditable = isChange ? 'true' : 'false';
    emailSpan.contentEditable = isChange ? 'true' : 'false';
    locationSpan.classList.toggle('content_editable_span');
    phoneSpan.classList.toggle('content_editable_span');
    emailSpan.classList.toggle('content_editable_span');

    if (isChange === false) {
        strToPost = `${locationSpan.textContent}, ${phoneSpan.textContent}, ${emailSpan.textContent}`;
        document.querySelector('form.change_person_data textarea').value = strToPost;
        document.querySelector('form.change_person_data').submit();
    }
}
changePersonDataBtn.addEventListener('click', showChange);