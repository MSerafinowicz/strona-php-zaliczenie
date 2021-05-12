
var info = document.getElementsByTagName("h3")[0];
var res, href, tekst;





//sekcja I pytania
function sectionI(text) {


    var bool = true;
    var r = new RegExp("<<");
    var r1 = new RegExp(">>");
    var r2 = new RegExp(/\*\*/);
    var r3 = new RegExp(/\*/);
    var r4 = new RegExp(/_!/);
    var r5 = new RegExp(/!_/);
    var r6 = new RegExp(/-!/);
    var r7 = new RegExp(/!-/);


    if (!r.test(text)) {

        info.innerHTML += "Błąd w zamknięciu znacznika'<<'<br>";
        bool = false;
    } else {
        text = text.replace(r, "<q>");
    }
    if (!r1.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'>>'</br>";
        bool = false;
    } else {
        text = text.replace(r1, "</q>");
    }


    if (!r2.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'**'<br>";
        bool = false;
    } else {
        res = text.split(r2);
        if (res.length < 3) {
            info.innerHTML += "Błąd w zamknięciu znacznika'**'<br>";
            bool = false;
        }
        else {
            res[0] = res[0] + "\*\*".replace(r2, "<strong>");
            res[1] = res[1] + "\*\*".replace(r2, "</strong>");
            text = res[0] + res[1] + res[2];
        }

    }

    if (!r3.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'*'<br>";
        bool = false;
    } else {
        res = text.split(r3);
        if (res.length < 3) {
            info.innerHTML += "Błąd w zamknięciu znacznika'*'<br>";
            bool = false;
        }
        else {
            res[0] = res[0] + "\*".replace(r3, "<em>");
            res[1] = res[1] + "\*".replace(r3, "</em>");
            text = res[0] + res[1] + res[2];
        }

    }


    if (!r4.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'_!'<br>";
        bool = false;
    } else {
        text = text.replace(r4, "<ins>");

    }
    if (!r5.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'!_'<br>";
        bool = false;
    } else {
        text = text.replace(r5, "</ins>");

    }


    if (!r6.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'-!'<br>";
        bool = false;
    } else {
        text = text.replace(r6, "<del>");

    }
    if (!r7.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'!-'<br>";
        bool = false;
    } else {
        text = text.replace(r7, "</del>");

    }

    if (bool) {
        document.getElementById('text').innerHTML = text;
    }
}

//sekcja II pytania <a></a>
function sectionII(text) {

    var bool = true;
    var a = new RegExp(/\[(http\:\/\/www\.+.*)\|(.*)\]/);
    var aHref = new RegExp(/\[(http\:\/\/www\.+.*)\|/);
    var aText = new RegExp(/\|(.*)\]/);



    if (!a.test(text)) {
        info.innerHTML += "Błąd w zamknięciu znacznika'[adres|tekst]'<br>";
        bool = false;
    } else {
        if (!aHref.test(text)) {
            info.innerHTML += "Błąd w  znaczniku'[adres|tekst] w adresie'<br>";
            bool = false;
        } else {
            res = text.split(aHref);
            href = res[1];

        }
        if (!aText.test(text)) {
            info.innerHTML += "Błąd w zamknięciu znacznika'[adres|tekst] w tekście'<br>";
            bool = false;
        } else {
            res = text.split(aText);
            tekst = res[1];
        }
        if (bool) {
            text = text.replace(a, "<a href=" + href + " target='_blank'>" + tekst + "</a>");
        }

        if (bool) {
            document.getElementById('text').innerHTML = text;

        }

        if (bool) {
            document.getElementById('text').innerHTML = text;
        }
    }
}

//sekcja III pytania <h1></h1>
function sectionIII(data) {

    var bool = true;
    var h1N = new RegExp("#");


    if (!h1N.test(data)) {
        info.innerHTML += "Błąd w znaczniku 'h1'<br>";
        bool = false;
    } else {
        res = data.split(h1N);
        data = "";
        for (i = 0; i < res.length; i++) {
            if (res[i] != "") {
                data += res[i].replace(res[i], '<h1 id="n' + i + '">' + res[i] + '</h1>');;
            }
        }
    }
    if (bool) {
        document.getElementsByClassName("container")[0].innerHTML = data;
    }


}

function sectionIV(text) {

    var bool = true;
    var aside = new RegExp(/\{(.*)\|(.*)\}(.*)/);
    var typ,title,tekst;
    if(!aside.test(text)){
        info.innerHTML += "Błąd w znaczniku 'aside'<br>";
        bool = false;
    }else{
        typ=text.split(aside);
        typ=typ[1];
        title=text.split(aside);
        title=title[2];
        tekst=text.split(aside);
        tekst=tekst[3];
        text=text.replace(aside,"<aside cat='"+typ+"'><header>"+title+"</header><main>"+tekst+"</main></aside>");
    }
    

    if(bool) {
        document.getElementById('container').innerHTML = text;
    }
}
