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

function openStaffPage() {
    my_page.classList.remove("active");
    staff_page.classList.add("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../../pages/staff/staff.html" frameborder="0"></iframe>`;
}

function openHistoryPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.add("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../../pages/history/history.html" frameborder="0"></iframe>`;
}

function openHelpPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../../pages/help/help.html" frameborder="0"></iframe>`;
}

function openAbilitiesPage() {
    my_page.classList.remove("active");
    staff_page.classList.remove("active");
    history_page.classList.remove("active");
    docs_page.classList.remove("active");
    page_content.innerHTML = `<iframe src="../../pages/abilities/abilities.html" frameborder="0"></iframe>`;
  
}

let detailsOpen = false;
function changeSummaryBtn() {
    detailsOpen = !detailsOpen;
    if (detailsOpen) summaryBtn.textContent = "скрыть";
    else summaryBtn.textContent = "подробнее";
}

staff_page.addEventListener('click', openStaffPage);
history_page.addEventListener('click', openHistoryPage);
// docs_page.addEventListener('click', openDocsPage);
help_page.addEventListener('click', openHelpPage)
abilities_page.addEventListener('click', openAbilitiesPage)
summaryBtn.addEventListener('click', changeSummaryBtn);
