function ppdate(){var today=new Date();var dd=today.getDate().toString();var mm=(today.getMonth()+1).toString();var yyyy=today.getFullYear().toString();if(dd<10){dd="0"+dd;}
if(mm<10){mm='0'+mm;}
ddate=yyyy+'-'+mm+'-'+dd;document.getElementById("datepicker").value=ddate;mdate=dd+"-"+mm;getdat();}