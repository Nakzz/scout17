var team_id;
var match__id;
 
var stats = {
  auto_cross_line: 0,
  auto_gear_left: 0,
  auto_gear_center: 0,
  auto_gear_right: 0,
  auto_fuel_low: 0,
  auto_fuel_high: 0,

  gears: 0,
  fuel_low: 0,
  fuel_high: 0,
  climb: 0,

  floor_gear: 0,
  floor_ball: 0,
  defense: 0,
  load_hopper: 0,
  
  fouls: 0,
  tech_fouls: 0,
  died: 0
  
};

var log = new Array();

function increase(statName) {
  //TODO: it should be possible to derive the statName from the
  //name of the object that called this function (i.e. the button)
  // statName = (buttonName - "_btn")
  var badgeName = statName + "_badge"
  var buttonName = statName + "_btn"

  var oldStatVal = stats[statName]

  var badge = document.getElementById(badgeName);
  if (!(badge === null)) {
     badge.innerHTML = oldStatVal + 1;
  }

  stats[statName] = oldStatVal + 1;

  if (oldStatVal == 0) {
    var button = document.getElementById(buttonName)
    button.style.color = 'green'
  }

  log.push(statName);
 }

function undo() {
  if (log.length !== 0) {
    var last_action = log.pop();
    decrease(last_action);
  }
}

function decrease(statName) {
  //TODO: it should be possible to derive the statName from the
  // name of the object that called this function (i.e. the button)
  // statName = (buttonName - "_btn")
  var badgeName = statName + "_badge"
  var buttonName = statName + "_btn"

  var oldStatVal = stats[statName]
  var newStatVal = oldStatVal - 1;

  var badge = document.getElementById(badgeName);
  if (!(badge === null)) {
    badge.innerHTML = newStatVal;
  }

  stats[statName] = newStatVal;

  if (newStatVal == 0) {
    var button = document.getElementById(buttonName)
    button.style.color = 'black'
  }
}

function resetField(statName) {
//TODO: it should be possible to derive the statName from the
// name of the object that called this function (i.e. the button)
// statName = (buttonName - "_btn")
  var badgeName = statName + "_badge"
  var buttonName = statName + "_btn"

  stats[statName] = 0

  var badge = document.getElementById(badgeName)
  if (!(badge === null)) {
    badge.innerHTML = 0;
  }

  var button = document.getElementById(buttonName)
  if (!(button === null)) {
    button.style.color = 'black'
  }
}

function saveAndReset() {
  team_id = document.getElementById("team_id").value;
  saveStat();
  
  //clear
  for (var statName in stats) {
    if (typeof (stats[statName]) !== "undefined") {
      resetField(statName);
    }
  }
  match__id = 0;
  team_id = 0;
  document.getElementById("team_id").value = '';

  getCurrentGame(); 
}