
    
    const addOnClickLink = (elm) => {
        for (let i = 0; i < elm.length; i++) {
            if (window.addEventListener) { //Firefox, Chrome, Safari, IE 10
                elm[i].addEventListener('click', function(event) {
                    route(event);
                }, false);
            } else if (window.attachEvent) { //IE < 9
                elm[i].attachEvent('onmouseover', highlight);
            }
        }
    }
    const route = (event) => {
        //event = event || window.event;
        //event.preventDefault();
        window.history.pushState({}, "", event.target.getAttribute('href'));
        handleLocation();
        let elm = document.getElementsByTagName("tr-a");
        addOnClickLink(elm);
    }
    const routing = function (path) {
        //const index = listRoute.pages.findIndex(item => item.name.toLowerCase() === path.toLowerCase());
        //console.log(listRoute.pages[index].js);
            //document.querySelector("#main-page").innerHTML = listRoute.pages[index].html;
            //eval(listRoute.pages[index].js);
        window[path]();
        //currPage.style.display = "block";

    }
    const handleLocation = () => {
        var path = window.location.pathname;
        path = path.replace("/"+project_name+"/",""); 
        path = path.replaceAll("/", "_");
        path = ((path == "") ? '_default' : path);
        path = 'pages_'+path;
        routing(path);
    };
    window.onpopstate = handleLocation;
    window.route = route;
    handleLocation();
    let elm = document.getElementsByTagName("tr-a");
    addOnClickLink(elm);