const modtager = document.getElementById('btn-modtager');
const afsender = document.getElementById('btn-afsender');

let index = 0;

const blue = ['#1D1E38', '#FF6800'];
const orange = ['#FF6800', '#1D1E38'];

modtager.addEventListener('click', function onClick() {
    modtager.style.backgroundColor = blue[index];
    modtager.style.color = 'white';

    index = index >= blue.length - 1 ? 0 : index + 1;
});

afsender.addEventListener('click', function onClick() {
    afsender.style.backgroundColor = orange[index];
    afsender.style.color = 'white';

    index = index >= orange.length - 1 ? 0 : index + 1;
});