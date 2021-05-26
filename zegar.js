function odliczanie() {
	var data = new Date();
	var dzienTyg = data.getDay();
	switch(dzienTyg) {
		case 0: dzienTyg="Niedziela"; break;
		case 1: dzienTyg="Poniedziałek"; break;
		case 2: dzienTyg="Wtorek"; break;
		case 3: dzienTyg="Środa"; break;
		case 4: dzienTyg="Czwartek"; break;
		case 5: dzienTyg="Piątek"; break;
		case 6: dzienTyg="Sobota"; break;
	}
	var dzien = data.getDate();
	if(dzien < 10) dzien = "0" + dzien;
	var miesiac = data.getMonth()+1;
	switch(miesiac) {
		case 1: miesiac="stycznia"; break;
		case 2: miesiac="luty"; break;
		case 3: miesiac="marca"; break;
		case 4: miesiac="kwietnia"; break;
		case 5: miesiac="maja"; break;
		case 6: miesiac="czerwca"; break;
		case 7: miesiac="lipca"; break;
		case 8: miesiac="sierpnia"; break;
		case 9: miesiac="września"; break;
		case 10: miesiac="października"; break;
		case 11: miesiac="listopada"; break;
		case 12: miesiac="grudnia"; break;
	}
	var rok = data.getFullYear();
	var godzina = data.getHours();
	if(godzina < 10) godzina = "0" + godzina;
	var minuta = data.getMinutes();
	if(minuta < 10) minuta = "0" + minuta;
	var sekunda = data.getSeconds();
	if(sekunda < 10) sekunda = "0" + sekunda;
	document.getElementById("timer").innerHTML = dzienTyg + " | " + dzien + " " + miesiac + " " + rok + " roku | " + godzina + ":" + minuta + ":" + sekunda;
	setTimeout("odliczanie()", 1000);
}