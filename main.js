// document.getElementById("correct_answer").addEventListener("click",function(){
//   document.getElementById("correct_answer").classList.add("blue")
//   console.log("こんにちはい")
// }, false);



// document.getElementById("wrong_answer").addEventListener("click",function(){
//   document.getElementById("wrong_answer").classList.add("red")
// }, false);
// document.getElementById("wrong_answer2").addEventListener("click",function(){
//   document.getElementById("wrong_answer2").classList.add("red")
// }, false);

// document.getElementById("correct_answer").addEventListener("click",function(){
//   document.getElementById("correct_ans").style.display="block";
// })

// document.getElementById("wrong_answer").addEventListener("click",function(){
//   document.getElementById("correct_ans").style.display="block";
// })

// document.getElementById("wrong_answer2").addEventListener("click",function(){
//   document.getElementById("correct_ans").style.display="block";
// })

// document.getElementById("correct_answer").addEventListener("click",function(){
//   document.getElementById("correct_1").style.display="block";
// })




for(let i = 0; i < 10; i ++) {
  const quiz = `<h2>${i + 1}、この地名はなんて読む？</h2>`
+ `<img src="./img/photo${i}.png">`
+ `<ul><li id="correct_${i}" onclick="button(${i})">たかなわ</li><li id="wrong_${i}" onclick="button(${i})">こうわ</li><li id="miss_${i}" onclick="button(${i})">たかわ</li></ul>`
const quiz_box=document.getElementById("quiz_box");
quiz_box.insertAdjacentHTML('beforeend',quiz);
}

function button(tu){
  document.getElementById(`correct_${tu}`).classList.add("blue");
  display: block;
}
// function button(st){
//   document.getElementById(`wrong_${st}`).classList.add("red");
// }
// function button(ro){
//   document.getElementById(`miss_${ro}`).classList.add("red");
// }



