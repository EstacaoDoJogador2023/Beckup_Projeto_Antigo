
const searchWrapper = document.querySelector(".search-bar");
const inputBox = searchWrapper.querySelector("input");
const sugestBox = searchWrapper.querySelector(".List");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
let webLink;
inputBox.onkeyup = (e) => {
    let userData = e.target.value; //user enetered data
    let emptyArray = []; //criando array

    if (e.key === 'Enter') { //validaçao array
        if (userData) {
            //window.open(`https://www.google.com/search?q=${userData}`, '_blank') teg certa
            window.open(`./Atletas.html`) // direcionando usuario para um determinado link (tag BLack cria uma nova pagina)
        }
    }

    // validando array pra ver se ta vazio

    if (userData) {
        icon.onclick = () => {
            webLink = `https://www.google.com/search?q=${userData}`;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }

        emptyArray = suggestions.filter((data) => {
            //filtrar o valor da matriz e os caracteres do usuário para letras minúsculas e retornar apenas as palavras que começam com caracteres inseridos pelo usuário
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());

        });

        emptyArray = emptyArray.map((data) => {
            // passando dados de retorno dentro da tag li
            return data = `<li>${data}</li>`;
        });

        searchWrapper.classList.add("active"); //mostrar caixa de preenchimento automático
        showSuggestions(emptyArray);
        let allList = sugestBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adicionando o atributo onclick em todas as tags lista
            allList[i].setAttribute("onclick", "select(this)");
        }

        if (e.key === 'Escape') {
            searchWrapper.classList.remove("active");
        }
    } else {
        searchWrapper.classList.remove("active");
        showSuggestions(emptyArray);
        let allList = sugestBox.querySelectorAll('li');
        for (let i = 0; i < allList.length; i++) {
            allList[i].setAttribute('onclick', 'select(this)')
        }

        if(e.key == 'Escape')
        {
            searchWrapper.classList.remove('active');
        }
        else
        {
             searchWrapper.classList.remove('active'); 
        }
    }

    function select(element) {
        let selectData = element.textContent;
        inputBox.value = selectData;
        icon.onclick = () => {
            webLink = `https://www.google.com/search?q=${selectData}`;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }
        searchWrapper.classList.remove('active');

        function showSuggestions(list) {
            let listData;
            if (!list.length) {
                userValue = inputBox.value;
                listData = `<li>${userValue}</li>`;
            } else {
                listData = list.join('');
            }
            sugestBox.innerHTML = listData;
        }

    }

}