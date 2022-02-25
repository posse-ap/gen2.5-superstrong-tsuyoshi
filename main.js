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

let No1Selection = ['たかなわ','たかわ','こうわ']
let No2Selection = ['かめいど','かめど','かめと']
let No3Selection = ['こうじまち','かゆまち','おかとまち']
let No4Selection = ['おなりもん','おかどもん','ごせいもん']
let No5Selection = ['とどろき','たたら','たたりき']
let No6Selection = ['しゃくじい','せきこうい','いじい']
let No7Selection = ['ぞうしき','ざっしき','ざっしょく']
let No8Selection = ['おかちまち','みとちょう','ごしろちょう']
let No9Selection = ['ししぼね','ろっこつ','しこね']
let No10Selection= ['こぐれ','こばく','こしゃく']
let Selections   = [No1Selection,No2Selection,No3Selection,No4Selection,No5Selection,
  No6Selection,No7Selection,No8Selection,No9Selection,No10Selection]
let answer = ['たかなわ','かめいど','こうじまち','おなりもん','とどろき','しゃくじい','ぞうしき','おかちまち','ししぼね','こぐれ']

// });


for(let i = 0; i < 10; i ++) {
  let li = [`<li id="correct_${i}" onclick="button(${i})">${Selections[i][0]}</li>`,
  `<li id="wrong_${i}" onclick="buttons(${i})">${Selections[i][1]}</li>`,
  `<li id="miss_${i}" onclick="option(${i})">${Selections[i][2]}</li>`]
    
    // Selections.(element => {
      // const shuffle = ([...Selections]) => {
        for (let k = li.length - 1; k >= 0; k--) {
          const j = Math.floor(Math.random() * (k + 1));
          [li[k], li[j]] = [li[j], li[k]];
          console.log(li)
          // return li;
      }
  const quiz = `<h2>${i + 1}、この地名はなんて読む？</h2>`
+ `<img src="./img/photo${i}.png">`
+ `<ul>${li[0]}${li[1]}${li[2]}</ul>`
+ `<div id="answer_${i}" class="answer_invisible">
<p class="congratulation">正解!</p>
<p>正解は${answer[i]}ですう</p>
</div>`
+ `<div id="mistake_${i}" class="answer_invisible">
<p class="bad">不正解!</p>
<p>正解は${answer[i]}ですう</p>
</div>`
const quiz_box=document.getElementById("quiz_box");
quiz_box.insertAdjacentHTML('beforebegin',quiz);
}

function button(tu){
  document.getElementById(`correct_${tu}`).classList.add("blue");
  document.getElementById(`answer_${tu}`).classList.add("answer");
  document.getElementById(`wrong_${tu}`).classList.add ("pointer_events");
  document.getElementById(`miss_${tu}`).classList.add ("pointer_events");
}
function buttons(tu){
  document.getElementById(`wrong_${tu}`).classList.add("red");
  document.getElementById(`mistake_${tu}`).classList.add("answer");
  document.getElementById(`correct_${tu}`).classList.add("blue");
  document.getElementById(`miss_${tu}`).classList.add ("pointer_events");
}
function option(ro){
  document.getElementById(`miss_${ro}`).classList.add("red");
  document.getElementById(`mistake_${ro}`).classList.add("answer");
  document.getElementById(`correct_${ro}`).classList.add("blue");
  document.getElementById(`wrong_${ro}`).classList.add ("pointer_events");
}