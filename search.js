const clothesList = document.getElementById('clothesList');
const searchBar = document.getElementById('search-bar');
let iihmClothes = [];

searchBar.addEventListener('keyup', (e) => {
    const searchString = e.target.value.toLowerCase();
    const filteredClothes = iihmClothes.filter((clothe) => {
        console.log("clothe",clothe);
        return (
            clothe.title.toLowerCase().includes(searchString) ||
            clothe.image.front.toLowerCase().includes(searchString)
        );
    });
    displayClothes(filteredClothes);
});

const loadClothes = async () => {
    try {
        const res = await fetch("json_files/t-shirts.json");
        console.log("res")
        iihmClothes = await res.json();
        //displayClothes(iihmClothes);
    } catch (err) {
        console.error(err);
    }
};

const displayClothes = (Clothes) => {
    console.log("test dsplay");
    const htmlString = Clothes
        .map((clothe) => {
            return `
            <li class="clothe">
                <img src="${clothe.image.front}"></img>
                <h2>${clothe.title}</h2>
                
            </li>
        `;
        })
        .join('');
    clothesList.innerHTML = htmlString;
};

loadClothes();
