day = new Date(); 
miVisit = day.getTime(); 
function clock() { 
dayTwo = new Date(); 
hrNow = dayTwo.getHours(); 
mnNow = dayTwo.getMinutes(); 
scNow = dayTwo.getSeconds(); 
miNow = dayTwo.getTime(); 
if (hrNow == 0) { 
hour = 12; 
ap = " AM"; 
} else if(hrNow <= 11) { 
ap = " AM"; 
hour = hrNow; 
} else if(hrNow == 12) { 
ap = " PM"; 
hour = 12; 
} else if (hrNow >= 13) { 
hour = (hrNow - 12); 
ap = " PM"; 
} 
if (hrNow >= 13) { 
hour = hrNow - 12; 
} 
if (mnNow <= 9) { 
min = "0" + mnNow; 
} 
else (min = mnNow) 
if (scNow <= 9) { 
secs = "0" + scNow; 
} else { 
secs = scNow; 
} 
time = hour + ":" + min + ":" + secs + ap; 
document.getElementById('clock').innerHTML = time; 
self.status = time; 
setTimeout('clock()', 1000); 
} 
function timeInfo() { 
milliSince = miNow; 
milliNow = miNow - miVisit; 
secsVisit = Math.round(milliNow / 1000); 
minsVisit = Math.round((milliNow / 1000) / 60); 
} 
clock(); 
