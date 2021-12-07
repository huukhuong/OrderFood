 // countdown
 const days = document.getElementById('days');
 const hours = document.getElementById('hours');
 const minutes = document.getElementById('minutes');
 const seconds = document.getElementById('seconds');

 const dayEvent = new Date('April 19 2022 00:00:00').getTime();

 function countDown() {
     const now = new Date().getTime();
     const timedown = dayEvent - now;
     const d = Math.floor(timedown / 1000 / 60 / 60 / 24);
     const h = Math.floor(timedown / 1000 / 60 / 60) % 24;
     const m = Math.floor(timedown / 1000 / 60) % 60;
     const s = Math.floor(timedown / 1000) % 60;

     days.innerHTML = d < 10 ? '0' + d : d;
     hours.innerHTML = h < 10 ? '0' + h : h;
     minutes.innerHTML = m < 10 ? '0' + m : m;
     seconds.innerHTML = s < 10 ? '0' + s : s;
 }

 setInterval(countDown, 1000)