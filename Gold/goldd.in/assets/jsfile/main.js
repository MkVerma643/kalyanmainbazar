var fuss="1";var mmzz1="";var mmzz="";var res=[];var dig="4";var seto;var reslen;var count=0;var ddate='';var mdate="";var drownm="1";var tableh=['....','0','1','2','3','4','5','6','7','8','9'];var gap0=["TIME","00","01","02","03","04","05","06","07","08","09","-","10","11","12","13","14","15","16","17","18","19","-","20","21","22","23","24","25","26","27","28","29","-","30","31","32","33","34","35","36","37","38","39","-","40","41","42","43","44","45","46","47","48","49","-","50","51","52","53","54","55","56","57","58","59","-","60","61","62","63","64","65","66","67","68","69","-","70","71","72","73","74","75","76","77","78","79","-","80","81","82","83","84","85","86","87","88","89","-","90","91","92","93","94","95","96","97","98","99"];var btnn=["btn00","btn10","btn20","btn30","btn40","btn50","btn60","btn70","btn80","btn90"];var btnv=["00","10","20","30","40","50","60","70","80","90"];var resno=11;function oned(){dig="1";rtable();}
function twod(){dig="2";rtable();}
function fourd(){dig="4";rtable();}
Date.prototype.toDateInputValue=(function(){var local=new Date(this);local.setMinutes(this.getMinutes()-this.getTimezoneOffset());return local.toJSON().slice(0,10);});function mname(){var resv='';$.ajax({type:'POST',url:"messup.php",async:false,data:{q:"MyGuests"},success:function(response){resv=response;},});var cc=resv.toString();console.log(cc);document.getElementById('marquee').innerHTML='<marquee>'+cc+'</marquee>'}
function btn00(){resno=0;rtable();}
function btn10(){resno=11;rtable();}
function btn20(){resno=22;rtable();}
function btn30(){resno=33;rtable();}
function btn40(){resno=44;rtable();}
function btn50(){resno=55;rtable();}
function btn60(){resno=66;rtable();}
function btn70(){resno=77;rtable();}
function btn80(){resno=88;rtable();}
function btn90(){resno=99;rtable();}
function apk(){location.href="https://rajwin.com/apk.html";}