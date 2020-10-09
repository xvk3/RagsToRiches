<html>
  <head>
  <title>Rags to Riches - Dark Souls PvP Gamemode</title>
  <style>

*{
  border:0;
}

#tbl {
  position: relative;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

#tbl th{
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: center;
  background-color: rgb(164,164,164);
  border: 1px solid;
  position: relative;
  height: 60px;
}

#tbl input{
  position: absolute;
  left:0; top:0; bottom:0; right:0;
  height: 100%;
  margin-right: 12px;
  margin-bottom: 12px;
  padding-left: 12px;
}

#tbl tr {
  border: 1px solid;  
}

#tbl td {
  border: 1px solid;
  width: 150px;
  height: 50px;
}

#tbl tr:hover {
  background-color: #f2f2f2;
}

table tr.active {
  background-color: #cfcfcf;
}
  </style>
  <script src="./js/jquery.min.js"></script>
  
  </head>
  <body>
  <table id="tbl">
    <tr><th>Misfortune</th><th>Common</th><th>Common</th><th>Rare</th></tr>
    <tr><td id=misfortune>misfortune</td><td id=common1>common1</td><td id=common2>common2</td><td id=rare>rare</td></tr>
    <tr><td id=misfortune2><img id=imisfortune src="./icons/null.png" width="102" height="120"></td><td id=common12><img id=icommon1 src="./icons/null.png" width="102" height="120"></td><td id=common22><img id=icommon2 src="./icons/null.png" width="102" height="120"></td><td id=rare2><img id=irare src="./icons/null.png" width="102" height="120"></td></tr>
  </table>
  <br>
  <button type="button" id="test">Invasion Won!</button>
  <button type="button" id="lost">Invasion Lost :(</button>
  <br>
  <p>Wins: </p><p id="wins">0</p>
  <p>Losses:</p><p id="losses">0</p>

  <script>

    // handle test
    document.getElementById("test").onclick = function() {
      generateResults()
      var val = document.getElementById("wins").innerHTML;
      val++;
      document.getElementById("wins").innerHTML = val;
    };

    document.getElementById("lost").onclick = function() {
      resetAll();
      generateMisfortune();
      var val = document.getElementById("losses").innerHTML;
      val++;
      document.getElementById("losses").innerHTML = val;
    };

    // handle reward refresh
    document.getElementById("misfortune").onclick = function() {generateMisfortune()};
    document.getElementById("common1").onclick = function() {generateCommon("common1")};
    document.getElementById("common2").onclick = function() {generateCommon("common2")};
    document.getElementById("rare").onclick = function() {generateRare()};

    // handle reward refresh
    document.getElementById("misfortune2").onclick = function() {generateMisfortune()};
    document.getElementById("common12").onclick = function() {generateCommon("common1")};
    document.getElementById("common22").onclick = function() {generateCommon("common2")};
    document.getElementById("rare2").onclick = function() {generateRare()};

    // handle reward refresh
    document.getElementById("imisfortune").onclick = function() {generateMisfortune()};
    document.getElementById("icommon1").onclick = function() {generateCommon("common1")};
    document.getElementById("icommon2").onclick = function() {generateCommon("common2")};
    document.getElementById("irare").onclick = function() {generateRare()};


    // functions
    function generateMisfortune() {
      var num = Math.floor(Math.random() * misfortunes.length);
      document.getElementById("misfortune").innerHTML = misfortunes[num][0];
      if(misfortunes[num][1] != false)  {
        return document.getElementById("imisfortune").setAttribute("src", misfortunes[num][1]);
      }
      documnet.getElementById("imisfortune").getAttribute("src", "");
    }

    function generateCommon(id) {
      var num = Math.floor(Math.random() * commons.length);
      document.getElementById(id).innerHTML = commons[num][0];
      if(commons[num][1] != false)  {
        return document.getElementById("i" + id).setAttribute("src", commons[num][1]);
      }
      documnet.getElementById("i" + id).getAttribute("src", "");
    }

    function generateRare() {
      var num = Math.floor(Math.random() * rares.length);
      document.getElementById("rare").innerHTML = rares[num][0];
      if(rares[num][1] != false)  {
        return document.getElementById("irare").setAttribute("src", rares[num][1]);
      }
      documnet.getElementById("irare").getAttribute("src", "");
    }

    function resetAll() {

      document.getElementById("imisfortune").setAttribute("src", "./icons/null.png");
      document.getElementById("icommon1").setAttribute("src", "./icons/null.png");
      document.getElementById("icommon2").setAttribute("src", "./icons/null.png");
      document.getElementById("irare").setAttribute("src", "./icons/null.png");

      document.getElementById("misfortune").innerHTML = "";
      document.getElementById("common1").innerHTML = "";
      document.getElementById("common2").innerHTML = "";
      document.getElementById("rare").innerHTML = "";

    }

    function generateResults()  {
      resetAll();
      var num = Math.floor(Math.random() * 100);
      if(num >= 95)             {generateMisfortune();}
      num = Math.floor(Math.random() * 100);
      if(num >= 10)             {
        generateCommon("common1");
        num = Math.floor(Math.random() * 100);
        if(num >= 50)           {generateCommon("common2");}
      }
      num = Math.floor(Math.random() * 100);
      if(num >= 86)             {generateRare();}
    }

    /*
    var misfortunes = [
      ["Left Ring Broken",false],
      ["Right Ring Broken",false],
      ["Wear Calamity Ring for 3 invasions","./icons/calamity-ring.png"]
    ];

    var commons = [
      ["Hand Axe","./icons/axes_hand-axe.png"],
      ["Dagger","./icons/daggers_dagger.png"],
      ["Grass Crest Shield","./icons/medium_shields-grass-crest-shield"],
      ["Mail Breaker","./icons/thrusting_swords_mail-breaker"]
    ];

    var rares = [
      ["Murakumo","./icons/curved-greatswords_murakumo.png"],
      ["Chaos Blade","./icons/katanas_chaos-blade.png"]
      ["Uchigatana","./icons/katanas_uchigatana.png"],
      ["Great Club","./icons/great-hammers_great-club.png"],
      ["Hornet Ring","./icons/hornet-ring.png"],
      ["Dark Wood Grain Ring","./icons/dark-wood-grain-ring.png"],
      ["Gold Tracer","./icons/curved-swords_gold-tracer.png"],
      ["Shotel","./icons/curved-sword_shotel.png"]
    ];*/

    var misfortunes = [
<?php
  $handle = fopen("misfortune.txt", "r");
  if($handle) {
    while(($line = fgets($handle)) !== false)  {
      if($line[0] != '#') {
        $line_arr = explode(",", $line);
        for($i = 0; $i < (int)$line_arr[2]; $i++)  {
          echo "      [" . $line_arr[0] . ",\"icons/" . substr($line_arr[1],1) . "],\r\n";  
        }
      }
    }
  }
?>
    ];

    var commons = [
<?php
  $handle = fopen("common.txt", "r");
  if($handle) {
    while(($line = fgets($handle)) !== false)  {
      if($line[0] != '#') {
        $line_arr = explode(",", $line);
        for($i = 0; $i < (int)$line_arr[2]; $i++)  {
          echo "      [" . $line_arr[0] . ",\"icons/" . substr($line_arr[1],1) . "],\r\n";  
        }
      }
    }
  }
?>
    ];


    var rares = [
<?php
  $handle = fopen("rare.txt", "r");
  if($handle) {
    while(($line = fgets($handle)) !== false)  {
      if($line[0] != '#') {
        $line_arr = explode(",", $line);
        for($i = 0; $i < (int)$line_arr[2]; $i++)  {
          echo "      [" . $line_arr[0] . ",\"icons/" . substr($line_arr[1],1) . "],\r\n";  
        }
      }
    }
  }
?>
    ];

  </script>
  </body>
</html>
