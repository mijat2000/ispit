let newBookForm = document.getElementById("add-book-block");
let addBookButton = document.getElementById("addBookItemList");
let editBookButton = document.getElementById("editBOokItemList");
let addBookSection = document.getElementById("add-book-block");
let editBookSection = document.getElementById("edit-book-block");


addBookButton.addEventListener('click', () => {
    addBookSection.classList.remove("hidden");
    editBookSection.classList.add("hidden");

})

editBookButton.addEventListener('click', () => {
    editBookSection.classList.remove("hidden");
    addBookSection.classList.add("hidden");

})

newBookForm.addEventListener('submit', (e) => {
    e.preventDefault();
    addNewBook();
})


function addNewBook() {
    let title = document.getElementById("bookNameInput").value;
    let author = document.getElementById("bookAuthorInput").value;
    let year = document.getElementById("yearBookAuthor").value;
    let desc = document.getElementById("DesriptionBookAuthor").value;

    var formData = new FormData();
    formData.append('title', title);
    formData.append('author', author);
    formData.append('year', year);
    formData.append('desc', desc);
    fetch('../functionality/addBook.php', {
        method: 'POST',
        body: formData,
    }).then(response => response.json())
        .then(data => {
            console.log(data.error);
            if (data.error === 1) {
                alert("Doslo je do greske!");
            }
            else {
                alert("Uspesno ste dodali novu knjigu!");
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            return false;
        });
}

let formFilter = document.getElementById("formFilter");
formFilter.addEventListener('submit', (e) => {
    e.preventDefault();
    fetchData();
    console.log("radi");

});
fetchData();
function fetchData() {
    let bookNameInput = document.getElementById("bookNameInput1");
    let bookAuthorInput = document.getElementById("bookAuthorInput1");
    let yearBookAuthor = document.getElementById("yearBookAuthor1");

    console.log(bookNameInput.value + bookAuthorInput.value);
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
            container.innerHTML = "";

            if (data.error) {
                console.log(data.error);
            } else {
                data.forEach(row => {
                    // console.log(row);
                    container.innerHTML += `
             <div class="book">
            <div class="flex-title">
                <p class="title">"${row.title}"</p>
                <p class="author">${row.author}</p>
                <p class="year">${row.year}.g</p>
            </div>
            <hr>
            <p class="description">${row.description} </p>
            <div>
            <button onClick="Obrisi(${row.book_id})">Obrisi</button>
            <button onClick="Izmeni(${row.book_id},'${row.title}','${row.author}','${row.year}','${row.description}')">Izmeni</button>
            </div>
        </div>
             `;

                });

            }
            if (container.innerHTML == "")
                container.innerHTML = `<p>Nema rezultata.</p>`
        })
        .catch((error) => {
            console.error('Error:', error);
            return false;
        });
}
function Obrisi(id) {
    var formData1 = new FormData();
    formData1.append('id', id);
    fetch('../functionality/deleteBook.php', {
        method: 'POST',
        body: formData1,
    }).then(response => response.json())
        .then(data => {

            fetchData();
        })
        .catch((error) => {
            console.error('Error:', error);
            return false;
        });
}
let modal1 = document.getElementById("modal");
let izlaz = document.getElementById("izlaz");
izlaz.addEventListener("click", () => {
    modal1.classList.add("none");
});

function Izmeni(id, title, author, year, desc) {
    document.getElementById("bookNameInput2").value = title;
    document.getElementById("bookAuthorInput2").value = author;
    document.getElementById("yearBookAuthor2").value = year;
    document.getElementById("DesriptionBookAuthor2").value = desc;



    modal1.classList.remove("none");
    let formaIzmena = document.getElementById("add-book-form2");
    formaIzmena.addEventListener('submit', (e) => {

        let title1 = document.getElementById("bookNameInput2").value;
        let author1 = document.getElementById("bookAuthorInput2").value;
        let year1 = document.getElementById("yearBookAuthor2").value;
        let desc1 = document.getElementById("DesriptionBookAuthor2").value;
        e.preventDefault();
        console.log(id, title1, author1, parseInt(year1), desc1);
        var formData2 = new FormData();
        formData2.append('id', id);
        formData2.append('name', title1);
        formData2.append('author', author1);
        formData2.append('year', parseInt(year1));
        formData2.append('desc', desc1);
        fetch('../functionality/update.php', {
            method: 'POST',
            body: formData2,
        }).then(response => response.json())
            .then(data => {
                if (data.error === 0)
                    alert("uspesna izmena");


            })
            .catch((error) => {
                console.error('Error:', error);
                return false;
            });
    })
}