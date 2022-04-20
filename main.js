// const mainButton = document.getElementById("mainButton")
const modal = document.getElementById("modal");
const checkingPage = document.getElementById("checkingPage");
const close = document.getElementById("close");
const loadingPage = document.getElementById("loadingPage");
const successPage = document.getElementById("successPage");
const calendar = document.getElementById("calendar");
const mainButton =({click,checking,bodyElement})=>{
	click.classList.add(`active`);
	checking.classList.add(`active`);
	bodyElement.classList.add(`open-overlay`)
	// load.classList.add(`active`);
	// successPage.classList.add(`active`);
	console.log(checking);
}

const closeButton =({click,checking,bodyElement,document})=>{
	click.classList.remove(`active`);
	checking.classList.remove(`active`);
	bodyElement.classList.remove(`open-overlay`)
	document.classList.remove(`active`)
	// load.classList.add(`active`);
	// successPage.classList.add(`active`);
	console.log(checking);
}

const checkbox = document.getElementById("checkbox1")
// checkbox.addEventListener(`click`,function(){
// 	checkbox.classList.toggle(`language-lists1`)
// })
const checkboxColor =({check})=>{
	check.classList.toggle(`language-lists1`);
}

const twitter = document.getElementById("twitterButton1")

const checkColor=({clicking})=>{
	clicking.classList.toggle(`twitter-button`)
}
const loadingOpen = ({modalElement,picture,completion})=>{
	modalElement.classList.remove(`active`);
	picture.classList.add(`active`);
	setTimeout(() => {
		completion.classList.add(`active`)
		picture.classList.remove(`active`)
	}, 5000);
}






