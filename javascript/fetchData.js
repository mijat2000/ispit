let formFilter = document.getElementById("formFilter");
formFilter.addEventListener('submit', (e) => {
    e.preventDefault();
    fetchData();
  
});
fetchData();
function fetchData(){
    let bookNameInput = document.getElementById("bookNameInput");
    let bookAuthorInput = document.getElementById("bookAuthorInput");
    let yearBookAuthor = document.getElementById("yearBookAuthor");

    var formData = new FormData();
    formData.append('name', bookNameInput.value);
    formData.append('author', bookAuthorInput.value);
    formData.append('year', yearBookAuthor.value);
    fetch('../functionality/fetchData.php', {
        method: 'POST',
        body: formData,
    }).then(response => response.json())
    .then(data => {
         //ovde se radi
         let container = document.getElementsByClassName("items-block")[0];
         container.innerHTML="";

         if(data.error){
             console.log(data.error);
         }else{
         data.forEach(row => {
             console.log(row);
             container.innerHTML += `
             <div class="book">
            <div class="flex-title">
                <p class="title">"${row.title}"</p>
                <p class="author">${row.author}</p>
                <p class="year">${row.year}.g</p>
            </div>
            <hr>
            <p class="description">${row.description} </p>
        </div>
             `;
             /*
            const householdUsers = document.createElement("div");
            const household = document.createElement("div");
            householdUsers.classList.add("household-users");
            household.classList.add("household");
            household.innerHTML = `<div class="household-name" id="${row.id_household}"><b>DOMAĆINSTVO: </b><span>${row.household_name}</span><span>ID: ${row.id_household}</span><span>PRISTUP: ${row.access}</span><span class="btn btn-primary" onclick="changeAccess(${row.id_household})">PROMENI PRISTUP</span></div>`;
            householdUsers.appendChild(household);
            main.appendChild(householdUsers);
            fetchUsers(row.id_household);
            */
        });
        
        
    }
    if(container.innerHTML.length <5){
        container.innerHTML=`<p>Nema rezultata.</p>`;
        }
        })
        .catch((error) => {
            console.error('Error:', error);
            return false;
        });
}