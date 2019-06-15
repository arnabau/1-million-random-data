/**
 * DOM Load
 */
document.addEventListener('DOMContentLoaded', loadDOM);

// Content loaded
function loadDOM() {

    // Get current URL
    const cURL = Utils.getCurrentURL();
    // console.log(cURL);
}

/**
 * Listen for send data button
 */
document.querySelector('.form-send').addEventListener('click', (e) => {
    e.preventDefault();

    Utils.buttonAction(true);
    console.log('Processing data...');

    sendData();
});

/**
 * Listen for get data button
 */
document.querySelector('.form-get').addEventListener('click', (e) => {
    e.preventDefault();

    Utils.buttonAction(true);
    console.log('Getting data...');

    getData(1);
});

/**
 * Get data from database
 */
const getData = (pageNum) => {
    const http = new SetHTTP;
    Utils.getClean();

    http.get('http://edurio.test/tables/source/get_data.php')
        .then(response => {
            if (response.error) {
                console.log(response.error);
                Utils.buttonAction(false);
            } else {
                createList(response, pageNum);
            }
        })
        .catch(err => console.log(err));
};

/**
 * Generate random data
 */
const sendData = () => {
    const http = new SetHTTP;
    Utils.getClean();

    http.get('http://edurio.test/generate.php')
        .then(response => {
            if (response.error) {
                console.log(response.error);
                Utils.buttonAction(false);
            } else {
                console.log('Data saved!');
                getData(1);
            }
        })
        .catch(err => console.log(err));
};

/**
 * Show list
 */
const createList = (dataList, currentPage) => {
    console.log('Trying to generate the list...');
    console.log(dataList.records.length);
    Utils.getClean();
    Utils.putFlash('Working, please stand by...');

    if (currentPage === null || currentPage === 0 || currentPage === '') {
        currentPage = 1;
    }

    let recordsPerPage = 50;
    let totalRecords = dataList.records.length;
    let totalPages = Math.ceil(totalRecords/recordsPerPage);

    let startIndex = (currentPage-1) * recordsPerPage;
    let endIndex = startIndex + recordsPerPage;
    let dataValues = dataList.records.slice(startIndex,endIndex);

    let list = '';
    let html = "";

    html += `<ul class="list-group mt-2 mb-2">`;

    for(let i = 0; i < dataValues.length; i++){
        html += `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            ${dataValues[i].a} <span class="badge badge-secondary badge-pill">3% ${dataValues[i].b}</span>
            <span class="badge badge-secondary badge-pill">5% ${dataValues[i].c}</span>
            <span class="badge badge-primary badge-pill"># ${i + 1}</span>
        </li>
        `;

    }

    html += `</ul>`;
    document.getElementsByClassName('list-group')[0].innerHTML = html;

    list += `<div class="d-flex p-2">
            <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
    `;
    for (let i = 1; i <= totalPages; i++){
        list += `
            <li class="page-item" id="el${i}"><a class="page-link" href="#">${i}</a></li>
        `;
    }

    list += `</ul></nav></div>`;
    document.getElementsByClassName('pagination')[0].innerHTML = list;

    // $('.modal').modal('hide');
    console.log('Finish!');
    Utils.buttonAction(false);
}

/**
 * Listen for pagination buttons
 */
document.querySelector('.pagination').addEventListener('click', (e) => {
    // document.querySelector('.list-group').innerHTML = '';
    // document.querySelector('.pagination').innerHTML = '';
    Utils.getClean();
    Utils.putFlash('Working, please stand by...');
    // Get text from the button clicked
    let pageNum = parseInt(e.target.textContent);
    getData(pageNum);
});

/**
 * HTTP requests Class
 **/
class SetHTTP {
    // Make an HTTP GET Request
    async get(url) {
        const response = await fetch(url);
        const resData = await response.json();
        return resData;
    }
}

/**
 * Class Utils
 */
class Utils {
    // Get current URL
    static getCurrentURL () {
        const currentUrl = window.location.pathname.split('/');
        // Return split value to get only the last one
        return currentUrl[1];
    }

    // Enable/Disable buttons
    static buttonAction (action) {
        if (action === true) {
            // $('.modal').modal('show');
            document.querySelector('.form-get').disabled = true;
            document.querySelector('.form-get').textContent = 'Getting data...';
            document.querySelector('.form-send').disabled = true;
            document.querySelector('.form-send').textContent = 'Processing data...';
            Utils.putFlash('Working, please stand by...');
        } else {
            // $('.modal').modal('hide');
            document.querySelector('.form-get').disabled = false;
            document.querySelector('.form-get').textContent = 'Get data...';
            document.querySelector('.form-send').disabled = false;
            document.querySelector('.form-send').textContent = 'Insert data';
            document.querySelector('.message').style = 'display:none';
        }
    }

    static putFlash (msg) {
        document.querySelector('.message').style = 'display:block';
        document.querySelector('.message').textContent = msg;
    }

    static getClean () {
        document.querySelector('.list-group').innerHTML = '';
        document.querySelector('.pagination').innerHTML = '';
    }
}