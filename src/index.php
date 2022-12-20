<?php
require('./data.php');
?>
<!DOCTYPE html>
<html lang="ja">
<?php 
              $search = '%22-11%';
              $data_stmt = $pdo->prepare('SELECT study_date, sum(time) AS time FROM carriculum WHERE study_date LIKE :search group by study_date');
              $data_stmt->execute(['search' => $search]);
              $data_results =  $data_stmt->fetchAll(PDO::FETCH_ASSOC);
              $chart_data = json_encode($data_results);
              $circle_stmt = $pdo->prepare('SELECT sum(time) AS time, name AS subject FROM carriculum WHERE study_date LIKE :search group by name');
              $circle_stmt-> execute(['search' => $search]);
              $circle_results =  $circle_stmt->fetchAll(PDO::FETCH_ASSOC);
              $circle_data = json_encode($circle_results);
              echo $circle_data;
              $content_stmt = $pdo->prepare('SELECT sum(time) AS time, contents AS content FROM carriculum WHERE study_date LIKE :search group by contents');
              $content_stmt-> execute(['search' => $search]);
              $content_results =  $content_stmt->fetchAll(PDO::FETCH_ASSOC);
              $content_data = json_encode($content_results, JSON_UNESCAPED_UNICODE);
              echo $content_data;
            ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body id="overlay">
  <div class="overlay"></div>
  <header>
    <div class="header-container">
      <img class="POSSE_LOGO" src="./picture/posse_logo.jpeg">
      <p class="subtitle-top">
        4th week
      </p>
    </div>
    <button class="main-button" id="mainButton" onclick="mainButton({click:modal,checking:checkingPage,bodyElement:overlay})">記録・投稿</button>
  </header>
  <main>
    <div class="main-container">
      <div class="main-leftcontainer">
        <div class="upper-container">
          <div class="upper-boxes">
            <p class="upper-date">Today</p><br>
            <p class="upper-number">
              <?php 
              $day_stmt = $pdo->prepare('SELECT sum(time) FROM carriculum WHERE study_date=CURDATE()');
              // $week_stmt->bindValue();
              $day_stmt->execute();
              $day_results =  $day_stmt->fetchAll();
              echo($day_results[0][0]);
            ?>
            </p><br>
            <p class="upper-unit">hour</p>
          </div>
          <div class="upper-boxes">
            <p class="upper-date">Month</p><br>
            <p class="upper-number">
            <?php 
              $month_stmt = $pdo->prepare('SELECT sum(time) FROM carriculum WHERE DATE_FORMAT(study_date, "%Y%m")= DATE_FORMAT(NOW(), "%Y%m")');
              $month_stmt->execute();
              $month_results =  $month_stmt->fetchAll();
              echo($month_results[0][0]);
            ?>
            </p><br>
            <p class="upper-unit">hour</p>
          </div>
          <div class="upper-boxes">
            <p class="upper-date">Total</p><br>
            <p class="upper-number">
            <?php 
              $total_stmt = $pdo->prepare('SELECT sum(time) FROM carriculum');
              $total_stmt->execute();
              $total_results =  $total_stmt->fetchAll();
              echo($total_results[0][0]);
            ?>
            </p><br>
            <p class="upper-unit">hour</p>
          </div>
        </div>
        <div class="downercontainer" id="google_chart">
        </div>
      </div>
      <div class="main-rightcontainer">
        <div class="leftcontainer">
          <p class="title-topic">学習言語</p>
          <div id="piechart" class="piechart"></div>
          <ul class="list-language">
            <li class="list-language-item list-javascript">Javascript</li>
            <li class="list-language-item list-CSS">CSS</li>
            <li class="list-language-item list-PHP">PHP</li><br>
            <li class="list-language-item list-HTML">HTML</li>
            <li class="list-language-item list-Laravel">Laravel</li>
            <li class="list-language-item list-SQL">SQL</li><br>
            <li class="list-language-item list-SHELL">SHELL</li>
            <li class="list-language-item list-Japanese">情報システム基礎知識、その他</li>
          </ul>
        </div>
        <div class="rightcontainer">
          <p class="title-topic">学習コンテンツ</p>
          <div id="piechart2" class="piechart"></div>
          <ul class="list-language">
            <li class="list-language-item list-install">ドットインストール</li>
            <li class="list-language-item list-juku">N予備校</li>
            <li class="list-language-item list-homework">POSSE課題</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottom-container">
      <span>＜</span>　2020年8月　<span>＞</span>
    </div>
    <div class="modal" id="modal">
      <div class="modal-close" id="close" onclick="closeButton({click:modal,checking:checkingPage,bodyElement:overlay,document:successPage})">×</div>
      <div class="checking-page" id="checkingPage">
        <div class="checking-detail">
          <div class="checking-left">
            <h1>学習日</h1>
            <input type="date" class="date-input" minlength="10" maxlength="20" size="10">
            <h2>学習コンテンツ（複数選択可）</h2>
            <ul class="contents">
              <li class="contents-list" id="languageLists9">
                <input type="checkbox" id="checkbox9" onclick="checkboxColor({check:languageLists9})">
                <label for="checkbox9">N予備校</label>
              </li>
              <li class="contents-list" id="languageLists10">
                <input type="checkbox" id="checkbox10" onclick="checkboxColor({check:languageLists10})">
                <label for="checkbox10">ドットインストール</label>
              </li>
              <li class="contents-list" id="languageLists11">
                <input type="checkbox" id="checkbox11" onclick="checkboxColor({check:languageLists11})">
                <label for="checkbox11">POSSE課題</label>
              </li>
            </ul>
            <h2>学習言語（複数選択可）</h2>
            <ul class="languages">
              <li class="language-lists" id="languageLists">
                <input id="checkbox1" type="checkbox" onclick="checkboxColor({check:languageLists})">
                <label for="checkbox1">HTML</label>
              </li>
              <li class="language-lists" id="languageLists1">
                <input type="checkbox" id="checkbox2" onclick="checkboxColor({check:languageLists1})">
                <label for="checkbox2">CSS</label>
              </li>
              <li class="language-lists" id="languageLists2" >
                <input type="checkbox" id="checkbox3" onclick="checkboxColor({check:languageLists2})">
                <label for="checkbox3">Javascript</label>
              </li>
              <li class="language-lists" id="languageLists3">
                <input type="checkbox" id="checkbox4" onclick="checkboxColor({check:languageLists3})">
                <label for="checkbox4">PHP</label>
              </li>
              <li class="language-lists" id="languageLists4">
                <input type="checkbox" id="checkbox5" onclick="checkboxColor({check:languageLists4})">
                <label for="checkbox5">Laravel</label>
              </li>
              <li class="language-lists" id="languageLists5">
                <input type="checkbox" id="checkbox6" onclick="checkboxColor({check:languageLists5})">
                <label for="checkbox6">SQL</label>
              </li>
              <li class="language-lists" id="languageLists6">
                <input type="checkbox" id="checkbox7" onclick="checkboxColor({check:languageLists6})">
                <label for="checkbox7">SHELL</label>
              </li>
              <li class="language-lists" id="languageLists7">
                <input type="checkbox" id="checkbox8" onclick="checkboxColor({check:languageLists7})">
                <label for="checkbox8">情報システム基礎知識（その他）</label>
              </li>
            </ul>
          </div>
          <div class="checking-right">
            <h1>学習時間</h1>
            <textarea class="study-time1"></textarea>
            <h1>Twitter用コメント</h1>
            <textarea class="study-time2" id="tweetBox"></textarea>
            <div class="twitter-button" id="twitterButton">
              <input id="twitterButton1" type="checkbox" onclick="checkColor({clicking:twitterButton})">
                <label for="twitterButton1">twitterにシェア</label>
            </div>
          </div>
        </div>
        <div class="checking-bottom">
          <button class="loading-button" id="loadingButton" onclick="loadingOpen({modalElement:checkingPage,picture:loadingPage,completion:successPage})">記録・投稿</button>
        </div>
      </div>
      <div class="loading-page" id="loadingPage">
        <img class="loading" src="./picture/スクリーンショット 2022-04-02 19.01.03.png">
      </div>
      <div class="success-page" id="successPage">
        <img class="success" src="./picture/スクリーンショット 2022-04-02 19.01.25.png">
      </div>
      <div class="calendar" id="calendar"></div>
    </div>
  </main>
  <script src="main.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load(
      'current',
      { 'packages': ['bar', 'corechart'] }
    )
      .then(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string');
      data.addColumn('number');
      var chart = <?= $chart_data;?>;
      let bar = []
      chart.forEach(function(value, index) {
        let date = (value.study_date.substr(8));
        let study_number = Number(value.time);
        bar.push ([date, study_number]);
      })
      console.log(bar);
      data.addRows(bar);
      var options = {
        width: 350,
        height: 300,
        'chartArea': { 'width': '85%', 'height': '70%' },
        legend: { position: 'none' },
        vAxis: {
          format: '#h',
          ticks: [2, 4, 6, 8]
        },
        colors: ['#00ff00']
      };
      var chart = new google.charts.Bar(document.getElementById('google_chart'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    google.charts.setOnLoadCallback(drawpieChart);
    function drawpieChart() {
      var circle_graph = <?= $circle_data ?>;
      let circle = []
      circle_graph.forEach(function(value, index) {
        let lang = value.subject;
        let time = Number(value.time);
        circle.push([lang, time]);
      })
      console.log(circle);
      var piedata = google.visualization.arrayToDataTable(circle,true);
      // piedata.addRows(circle);
      var pieoptions = {
        width: 180,
        height: 180,
        'chartArea': { 'width': '95%', 'height': '95%' },
        pieHole: 0.5,
        legend: { position: 'none' },
        colors: ['#0445EC', '#0F70FD', '#20BDDE', '#3CCEFE', '#B29EF3', '#6C46EB', '#4A17EF', '#3005C0']
      }
      var chart1 = new google.visualization.PieChart(document.getElementById('piechart'));
      chart1.draw(piedata, pieoptions);

    }
    google.charts.setOnLoadCallback(drawpieChart2);
    function drawpieChart2() {
      var content_graph = <?= $content_data ?>;
      let content = []
      content_graph.forEach(function(value, index) {
        let cont = String(value.content);
        let time = Number(value.time);
        content.push([cont, time]);
      })
      console.log(content);
      var piedata2 = google.visualization.arrayToDataTable(content,true);
      var pieoptions2 = {
        width: 180,
        height: 180,
        pieHole: 0.5,
        'chartArea': { 'width': '95%', 'height': '95%' },
        legend: { position: 'none' },
        colors: ['#0445EC', '#1270BD', '#20BDDE']
      }
      var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
      chart2.draw(piedata2, pieoptions2);

    };
  </script>
</body>

</html>