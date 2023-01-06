function redirect() {
  window.location.assign("table.php");

  // Zablokuj domyślne przejście na inną stronę
  return false;
}

//funkcje dotyczące wyświetlania daty.
const today = new Date();

let day = today.getDate();
if (day < 10) {
  day = `0${day}`;
}

const month = today.getMonth() + 1;
const year = today.getFullYear();
const todayString = `${year}-${month}-${day}`;

document.getElementById("datePicker").setAttribute = new Date();
document
  .getElementById("datePicker")
  .setAttribute("min", `${year}-${month}-${day}`);
