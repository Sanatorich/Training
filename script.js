document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector(".container");
  const seats = document.querySelectorAll(".row .seat:not(.sold)");
  const count = document.getElementById("count");
  const total = document.getElementById("total");
  const movieSelect = document.getElementById("movie");

  // Обновление цены билета на основе выбранного фильма
  let ticketPrice = +movieSelect.options[movieSelect.selectedIndex].getAttribute('data-movie-cost');

  // Обновление цены билета при изменении выбранного фильма
  movieSelect.addEventListener("change", (e) => {
    ticketPrice = +e.target.options[e.target.selectedIndex].getAttribute('data-movie-cost');
    updateSelectedCount();
  });

  // Функция для обновления количества выбранных мест и общей стоимости
  function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll(".row .seat.selected");
    const selectedSeatsCount = selectedSeats.length;
    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice;
  }

  // Обработка события клика по месту
  container.addEventListener("click", (e) => {
    if (e.target.classList.contains("seat") && !e.target.classList.contains("sold")) {
      e.target.classList.toggle("selected");
      updateSelectedCount();
    }
  });

  updateSelectedCount();
});
