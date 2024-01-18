// fetch('https://www.cbr-xml-daily.ru/daily_json.js').then(function(result) {
//     return result.json()
// }).then(function(data){
//     console.log(data)
// })

const rates = {};
const elementUSD = document.querySelector('[data-value="USD"]');
const elementEUR = document.querySelector('[data-value="EUR"]');
const elementTRY = document.querySelector('[data-value="TRY"]');

get_currency();

async function get_currency() {
    const responce = await fetch('https://www.cbr-xml-daily.ru/daily_json.js');
    const data = await responce.json();
    const result = await data;
   
    rates.USD = result.Valute.USD;
    rates.EUR = result.Valute.EUR;
    rates.TRY = result.Valute.TRY;

    console.log(rates);

    elementUSD.textContent = rates.USD.Value.toFixed(2).replace('.', ',');
    elementEUR.textContent = rates.EUR.Value.toFixed(2).replace('.', ',');
    elementTRY.textContent = (rates.TRY.Value / 10 ).toFixed(2).replace('.', ',');
}


// $.ajax({
//     url: 'https://v6.exchangerate-api.com/v6/9945c52eb203bfd52c0f2647/latest/USD', // Замените URL на соответствующий сайт с курсами валют
//     type: 'GET',
//     dataType: 'html',
//     success: function(response) {
//       // Извлечение данных из HTML-ответа
//       var usdToTry = $(response).find('#TRY').text(); // Замените '#usd-to-try-rate' на селектор, соответствующий курсу Доллара США к Турецкой Лире на сайте

//       // Вывод данных на HTML-странице
//       $('#TRY').text(usdToTry);
//     },
//     error: function() {
//       // Обработка ошибки
//       alert('Произошла ошибка при загрузке курсов валют.');
//     }
// });

