window.onload = () => {
}

      function loadproduct(str,max, q, suche){
        if(str >= 0 && str < max){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState ==4 && this.status==200){
                    document.getElementById("output").innerHTML =this.responseText;
                }else{ 
                    document.getElementById("output").innerHTML =this.statusText;
                }
            };
            xmlhttp.open("GET","PHP/loadproduct.php?str="+str+"&q="+q+"&suche="+suche,true);
            xmlhttp.send();  
        }
        
      }
      function loadkatogorien(str){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("outputkat").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("outputkat").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/katogorien.php?q="+str,true);
                xmlhttp.send();
      }
      function login(){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/login.php",true);
                xmlhttp.send();
      }
      function show(str){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/showproduct.php?q=" + str,true);
                xmlhttp.send();
      }

      function admin(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var check = document.getElementById("angemeldet").checked;
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("error").innerHTML =this.responseText;
                        txt = document.getElementById("error").innerText;
                        if(txt == "Angemeldet"){
                            user();
                            loadproduct(0,2);
                        }
                    }else{ 
                        document.getElementById("error").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/admin.php?username="+ username + "&password="+ password + "&angemeldet="+check,true);
                xmlhttp.send();
      }
      function loadnewevaluation(str){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("form").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("form").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/evaluation.php?q="+str,true);
                xmlhttp.send();
      }

      function newevaluation(str){
        var title = document.getElementById("title").value;
        var user = document.getElementById("user").value;
        var text = document.getElementById("Comment").value;
        var star = document.getElementsByName('numrating');

        for(i = 0; i < star.length; i++){
          if(star[i].checked){
            stars = star[i].value;
          }
          }
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                        show(str);
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/newevaluation.php?title=" + title + "&user="+user+"&comment="+text+"&q="+str+"&star="+stars,true);
                xmlhttp.send();
      }

    function like(str,pid){
      var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML = this.responseText;
                        show(pid);
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/commentLike.php?q="+str+"&pid="+pid,true);
                xmlhttp.send();
    }
    function addWarenkorb(str, userid){
      var count = document.getElementById("countwaren").innerText;
      var stueck = document.getElementById("stueck").value;
      var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("countwaren").innerHTML =this.responseText;
                        show(str);
                    }else{ 
                        document.getElementById("countwaren").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/warenkorb.php?q="+str+"&count="+count + "&stueck="+stueck+"&userid="+userid,true);
                xmlhttp.send();
    }

    function showWarenkorb(){
      var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/showwarenkorb.php",true);
                xmlhttp.send();
    }
    function warenkorbdelete(str){
        var count = document.getElementById("countwaren").innerText;
      var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("countwaren").innerHTML =this.responseText;
                        showWarenkorb();
                    }else{ 
                        document.getElementById("countwaren").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/deletewarenkorb.php?q="+str+"&count="+count,true);
                xmlhttp.send();
    }

    function order(){
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("output").innerHTML =this.responseText;
                      }else{ 
                          document.getElementById("output").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/order.php",true);
                  xmlhttp.send();
      }
      function finishorder(str){
        streat = document.getElementById('streat').value;
        vilage = document.getElementById('vilage').value;
        adress = document.getElementById('adress').value;
        country = document.getElementById('country').value;
        currency = document.getElementById('currency').value;
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("countwaren").innerHTML =this.responseText;
                          loadproduct();
                      }else{ 
                          document.getElementById("countwaren").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/finishorder.php?q=" + str + "&streat=" + streat+"&vilage="+vilage+"&address="+adress+"&country="+country+"&currency="+currency,true);
                  xmlhttp.send();
      }

      function newProduct(){
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("output").innerHTML = this.responseText;
                      }else{ 
                          document.getElementById("output").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/newProduct.php",true);
                  xmlhttp.send();
      }
      function comment(sort, id, value){
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("commentoutput").innerHTML = this.responseText;
                      }else{ 
                          document.getElementById("commentoutput").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/comment.php?sort="+sort + "&id="+id+"&value="+value,true);
                  xmlhttp.send();
      }

      function showorders(){
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("output").innerHTML = this.responseText;
                          show(pid);
                      }else{ 
                          document.getElementById("output").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/showorders.php",true);
                  xmlhttp.send();
      }
      function user(){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("dashboard").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("dashboard").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/user.php",true);
                xmlhttp.send();
      }
      function showHint(str){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/suche.php?suche="+str,true);
                xmlhttp.send();
      }
      function logout(){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                        user();
                        loadproduct(0,2);
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("GET","PHP/Logout.php",true);
                xmlhttp.send();
      }
      function signIn(){
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("POST","PHP/signIn.php",true);
                xmlhttp.send();
      }
      function signInnew(){
        firstname = document.getElementById("firstname").value;
        lastname = document.getElementById("lastname").value;
        email = document.getElementById("email").value;
        password = document.getElementById("password").value;
        address = document.getElementById("address").value;
        address2 = document.getElementById("address2").value;
        city = document.getElementById("city").value;
        state = document.getElementById("state").value;
        plz = document.getElementById("plz").value;
        var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        document.getElementById("output").innerHTML =this.responseText;
                    }else{ 
                        document.getElementById("output").innerHTML =this.statusText;
                    }
                };
                xmlhttp.open("POST","PHP/newsignIn.php?fname="+firstname+"&lname="+lastname+"&email="+email+"&pass="+password+"&address="+address+"&address2="+address2+"&city="+city+"&state="+state+"&plz="+plz,true);
                xmlhttp.send();
      }
      function ADS(){
        var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function(){
                      if(this.readyState ==4 && this.status==200){
                          document.getElementById("outputads").innerHTML = this.responseText;
                      }else{ 
                          document.getElementById("outputads").innerHTML =this.statusText;
                      }
                  };
                  xmlhttp.open("GET","PHP/ads.php",true);
                  xmlhttp.send();
      }