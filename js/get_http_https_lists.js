let urls = ['http://google.com', 'https://youtube.com', 'https://vk.com', 'http://yandex.ru', 'https://mail.ru'];
let httpList = document.querySelector('.protocol-lists-container .http-list');
let httpsList = document.querySelector('.protocol-lists-container .https-list');

urls.forEach(url => {
    url.startsWith('https') ? httpsList.innerHTML += `<li>${url}</li>` : httpList.innerHTML += `<li>${url}</li>`;
});