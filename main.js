'use script';
// let question_option1 = ["こうわ","たかなわ","たかわ"]
// let question_option2 = ["かめど","かめいど","かめと"]
// let question_option3 = ["おかとまち","こうじまち","かゆまち"]
let question_options = [["こうわ","たかなわ","たかわ"],["かめど","かめいど","かめと"],["おかとまち","こうじまち","かゆまち"]]
let correct_answer = ["たかなわ","かめいど","こうじまち"]
function question_click(question_number, chosen_number){
  const chosen = document.getElementById(`three_options${question_number}_${chosen_number}`)
  const correct = document.getElementById(`three_options${question_number}_${question_options[question_number].indexOf(correct_answer[question_number]) + 1}`)
  const correctCont = document.getElementById(`correctContainer${question_number}`)
  const wrongCont = document.getElementById(`wrongContainer${question_number}`)
  console.log(chosen.innerHTML)
  console.log(correct.innerHTML)
  chosen.classList .add ("wrong-answer")
  correct.classList .add ("correct-answer")
  if(chosen.innerHTML === correct_answer[question_number]){
    correctCont.classList.add ("correct-box-act")
    // chosen.innerHTML= "正解"
  } else {
    wrongCont.classList.add ("wrong-box-act")
  }
  document.getElementsByName(`option${question_number}`).forEach(element => {
    element.style.pointerEvents = "none";
  });
}

for(i = 0; i < 3; i++){
  const shuffle = question_options[i];
  for(x = shuffle.length ; 1<x ; x--){
    k= Math.floor(Math.random() * shuffle.length);
    [shuffle [k], shuffle[x-1]] = [shuffle [x-1], shuffle [k]];
  }
  
  let container_box = 
    `<h2>${i + 1}、この地名なんて読む？</h2>`
    +`<div class="picture"><img src="./picture/picture${i}.png"></div>`
    +`<p class = "options" id = "three_options${i}_1" name ="option${i}" onclick = "question_click(${i},1)">${question_options[i][0]}</p>`
    +`<p class = "options" id = "three_options${i}_2" name ="option${i}" onclick = "question_click(${i},2)">${question_options[i][1]}</p>`
    +`<p class = "options" id = "three_options${i}_3" name ="option${i}" onclick = "question_click(${i},3)">${question_options[i][2]}</p>`
    +`<div class="correct-box" id="correctContainer${i}"><p><span>正解！</span></p><p>答えは${correct_answer[i]}ですう</p></div>`
    +`<div class="wrong-box" id="wrongContainer${i}"><p><span>不正解！</span></p><p>答えは${correct_answer[i]}です</p></div>`;
    document.write(container_box)
}
console.log(question_options);



