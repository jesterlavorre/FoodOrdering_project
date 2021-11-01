var sent = false;
var stars = 1;
var mediumstars = 0;
var numstars = 0;
var coment;
var p;

function createCookie(name, value, days) {
  var expires;
  
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

$(document).ready(function () {
    var list = ["one", "two", "three", "four", "five"];
     createCookie("stars", "1", "1");
    list.forEach(function (element) {
        document.getElementById(element).addEventListener("click", function () {
            if (!sent) {
                var cls = document.getElementById(element).className;
                if (cls.includes("unchecked")) {
                    document.getElementById(element).classList.remove("unchecked");
                    document.getElementById(element).classList.add("checked");
                    switch (element) {
                        case "one":
                          createCookie("stars", "1", "1"); break;
                        case "two":
                            createCookie("stars", "2", "1"); break;

                        case "three": document.getElementById("two").classList.remove("unchecked");
                            document.getElementById("two").classList.add("checked");
                            createCookie("stars", "3", "1");;


                            break;
                        case "four":
                           createCookie("stars", "4", "1");
                            document.getElementById("two").classList.remove("unchecked");
                            document.getElementById("two").classList.add("checked");

                            document.getElementById("three").classList.remove("unchecked");
                            document.getElementById("three").classList.add("checked");

                            break;
                        case "five":
                             createCookie("stars", "5", "1");
                            document.getElementById("two").classList.remove("unchecked");
                            document.getElementById("two").classList.add("checked");

                            document.getElementById("three").classList.remove("unchecked");
                            document.getElementById("three").classList.add("checked");
                            document.getElementById("four").classList.remove("unchecked");
                            document.getElementById("four").classList.add("checked"); break;

                    }
                }
                else {
                    switch (element) {
                        case "one":
                           createCookie("stars", "1", "1");
                            if (document.getElementById("two").className.includes("checked")) {

                                document.getElementById("two").classList.remove("checked");
                                document.getElementById("two").classList.add("unchecked");
                            }
                            if (document.getElementById("three").className.includes("checked")) {

                                document.getElementById("three").classList.remove("checked");
                                document.getElementById("three").classList.add("unchecked");
                            }
                            if (document.getElementById("four").className.includes("checked")) {

                                document.getElementById("four").classList.remove("checked");
                                document.getElementById("four").classList.add("unchecked");
                            }

                            if (document.getElementById("five").className.includes("checked")) {

                                document.getElementById("five").classList.remove("checked");
                                document.getElementById("five").classList.add("unchecked");
                            }
                            break;
                        case "two":
                            createCookie("stars", "2", "1");
                            if (document.getElementById("three").className.includes("checked")) {

                                document.getElementById("three").classList.remove("checked");
                                document.getElementById("three").classList.add("unchecked");
                            }
                            if (document.getElementById("four").className.includes("checked")) {

                                document.getElementById("four").classList.remove("checked");
                                document.getElementById("four").classList.add("unchecked");
                            }

                            if (document.getElementById("five").className.includes("checked")) {

                                document.getElementById("five").classList.remove("checked");
                                document.getElementById("five").classList.add("unchecked");
                            }

                            break;
                        case "three":
                          createCookie("stars", "3", "1");
                            if (document.getElementById("four").className.includes("checked")) {

                                document.getElementById("four").classList.remove("checked");
                                document.getElementById("four").classList.add("unchecked");
                            }

                            if (document.getElementById("five").className.includes("checked")) {

                                document.getElementById("five").classList.remove("checked");
                                document.getElementById("five").classList.add("unchecked");
                            }
                            break;
                        case "four":
                            createCookie("stars", "4", "1");
                            if (document.getElementById("five").className.includes("checked")) {

                                document.getElementById("five").classList.remove("checked");
                                document.getElementById("five").classList.add("unchecked");
                            }
                            break;
                        case "five":  createCookie("stars", "5", "1"); break;
                    }
                }
            }
        });
    });
});


function addToSection(data) {
    var today = new Date();

    var tr = $('#type_tr').text();
    var date = today.getDate() + '.' + (today.getMonth() + 1) + '.' + today.getFullYear() + '.';
    var time = today.getHours() + ":" + today.getMinutes() + "h";

    var allgrades = localStorage.getItem(tr + " " + "allgrades");
    if (allgrades != null) {
        allgrades = parseInt(allgrades);
        allgrades += stars;
        var numgrades = localStorage.getItem(tr + " " + "numgrades");
        numgrades++;
        localStorage.setItem(tr + " " + "numgrades", numgrades);
    }
    else {
        allgrades = stars;
        numgrades = 1;
        localStorage.setItem(tr + " " + "numgrades", 1);
    }
    localStorage.setItem(tr + " " + "allgrades", allgrades);

    var grade = allgrades / numgrades;
    var s =  grade;
    $('#rate').append(s);
    var star = "<div >"
    var str = "<i class='fa fa-star checked '></i>";
    star = star + str;
    str = "";
    for (i = 2; i < 6; i++) {

        if (i > stars)
            var str = "<i class='fa fa-star unchecked '></i>";
        else {
            var str = "<i class='fa fa-star checked '></i>";
        }
        star = star + str;
        str = "";
    }
    star = star + "</div>";
    var html = "<div class='comentBox'><span><b>" + data.name + " (" + date + " " + time + ")</b></span>" + star + "<br><p>" + data.com + "</p></div>";
    p.push(html);
    var tr = $('#type_tr').text();
    localStorage.setItem("" + tr, JSON.stringify(p));
    $('#container').append(html);
}

$(document).ready(function () {
    var tr = $('#type_tr').text();
    //localStorage.removeItem(tr);
    var n = localStorage.getItem("" + tr);
    p = JSON.parse(n);
    if (p != null) {
        for (var i = 0; i < p.length; i++) {
            // addToSection(p[i]);
            $('#container').append(p[i]);
        }
    } else p = [];
    
    $('#getComment').click(function () {
        if (haveBeen()) {
            if ($("#name").val() != "" && $('#comment').val() != "" && $('#email').val() != "") {
                var formdata = {
                    "name": $("#name").val(),
                    "com": $('#comment').val()

                };
                sent = true;
                //    coment.push(formdata);
                addToSection(formdata);
                //  var n = localStorage.getItem(""+tr);
                // var niz = JSON.parse(n);
                //localStorage.removeItem(""+tr);
                //if (niz != null) {
                //for (i = 0; i < niz.length; i++) {
                //coment.push(niz[i]);
                // }
                // }
                //     localStorage.setItem(""+tr, JSON.stringify(coment));
            } else alert("You need to fill in all the fields");
        } else {
            alert("You need to participate in this course to leave the comment.")
        }
    });


});



