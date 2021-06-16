function rtable(){var Drowtb=["10:00","10:15","10:30","10:45","11:00","11:15","11:30","11:45","12:00","12:15","12:30","12:45","01:00","01:15","01:30","01:45","02:00","02:15","02:30","02:45","03:00","03:15","03:30","03:45","04:00","04:15","04:30","04:45","05:00","05:15","05:30","05:45","06:00","06:15","06:30","06:45","07:00","07:15","07:30","07:45","08:00","08:15","08:30","08:45","09:00","09:15","09:30"];if(res.length>300){var rres=res.toString();var ares=[];for(let i=0;i<Drowtb.length;i++){if(rres.includes(Drowtb[i])){var xxd=rres.indexOf(Drowtb[i]);var wm=xxd+516;var ttw=rres.substring(xxd,wm);ares.splice(0,0,ttw);}}
if(fuss=="2"){ares.reverse();var ck=resno+11;gap0.splice(0,1,"TIME");gap0.splice(11,1,"TIME");gap0.splice(22,1,"TIME");gap0.splice(33,1,"TIME");gap0.splice(44,1,"TIME");gap0.splice(55,1,"TIME");gap0.splice(66,1,"TIME");gap0.splice(77,1,"TIME");gap0.splice(88,1,"TIME");gap0.splice(99,1,"TIME");var row1="";var tdz="";for(let i=0;i<10;i++){tdz+='<td id="btnn" > <input type="submit" id="'+btnn[i]+'" value="'+btnv[i]+'" onclick="'+btnn[i]+'()" /> </td>';}
row1+='<tr Id="trm">'+tdz+'</tr>';document.getElementById('ddiv').innerHTML='<table Id="tbm" border="1"><tbody id="tbtm">'+row1+'</tbody></table>';var row="";var td='';gap0.splice(0,1,mdate);for(let i=resno;i<ck;i++){td+='<td id="azz">'+gap0[i]+'</td>';}
row+='<tr Id="trm">'+td+'</tr>';for(let w=0;w<ares.length;w++){var ggw=ares[w].toString();var vvz=ggw.split(",");var rest=[];var rtime=vvz[0];var rdate=vvz[1];vvz.splice(0,2);var bbn=vvz[99];var ssx=bbn.substring(0,4);vvz.splice(99,1,ssx);vvz.sort(function(a,b){return b-a});for(let i=0;i<vvz.length;i++){if(dig=="1"){var str=vvz[i].toString();rest.splice(0,0,str.charAt(2));}
if(dig=="2"){var str=vvz[i];var gbb=str.charAt(2)+str.charAt(3);rest.splice(0,0,gbb);}
if(dig=="4"){var str=vvz[i].toString();rest.splice(0,0,str);}}
rest.splice(0,0,rtime);rest.splice(11,0,rtime);rest.splice(22,0,rtime);rest.splice(33,0,rtime);rest.splice(44,0,rtime);rest.splice(55,0,rtime);rest.splice(66,0,rtime);rest.splice(77,0,rtime);rest.splice(88,0,rtime);rest.splice(99,0,rtime);var td1='';for(let i=resno;i<ck;i++){td1+='<td>'+rest[i]+'</td>';}
row+='<tr Id="trm">'+td1+'</tr>';}
document.getElementById('table').innerHTML='<table Id="tbm" border="1"><tbody id="tbtm">'+row+'</tbody></table>';}
if(fuss=="1"){var ssww="";for(let w=0;w<ares.length;w++){var ggw=ares[w].toString();var vvz=ggw.split(",");var rest=[];var rtime=vvz[0];var rdate=vvz[1];vvz.splice(0,2);var bbn=vvz[99];var ssx=bbn.substring(0,4);vvz.splice(99,1,ssx);vvz.sort(function(a,b){return b-a});for(let z=0;z<vvz.length;z++){if(dig=="1"){var str=vvz[z].toString();rest.splice(0,0,str.charAt(2));}
if(dig=="2"){var str=vvz[z];var gbb=str.charAt(2)+str.charAt(3);rest.splice(0,0,gbb);}
if(dig=="4"){rest.splice(0,0,vvz[z]);}}
var resbz=[];for(i=0;i<10;i++){resbz[i]=(i<10)?i.toString()+'0':i.toString();}
for(i=0;i<resbz.length;i++){var k=i*11;for(var j=0;j<100;j++){if(k===j){rest.splice(k,0,resbz[i]);}}}
var ttbl=[rtime,"0","1","2","3","4","5","6","7","8","9"];var nnk=[mdate,"0","1","2","3","4","5","6","7","8","9"];var row1='';var td1='';for(var i=0;i<11;i++){td1+='<td>'+ttbl[i]+'</td>';}
row1+='<tr Id="tr1">'+td1+'</tr>';for(i=0;i<10;i++){var td='';var x=(i*10+i);for(var j=0;j<11;j++){td+='<td >'+rest[x+j]+'</td>';}
row1+='<tr Id="trr">'+td+'</tr>';}
var td2='';for(i=0;i<11;i++){td2+='<td> '+nnk[i]+'</td>';}
row1+='<tr Id="tr2">'+td2+'</tr>';var ffdate="TIME:-"+rtime+"_._"+"DATE:-"+rdate;ssww+="<input type='text' id='zzxx' value="+ffdate+" readonly  />"
ssww+='<table Id="tbb" border="2"><tbody id="tbl" style="white-space: pre">'+row1+'</tbody></table>';}
document.getElementById('table').innerHTML=ssww;}}}